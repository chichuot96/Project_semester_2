<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use App\Destination;
use App\Category;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lsDes = Destination::all();
        $lsCat = Category::all();
        return view('admin/add_tour') -> with(['lsDes' => $lsDes, 'lsCat' => $lsCat]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $msg = [
//            'required' => 'trường :attribute bắt buộc nhập',
//            'max'      => 'trường :attribute có độ dài nhỏ hơn :max',
//        ];
//        $this->validate(
//            $request,
//            [
//
//            ],$msg
//        );
        $tour = new Tour();
        $tour->destination_id = $request->destination;
        $tour->tour_name = $request->tour_name;
        $tour->start_at = $request->start_at;
        $tour->category_id = $request->category;
        $tour->price = $request->price;
        $tour->num_of_per = $request->num_of_per;
        $tour->num_of_day = $request->num_of_day;
        $tour->status = $request->status;
        $tour->discount = $request->discount;
        $tour->description = $request->description;
        $tour->vehicle = $request->vehicle;
        $tour->schedule = $request->schedule;
        $tour->time_start = $request->time_start;
        $tour->save();
//        $request->session()->flash('success', 'Post was successful!');
//        return redirect()->route("/");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
