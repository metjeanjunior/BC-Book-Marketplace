(function() {

  window.onload = function() {
    
    // Creating a map
    var options = {
      zoom: 16,
      center: new google.maps.LatLng(42.3355601,-71.1707181),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById('map'), options);

    // Creating an array that will contain the coordinates for places
    var places = [];
    var titles = [];
    var info = [];

    // Adding a LatLng object for each city
    places.push(new google.maps.LatLng(42.335108,-71.166478));
    titles.push('Alumni Stadium');
    info.push('Alumni Sta');
    places.push(new google.maps.LatLng(42.33626, -71.16863));
    titles.push('Maloney Hall');
    info.push('Maloney Hall');
    places.push(new google.maps.LatLng(42.33558, -71.17052));
    titles.push('Gasson Hall');
    info.push('Gasson Hall');
    places.push(new google.maps.LatLng(42.33329, -71.17209));
    titles.push('McElroy Commons');
    info.push('McElroy Commons');
    places.push(new google.maps.LatLng(42.334358,-71.1712413));
    titles.push('Fulton Hall');
    info.push('Fulton Hall');
    places.push(new google.maps.LatLng(42.334245, -71.171323));
    titles.push('Stokes Hall');
    info.push('Stokes Hall');
    places.push(new google.maps.LatLng(42.334954, -71.170750));
    titles.push('Lyons Hall');
    info.push('Lyons Hall');
    places.push(new google.maps.LatLng(42.335279, -71.169473));
    titles.push('Devlin Hall');
    info.push('Devlin Hall');

    // Looping through the names and places arrays
    for (var i = 0; i < places.length; i++) 
    {
        // Adding the marker as usual
        var marker = new google.maps.Marker({
            position: places[i], 
            map: map,
            title: titles[i]
        });
    
        // Wrapping the event listener inside an anonymous function 
        // that we immediately invoke and passes the variable i to.
        (function(i, marker) {
            // Creating the event listener. It now has access to the values of
            // i and marker as they were during its creation
            google.maps.event.addListener(marker, 'click', function() {
        
                var infowindow = new google.maps.InfoWindow({
                    content: info[i]
                });
            
                infowindow.open(map, marker);
        
            });
        
        })(i, marker);
        bounds.extend(places[i]);
    }
    map.fitBounds(bounds);
    

  };
       
})();

function toggleMap()
{
    $(function()
    {
        $("#map").toggle();
    });
}