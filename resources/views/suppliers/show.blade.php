@extends('shared/layout')

@section('content')

<h2>Details</h2>

<div>
    <h4>Supplier</h4>
    <hr />
    <dl class="dl-horizontal">
        <dt>
            Name
        </dt>
        <dd>
            {{$supplier->name}}
        </dd>
        <dt>
            Email
        </dt>
        <dd>
            {{$supplier->email}}
        </dd>
        <dt>
            Contact Person
        </dt>
        <dd>
            {{$supplier->contactPerson}}
        </dd>
        <dt>
            Phone
        </dt>
        <dd>
            {{$supplier->phone}}
        </dd>
        <dt>
            Address
        </dt>
        <dd>
            {{$supplier->address}}
        </dd>
    </dl>
</div>
<div class="row">
    <a href="/suppliers/{{$supplier->id}}/edit" class="btn btn-default">Edit</a>
    <form action="{{ route('suppliers.destroy', $supplier->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-default" type="submit">Delete</button>
          </form>  
    <a href="/suppliers" class="btn btn-default">Back to List</a>
</div>

@endsection