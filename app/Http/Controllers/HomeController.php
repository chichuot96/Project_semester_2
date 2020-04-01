<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{


    public function index(){
        $tour1=$this->listTourByCategory(1);
        $tour2=$this->listTourByCategory(2);
        return view('index')->with(['tour1'=>$tour1,'tour2'=>$tour2]);
    }
    public function listTourByCategory($cate_id){
        return DB::table('tours')->where('category_id','=',$cate_id)
            ->paginate(8);
    }

}
