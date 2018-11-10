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

            <th></th>
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
                    {{$order->address." ".$order->city." ".$order->state." ".$order->country." ".$order->postalCode}}
                </td>
                <td>
                    {{$order->orderDate}}
                </td>

                <td>
                    ${{$order->total}}
                </td>
                <td>
                    ${{$order->gst}}
                </td>
                <td>
                    ${{$order->subTotal}}
                </td>
                <td>
                    {{$order->status}}
                </td>
                <td>
                    <a href="orders/show/{{$order->id}}">Details</a>
                </td>
            </tr>
        @endforeach
    </tbody>
    {{ $orders->links() }}
</table>

@endsection