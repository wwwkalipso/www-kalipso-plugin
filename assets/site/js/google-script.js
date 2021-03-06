// This example requires the Places library. Include the libraries=places

// parameter when you first load the API. For example:

// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">



var map;

var infowindow;



function initMap() {

    var pyrmont = {lat: 49.58, lng: 34.56};

    infowindow = new google.maps.InfoWindow();

    map = new google.maps.Map(document.getElementById('map'), {

        center: pyrmont,

        zoom: 12,

    });
    console.log( (pyrmont));

    // Try HTML5 geolocation.

    if (navigator.geolocation) {

        navigator.geolocation.getCurrentPosition(function(position) {

            pyrmont = {

                lat: position.coords.latitude,

                lng: position.coords.longitude
                


            };
            console.log( (pyrmont));
			


            infowindow.setPosition(pyrmont);

            infowindow.setContent('Location found.');

            map.setCenter(pyrmont);

        }, function() {

           // handleLocationError(true, infowindow, map.getCenter());

        });

    }

	


console.log( (pyrmont));
    var service = new google.maps.places.PlacesService(map);

    service.nearbySearch({

        location: pyrmont,

        radius: 500,

        type: ['restaurant']

    }, processResults);

}



function processResults(results, status, pagination) {

    if (status === google.maps.places.PlacesServiceStatus.OK) {

        for (var i = 0; i < results.length; i++) {

            createMarker(results[i]);

        }

    }

}



function createMarker(place) {

    console.log(place);



    var placeLoc = place.geometry.location;

    var marker = new google.maps.Marker({

        map: map,

        position: place.geometry.location

    });



    google.maps.event.addListener(marker, 'click', function() {

        infowindow.setContent(place.name);

        infowindow.open(map, this);

    });

}