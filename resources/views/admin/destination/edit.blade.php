@extends('header')
@section('container')

                <form class="form" method="post"
                      action="{{route('destination.update',$des->id)}}"enctype="multipart/form-data">
                    @csrf

                    <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLabel">Editdestination</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">destination:</label>
                            <input type="text" class="form-control" name="name" id="recipient-name" value="{{$des->name}}">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">description:</label>
                            <input type="text" class="form-control" name="description" id="descript" value="{{$des->description}}">
                        </div>
                        <div class="form-group ">
                            <input class="btn btn-outline-info btn-sm" type="file" class="form-control" name="image">
                            <img src="http://res.cloudinary.com/a123abc/image/upload/{{$des->image}}" alt="" id="image-preview" style="width: 100px">
                            <input type="hidden" name="imageUrl" value="{{$des->image}}" >
                        </div>

                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary update" >Update destination</button>
                    </div>
                </form>

    @endsection
