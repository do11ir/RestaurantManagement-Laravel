<?php

namespace App\Http\Controllers;

use App\Models\basket;
use App\Models\factor;
use App\Models\food;
use App\Models\NewAddress;
use App\Models\ProductsBasket;
use App\Models\restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class basketController extends Controller
{
    public function add($foods_id)
    {
        if(!Auth::user())
        {
            return view('auth.login');
        }
        else
        {
        $basket = basket::where('user_id','=',Auth::user()->id)
        ->where('is_payed','=',0)
        ->first();
        }
        if($basket)
        {
            $ProductsBasket = ProductsBasket::where('foods_id','=',$foods_id)
            ->where('basket_id','=',$basket->id)
            ->first();
            if($ProductsBasket)
            {
                $ProductsBasket->count = $ProductsBasket->count + 1;
                $ProductsBasket->update();
            }
            else{
                $ProductsBasket = new ProductsBasket();
                $ProductsBasket->foods_id = $foods_id;
                $ProductsBasket->basket_id = $basket->id;
                $ProductsBasket->count = 1;
                $ProductsBasket->save(); 
            }
        }
      
        else{
            $basket = new basket();
            $basket->user_id = Auth::user()->id;
            $basket->is_payed = 0;
            $basket->save();
            $ProductsBasket = new ProductsBasket();
            $ProductsBasket->foods_id = $foods_id;
            $ProductsBasket->basket_id = $basket->id;
            $ProductsBasket->count = 1;
            $ProductsBasket->save();
        }

        
        return redirect(route('user'))->with('success','success');
        
    }

    public function foodBasket()
    {
        $food = food::all();
        $Basket = basket::where('user_id','=',Auth::user()->id)->where('is_payed','=',0)->first();
        $products_baskets = ProductsBasket::all();
        $restaurant = restaurant::all();
        $NewAddress = NewAddress::all();
        return view('ClientView.foodBasket' , ['food' => $food , 'products_baskets' => $products_baskets ,
         'Basket' => $Basket , 'restaurant' => $restaurant, 
        'NewAddress' => $NewAddress]);
    }

    public function deleteOrder($id)
    {
         ProductsBasket::find($id)->delete();
         return redirect(route('foodBasket'))->with('success','success');
        
    }

    public function insertFactors(Request $request)
    {  
        $name = $request->input('name');
        $phoneNumber = $request->input('phoneNumber');
        $address = $request->input('address');
        $orderDescribtion = $request->input('orderDescribtion');
        $totalPrice = $request->input('totalPrice');
        $basket_id = $request->input('basket_id');
        $restaurant_name = $request->input('restaurant_name');
        

        $factors = new factor();
        $factors->name=$name;
        $factors->phoneNumber=$phoneNumber;
        $factors->address=$address;
        $factors->orderDescribtion=$orderDescribtion;
        $factors->totalPrice=$totalPrice;
        $factors->restaurant_name=$restaurant_name;
        $factors->basket_id=$basket_id;
        
        $factors->save();
        $basket = basket::where('user_id' , Auth::user()->id)->orderBy('id', 'desc')->first();
        $basket->is_payed = 1;
        $basket->save();
        return redirect(route('profile'))->with('success', ' success');
    }

}
