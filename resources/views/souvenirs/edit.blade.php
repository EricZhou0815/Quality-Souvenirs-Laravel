@extends('shared/layout')

@section('content')

<h4>Souvenir</h4>
<hr />
<div class="row">
    <div class="col-md-4">
        <form action="{{route('souvenirs.update', $souvenir->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="control-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{$souvenir->name}}"/>
                <span asp-validation-for="Name" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label for="description" class="control-label">Description</label>
                <input type="text" name="description" class="form-control" value="{{$souvenir->description}}"/>
                <span asp-validation-for="description" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label for="price" class="control-label">Price</label>
                <input type="text" name="price" class="form-control" value="{{$souvenir->price}}"/>
                <span asp-validation-for="price" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label for="supplier" class="control-label">Supplier</label>
                <select type="text" name="supplierName" class="form-control">
                @foreach ($suppliers as $value)
                    <option value="{{$value->name}}">{{$value->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="category" class="control-label">Category</label>
                <select type="text" name="categoryName" class="form-control">
                    @foreach ($categories as $value)
                        <option value="{{$value->name}}">{{$value->name}}</option>
                    @endforeach
                </select>
            </div>
            <input type="file" name="imageUpload" id="imageUpload" value="{{$souvenir->pathOfImage}}"/>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<div>
    <a herf="/souvenirs">Back to List</a>
</div>


@endsection