@extends('shared/layout') 

@section('content')

@php
 $theCount = 0;
 $theCount=$cartItems->count();
@endphp

@if ($theCount > 0)


    <div class="theShoppingCart">
        <h2><span class="glyphicon glyphicon glyphicon-shopping-cart"></span> <span id="theCount">{{$theCount}}</span><span id="taggleShoppingCart" class="glyphicon glyphicon-chevron-down" type="button" onclick="taggleShoppingCart()"></span></h2>


        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <h4 class="display-4">Souvenir ID</h4>
                </div>
                <div class="col-sm-2">
                    <h4 class="display-4">Souvenir Name</h4>
                </div>
                <div class="col-sm-2">
                    <h4 class="display-4">Description</h4>
                </div>
                <div class="col-sm-2">
                    <h4 class="display-4">Quantity</h4>
                </div>
                <div class="col-sm-2">
                    <h4 class="display-4">Price</h4>
                </div>
            </div>

            @foreach ($cartItems as $cartItem)
                <div class="row">
                    <div class="col-sm-2">{{$cartItem->souvenir()->first()->id}}</div>
                    <div class="col-sm-2"><a>{{$cartItem->souvenir()->first()->name}}</a> </div>
                    <div class="col-sm-2">{{$cartItem->souvenir()->first()->description}}</div>

                    <div class="col-sm-2">
                        <a class="glyphicon glyphicon-plus"></a>
                        {{$cartItem->count}}
                        <a class="glyphicon glyphicon-minus"></a>
                    </div>

                    <div class="col-sm-2">${{$cartItem->souvenir()->first()->price}}</div>
                </div>
            @endforeach

            @php
                $gst = $total * 0.15;
                $grandTotal = $total*1.15;
            @endphp

            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-2"></div>
                <div class="col-sm-2"></div>
                <div class="col-sm-2">Subtotal:</div>

                <div class="col-sm-2">$ {{$total}}</div>
            </div>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-2"></div>
                <div class="col-sm-2"></div>
                <div class="col-sm-2">GST(15%):</div>

            <div class="col-sm-2">${{$gst}}</div>
            </div>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-2"></div>
                <div class="col-sm-2"></div>
                <div class="col-sm-2">Grand Total:</div>

                <div class="col-sm-2">${{$grandTotal}}</div>
            </div>

            @if ($CartItems->count > 0)
            
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-offset-4">
                        <a class="btn btn-danger">
                            Clear Cart <span class="glyphicon glyphicon-remove"></span>
                        </a>

                        <a class="btn btn-info">
                            Checkout <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>

            @endif

        </div>
    </div>
@endif


@endsection