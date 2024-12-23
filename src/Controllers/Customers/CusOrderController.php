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
    
    public function index()
    {
        $customer_id = 1;
        $orders = $this->orderModel->getOrderByCustomer($customer_id);
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
        header('Location: /orders');
    }



}

?>
