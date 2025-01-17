<?php

namespace App\Http\Controllers;

use App\Models\basket;
use App\Models\category;
use App\Models\factor;
use App\Models\food;
use App\Models\ProductsBasket;
use App\Models\restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function editRestaurant()
    {
       $restaurant = restaurant::all();
        return view("ClientView.editRestaurant" , ['restaurant' => $restaurant]);
    }

    public function insertRestaurant(Request $request)
    {   $request -> validate([
        'name' => 'required|string|min:3',
        'master_id' => 'required|integer',
        'restaurant_address' => 'required|string|min:3'
    ]);
        $name = $request->input('name');
        $restaurant_address = $request->input('restaurant_address');
        $master_id = $request->input('master_id');
        
        
        $restaurant = new restaurant();
        $restaurant->name=$name;
        $restaurant->master_id=$master_id;
        $restaurant->restaurant_address=$restaurant_address;
      
       

        $restaurant->save();
        return redirect(route('profile'));
    }

    public function addFood()
    {
        $food = food::all();
        $category = category::all();
        $restaurant = restaurant::where('master_id', Auth::user()->id)->first();
        return view("ClientView.addFood" , ['food' => $food , 'category' => $category , 'restaurant'=>$restaurant]);
    }

    public function insertFood(Request $request)
    {
         $request -> validate([
        'name' => 'required|string|min:3',
        'restaurant_id' => 'required',
        'category_id' => 'required'
       
    ]);
    $name = $request->input('name');
    $status = $request->input('status');
    $entity = $request->input('entity');
    $description = $request->input('description');
    $price = $request->input('price');
    $restaurant_id = $request->input('restaurant_id');
    $category_id = $request->input('category_id');
    $image = time() .'-'. $request->file('image')->getClientOriginalName();
    $request->file('image')->move(public_path('img'), $image);

    $food = new food();
    $food->name=$name;
    $food->status=$status;
    $food->entity=$entity;
    $food->description=$description;
    $food->price=$price;
    $food->restaurant_id=$restaurant_id;
    $food->category_id=$category_id;
    $food->image=$image;

    $food->save();
    return redirect(route('addFood'))->with('success', 'غذا با موفقیت ثبت شد.');

    }

    public function deleteFood($id)
    {

        $food = food::find($id);
        ProductsBasket::where('foods_id', $food->id)->delete();
        // $food->productsBasket()->delete();
        $food->delete();
        return redirect(route('profile'))->with('success', 'غذا با موفقیت حذف شد.'); 
    }

    public function editFood($id)
    {
        $food = food::find($id);
        $restaurant = restaurant::where('master_id', Auth::user()->id)->first();
        $category = category::all();
        return view('ClientView.editFood' , ['food' => $food , 'restaurant' => $restaurant , 'category' => $category]);
    }

    public function updateFood(Request $request)
    {

        $food = food::findOrFail($request->id);

       
        $food->name=$request->name;
        $food->status=$request->status;
        $food->entity=$request->entity;
        $food->description=$request->description;
        $food->price=$request->price;
        $food->restaurant_id=$request->restaurant_id;
        $food->category_id=$request->category_id;
        
        if($request->image)
        {
        $path = time() .'-'. $request->image->getClientOriginalName();
        $request->image->move(public_path('img'),$path); 
        $food->image = $path;
        }
        
        $food->update();
        return redirect(route('profile'))->with('success', 'غذا با موفقیت ویرایش شد.'); 
    }

    public function addCategory()
    {
        $category = category::all();
        return view('ClientView.addCategory' , ['category'=> $category]);
    }

    public function insertCategory(Request $request)
    {
        $name = $request->input('name');
        $restaurant_id = $request->input('restaurant_id');
        
        $category = new category();
        $category->name=$name;
        $category->restaurant_id=$restaurant_id;

        $category->save();

        return redirect(route('addCategory'))->with('success', 'دسته بندی با موفقیت اضافه شد');
    }

    public function deleteCategory($id)
    {
        category::find($id)->delete();
        return redirect(route('addCategory'))->with('success', 'دسته بندی با موفقیت حذف شد.'); 
    }


    public function editCategory($id)
    {
        $category = category::find($id);
        return view('ClientView.editCategory' , ['category' => $category]);
    }

    public function updateCategory(Request $request)
    {

        $category = category::findOrFail($request->id);
        $category->name=$request->name; 
        $category->restaurant_id=$request->restaurant_id;
        
        $category->update();
        return redirect(route('addCategory'))->with('success', 'دسته بندی با موفقیت ویرایش شد.'); 
    }

    public function updateRestaurantInfo(Request $request)
    {
        $restaurant = restaurant::where('master_id','=',Auth::user()->id)->first();  
        $restaurant->name= $request->name;  
        $restaurant->restaurant_address= $request->restaurant_address; 
        $restaurant->master_id= $request->master_id;

        $restaurant->save();
        return redirect(route('editUserInfo'))->with('success' , 'اطلاعات رستوران با موفقیت ویرایش شد');
    }

    public function reataurantFactors()
    {
        $restaurant = restaurant::where('master_id','=',Auth::user()->id)->first();
        $factors = factor::where('restaurant_name','=', $restaurant->name)->get();
        return view('ClientView.reataurantFactors' , compact('factors'));
    }

    public function orderDetails($id)
    {
       
        $factor = factor::find($id);
        $basket = basket::where('id','=', $factor->basket_id)->first();
        $ProductsBasket = ProductsBasket::where('basket_id' , '=' , $basket->id)->get();
        $food = food::all();

        return view('ClientView.orderDetails', compact('factor' , 'basket' , 'ProductsBasket' , 'food'));
    }   
    
    

   
}
