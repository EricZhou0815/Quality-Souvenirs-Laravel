@extends('shared/layout')

@section('content')

<h4>Category</h4>
<h4>Category</h4>
<h4>Category</h4>

<div class="row">
    <div class="col-md-4">
            <form action="/categories" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="suName"  name="name">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    </div>
</div>

<div>
    <a href="/categories">Back to List</a>
</div>

@endsection