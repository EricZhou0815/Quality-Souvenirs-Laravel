@extends('shared/layout')

@section('content')

<h2>Index</h2>
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<p>
    <a href="/categories/create">Create New</a>
</p>
<form action="Index" method="get">
    <div class="form-actions no-color">
        <p>
            Find category by keyword:
            <input
                type="text"
                name="SearchString"
                value=""/>
            <input type="submit" value="Search" class="btn btn-default"/>
            |
            <a asp-action="Index">Back to Full List</a>
        </p>
    </div>
</form>
<table class="table">
    <thead>
        <tr>
            <th>
                <a>Categoty Name</a>
            </th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $value)
        <tr>
            <td>
                {{$value->name}}
            </td>
            <td>
                <a href="/categories/{{$value->id}}">Details</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    {{ $categories->links() }}
</table>

@endsection