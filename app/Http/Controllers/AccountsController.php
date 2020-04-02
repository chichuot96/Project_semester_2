<?php

namespace App\Http\Controllers;


use App\Http\Resources\AccountResource as AccountResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
            ->join('roles','users.role','=','roles.id')
            ->select('users.*','roles.name')
            ->paginate(10);
        $request=null;
        return view('admin.userManage',['users'=>$users,'request'=>$request]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return new AccountResource(User::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new AccountResource( User::find($id));
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
        $user = User::findOrFail($id);
        $user->update($request->all());

        return new AccountResource($user);
    }


    public function destroy($id,Request $request)
    {
        $user = User::findOrFail($id);
        $user->update(['role'=>1]);

        return $this->search($request);
    }

    public function active($id,Request $request){
        $user = User::findOrFail($id);
        $user->update(['role'=>2]);
        return $this->search($request);
    }

    public function search(Request $request){
        $text=$request->input('text');
        $users = DB::table('users')
            ->join('roles','users.role','=','roles.id')
            ->where('full_name','like','%'.$text.'%')
            ->orWhere('email','like','%'.$text.'%')
            ->select('users.*','roles.name')
            ->paginate(10);

        return view('admin.userManage',['users'=>$users,'request'=>$request]);
    }
}
