<?php

namespace App\Controllers\Customers;

use App\Controller;
use App\Models\CustomerModel\Order;

class CusOrderController extends Controller
{
    private $orderModel;

    public function __construct()
    {
        $this->orderModel = new Order();
    }
    
    // public function index()
    // {
    //     $customer_id = $_SESSION['currentUser']['user_id'];
    

    //     $orders = $this->orderModel->getOrderByCustomer($customer_id);
    //     $this->render('Customer/CusOrder/Order', ['orders' => $orders]);
    // }


    public function index()
    {
        $customer_id = $_SESSION['currentUser']['user_id'];
        $filter = isset($_GET['filter']) ? $_GET['filter'] : null;
        $sort = isset($_GET['sort']) ? $_GET['sort'] : null;
        $orders = $this->orderModel->getOrderWithFilter($customer_id,$filter,$sort);
        $this->render('Customer/CusOrder/Order', ['orders' => $orders]);
    }


    public function Details($order_id)
    {
        
        $orders = $this->orderModel->getOrderById($order_id);
        $orderDetails = $this->orderModel->getOrderDetailByOrder($order_id);
        
        $this->render('Customer/CusOrder/OrderDetail', ['orders' => $orders, 'orderDetails' => $orderDetails]);
    }

    public function Cancel($order_id)
    {
        
        $orders = $this->orderModel->cancelOrder($order_id);
        header('Location: /customer/orders');
    }



}

?>
