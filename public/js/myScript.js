// Write your JavaScript code.
// Write your JavaScript code.
//googleMap
function initMap() {
    var uluru = {lat: -36.879889,lng: 174.707658 };
    var map = new google.maps.Map(
        document.getElementById('googleMap'),
        {
            zoom: 12,
            center: uluru
        }
    );
    var marker = new google.maps.Marker({
        position: uluru, map: map
    });
}


function taggleShoppingCart() {
    var taggle = document.getElementById("taggleShoppingCart");
    if (taggle.className === "glyphicon glyphicon-chevron-up") {
        //maximize shoppingCart
        document.getElementById("theCount").style.visibility = "hidden";
        taggle.className = "glyphicon glyphicon-chevron-down";
        document.getElementById("shoppingCartView").style.height = "auto";
      
    }
    else {
        //minimize shoppingCart
        document.getElementById("theCount").style.visibility = "visible";
        taggle.className = "glyphicon glyphicon-chevron-up";
        document.getElementById("shoppingCartView").style.height = "60px";
    }
}


function AddToCart(event) {
    var target = event.target || event.srcElement;
    var Id = target.id;
    $.ajax({
        url: "/ShoppingCart/AddToCartStay",
        type: "POST",
        data: { id: Id },
        dataType: "json",
        success: function(data){
            console.log(data);
        },
        error:function (result) {
            console.log("error");
        }
    });

}
