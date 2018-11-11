@extends('shared/layout')

@section('content')

<h3>Please Fill in the Order Details</h3>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/orders" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}>
    <div class="form-horizontal">
        <hr />
        <div class="form-group">
            <label for="firstName" class="col-md-2 control-label">First Name</label>
            <div class="col-md-10">
                <input name="firstName" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label for="lastName" class="col-md-2 control-label">Last Name</label>
            <div class="col-md-10">
                <input name="lastName" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label for="phone" class="col-md-2 control-label">Phone</label>
            <div class="col-md-10">
                <input name="phone" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label asp-for="address" class="col-md-2 control-label">Address</label>
            <div class="col-md-10">
                <input name="address" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label for="city" class="col-md-2 control-label">City</label>
            <div class="col-md-10">
                <input name="city" class="form-control" />
            </div>
        </div>
        <div class="form-group">
                <label for="State" class="col-md-2 control-label">State</label>
                <div class="col-md-10">
                    <input name="state" class="form-control" />
                </div>
            </div>
        <div class="form-group">
            <label for="postalCode" class="col-md-2 control-label">Postal Code</label>
            <div class="col-md-10">
                <input name="postalCode" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-3 col-md-10">
                <button type="submit" class="btn btn-info">
                    Place Order <span class="glyphicon glyphicon-chevron-right"></span>
                </button>
            </div>
        </div>
    </div>
</form>


@endsection