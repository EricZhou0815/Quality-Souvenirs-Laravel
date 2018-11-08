@extends('shared/layout')

@section('content')

<h2>Details</h2>

<div>
    <h4>Souvenir</h4>
    <hr />
    <dl class="dl-horizontal">
        <dt>
            Name
        </dt>
        <dd>
            {{$souvenir->name}}
        </dd>
        <dt>
            Description
        </dt>
        <dd>
                {{$souvenir->description}}
        </dd>
        <dt>
            Price
        </dt>
        <dd>
                ${{$souvenir->price}}
        </dd>
        <dt>
            Image
            
        </dt>
        <dd>
            <img style="height:100px;width:auto;" src="{{asset('images/Souvenirs/'.$souvenir->pathOfImage)}}" alt="Souvenir Image"  />
           
        </dd>
        <dt>
            Supplier
        </dt>
        <dd>
                {{$souvenir->supplierName}}
        </dd>
        <dt>
            Category
        </dt>
        <dd>
                {{$souvenir->categoryName}}
        </dd>
    </dl>
</div>
<div class="row">
        <a href="/souvenirs/{{$souvenir->id}}/edit" class="btn btn-default">Edit</a>
        <form action="{{ route('souvenirs.destroy', $souvenir->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-default" type="submit">Delete</button>
              </form>  
        <a href="/souvenirs" class="btn btn-default">Back to List</a>
    </div>


@endsection