<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Users;
use App\Models\Food;
use App\Models\Orders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MainController extends Controller
{
    function login()
    {
        return view('admin.login');
    }

    function userlogin()
    {
        return view('user.login');
    }

    function register()
    {
        return view('user.register');
    }

    function saveUser(Request $request)
    {
        $request->validate([

            'firstname'=>'required',
            'lastname'=>'required',
            'username' => ['required', 'string', 'max:255', 'unique:users', 'regex:/^\S*$/u'],
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|max:12',
            'enroll_no'=>'required'
        ]);

        $user = new Users();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->enroll_no = $request->enroll_no;
        $user->balance = 0;
        $user->verified = 0;

    
        $save = $user->Save();

        if($save){
            return back()->with('success','Successfuly Registered, Wait for approval');
         }else{
             return back()->with('fail','Something went wrong, try again later');
         }

    }

    function check(Request $request){
        //Validate requests
        $request->validate([
             'email'=>'required|email',
             'password'=>'required|min:5|max:12'
        ]);

        $userInfo = Admin::where('email','=', $request->email)->first();

        if(!$userInfo){
            return back()->with('fail','We do not recognize your email address');
        }else{
            //check password
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedAdmin', $userInfo->id);
                return redirect('admin/dashboard');

            }else{
                return back()->with('fail','Incorrect password');
            }
        }
    }


    function checkUser(Request $request){
        //Validate requests
        $request->validate([
             'email'=>'required|email',
             'password'=>'required|min:5|max:12'
        ]);

        $val = 1;
        $userInfo = Users::where('email','=', $request->email)->first();
        $uservalid = Users::where('verified', $val)->first();


        if(!$userInfo){
            return back()->with('fail','We do not recognize your email address');
        }else{
            //check password
            if(Hash::check($request->password, $userInfo->password)){
                if($userInfo->verified==1)
                {
                    $request->session()->put('LoggedUser', $userInfo->id);
                    return redirect('user/dashboard');
                }
                else
                {
                    return back()->with('fail','Your Account is unverified.');
                }

            }else{
                return back()->with('fail','Incorrect password');
            }
        }
    }


    function logout(){
        if(session()->has('LoggedAdmin')){
            session()->pull('LoggedAdmin');
            return redirect('/admin/login');
        }
    }

    function userlogout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/user/login');
        }
    }



    function dashboard(){
        $totalNewUsers = Users::where('verified',0)->sum('id');
        $totalUsers = Users::where('verified',1)->sum('id');
        $totalNewOrders = Orders::where('orders_status',0)->sum('id');
        $totalOrders = Orders::where('orders_status',1)->sum('id');
        $count = ["totalnewusers" => $totalNewUsers, 
                "totalusers" => $totalUsers, 
                "totalneworders" => $totalNewOrders, 
                "totalorders" => $totalOrders];

        return view('admin.dashboard', ['count'=>$count]);            
    }

    function addfood(){
        $data = ['LoggedAdminInfo'=>Admin::where('id','=', session('LoggedAdmin'))->first()];
        return view('admin.addfood', $data);
    }



    function userdashboard(){
    $data = ['LoggedUserInfo'=>Users::where('id','=', session('LoggedUser'))->first()];
    return view('user.dashboard', ['data'=>$data['LoggedUserInfo']]);
    }


    function saveFood(Request $request)
    {
        $request->validate([

            'food_name'=>'required',
            'food_cat'=>'required',
            'food_item_cat'=>'required',
            'food_quantity'=>'required|integer',
            'food_price'=>'required|integer',
            'food_des'=>'required',
            'food_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'shown' => ''
        ]);

    

        $imageName = time().'.'.$request->food_img->extension();  
     

        $request->food_img->move(public_path('images'), $imageName);
       


        $food = new Food();
        $food->food_name = $request->food_name;
        $food->food_cat = $request->food_cat;
        $food->food_item_cat = $request->food_item_cat;
        $food->food_quantity = $request->food_quantity;
        $food->food_price = $request->food_price;
        $food->food_des = $request->food_des;
        $food->food_img = $imageName;
        $food->shown = $request->shown ? 1 : 0 ?? 0;


    
        $save = $food->Save();

        if($save){
            return back()->with('success','Successfuly Added');
         }else{
             return back()->with('fail','Something went wrong, try again later');
         }

        }


        function getFoodList(Request $request)
        {
            $data = Food::where([
                ['food_name', '!=', NULL],
                [function ($query) use ($request)
                {
                    if(($term = $request->search)){
                        $query->orWhere('food_name','LIKE','%'.$term.'%')->get();
                    }
                }]
            ])
            ->paginate(10);
            //$data = ['LoggedAdminInfo'=>Admin::where('id','=', session('LoggedAdmin'))->first()];
            return View('admin.foodlist',['food'=>$data]);
        }

        function getNewCustomersList(Request $request)
        {
            $data = Users::where([
                ['username', '!=', NULL],
                [function ($query) use ($request)
                {
                    if(($term = $request->search)){
                        $query->orWhere('username','LIKE','%'.$term.'%')->get();
                    }
                }]
            ])
            ->paginate(10);
            //$data = ['LoggedAdminInfo'=>Admin::where('id','=', session('LoggedAdmin'))->first()];
            return View('admin.newcustomer',['users'=>$data]);
        }


        public function updateApproval(Request $request) {
            $data = Users::find($request->id);
            $data->verified=1;
            $data->save();
            if($data){
                return back()->with('success','Successfuly Verified');
             }else{
                 return back()->with('fail','Something went wrong, try again later');
             }
    
            }
         


            function getCustomersList(Request $request)
            {
                $data = Users::where([
                    ['username', '!=', NULL],
                    [function ($query) use ($request)
                    {
                        if(($term = $request->search)){
                            $query->orWhere('username','LIKE','%'.$term.'%')->get();
                        }
                    }]
                ])
                ->paginate(10);
                //$data = ['LoggedAdminInfo'=>Admin::where('id','=', session('LoggedAdmin'))->first()];
                return View('admin.customerslist',['users'=>$data]);
            }


            function getFood($food_id)
            {
                $data = Food::find($food_id);
                return view('/admin/editfood',['data'=>$data]);
            }

            function updateFood(Request $request)
            {
                $data = Food::find($request->food_id);
                $data->food_name=$request->food_name;
                $data->food_cat=$request->food_cat;
                $data->food_item_cat=$request->food_item_cat;
                $data->food_quantity=$request->food_quantity;
                $data->food_price=$request->food_price;
                $data->food_des=$request->food_des;
                if ($request->hasFile('food_img')) {
                    $image_path = public_path().'/images/'.$data->food_img;
                    unlink($image_path);
                    $imageName = time().'.'.$request->food_img->extension();
                    $request->food_img->move(public_path('images'), $imageName);
                    $data->food_img=$imageName;
                }
                $data->shown=$request->shown ? 1 : 0 ?? 0;
                $data->save();
                return redirect('/admin/foodlist');

            }

            function deleteFood($food_id)
            {
                $data = Food::find($food_id);
                $image_path = public_path().'/images/'.$data->food_img;
                unlink($image_path);
                $data->delete();
                return redirect('/admin/foodlist');
            }

            function getBreakFastListUser()
            {

                $data = Food::where('food_cat','Breakfast')->get();
                return View('user.breakfast',['food'=>$data]);
            }

            function getLunchListUser()
            {

                $data = Food::where('food_cat','Lunch')->get();
                return View('user.lunch',['food'=>$data]);
            }

            function getDinnerListUser()
            {

                $data = Food::where('food_cat','Dinner')->get();
                return View('user.dinner',['food'=>$data]);
            }

            function addtocart(Request $request)
            {
                $request->validate([
        
                    'cart_name'=>'required',
                    'cart_quantity'=>'required|integer',
                    'cart_price'=>'required|integer'
                ]);

                $data = ['LoggedUserInfo'=>Users::where('id','=', session('LoggedUser'))->first()];
        
                $food = Food::where('food_id',$request->cart_food_id)->get();

                $loggeduser = ['LoggedUserInfo'=>Users::where('id','=', session('LoggedUser'))->first()];

                $user = Users::where('username',$loggeduser['LoggedUserInfo']->username)->get();

                if($food->first()->shown==1)
                {
                    if($user->first()->balance==0)
                    {
                        return back()->with('fail',' Insufficient Balance');
                    }
                    else
                    {
                        $orders = new Orders();
                        $orders->orders_name = $request->cart_name;
                        $orders->orders_quantity = $request->cart_quantity;
                        $orders->orders_price = $request->cart_price*$request->cart_quantity;
                        $orders->orders_food_id = $request->cart_food_id;
                        $orders->orders_id = "";
                        $orders->orders_status = 0;
                        $orders->orders_location = "";
                        $orders->orders_type = 0;
                        $orders->orders_username = $data['LoggedUserInfo']->username;
                        $save = $orders->Save();
            
                        if($save){
                            return back()->with('success',$request->cart_name.' Successfuly Added To Cart');
                        }else{
                            return back()->with('fail',' Something went wrong, try again later');
                        }
                    }
                }
                else
                {
                    return back()->with('fail',' Food Not Available');
                }

        
            }

            function loadordercartlgotoorderist()
            {
                $data = ['LoggedUserInfo'=>Users::where('id','=', session('LoggedUser'))->first()];
                $orders = Orders::where('orders_username',$data['LoggedUserInfo']->username)->get();
                return view('user.ordercart',['cart'=>$orders]);
            }

            function removefromcart($id)
            {
                $data = Orders::find($id);
                $data->delete();
                return redirect('/user/ordercart');
            }

            function loadaddbalance($username)
            {
                $data = Users::where('username',$username)->get();
                return view('/admin/addbalance',['data'=>$data->first]);
            }

            function addbalance(Request $request)
            {
                $request->validate([
                    'balance'=>'required|integer',  
                ]);

                $data = Users::find($request->id);

                $currentBalance = $data->balance;
                $data->balance = $currentBalance+$request->balance;
                $save = $data->save();
            
                if($save){
                    return back()->with('success','Balance Successfuly Added');
                }else{
                    return back()->with('fail',' Something went wrong, try again later');
                }
            }

            function submitorder(Request $request)
            {
                $request->validate([
                    'orders_location'=>'required',  
                ]);
                $uuid = Str::uuid()->toString();
                $data = ['LoggedUserInfo'=>Users::where('id','=', session('LoggedUser'))->first()];
                $user = Users::find($data['LoggedUserInfo']->id);
                $currentBalance = $user->balance;
                if($currentBalance>=$request->balance)
                {
                    $user->balance = $currentBalance-$request->balance;
                    $save = $user->save();
                    $matchThese = ['orders_username' => $data['LoggedUserInfo']->username, 'orders_type' => 0];
                    $orders = Orders::where($matchThese)->update(array('orders_location' => $request->orders_location, 'orders_id' => $uuid,'orders_type' => 1));
                    return redirect('/user/myorders');
                }
                else
                {
                    return back()->with('fail',' Insufficient Balance');
                }
            }



            function loadmyorderslist()
            {
                $data = ['LoggedUserInfo'=>Users::where('id','=', session('LoggedUser'))->first()];
                $matchThese = ['orders_username' => $data['LoggedUserInfo']->username, 'orders_type' => 1];
                $orders = Orders::where($matchThese)->get();
                return view('/user/myorders',['data'=>$orders]);
            }


            function loadallorders()
            {
                $matchThese = ['orders_type' => 1];
                $orders = Orders::where($matchThese)->get();
                return view('/admin/orders',['data'=>$orders]);
            }


            function completedorder($id)
            {
                $matchThese = ['id' => $id];
                $orders = Orders::where($matchThese)->update(array('orders_status' => 1));
                return redirect('/admin/orders');
            }

            function removedorder($id)
            {
                $matchThese = ['id' => $id];
                $orders = Orders::where($matchThese)->delete();
                return redirect('/admin/orders');
            }




    }




