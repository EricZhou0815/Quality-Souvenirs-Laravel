@extends('shared/layout')

@section('content')

<h2>Delete</h2>

<div>
    <h4>Are you sure to delete this supplier?</h4>
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
<div>
    <a href="/suppliers/destory">Confirm Delete</a> |
    <a href="/suppliers">Back to List</a>
</div>

@endsection