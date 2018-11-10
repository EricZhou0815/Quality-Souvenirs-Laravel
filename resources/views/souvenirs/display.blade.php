@extends('shared/layout')

@section('content')



<div>
    <h4>Souvenir</h4>
    <hr />

    <div class="shopItemDetails container-fluid cartDetailsContainer col-lg-12 col-md-12 col-sm-12">
        <div class="row itemTitle">
            <div class="row col-lg-12 col-md-12 col-sm-12 cartDetailsHead">
                <span class="cartItemName">{{$souvenir->name}}</span>
                <span class="cartItemPrice">${{$souvenir->price}}</span>
                <span class="buttonGroup">
                    <a class="btn btn-success">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        Add to Cart
                    </a>
                    <a href="/shop" class="btn btn-info">
                        Back
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    </a>
                </span>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 cartItemImageContainer">
                <img class="cartItemImage" style="position:relative;height:auto;width:80%;overflow:cover;" src="{{asset('images/Souvenirs/'.$souvenir->pathOfImage)}}" alt="Souvenir" onerror="this.onerror = null; this.src='@errImage'">
            </div>
            <div class="row col-lg-12 col-md-12 col-sm-12">
                <h5 class="itemDescription">
                    {{$souvenir->description}}
                </h5>
            </div>

        </div>
    </div>



</div>


@endsection