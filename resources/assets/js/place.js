(function($){

    function drawing_map(objectNumber){
        var map;
        var element = $(this);
        if(PokemonBuddy.place !== undefined) {
            var id = PokemonBuddy.place.id;
            var lat = parseFloat(PokemonBuddy.place.geo_lat, 6);
            var lng = parseFloat(PokemonBuddy.place.geo_lng, 6);
            var width = PokemonBuddy.place.stars_width;
        }
        else if(PokemonBuddy.places !== undefined){
            var id = PokemonBuddy.places[objectNumber].id;
            var lat = parseFloat(PokemonBuddy.places[objectNumber].geo_lat, 6);
            var lng = parseFloat(PokemonBuddy.places[objectNumber].geo_lng, 6);
            var width = PokemonBuddy.places[objectNumber].stars_width;
        }
        $("#place-stars-points-" + id).width(width);
        var myLatlng = new google.maps.LatLng(lat,lng);
        var mapOptions = {
            zoom: 16,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL,
                position: google.maps.ControlPosition.RIGHT_BOTTOM
            },
            mapTypeControl: false,
            streetViewControl: false,
            scrollwheel: false,
            draggable: false
        };

        map = new google.maps.Map(document.getElementById(element.attr('id')), mapOptions);

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map
        });

        // event triggered when map is clicked
        google.maps.event.addListener(map, 'click', function (event) {
            map.setOptions({
                scrollwheel: true,
                draggable: true
            });
        });
        objectNumber++
    }

    $(document).ready(function () {
        var objectNumber = 0;
        $('.place-map-render').each(drawing_map);
    });
})(jQuery);