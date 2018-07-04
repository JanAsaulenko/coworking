<div id="map" class="content" style="height: 100vh; width: 100%; position:absolute; margin-bottom: 0">
</div>
<div class="aside">

    <div class="col-md-5" style="height: 100vh; float: right; background-color: rgba(255, 255, 255, 0.9);">
        <div class="col-md-offset-1 col-md-10">
            <div class="aside-heading">КОНТАКТНА ІНФОРМАЦІЯ</div>
            <div class="aside-line">
                <img src="{{ asset('assets/css/contacts/line.png') }}">
            </div>
            <div class="content_text">При винникненні будь-яких запитаннь
                чи пропозицій, <br>
                Ви можете звернутись по вказаним контактним <br>
                даним, або заповнити відповідну форму форму
            </div>
            <div class="content_marker">
                <p><span class="glyphicon glyphicon-map-marker "></span> <span class="address_input"></span></p>
            </div>
            <div class="content_earphone">
                <p><span class="glyphicon glyphicon-earphone"></span> +38 0432 52 82 67</p>
            </div>
            <div class="content_envelope">
                <p><span class="glyphicon glyphicon-envelope"></span> e-mail:intita.hr@gmail.com</p>
            </div>
            {{ Form::open(['url' => 'send_message']) }}
                <input type="text" name="name" placeholder="Ім'я*"   value="{{old('name')}}" >
                <input type="email" name="email"  placeholder="E-mail*"  value="{{old('email')}}">
                <input type="text" name="theme"  placeholder="Тема*"  value="{{old('theme')}}">
                <textarea  name="message"  placeholder="Введіть ваше повідомлення*" > {{old('message')}}</textarea>
                <div class="butt_cont" >
                    <button class="btn btn-primary btn-lg button_contacts" id="butt_cont1" >ВІДПРАВИТИ ПОВІДОМЛЕННЯ</button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
<script>
    function initMap() {
    }
    $(document).ready(function () {
        initMap = function () {
            var vinnitsa = {lat: 49.229065, lng: 28.425729};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                center: vinnitsa
            });

            $.ajax({
                url: '/ajax/getCoordinates',
                success: function (places) {
                    console.log(places)
                    var coordinates = [];
                    for (item in places) {
                        coordinates.push(places[item]);
                    }

                    function GeoJsonFactory() {
                        var geoScelleton = makeGeoSceleton();
                        this.make = function (places) {
                            geoScelleton.features = coordinates.map(function (item) {
                                return {
                                    type: "Feature",
                                    geometry: {
                                        type: "Point",
                                        coordinates: [parseFloat(item.lon), parseFloat(item.lat)]
                                    },
                                    properties: {
                                        address: item.address
                                    }
                                }
                            });
                            return geoScelleton;
                        };

                        function makeGeoSceleton() {
                            return {
                                type: 'FeatureCollection',
                                features: []
                            }
                        }
                    }

                    var geoFactory = new GeoJsonFactory();
                    var usersAsGeoJson = geoFactory.make(places);
                    map.data.addGeoJson(usersAsGeoJson);

                    var image = 'assets/css/images/icons8-marker.png';
                    var activeImage = 'assets/css/images/icons8-marker-active.png';
                    map.data.setStyle(function(feature) {
                        return {icon: image, title: feature.getProperty('address')};
                    });

                    var infowindow = new google.maps.InfoWindow({});
// pinmap
                    map.data.addListener('click', function (event) {
                        var clickedMarker = event.feature;
                        var currentGeometry = event.latLng;
                        var currentZoom = map.zoom;
                        var newZoom = 16;
                        if(currentZoom && currentZoom < newZoom) {
                            map.setZoom(newZoom);
                            var newCenter =  {lat: currentGeometry.lat(), lng: currentGeometry.lng() + 0.0005};
                            map.setCenter(newCenter);
                        }

                        map.data.revertStyle();
                        map.data.overrideStyle(clickedMarker, {icon: activeImage});

                        var contentString = clickedMarker.getProperty('address');
                        var infoPosition = {lat: currentGeometry.lat() + 0.0005, lng: currentGeometry.lng()};
                        infowindow.setContent(contentString);
                        infowindow.close();
                        infowindow.setPosition(infoPosition);
                        infowindow.open(map, clickedMarker.b.b.content);

                        $('.address_input').text("м.Вінниця, вул. " + clickedMarker.getProperty('address'));

                    });
                }
            });
        };
    });
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAI4IFg_krZ3BflXLNIHCNKocu23lXGV7E&callback=initMap&language=uk&region=UK">
</script>
