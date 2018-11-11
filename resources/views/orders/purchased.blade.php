@extends('shared/layout') 

@section('content')

<h2><span class="glyphicon glyphicon-saved"></span>Thank you For Your Purchase!</h2>

<div>
    <h4>The following order will be dispatched as per the details below.</h4>
    <hr />
    <dl class="dl-horizontal">
        <dt>Email</dt>
        <dd>{{Auth::user()->email}}</dd>

        <dt>
            Name
        </dt>
        <dd>
           {{$order->firstName}} {{$order->lastName}}
        </dd>
        <dt>
           Address
        </dt>
        <dd>
            {{$order->address}},{{$order->city}},{{$order->state}},{{$order->postalCode}}
        </dd>
        <dt>
            Phone
        </dt>
        <dd>
                {{$order->phone}}
        </dd>
        <dt>
               Total Cost
        </dt>
        <dd>
                {{$order->grandTotal}}
        </dd>
        <dt>
                Order Date
        </dt>
        <dd>
                {{$order->created_at}}
        </dd>
        <dt>
            Status
        </dt>
        <dd>
                {{$order->status}}
        </dd>
        <dd>
            <table class="table">
                <tr>
                    <th>Souvenir ID</th>
                    <th>Souvenir Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                @foreach ($orderDetails as $orderDetail)
                @php
                    $souvenir=$orderDetail->souvenir;
                @endphp

                    <tr>
                        <td>
                        {{$orderDetail->souvenir->id}}
                        </td>
                        <td>
                        {{$orderDetail->souvenir->name}}
                        </td>
                        <td>
                            {{$orderDetail->souvenir->description}}
                        </td>
                        <td>
                            <img style="height:100px;width:auto;" src="{{asset('images/Souvenirs/'.$orderDetail->souvenir->pathOfImage)}}" alt="Souvenir Image" />
                        </td>
                        <td>
                            {{$orderDetail->quantity}}
                        </td>
                        <td>
                        ${{/*$orderDetail->souvenir()->price*/ $souvenir->price}}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <label>Subtotal:</label>
                    </td>
                    <td>
                        ${{$order->total}}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <label>GST(15%):</label>
                    </td>
                    <td>
                        ${{$order->gst}}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <label>Grand Total:</label>
                    </td>
                    <td>
                        ${{$order->grandTotal}}
                    </td>
                </tr>
            </table>

        </dd>


    </dl>

    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-2"></div>
        <div class="col-sm-offset-4">

            <a href="/shop" class="btn btn-info">
                Continue Shopping <span class="glyphicon glyphicon-shopping-cart"></span>
            </a>
        </div>
    </div>
</div>

@endsection

