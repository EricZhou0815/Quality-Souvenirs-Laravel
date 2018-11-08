@extends('shared/layout')

@section('content')

<h2>Supplier</h2>
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<p>
    <a href="/suppliers/create">Create New</a>
</p>

<form asp-action="Index" method="get">
    <div class="form-actions no-color">
        <p>
            Find supplier by keyword:
            <input
                type="text"
                name="SearchString"
                value=""/>
            <input type="submit" value="Search" class="btn btn-default"/>
            |
            <a href="">Back to Full List</a>
        </p>
    </div>
</form>
<table class="table">
    <thead>
        <tr>
            <th>
                <a>Supplier Name</a>
            </th>
            <th>
                <a>Email</a>
            </th>
            <th>
                <a>Contact Person</a>
            </th>
            <th>
                <a>Phone</a>
            </th>
            <th>
                <a>Address</a>
            </th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($suppliers as $value)
        <tr>
            <td>
                {{$value->name}}
            </td>
            <td>
                {{$value->email}}
            </td>
            <td>
                {{$value->contactPerson}}
            </td>
            <td>
                {{$value->phone}}
            </td>
            <td>
                {{$value->address}}
            </td>
            <td>
                <a href="/suppliers/{{$value->id}}">Details</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    {{ $suppliers->links() }}
</table>

@endsection