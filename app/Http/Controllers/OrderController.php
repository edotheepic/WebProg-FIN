<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function showCart(){

        $items = Auth::user()->orders;

        $total = 0;
        foreach($items as $item){
            $total += $item->price;
        }

        return view('cart')->with(compact('items','total'));
    }

    public function removeCart(Request $request){

        $user = Auth::user();
        $item = Item::find($request->id);

        $order = Order::where([['user_id', '=', $user->id],
                               ['item_id', '=', $item->id]])->first();

        $order->delete();

        return back();
    }

    public function checkout(){

        $items = Auth::user()->orders;

        foreach($items as $item){
            $item->pivot->delete();
        }

        return view('success');
    }
}
