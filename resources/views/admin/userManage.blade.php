@extends('header')

@section('container')
    <div class="container">
        <h1 style="text-align: center"> admin Page</h1>
        <div >
            <form action="{{route('search')}}" method="GET">
                <input type="text" name="text" >
                <input type="submit">
            </form>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Address</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $u)

                    <tr>
                        <th scope="row">{{$u->id}}</th>
                        <td>{{$u->full_name}}</td>
                        <td>{{$u->email}}</td>
                        <td>{{$u->date_of_birth}}</td>
                        <td>{{$u->address}}</td>
                        <td>{{$u->status}}</td>
                        <td>
                            @if($u->status==1)
                                <a class="btn btn-danger" href="{{route('delete',['id'=>$u->id,'request'=>$request])}}" > delete</a>
                            @else
                                <a class="btn btn-success" href="{{route('active',['id'=>$u->id,'request'=>$request])}}" > active</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$users->render()}}
        </div>

    </div>

    @endsection

