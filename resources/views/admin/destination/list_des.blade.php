@extends('header')

@section('container')
    <div class="container">
        <h2>destination management</h2>
        <!-- <a class="btn btn-primary" href="destination/create">Add</a> -->

        <button type="button" class="btn btn-primary"
                data-toggle="modal" data-target="#exampleModal"
                data-whatever="@mdo">Add</button>

        <p></p>
        <table class="table">
            <tr>
                <th>ID</th>
                <th style="width: 50%">Name</th>
                <th >Update</th>
                <th>Delete</th>
            </tr>

            @foreach($lsDestinations as $des)
                <tr>
                    <td>{{$des->id}}</td>
                    <td>{{$des->name}}</td>
                   <td><a href="destination/{{$des->id}}/edit" class="btn btn-primary">Update</a></td>
                    <td>
                        <form method="POST"
                              action="destination/{{$des->id}}"
                              onsubmit="return confirm('Sure ?')">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Delete" />
                        </form>
                    </td>
                </tr>

            @endforeach
        </table>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form" method="post"
                      action="{{route('destination.store')}}" enctype="multipart/form-data" >
                    @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New destination</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                     <div class="form-group">
                         <label for="recipient-name" class="col-form-label">destination:</label>
                         <input type="text" class="form-control" id="recipient-name" name="name">
                     </div>
                     <div class="form-group">
                         <label for="recipient-name" class="col-form-label">description:</label>
                         <input type="text" class="form-control" id="descript" name="description">
                     </div>
                     <div class="form-group ">
                         <input class="btn btn-outline-info btn-sm" type="file" class="form-control" name="image">
                         <img src="" alt="" id="image-preview" style="width: 100px">
                         <input type="hidden" name="imageUrl" id="imageUrl" >
                     </div>



{{--                    <form>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="recipient-name" class="col-form-label">destination:</label>--}}
{{--                            <input type="text" class="form-control" id="recipient-name">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="recipient-name" class="col-form-label">description:</label>--}}
{{--                            <input type="text" class="form-control" id="descript">--}}
{{--                        </div>--}}
{{--                        <div class="form-group ">--}}
{{--                            <input class="btn btn-outline-info btn-sm" type="file" class="form-control" name="image">--}}
{{--                            <img src="" alt="" id="image-preview" style="width: 100px">--}}
{{--                            <input type="hidden" name="imageUrl" id="imageUrl" >--}}
{{--                        </div>--}}
{{--                    </form>--}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="senddestination">Add destination</button>
                </div>
                </form>
            </div>

        </div>
    </div>



{{--    <script type="text/javascript">--}}
{{--        $("#senddestination").click(function(e) {--}}
{{--            e.preventDefault();--}}
{{--            var destination = $("#recipient-name").val();--}}
{{--            var descript=$("#descript").val();--}}
{{--            var imageUrl=$("#imageUrl").val();--}}
{{--            var token = "{{csrf_token()}}";--}}
{{--            $.post(--}}
{{--                "{{route('destination.store')}}",--}}
{{--                {name: destination,description:descript, image:imageUrl, _token: token},--}}
{{--                function(result){--}}
{{--                    $('#exampleModal').modal('toggle');--}}
{{--                    $.notify("success", "success");--}}
{{--                    location.reload();--}}
{{--                }--}}
{{--            );--}}
{{--        });--}}
{{--    </script>--}}
@endsection
