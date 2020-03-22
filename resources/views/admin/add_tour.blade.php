<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
@section('content')
    <div class="container">
        <h2>Add new category</h2>
        <form class="form" method="post"
              action="{{asset('tour')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="status">Destination</label>
                <select class="form-control" name="status">
                    <option value="">foreach vô đây nha bebe </option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
                <br>
                <label for="usr">Tour name</label>
                <input type="file" name="tour_name">
                <br>
                <label for="usr">Start at</label>
                <input type="date" class="form-control" name="start_at"  required="true">
                <br>
                <label for="Category">Category</label>
                <select class="form-control" name="category">
                    <option value="">for nha chí</option>
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
                    <option value="">blah blah</option>
                </select>
                <br>
                <label for="usr">Discount</label>
                <input type="number" class="form-control" name="discount"  required="true">
                <br>
                <label for="usr">Description</label>
                <br>
                <textarea name="description" rows="8" cols="150"  required="true"></textarea>
                <br>
                <label for="usr">Vehicle</label>
                <input type="text" class="form-control" name="vehicle"  required="true">
                <br>
                <label for="usr">Schedule</label>
                <input type="text" class="form-control" name="schedule"  required="true">
                <br>
                <label for="usr">Time start</label>
                <input type="date" class="form-control" name="time_start"  required="true">
            </div>
            <input type="submit" value="Add" />
        </form>
    </div>
    <script>
        CKEDITOR.replace( 'description',{filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'} );
    </script>
@endsection
