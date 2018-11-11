@extends('shared/layout')

@section('content')

<h2>Index</h2>


<table class="table">
    <thead>
        <tr>
            <th>
               OrderID
            </th>
            <th>
                Name
            </th>
            <th>
                Phone
            </th>
            <th>
                Address
            </th>
            <th>
                Date
            </th>

            <th>
                Subtotal
            </th>
            <th>
                GST
            </th>
            <th>
                Grand Total
            </th>
            <th>
                Order Status
            </th>

            <th>
                More
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>
                    {{$order->id}}
                </td>
                <td>
                    {{$order->lastName." ".$order->firstName}}
                </td>
                <td>
                    {{$order->phone}}
                </td>
                <td>
                    {{$order->address." ".$order->city." ".$order->state." ".$order->postalCode}}
                </td>
                <td>
                    {{$order->created_at}}
                </td>

                <td>
                    ${{$order->total}}
                </td>
                <td>
                    ${{$order->gst}}
                </td>
                <td>
                    ${{$order->grandTotal}}
                </td>
                <td>
                    @if (Auth::user()->type=='admin')
                    <a href="/orders/{{$order->id}}/orderStatus">{{$order->status}}</a>
                    @else
                    {{$order->status}}
                    @endif
                </td>
                <td>
                    <a href="/orders/{{$order->id}}">Details</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection