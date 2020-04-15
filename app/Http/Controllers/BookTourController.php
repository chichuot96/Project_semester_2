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
            $tour = Tour::findOrFail($id);
            return view('bookTour')->with(['tour'=>$tour]);
}
    public function booked(Request $request){
        $user_id=Auth::user()->full_name;
        $tour_name=$request->input('tourName');
        $tour_id=$request->input('tourId');
        $booked_time=date('Y-m-d H-i-s');
        $status=0;
        $discount=$request->input('discount');
        $num_of_per=$request->input('numPer');
        $price=(int)($request->input('price'))*(100-(int)($this->checkDiscount($discount)))*(int)($num_of_per)/100;
        DB::table('History')->insert(['user_id'=>$user_id,'tour_name'=>$tour_name,'tour_id'=>$tour_id,'booked_time'=>$booked_time,'status'=>$status,'discount'=>$discount,'price'=>$price,'num_of_per'=>$num_of_per]);
        $tour=Tour::find($tour_id);
        $num=$tour->num_of_per;
        $tour->num_of_per=(int)$num - (int)$num_of_per;
        $tour->save();
        return view('payment')->with(['price'=>$price,'id'=>$tour_id,'tour_name'=>$tour_name,'time'=>$booked_time]);
    }
    public function sendMail($tour_id){
        $tour=Tour::find($tour_id);
        $destination=Destination::find($tour->destination_id);
        $objDemo = new \stdClass();
        $objDemo->tour_name = $tour->tour_name;
        $objDemo->time_start = $tour->time_start;
        $objDemo->destination= $destination->name;
        $objDemo->start_at=$tour->start_at;
        $objDemo->full_name=Auth::user()->full_name;
        $objDemo->sender = 'AmazingTour';
        $objDemo->receiver = Auth::user()->full_name;
        Mail::to(Auth::user()->email)->send(new DemoMail($objDemo));
    }

    public function checkDiscount($discount){

        $discount=DB::table('Discount')->where('name','=',$discount)->get();
        if(count($discount)==0){
            return 0;
        }else{
            return $discount[0]->discount;
        }
    }
    public function create(Request $request,$id,$time)
    {
        $vnp_TmnCode = "UDOPNWS1"; //Mã website tại VNPAY
        $vnp_HashSecret = "EBAHADUGCOEWYXCMYZRMTMLSHGKNRPBN"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = 'http://localhost/Project_semester_2/public/return-vnpay/'.$id.'/'.$time;
        $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->input('amount') * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }
    public function return(Request $request,$id,$booked_time)
    {
        if($request->vnp_ResponseCode == "00") {
            DB::table('History')
                ->where('user_id','=',Auth::user()->full_name)
                ->where('booked_time','=',$booked_time)
                ->update(['status'=>1]);
             $this->sendMail($id);
            return view('success')->with(['msg'=>"Bạn đã book thành công"]);
        }
        session()->forget('url_prev');
        return view('success')->with(['msg'=>"Thất bại. Có lỗi xảy ra"]);;
    }
}
