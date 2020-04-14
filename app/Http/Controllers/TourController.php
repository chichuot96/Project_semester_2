<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Tour;
use App\Destination;
use App\Category;
use Illuminate\Support\Facades\DB;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search_title = $request->search_title;

        if(isset($search_title)) {
            $lsTour =
                Tour::where('status','=',1)
                ->where('title', 'like', "%$search_title%")
                    ->paginate(10);
        } else {
            $lsTour = Tour::where('status','=',1)->paginate(10);
        }

        return view("admin.tour.list_tour")
            ->with(['lsTour'=> $lsTour, 'search_title' => $search_title]);

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
        return view('admin/tour/add') -> with(['lsDes' => $lsDes, 'lsCat' => $lsCat]);
    }


    public function store(Request $request)
    {
        $msg = [
            'required' => 'trường :attribute bắt buộc nhập',
            'max'      => 'trường :attribute có độ dài nhỏ hơn :max',
        ];
        $this->validate(
            $request,
            [

            ],$msg
        );
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
//        if($request->hasFile('cover')) {
//            $name = time() . "." . $request->cover->extension();
//            $request->cover->move(public_path('images_upload'), $name);
//            $cover_path = "images_upload/" . $name;
//            $tour->cover = $cover_path;
//        }
        $tour->cover=$request->imageUrl;

            $tour->save();
        $request->session()->flash('success', 'Tour was successful!');
        return redirect()->route("admin_tour.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tour=Tour::find($id);
        return view('detail_tour')->with(['tour'=>$tour]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tour=Tour::find($id);
        $lsDes = Destination::all();
        $lsCat = Category::all();
        return view('admin/tour/edit')->with(['tour'=>$tour,'lsDes' => $lsDes, 'lsCat' => $lsCat]);
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
        $tour=Tour::find($id);
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
        $tour->cover=$request->imageUrl;
        $tour->save();
        $request->session()->flash('success', 'Update tour was successful!');
        return redirect()->route('admin_tour.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $post = Post::find($id);
        $post->delete();
        $request->session()->flash('success', 'Post was deleted!');
        return redirect()->route("post.index");

    }

    public function search(Request $request){
        $name=$request->input('tour');
        $numPeo=$request->input('numPeo');

        $lsTour=Tour::where('status','=',1)
        ->where('tour_name','like','%'.$name.'%')
            ->where('num_of_per','>=',$numPeo)->paginate(8);

        return view("tour")
            ->with(['lsTour'=> $lsTour,'name'=>$name,'num'=>$numPeo]);
    }

    public function save(Request $request){
        $tour=new Tour();
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
        $tour->cover=$request->imageUrl;
        $tour->save();
        $request->session()->flash('success', 'Create tour was successful!');
        return redirect()->route("admin_tour.index");
    }



}
