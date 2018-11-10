@extends('shared/layout') 

@section('content')

<h2>Index</h2>
<p>
    <a href="/souvenirs/create">Create New</a>
</p>
<form asp-action="Index" method="get">
    <div class="form-actions no-color">
        <p>
            Find souvenir by keyword:
            <input
                type="text"
                name="SearchString"
                value=""/>
            <input type="submit" value="Search" class="btn btn-default"/>
            |
            <a href="/souvenirs">Back to Full List</a>
        </p>
    </div>
</form>
<table class="table">
    <thead>
        <tr>
            <th>
                <a>Souvenir Name</a>
            </th>
            <th>
                <a>Description</a>
            </th>
            <th>
                <a>Price</a>
            </th>
            <th>
                Image
            </th>
            <th>
                <a>Supplier</a>
            </th>
            <th>
                <a>Category</a>
            </th>
            <th>
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($souvenirs as $value)

        <tr>
            <td>
                {{$value->name}}
            </td>
            <td>
                {{$value->description}}
            </td>
            <td>
                ${{$value->price}}
            </td>
            <td>
                <img style="height:100px;width:auto;" src="{{asset('images/Souvenirs/'.$value->pathOfImage)}}" alt="Souvenir Image" />
            </td>
            <td>
                {{$value->supplier()->first()->name}}
            </td>
            <td>
                {{$value->category()->first()->name}}
            </td>
            <td>
                <a href="/souvenirs/{{$value->id}}">Details</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    {{ $souvenirs->links() }}
</table>

@endsection