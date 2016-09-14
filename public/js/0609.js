// var myCenter = new google.maps.LatLng(41.878114, -87.629798);

// function initialize() {
// var mapProp = {
//   center:myCenter,
//   zoom:12,
//   scrollwheel:false,
//   draggable:false,
//   mapTypeId:google.maps.MapTypeId.ROADMAP
//   };

// var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

// var marker = new google.maps.Marker({
//   position:myCenter,
//   });

// marker.setMap(map);
// }

// google.maps.event.addDomListener(window, 'load', initialize);

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
}

// Change style of navbar on scroll
window.onscroll = function() {myFunction()};
function myFunction() {
    var navbar = document.getElementById("myNavbar");
    var list = document.getElementsByClassName("listcolor");
    var i;
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        navbar.className = "w3-navbar" + " w3-card-2" + " w3-animate-top" + " w3-white";
        for(i = 0;i < list.length;i++) {
          list[i].style.color = "black";
        }
    } else {
        navbar.className = navbar.className.replace(" w3-card-2 w3-animate-top w3-white", "");
        for(i = 0;i < list.length;i++) {
          list[i].style.color = "white";
        }
    }
}