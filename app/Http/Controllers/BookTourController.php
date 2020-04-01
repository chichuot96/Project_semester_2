<?php

namespace App\Http\Controllers;

use App\Destination;
use App\History;
use App\Mail\DemoMail;
use App\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BookTourController extends Controller
{
    public function showData($id){
        if(Auth::check()){
            $tour = Tour::findOrFail($id);
            return view('bookTour')->with(['tour'=>$tour]);

        }else{
            return redirect('login');
        }

}
    public function booked(Request $request){
        $user_id=Auth::user()->full_name;
        $tour_name=$request->input('tourName');
        $tour_id=$request->input('tourId');
        $booked_time=date('Y-m-d');
        $status=0;
        $discount=$request->input('discount');
        $price=(int)($request->input('price'))*(100-(int)($this->checkDiscount($discount)))/100;
        DB::table('History')->insert(['user_id'=>$user_id,'tour_name'=>$tour_name,'tour_id'=>$tour_id,'booked_time'=>$booked_time,'status'=>$status,'discount'=>$discount,'price'=>$price]);
        $tour=Tour::find($tour_id);
        $destination=Destination::find($tour->destination_id);
        $objDemo = new \stdClass();
        $objDemo->tour_name = $tour_name;
        $objDemo->time_start = $tour->time_start;
        $objDemo->destination= $destination->name;
        $objDemo->start_at=$tour->start_at;
        $objDemo->full_name=$user_id;
        $objDemo->sender = 'AmazingTour';
        $objDemo->receiver = $user_id;
        Mail::to(Auth::user()->email)->send(new DemoMail($objDemo));
        return view('success');
    }

    public function checkDiscount($discount){

        $discount=DB::table('Discount')->where('name','=',$discount)->get();
        if(count($discount)==0){
            return 0;
        }else{
            return $discount[0]->discount;
        }
    }
}
