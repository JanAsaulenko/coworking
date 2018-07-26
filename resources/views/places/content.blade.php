<div class="places">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-5 col-md-2">
                        <h3 class="text-center">ПРОСТІР</h3>
                    </div>
                </div>
                <div class="main col-md-offset-4 col-md-6" style="margin-left: 28%;">
                    <form role="form" class="form-inline">
                        <div class="form-group content-width">
                            	<legend>Місто</legend>
                                <select id="city-select" name="city" required>
                                    @foreach ($cities_names as $city)
                                        <option selected value="{{$city->id}}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                    <script>
                    $( document ).ready(function() {
                        $("#city-select").select2({
                    		language: {noResults: function(){return "Співпадінь не знайдено";}	},
                    		width: "100%",
                            theme: "classic"
                    	}).on('select2:select',function(e){
                            	var a = $(this).val();
                                $.ajax({
                                        url: '/main/getPlace',
                                        method: 'get',
                                        dataType: 'json',
                                        data: {city_id: a},
                                        success: function (data) {
                                            var tmpArray = [];
                                            for( item in data){
                                                tmpArray.push(data[item]);
                                            }
                                            if (data){
                                                $("#place-select").empty().select2({
                                                placeholder: "Доступних місць немає",
                                                width: "100%",
                                                data: tmpArray,
                                                });
                                            } else {
                                                $("#place-select").empty().select2({
                                                placeholder: "Доступних місць немає",
                                                width: "100%"
                                                });
                                            }
                                        }
                                })
                                $("#name_place-select").empty();
                        });
                    });
                    </script>
                        <div class="form-group content-width">
                            	<legend>Адреса</legend>
                            <select id="place-select" required></select>
                        </div>
                        <script>
                        $("#place-select").select2({
                            language: {noResults: function(){return "Доступних місць немає";}	},
                            width: "100%",
                            theme: "classic"
                        }).on('select2:select',function(e){
                            var b = $(this).val();
                                $.ajax({
                                        url: '/main/getPlaceLocation',
                                        method: 'get',
                                        dataType: 'json',
                                        data: {place_id: b},
                                        success: function (data) {
                                            var tmpArray = [];
                                            for( item in data){
                                                tmpArray.push(data[item]);
                                            }
                                            if (data){
                                                $("#name_place-select").empty().select2({
                                                placeholder: "Доступних місць немає",
                                                width: "100%",
                                                data: tmpArray
                                                });
                                            }
                                        }
                                });
                        });
                        </script>
                        <div class="form-group">
                        	<legend>Назва простору</legend>
                            <select id="name_place-select" name="name_place" required>

                            </select>
                        </div>
                        <script>
                        $("#name_place-select").select2({
                            language: {noResults: function(){return "Простір не знайдено";}	},
                            width: "100%",
                            theme: "classic"
                        });
                        </script>
                    </form>
                </div>
                    <div class="col-md-offset-5 col-md-3" style="margin-top:30px; margin-left: 34%;">
                        <td class="text-align:center;">
                        <button type="submit" class="btn btn-success btn-lg">Обрати</button></td>
                    </div>
                    <div class="col-md-12">
                          <img src="{{ asset('assets/css/placephoto/img (1).jpg') }}"  tabindex="0" class="lazy">
                        <!-- <span style="color: white; border-bottom: 2px solid white">Sea Room</span>
                        <a href="#" style="color: white; border: 2px solid white; padding: 5px;"> Переглянути </a> -->
                          <img src="{{ asset('assets/css/placephoto/img (9).jpg') }}"  tabindex="0" class="lazy">
                          <img src="{{ asset('assets/css/placephoto/img (15).jpg') }}" tabindex="0" class="lazy">
                          <img src="{{ asset('assets/css/placephoto/img (14).jpg') }}" tabindex="0" class="lazy">
                          <img src="{{ asset('assets/css/placephoto/img (4).jpg') }}" tabindex="0" class="lazy">
                          <img src="{{ asset('assets/css/placephoto/img (3).jpg') }}" tabindex="0" class="lazy">
                          <img src="{{ asset('assets/css/placephoto/img (2).jpg') }}" tabindex="0" class="lazy">
                          <img src="{{ asset('assets/css/placephoto/img (5).jpg') }}" tabindex="0"class="lazy">
                          <img src="{{ asset('assets/css/placephoto/img (6).jpg') }}" tabindex="0"class="lazy">
                          <img src="{{ asset('assets/css/placephoto/img (17).jpg') }}" tabindex="0" class="lazy">
                          <img src="{{ asset('assets/css/placephoto/img (18).jpg') }}" tabindex="0" class="lazy">
                          <img src="{{ asset('assets/css/placephoto/img (41).png') }}" tabindex="0"class="lazy">
                    </div>
            </div>

        <br/>
    </div>
