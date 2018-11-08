@extends('shared/layout')

@section('content')

<h4>Category</h4>
<hr />
<div class="row">
    <div class="col-md-4">
            <form action="{{route('categories.update', $category->id)}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$category->name}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
    </div>
</div>

<div>
    <a href="/categories">Back to List</a>
</div>

@endsection