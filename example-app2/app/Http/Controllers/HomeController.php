<?php

namespace App\Http\Controllers;


use App\Models\basket;
use App\Models\category;
use App\Models\factor;
use App\Models\food;
use App\Models\NewAddress;
use App\Models\ProductsBasket;
use App\Models\restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function user()
    {
        
        $category = Category::all();
        $food = Food::all();
        $restaurant = Restaurant::all();
        if (Auth::user())
        {
        $Basket = basket::where('user_id','=',Auth::user()->id)->where('is_payed','=',0)->first();
        return view('index' , ['food' => $food , 'category' => $category , 'Basket' => $Basket , 'restaurant'=>$restaurant]);
         }
        else {
            return view('index' , ['food' => $food , 'category' => $category , 'restaurant'=>$restaurant] );
        }
       
    }

    public function profile()
    {
       
        $restaurant = restaurant::where('master_id', '=', Auth::user()->id)->first();
       
        $food = food::all();
        $NewAddress = NewAddress::all();
        
        $baskets = Basket::where('user_id', Auth::user()->id)->get();
        $basketIds = $baskets->pluck('id');
        $factors = factor::whereIn('basket_id', $basketIds)->get();
        return view('ClientView.profile' , ['restaurant' => $restaurant , 'food' => $food ,
         'NewAddress' => $NewAddress , 'factors' => $factors , 'baskets' => $baskets]);
    }

  public function editUserInfo()
{
    $restaurant = restaurant::where('master_id', '=', Auth::user()->id)->first();
    $user = User::where('id', '=', Auth::user()->id)->first();
    $NewAddress = NewAddress::all();
    
    return view('ClientView.profilePannel.editUserInfo', [
        'user' => $user, 
        'restaurant' => $restaurant,
        'NewAddress' => $NewAddress
    ]);
}


    public function updateUserInfo(Request $request)
    {

        $user = user::findOrFail($request->id);
        $user->name=$request->name; 
        $user->address=$request->address;
        $user->phone=$request->phone;
        
        $user->update();
        return redirect(route('profile'))->with('success', 'success'); 
    }
    

    public function singleCategory($id)
    {
    
        $category = Category::findOrFail($id);
        $food = food::all();
    
        // ارسال داده‌ها به ویو
        return view('ClientView.singleCategory', compact('category', 'food'));
    }

    public function singleFood($id)
    {
    
        $food = food::findOrFail($id);
        $restaurant = restaurant::all();
        $products_baskets = ProductsBasket::all();
        
    
        // ارسال داده‌ها به ویو
        return view('ClientView.singleFood', compact('food', 'restaurant'));
    }

    public function singleRestaurant($id)
    {
        $food = food::all();
        $restaurant = restaurant::findOrFail($id);

        return view('ClientView.singleRestaurant' , ['restaurant' => $restaurant , 'food' => $food]);
    }

    public function newAddress(Request $request)
    {
        $user_id = Auth::user()->id; 
        $address = $request->input('address');
        
        $NewAddress = new NewAddress();
        $NewAddress->user_id=$user_id;
        $NewAddress->address=$address;

        $NewAddress->save();
        return redirect()->back()->with('success' , 'success');
    }

    public function deleteAddress($id)
    {
        NewAddress::find($id)->delete();
        return redirect(route('profile'))->with('success', 'success'); 
    }
    
    
    
}
