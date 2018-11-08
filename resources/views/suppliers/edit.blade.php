@extends('shared/layout') @section('content')

<h2>Edit</h2>

<h4>Supplier</h4>
<hr/>

<div class="row">
    <div class="col-md-4">
        <form action="{{route('suppliers.update', $supplier->id)}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{$supplier->name}}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="text"
                    class="form-control"
                    name="email"
                    value="{{$supplier->email}}">
            </div>

            <div class="form-group">
                <label for="contactPerson">Contact Person</label>
                <input
                    type="text"
                    class="form-control"
                    name="contactPerson"
                    value="{{$supplier->contactPerson}}">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input
                    type="text"
                    class="form-control"
                    name="phone"
                    value="{{$supplier->phone}}">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input
                    type="text"
                    class="form-control"
                    name="address"
                    value="{{$supplier->address}}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

<div>
    <a href="/suppliers">Back to List</a>
</div>
@endsection