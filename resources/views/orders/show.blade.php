@extends('shared/layout')

@section('content')


<div>
        <h4>The following is the order details.</h4>
        <hr />
    
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
      
                        <tr>
                            <td>
                                {{$orderDetail->souvenir_id}}
                            </td>
                            <td>
                                    {{$orderDetail->souvenir->name}}
                            </td>
                            <td>
                                    {{$orderDetail->souvenir->description}}
                            </td>
                            <td>
                                    <img style="height:100px;width:auto;" src="{{asset('images/Souvenirs/'.$orderDetail->souvenir->pathOfImage)}}" alt="Souvenir Image"  />
                            </td>
                            <td>
                                    {{$orderDetail->quantity}}
                            </td>
                            <td>
                                    ${{$orderDetail->souvenir->price}}
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
    
        <div>
            <a href="/orders" class="btn btn-info">Back</a>
        </div>
    </div>

@endsection