@extends('shared/layout')

@section('content')

@php
    //$column = 3;
    //$count=$souvenirs->count();    
    //$row = $count / $column;
    //$reminder = $count % $column;
@endphp

<div class="place-holder"></div>


<div class="theContent">
    <div class="atTheTop">
        <div class="theSearchBar">
            <form action="SouvenirsController@shop" method="GET">
                <div class="form-actions no-color">
                    <p>
                        <input type="text" class="form-control searchBar sb-one" name="searchString" value="" placeholder="Search" />
                    </p>
                </div>
            </form>
        </div>

        <div class="souvenirFiltersContainer">
            <ul class="souvenirFilters">
                <li style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),url(../images/maorigifts.png);">
                    <a action="SouvenirsController@shop" method="GET" searchString="Maori Gifts">Maori Gifts</a>
                </li>
                <li style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),url(../images/cup.png);">
                    <a action="SouvenirsController@shop" method="GET" searchString="Mugs">Mugs</a>
                </li>
                <li style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),url(../images/t-shirt.png);">
                    <a action="SouvenirsController@shop" method="GET" searchString="T-Shirts">T-Shirts</a>
                </li>
                <li style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),url(../images/hat.png);">
                    <a action="SouvenirsController@shop" method="GET" searchString="Hats">Hats</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="masonryContainer">
        <div class="masonry">

           @foreach ($souvenirs as $item)
                @php
                //$n=$i + $j * $column;
                //$item=$souvenirs->values()->get($n);
                 
                @endphp

                    <div class="item prodcutCardContainer">
                        <div class="productCard">
                            <div class="prodcutImageContianer">
                                <img class="productImage" src="{{asset('images/Souvenirs/'.$item->pathOfImage)}}" alt="Souvenir" />
                            </div>
                            <table class="productRow">
                                <tr class="ProductTextRowOne">
                                    <td>
                                    <span class="productName">{{$item->name}}</span>
                                        <span class="productPrice">${{$item->price}}</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <a action="" id="{{$item->id}}" class="btn btn-info">Details</a>
                                        <a action="" id="{{$item->id}}" class="btn btn-success">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                            Add to Cart
                                        </a>
                                        <!--
                                          <button id="Model[i+j*column].ID" onclick="AddToCart(event)" class="btn btn-success">
                                              <span  class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                              Add to Cart (Ajax)
                                          </button>-->
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                    @php
                    //$count--;
                    @endphp

                
                

            @endforeach

        </div>
    </div>
</div>


@endsection