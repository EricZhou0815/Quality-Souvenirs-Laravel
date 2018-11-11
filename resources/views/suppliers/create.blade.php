@extends('shared/layout') 
@section('content')

<h4>Create Supplier</h4>
<hr/>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
    <div class="col-md-4">
        <form action="/suppliers" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="suName" name="name">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="suEmail" name="email">
            </div>

            <div class="form-group">
                <label for="contactPerson">Contact Person</label>
                <input
                    type="text"
                    class="form-control"
                    id="suContactPerson"
                    name="contactPerson">
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="suPhone" name="phone">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="suAddress" name="address">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<div>
    <a href="/suppliers">Back to List</a>
</div>
@endsection