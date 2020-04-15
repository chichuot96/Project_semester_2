<?php

namespace App\Http\Controllers;

use App\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tour;

class HomeController extends Controller
{


    public function index(){
        $tour1=$this->listTourByCategory(1);
        $tour2=$this->listTourByCategory(2);
        return view('index')->with(['tour1'=>$tour1,'tour2'=>$tour2]);
    }
    public function listTourByCategory($cate_id){
        $date=date('Y-m-d H:i:s');
        return Tour::where('status','=',1)
        ->where('category_id','=',$cate_id)
            ->where('time_start','>',$date)
            ->paginate(8);
    }

    public function listDestination(){
        $des=DB::table('destinations')->paginate(8);
        return view('destination')->with(['lsDestinations'=>$des]);
    }

    public function detailDes($id){
        $des=Destination::find($id);
        $d=$des->id;
        $tour=Tour::where('destination_id','=',$d)->paginate(8);
        return view('detail_destination')->with(['tours'=>$tour,'des'=>$des]);

    }


}
