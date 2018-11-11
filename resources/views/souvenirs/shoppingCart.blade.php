@extends('shared/layout') 

@section('content')



@if (Session::has('cart'))


    <div class="theShoppingCart">
        


        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="display-6">Souvenir ID</div>
                </div>
                <div class="col-sm-2">
                    <div class="display-6">Souvenir Name</div>
                </div>
                <div class="col-sm-2">
                        <div class="display-6">Image</div>
                    </div>
                <div class="col-sm-2">
                    <div class="display-6">Description</div>
                </div>
                <div class="col-sm-2">
                    <div class="display-6">Quantity</div>
                </div>
                <div class="col-sm-2">
                    <div class="display-6">Price</div>
                </div>
            </div>

            @foreach ($cartItems as $cartItem)
                <div class="row">
                    <div class="col-sm-2">{{$cartItem['souvenir']->id}}</div>
                    <div class="col-sm-2"><a>{{$cartItem['souvenir']->name}}</a> </div>
                    <div class="col-sm-2"><img style="height:100px;width:auto;" src="{{asset('images/Souvenirs/'.$cartItem['souvenir']->pathOfImage)}}" alt="Souvenir Image" /> </div>
                    <div class="col-sm-2">{{$cartItem['souvenir']->description}}</div>

                    <div class="col-sm-2">
                        <a href="/souvenirs/addCartItem/{{$cartItem['souvenir']->id}}"><i class="fas fa-plus-circle"></i></a>
                        {{$cartItem['count']}}
                        <a href="/souvenirs/minusCartItem/{{$cartItem['souvenir']->id}}"><i class="fas fa-minus-circle"></i></a>
                    </div>

                    <div class="col-sm-2">${{$cartItem['price']}}</div>
                </div>
            @endforeach

            @php
                $gst = $totalPrice * 0.15;
                $grandTotal = $totalPrice*1.15;
            @endphp

            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-2"></div>
                <div class="col-sm-2"></div>
                <div class="col-sm-2">Subtotal:</div>

                <div class="col-sm-2">$ {{$totalPrice}}</div>
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

           
            
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-offset-4">
                        <a href="/souvenirs/clearCart" class="btn btn-danger">
                            Clear Cart <span class="glyphicon glyphicon-remove"></span>
                        </a>

                        <a href="/orders/create" class="btn btn-info">
                            Checkout <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>


        </div>
    </div>
@else
<div>you havent add any souvenirs yet.</div>
@endif


@endsection