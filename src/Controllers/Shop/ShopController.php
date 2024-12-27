<?php

namespace App\Controllers\Shop;

use App\Controller;
use App\Models\Product;

class ShopController extends Controller
{
    private $productModel;
    public function __construct()
    {
        $this->productModel = new Product();
    }
    public function index()
    {
        unset($_SESSION['seller_id']);
        $popularProduct = $this->productModel->getPopularProduct();
        $bestDealProduct = $this->productModel->getBestDeal();

        $this->render('Shop/Pages/home', ['popularProduct' => $popularProduct, 'bestDealProduct' => $bestDealProduct]);
    }
    public function allProduct()
    {
        $products = $this->productModel->getAllProduct();

        $this->render('Shop/Pages/allProduct', ['products' => $products]);
    }
    public function show($product_id)
    {

        $product = $this->productModel->getProductById($product_id);
        $bestDealProduct = $this->productModel->getBestDeal();

        $this->render('Shop/Pages/detailProduct', ['product' => $product, 'bestDealProduct' => $bestDealProduct]);
    }
    public function handleCartAction()
    {
        // Lấy dữ liệu từ yêu cầu POST
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
        if (isset($data['product_id'], $data['shop_id'], $data['action'])) {
            $productId = $data['product_id'];
            $shop_id = $data['shop_id'];
            $shop_name = $this->productModel->getNameShop($data['shop_id']);
            $action = $data['action'];
            $productName = $data['product_name'] ?? "";
            $price = $data['price'] ?? "";
            $image = $data['image'] ?? "";
            $quantity = $data['quantity'] ?? 1;

            if (!isset($_SESSION['cart'][$shop_name])) {
                $_SESSION['cart'][$shop_name] = [];
            }

            switch ($action) {
                case 'add':
                    $found = false;
                    foreach ($_SESSION['cart'][$shop_name] as &$item) {
                        if ($item['product_id'] == $productId) {
                            $item['quantity'] += $quantity;
                            $found = true;
                            break;
                        }
                    }
                    if (!$found) {
                        $_SESSION['cart'][$shop_name][] = [
                            'product_id' => $productId,
                            'product_name' => $productName,
                            'price' => $price,
                            'image' => $image,
                            'quantity' => $quantity,
                            'shop_id' => $shop_id,
                        ];
                    }
                    break;

                case 'increase':
                    foreach ($_SESSION['cart'][$shop_name] as &$item) {
                        if ($item['product_id'] == $productId) {
                            $item['quantity']++;
                            break;
                        }
                    }
                    break;

                case 'decrease':
                    foreach ($_SESSION['cart'][$shop_name] as &$item) {
                        if ($item['product_id'] == $productId && $item['quantity'] > 1) {
                            $item['quantity']--;
                            break;
                        }
                    }
                    break;
                case 'update':
                    foreach ($_SESSION['cart'][$shop_name] as &$item) {
                        if ($item['product_id'] == $productId) {
                            $item['quantity'] = $quantity;
                            break;
                        }
                    }
                    break;
                case 'delete':
                    $_SESSION['cart'][$shop_name] = array_filter($_SESSION['cart'][$shop_name], function ($item) use ($productId) {
                        return $item['product_id'] != $productId;
                    });
                    $_SESSION['cart'][$shop_name] = array_values($_SESSION['cart'][$shop_name]);
                    if (empty($_SESSION['cart'][$shop_name])) {
                        unset($_SESSION['cart'][$shop_name]);
                    }
                    break;

                default:
                    echo json_encode(['success' => false, 'message' => 'Hành động không hợp lệ']);
                    return;
            }
            // Trả về giỏ hàng mới sau khi cập nhật
            echo json_encode([
                'success' => true,
                'cart' => $_SESSION['cart']
            ]);
        } else {
            // Nếu dữ liệu không hợp lệ
            echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ']);
        }
    }
    public function checkout()
    {
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            $_SESSION['alert_message'] = "Giỏ hàng của bạn hiện tại không có sản phẩm.";
            header('Location: /');
            return;
        }

        $userId = $_SESSION['currentUser']['user_id'];;

        foreach ($_SESSION['cart'] as $shopName => $cartItems) {
            $totalPrice = 0;
            $orderDetails = [];
            foreach ($cartItems as $item) {
                $totalPrice += $item['price'] * $item['quantity'];
                $totalPrice = (float)$totalPrice;
                $orderDetails[] = [
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'seller_id' => $item['shop_id'],
                ];
            }

            $sellerId = $orderDetails[0]['seller_id'];
            $orderId = $this->productModel->createOrder($userId, $sellerId, $orderDetails, $shopName, $totalPrice);

            foreach ($orderDetails as $detail) {
                $this->productModel->createOrderDetail($orderId, $detail['product_id'], $detail['quantity'], $detail['price']);
            }

            foreach ($orderDetails as $detail) {
                $this->productModel->updateProductStock($detail['product_id'], $detail['quantity']);
            }

            unset($_SESSION['cart'][$shopName]);
        }
        $_SESSION['alert_message'] = "Đã thanh toán giỏ hàng!";
        header('Location: /');
    }
}
