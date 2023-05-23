<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function showHome(){

        $items = Item::paginate(10);

        return view('home')->with(compact('items'));
    }

    public function showItem(Request $request){

        $item = Item::find($request->id);

        return view('item')->with(compact('item'));
    }

    public function buyItem(Request $request){

        $user = Auth::user();
        $item = Item::find($request->id);

        Order::create([
            "user_id" => $user->id,
            "item_id" => $item->id
        ]);

        return redirect("/cart");
    }
}
