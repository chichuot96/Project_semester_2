<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home(Request $request)
    {
        if($request->user()->authorizeRoles('admin'))  {
            return redirect('accounts');
        }
        else{
            return redirect('index');
        }

    }
    public function index(Request $request){
        $user=$request->user()->full_name;
        if($request->user()->authorizeRoles('admin')){
            $role="admin";
        }else{
            $role="user";
        }
        return view('index')->with(['user'=>$user,'role'=>$role]);
    }

    public function adminIndex(Request $request){
        $request->user()->authorizeRoles('admin');
        return redirect('accounts');
    }
}
