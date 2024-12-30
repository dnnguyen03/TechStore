<?php

namespace App\Controllers\Shop;

use App\Controller;
use App\Models\CustomerModel\Profile;
use App\Models\Product;
use App\Models\Seller;

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
        $sellerModel = new Seller();
       
        $get6Category = $this->productModel->get6CategoryHot();
        
        $top8rating = $sellerModel->getTop8RatingShops();
        $this->render('Shop/Pages/home', [
            'popularProduct' => $popularProduct,
            'bestDealProduct' => $bestDealProduct,
            'top8rating' => $top8rating,
            'get6Category' => $get6Category
           
        ]);
    }

    public function shop()
    {
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $sellerModel = new Seller();

        $listShop = $sellerModel->getAllShops($search);
        $this->render('Shop/Pages/allShop', [
            'listShop' => $listShop,
            'searchParams' => $search,
        ]);
    }

    public function show($product_id)
    {
        $product = $this->productModel->getProductById($product_id);
        $bestDealProduct = $this->productModel->getBestDeal();

        $this->render('Shop/Pages/detailProduct', ['product' => $product, 'bestDealProduct' => $bestDealProduct]);
    }

    public function detailShop($seller_id)
    {
        $sellerModel = new Seller();
        $inforShop = $sellerModel->getInforSeller($seller_id);
        $product = $this->productModel->getAllProductBySeller($seller_id);
        $top8rating = $sellerModel->getTop8RatingShops();
        $this->render('Shop/Pages/shop', [
            'inforShop' => $inforShop,
            'products' => $product,
            'top8rating' => $top8rating,

        ]);
    }

    public function productPagination()
    {
        $sellerModel = new Seller();
        $top8rating = $sellerModel->getTop8RatingShops();

        $limit = 9;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        $minPriceProduct = $this->productModel->getMinPriceProduct();
        $maxPriceProduct = $this->productModel->getMaxPriceProduct() + 1000000;

        $minPrice = isset($_GET['minPrice']) ? (int)$_GET['minPrice'] : $minPriceProduct;
        $maxPrice = isset($_GET['maxPrice']) ? (int)$_GET['maxPrice'] : $maxPriceProduct;

        $categories = isset($_GET['categories']) ? (is_array($_GET['categories']) ? $_GET['categories'] : explode(',', $_GET['categories'])) : [];
        if (empty($categories)) {
            $categories = [];
        }

        $search = isset($_GET['search']) ? $_GET['search'] : '';
        // Lấy danh sách sản phẩm đã lọc
        $products = $this->productModel->getFilteredPaginatedProducts($limit, $offset, $minPrice, $maxPrice, $categories, $search);
        // Lấy tổng số sản phẩm
        $totalProducts = $this->productModel->getTotalProductsFilter($minPrice, $maxPrice, $categories, $search);
        $totalPages = ceil($totalProducts / $limit);

        $categoryList = $this->productModel->getAllCategory();

        $this->render('Shop/Pages/allProduct', [
            'products' => $products,
            'totalPages' => $totalPages,
            'currentPage' => $page,
            'minPriceParams' => $minPrice,
            'maxPriceParams' => $maxPrice,
            'searchParams' => $search,
            'categoryParams' => $categories,
            'category' => $categoryList,
            'minPriceProduct' => $minPriceProduct,
            'maxPriceProduct' => $maxPriceProduct,
            'top8rating' => $top8rating
        ]);
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

            echo json_encode([
                'success' => true,
                'cart' => $_SESSION['cart']
            ]);
        } else {
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

        $userId = $_SESSION['currentUser']['user_id'];

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
            $orderId = $this->productModel->createOrder($userId, $sellerId);

            foreach ($orderDetails as $detail) {
                $this->productModel->createOrderDetail($orderId, $detail['product_id'], $detail['quantity']);
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
