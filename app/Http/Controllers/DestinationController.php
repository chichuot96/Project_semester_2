<?php

namespace App\Http\Controllers;

use App\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lsDestinations = Destination::all();
        return view('admin/destination/list_des')-> with([
            'lsDestinations' => $lsDestinations
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $description=$request->input('description');
        $img=$request->input('imageUrl');
        $destination = new Destination();
        $destination->name = $name;
        $destination->description=$description;
        $destination->image=$img;
        $destination->save();

        $request->session()->flash('success', 'Add destination was successful!');
        return redirect()->route("destination.index");
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
        $des=Destination::find($id);
        return view('admin/destination/edit')->with(['des'=>$des]);
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
        $des=Destination::find($id);
        $des->name=$request->input('name');
        $des->description=$request->input('description');
        $des->image=$request->input('imageUrl');
        $des->save();
        return redirect()->route('destination.index');
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
    public function search(Request $request){
        $name=$request->input('destination');
        $lsDestinations=DB::table('destinations')->where('name','like','%'.$name.'%')
            ->paginate(8);
        return view('destination')-> with([
            'lsDestinations' => $lsDestinations
        ]);
    }
}
