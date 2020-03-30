@extends("layouts.app")
@section("content")


    <div class="container">
        <a href="{{route('admin_tour.create')}}">New Tour</a>

        <form method="GET" action="{{route('admin_tour.index')}}">
            @csrf
            <div class="form-group">
                <label for="name">Search</label>
                <input type="text" class="form-control" name="search_title"
                       value="{{$search_title}}">
                <input type="Submit" value="Search" class="btn btn-info my-3" />
            </div>
        </form>

        <table class="table">
            <tr>
                <th>No</th>
                <th>Cover</th>
                <th>Destination</th>
                <th>View</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($lsTour as $i => $tour)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td><img style="width:100px;" src="{{$tour->cover}}" /></td>
                    <td>{{$tour->destination->name}}</td>
                    <td><a href="{{route('admin_tour.show', $tour->id)}}">View</a></td>
                    <td><a href="{{route('admin_tour.edit', $tour->id)}}">update</a></td>
                    <td>
                        <form action="{{route('admin_tour.destroy', $tour->id)}}"
                              method="POST"
                              onsubmit="return confirm('Sure ?')">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE" />
                            <input type="submit" class="btn btn-sm btn-danger" value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {{ $lsTour->links() }}
    </div>




@endsection
