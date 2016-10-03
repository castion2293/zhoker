$(function () {

    //Tooltip
    $("#sign-in-bar").tooltip({title:"<p>Sign In</p>",  html: true, placement: "bottom"});
    $("#sign-out-bar").tooltip({title:"<p>Sign Out</p>",  html: true, placement: "bottom"});
    $("#help-bar").tooltip({title:"<p>Help</p>",  html: true, placement: "bottom"});
    $("#chef-bar").tooltip({title:"<h4>Become a chef</h4>",  html: true, placement: "bottom"});

     //sidebar display
    $(".w3-opennav").click(function () {
        $(".w3-sidenav").css("display", "block");
        $(".w3-overlay").css("display", "block");
    });
    $(".w3-overlay").click(function () {
        $(".w3-sidenav").css("display", "none");
        $(".w3-overlay").css("display", "none");
    });

    //scroll up // Add smooth scrolling to hometag
    $("#hometag").on("click", function(event){
       // Make sure this.hash has a value before overriding default behavior
       if(this.hash != "") {
         // Prevent default anchor click behavior
         event.preventDefault();

        // Store hash
        var hash = this.hash;

        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 900, function(){
        
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
        });
       }//end if
    });

    //Click erease the text
    $("#eatlocation").focus(function(){
      if( $("#eatlocation").val() == "Salt lake city")
      $("#eatlocation").val("");
    });

    $("#eatlocation").focusout(function(){
      if( $("#eatlocation").val() == '') 
        $("#eatlocation").val("Salt lake city");
    });

    $("#eatlocationSmall").focus(function(){
      if( $("#eatlocationSmall").val() == "Salt lake city")
      $("#eatlocationSmall").val("");
    });

    $("#eatlocationSmall").focusout(function(){
      if( $("#eatlocationSmall").val() == '') 
        $("#eatlocationSmall").val("Salt lake city");
    });

    //googleMap
    // $("#googleMap").googleMap({
    //     zoom: 13,
    //     type: "ROADMAP" // Map type (optional)
    // });
    // $("#googleMap").addMarker({
    //     address: "751 S 300 E Salt Lake City Utah", // Postale Address
    //     url: 'https://www.yahoo.com.tw',
    //     title: 'HOUSE',
    //     text: "751 S 300 E Salt Lake City Utah"
    //     //    id: 'marker1'
    // });
    // $("#googleMap").addMarker({
    //     address: " 95 N. 300 W., Salt Lake City, UT", // Postale Address
    //     url: 'https://www.ldsbc.edu',
    //     title: 'LDSBC',
    //     text: "95 N. 300 W., Salt Lake City, UT"
    //     //    id: 'marker1'
    // });

})