<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    //


    public function Order(){
        $orders = Order::latest()->get();
        addHashId($orders);
        return view('manage.sales.orders')

                ->with('orders', $orders)
                ->with('bheading', 'Users Orders')
                ->with('breadcrumb', 'Orders');
    }

    public function OrderDetails($id){
        $orderItems = CartItem::where('Order_no', decrypt($id))->get();
        return view('manage.sales.orderDetails')
                ->with('ordersItems', $orderItems)
                ->with('bheading', 'Order Details')
                ->with('breadcrumb', 'Order details');
    }

    public function status($id){
        return view('manage.sales.status')
                ->with('order', Order::where('order_no', decrypt($id))->first())
                ->with('bheading', 'Update Status')
                ->with('breadcrumb', 'Update Status');
    }

    public function updateStatus(Request $request, $id){
        $id = decrypt($id);
        $order = Order::where('order_No', $id)->first();
            
              $dd =  Order::where('order_No', $order->order_No)
                ->update([
                'is_delivered' => $request->delivery,
                'dispatch_status' => $request->dispatch,
                'is_paid' => $request->payment
                ]);
                if($request->payment == 1){
                    $ref = "SFSL".rand(111111,999999);
                    Order::where('order_No', $order->order_No)
                    ->update(['payment_ref' => $ref]);
                }

                if($dd){
                if($order->dispatch_status != 1 && $request->dispatch == 1){
                $order_list = CartItem::where('order_No', $order->order_No )->get();
                $shipping = ShippingAddress::where('id', $order->shipping_id )->first();
                //dd($shipping);
                $datas = [
                'order_No' => $order->order_No,
                'name' => $shipping->receiver_name,
                'amount' => $order->amount,
                'email' => $shipping->receiver_email,
                'receiver_name' => $shipping->receiver_name,
                'phone' => $shipping->receiver_phone,
                'address' => $shipping->address,
                'delivery_method' => $shipping->delivery_method,
                'order_items' => $order_list,
                ];
                // $this->sendMail($datas);
                }
                Session::flash('alert', 'success');
                Session::flash('message', 'Status Updated Successfully');
                return redirect()->back();
                }
    }
}
