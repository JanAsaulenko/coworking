<div id="map" style="height: 520px"></div>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAI4IFg_krZ3BflXLNIHCNKocu23lXGV7E&callback=initMap&language=uk&region=UK">
</script>


<script>
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'),{
            center: {lat: 49.230713, lng: 28.397340},
            zoom: 16,
            panControl: false,
            zoomControlOptions: {
                position: google.maps.ControlPosition.LEFT_TOP
            },
            streetViewControl: true,
            streetViewControlOptions: {
                position: google.maps.ControlPosition.TOP_CENTER
            },
            scrollwheel: false,
            mapTypeControl: false,
            styles: [{
                "featureType": "water",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#d3d3d3"
                    }
                ]
            },
                {
                    "featureType": "transit",
                    "stylers": [
                        {
                            "color": "#808080"
                        },
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "color": "#b3b3b3"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "color": "#ffffff"
                        },
                        {
                            "weight": 1.8
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#d7d7d7"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "color": "#ebebeb"
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#a7a7a7"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "color": "#efefef"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#696969"
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "color": "#737373"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#d6d6d6"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {},
                {
                    "featureType": "poi",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#dadada"
                        }
                    ]
                }
            ]
        });

        /* var marker = new google.maps.Marker({
             position: {lat: 49.230713, lng: 28.397340},
             map: map,
             title: 'Legalizuem.ru',
             icon: {
                 url: "../img/mark.png",
                 scaledSize: new google.maps.Size(45, 70)
             }
         });*/


        var markerSize = new google.maps.Size(45, 70);
        var locations = [
            {
                title: 'Sea room, М. Ващука, 20',
                position: {lat: 49.230713, lng: 28.397340},
                icon: {
                    url: "/assets/css/7footer/marker.png",
                    scaledSize: markerSize
                }

            },
            {
                title: 'Magenta room, М. Ващука, 20',
                position: {lat: 49.229879, lng: 28.396010},
                icon: {
                    url: "/assets/css/7footer/marker.png",
                    scaledSize: markerSize
                }
            },
            {
                title: 'Sky room, М. Ващука, 20',
                position: {lat: 49.227139, lng: 28.400468},
                icon: {
                    url: "/assets/css/7footer/marker.png",
                    scaledSize: markerSize
                }
            },
            {
                title: 'Relax room, М. Ващука, 20',
                position: {lat: 49.227320, lng: 28.404606},
                icon: {
                    url: "/assets/css/7footer/marker.png",
                    scaledSize: markerSize
                }
            }
        ];




        for (var el in locations){
            addMarker(locations[el]);
        }

        function addMarker( element ) {
            var marker = new google.maps.Marker({
                position: element.position,
                map: map,
                title: element.title,
                icon: element.icon
            });

            marker.addListener('click', function() {
                infowindow = new google.maps.InfoWindow({
                    content: "<div>" + marker.title + "</div>"
                });

                infowindow.open(map, marker);
            });

        }








    }


</script>