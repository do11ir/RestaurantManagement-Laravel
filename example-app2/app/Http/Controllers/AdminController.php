<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\factor;
use App\Models\food;
use App\Models\restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function admin()
    {
        // Get the counts for each model
        $userCount = User::count();
        $factorCount = factor::count();
        $restaurantCount = restaurant::count();
        $foodCount = food::count();

        // Pass the counts to the view
        return view("AdminPannel.AdminPannel", compact('userCount', 'factorCount', 'restaurantCount', 'foodCount'));
    }

    public function restaurantManage()
    {
        $restaurant = restaurant::all();
        return view("AdminPannel.restaurantManage" , compact('restaurant'));
    }

    public function insertRestaurants(Request $request)
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
        return redirect()->back();
    }

    public function deleteRestaurants($id)
    { 
            restaurant::find($id)->delete();
            return redirect(route('restaurantManage'))->with('success', 'success'); 
    }

    public function editRestaurants($id)
    {
        $restaurant = restaurant::find($id);
        return view('AdminPannel.editRestaurantAdmin', compact('restaurant'));
    }

    public function updateRestaurants(Request $request)
    {
        $restaurant = restaurant::findOrFail($request->id); 
        $restaurant->name= $request->name;  
        $restaurant->restaurant_address= $request->restaurant_address; 
        $restaurant->save();
        return redirect(route('restaurantManage'))->with('success', 'success');
    }

    public function foodManage()
    {
        $food = food::all();
        $category = category::all();
        return view('AdminPannel.foodManage', compact('food', 'category'));
    }

    public function insertFoodAdmin(Request $request)
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
    return redirect(route('foodManage'))->with('success', 'success');
    }

    public function editFoodAdmin($id)
    {
        $food = food::find($id);
        $category = category::all();
        return view('AdminPannel.editFoodAdmin' , ['food' => $food ,  'category' => $category]);
    }

    public function updateFoodAdmin(Request $request)
    {

        $food = food::findOrFail($request->id);

        $food->name=$request->name;
        $food->status=$request->status;
        $food->entity=$request->entity;
        $food->description=$request->description;
        $food->price=$request->price;
        $food->category_id=$request->category_id;
        
        if($request->image)
        {
        $path = time() .'-'. $request->image->getClientOriginalName();
        $request->image->move(public_path('img'),$path); 
        $food->image = $path;
        }
        
        $food->save();
        
        return redirect()->back()->with('success', 'success'); 
    }

    public function userManage()
    {
        $user = User::all();
        return view('adminPannel.userManage', compact('user'));
    }


    public function insertUser(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'RoleAdmin' => 'nullable|string',
        ]);
    
        User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'RoleAdmin' => isset($data['RoleAdmin']) && $data['RoleAdmin'] === 'master' ? 'master' : null,
        ]);
    
        return redirect()->route('userManage')->with('success', 'success');
    }

    public function deleteUser($id)
    {
       
        \App\Models\basket::where('user_id', $id)->delete();
    
      
        User::find($id)->delete();
    
        return redirect(route('userManage'))->with('success', 'success');
    }
    

    public function editUser($id)
    {
        $user = User::find($id);
        return view('adminPannel.editUser', compact('user'));
    }

    public function updateUser(Request $request)
    {
        $user = User::findOrFail($request->id);

        $user->name=$request->name;
        $user->email=$request->email;
        $user->address=$request->address;
        $user->phone=$request->phone;
        $user->RoleAdmin=$request->RoleAdmin;

        $user->save();
        return redirect()->route('userManage')->with('success', 'success');

    }

    public function categoryManage()
    {
        $category = category::all();
        return view('adminPannel.categoryManage', compact('category'));
    }


    public function insertCategoryAdmin(Request $request)
    {
        $name = $request->input('name');
        $restaurant_id = $request->input('restaurant_id');
        
        $category = new category();
        $category->name=$name;
        $category->restaurant_id=$restaurant_id;

        $category->save();

        return redirect(route('categoryManage'))->with('success', 'success');
    }

    public function deleteCategoryAdmin($id)
    {
        category::find($id)->delete();
        return redirect(route('categoryManage'))->with('success', 'success'); 
    }


    public function editCategoryAdmin($id)
    {
        $category = category::find($id);
        return view('adminPannel.editCategoryAdmin' , ['category' => $category]);
    }

    public function updateCategoryAdmin(Request $request)
    {

        $category = category::findOrFail($request->id);
        $category->name=$request->name; 
       
        $category->save();
        return redirect(route('categoryManage'))->with('success', 'success'); 
    }

    public function factorManage()
    {
        $factor = factor::all();
        return view('adminPannel.factorManage', ['factor' => $factor]);
    }

    public function deleteFactorAdmin($id)
    {
        factor::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'success');
    }

    public function deleteFoodAdmin($id)
    {
        food::find($id)->delete();
        return redirect()->back()->with('success', 'success'); 

    }
     
}
