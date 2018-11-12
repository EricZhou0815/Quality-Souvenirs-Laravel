@extends('shared/layout')

@section('content') 

<div>
    

    <div class="hero-image hero-one">
        <div class="hero-text">
            <div class="myTittle">Quality Souvenirs</div>
            <h4>Bring New Zealand to your home.</h4>

            <form action='/souvenirs/search' method='GET' enctype='multipart/form-data'>
                {{ csrf_field() }}
                <div class="form-actions no-color">
                    <p>
                        <input
                            type="text"
                            class="form-control searchBar"
                            name="SearchString"
                            value=""
                            placeholder="Search here"/>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <div class="exploreGoods">Most people Love</div>
    <div class=" container row">
        <div class="myCardBox col col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <a class="containerCard" href='/souvenirs/filterByCategory/2'>
                <div class="cardImageContainer">
                    <img class="cardImage" src="{{url('/images/cups.jpg')}}"/>
                    <div class="cardText">Mugs</div>
                </div>
            </a>
        </div>
        <div class="myCardBox col col-lg-3 col-md-4 col-sm-6">
            <a class="containerCard" href='/souvenirs/filterByCategory/1'>
                <div class="cardImageContainer">
                    <img class="cardImage" src="{{url('/images/gifts.jpg')}}"/>
                    <div class="cardText">Maori Gifts</div>
                </div>
            </a>
        </div>
        <div class="myCardBox col col-lg-3 col-md-4 col-sm-6">
            <a class="containerCard" href='/souvenirs/filterByCategory/3'>
                <div class="cardImageContainer">
                    <img class="cardImage" src="{{url('/images/t-shirts.jpg')}}"/>
                    <div class="cardText">T-Shirts</div>
                </div>
            </a>
        </div>
        <div class="myCardBox col col-lg-3 col-md-4 col-sm-6">
            <a class="containerCard" href='/souvenirs/filterByCategory/2'>
                <div class="cardImageContainer">
                    <img class="cardImage" src="{{url('/images/hats.jpg')}}"/>
                    <div class="cardText">Hats</div>
                </div>
            </a>
        </div>
    </div>

    <!--New Arrivals-->
    <!--Contact-->
    <div class="mySocialMedia">
        <a href="https://www.medium.com" target="_blank">
            <i class="fab fa-medium-m fa-2x"></i>
        </a>
        <a href="https://twitter.com" target="_blank">
            <i class="fab fa-twitter fa-2x"></i>
        </a>
        <a href="https://www.facebook.com" target="_blank">
            <i class="fab fa-facebook fa-2x"></i>
        </a>
        <a href="https://www.instagram.com" target="_blank">
            <i class="fab fa-instagram fa-2x"></i>
        </a>
        <a href="https://www.snapchat.com" target="_blank">
            <i class="fab fa-snapchat-square fa-2x"></i>
        </a>
        <a href="https://www.pinterest.nz" target="_blank">
            <i class="fab fa-pinterest fa-2x"></i>
        </a>
    </div>

</div>

@endsection