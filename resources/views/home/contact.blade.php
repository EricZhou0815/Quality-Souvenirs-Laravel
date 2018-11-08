@extends('shared/layout')

@section('content') 
<div class="container text-center">
<div class="aboutContent">
    <h2 class="mySubTittle">COME VISIT US</h2>
    <div class="contactCard col-md-12">
        <div class="mySummary contactTitle">Our Store</div>
        <div class="contactText">139 Carrington Rd, Mount Albert</div>
        <div class="contactText">Auckland 1025</div>
        <div class="contactText">Tel:021-168-9168</div>
    </div>
    <div class="contactCard col-md-12">
        <div class="mySummary contactTitle">Customer Service</div>
        <div class="contactText">Tel:8000-600-0800</div>
        <div class="contactText">Tel:021-160-1168</div>
        <a class="contactText" href="mailto:info@gsouvenirs.com">info@qsouvenirs.com</a>
    </div>
    <div class="contactCard col-md-12">
        <div class="mySummary contactTitle">Opening Hours</div>
        <div class="contactText">Mon-Fri: 8am-5pm</div>
        <div class="contactText">Saturday: 9am-8pm</div>
        <div class="contactText">Sunday: 9am-9pm</div>
    </div>

    <div class="theMap">
        <div id="googleMap"></div>
    </div>

    <!-- <div class="joinMailList col-3"> <p>Join our mailing list</p> <div
    class="form-group"> <input class="form-control" /> <span
    asp-validation-for="Email" class="text-danger"></span> </div> <button class="btn
    btn-default subscribeEmail" type="submit">Subscribe Now</button> </div> -->

</div>
<div class="container">

@endsection
