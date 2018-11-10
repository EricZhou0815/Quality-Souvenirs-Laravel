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
                                {@Html.DisplayFor(modelItem => item.Souvenir.ID)}
                            </td>
                            <td>
                                @Html.DisplayFor(modelItem => item.Souvenir.Name)
                            </td>
                            <td>
                                @Html.DisplayFor(modelItem => item.Souvenir.Description)
                            </td>
                            <td>
                                <img style="height:100px;width:auto;" src="@imgUrl" alt="Souvenir Image" onerror="this.onerror = null; this.src='@errImage'" />
                            </td>
                            <td>
                                @Html.DisplayFor(modelItem => item.Quantity)
                            </td>
                            <td>
                                @Html.DisplayFor(modelItem => item.Souvenir.Price)
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
            <a asp-action="MemberIndex"  asp-route-id="@UserManager.GetUserId(User)" class="btn btn-info">Back</a>
        </div>
    </div>

@endsection