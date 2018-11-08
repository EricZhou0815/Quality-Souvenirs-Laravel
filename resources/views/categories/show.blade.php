@extends('shared/layout')

@section('content')

<h2>Details</h2>

<div>
    <h4>Category</h4>
    <hr />
    <dl class="dl-horizontal">
        <dt>
            Name
        </dt>
        <dd>
            {{$category->name}}
        </dd>
    </dl>
</div>
<div class="row">
        <a href="/categories/{{$category->id}}/edit" class="btn btn-default">Edit</a>
        <form action="{{ route('categories.destroy', $category->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-default" type="submit">Delete</button>
              </form>  
        <a href="/categories" class="btn btn-default">Back to List</a>
    </div>

@endsection