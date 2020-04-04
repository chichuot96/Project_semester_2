@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add new Tour</h2>
        <form class="form" method="post"
              action="{{asset('addT')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
{{--                <label for="name">Cover</label>--}}
{{--                <input type="file" class="form-control" name="cover">--}}
                <div class="form-group inf container">
                    <input class="btn btn-outline-info btn-sm" type="file" class="form-control" name="image">
                    <img src="" alt="" id="image-preview" style="width: 100px">
                    <input type="hidden" name="imageUrl"  >
                </div>
                <br>
                <label for="status">Destination</label>
                <select class="form-control" name="destination">
                    @foreach($lsDes as $Des)
                        <option value="{{$Des->id}}">{{$Des->name}}</option>
                    @endforeach
                    <option value="0">UnKnown</option>
                </select>
                <br>
                <label for="usr">Tour name</label>
                <input type="text" class="form-control" name="tour_name" required="true">
                <br>
                <label for="usr">Start at</label>
                <input type="text" class="form-control" name="start_at"  required="true">
                <br>
                <label for="Category">Category</label>
                <select class="form-control" name="category">
                    @foreach($lsCat as $Cat)
                        <option value="{{$Cat->id}}">{{$Cat->name}}</option>
                    @endforeach
                    <option value="0">UnKnown</option>
                </select>
                <br>
                <label for="usr">Price</label>
                <input type="number" class="form-control" name="price"  required="true">
                <br>
                <label for="usr">Number person</label>
                <input type="number" class="form-control" name="num_of_per"  required="true">
                <br>
                <label for="usr">Number of day</label>
                <input type="number" class="form-control" name="num_of_day"  required="true">
                <br>
                <label for="status">Status</label>
                <select class="form-control" name="status">
                    <option value="1">Public</option>
                    <option value="0">Draft</option>
                </select>
                <br>
                <label for="usr">Discount</label>
                <input type="number" class="form-control" name="discount"  required="true">
                <br>
                <label for="usr">Description</label>
                <br>
                <textarea class="form-control" name="description" id="description"  cols="680"  rows="15"></textarea>
                <br>
                <label for="usr">Vehicle</label>
                <input type="text" class="form-control" name="vehicle"  required="true">
                <br>
                <label for="usr">Schedule</label>
                <input type="text" class="form-control" name="schedule"  required="true">
                <br>
                <label for="usr">Time start</label>
                <input type="datetime-local" class="form-control" name="time_start"  required="true">
            </div>
            <input type="submit" value="Add" />
        </form>
    </div>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace( 'description',
            {filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'} );
    </script>
    <script>
        alert("hello")
        var cloudName= "a123abc";
        var unsignedUploadPreset="qbhmhxzq";
        var img = document.querySelector('[name="image"]');
        img.onchange = function () {
            var file = this.files[0];
            var url = `https://api.cloudinary.com/v1_1/${cloudName}/upload`;
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var responseDataJson = JSON.parse(this.responseText);
                    console.log(responseDataJson);
                    var imageUrl = document.querySelector('input[name="imageUrl"]');
                    imageUrl.value = responseDataJson.public_id;
                    document.getElementById('image-preview').src = responseDataJson.url;
                }
            }
            xhr.open('POST', url, true);
            var fd = new FormData();
            fd.append('upload_preset', unsignedUploadPreset);
            fd.append('tags', 'browser_upload');
            fd.append('file', file);
            xhr.send(fd);
        }
        var e = document.getElementById("ddlViewBy");
        var strUser = e.options[e.selectedIndex].text;
    </script>
@endsection



