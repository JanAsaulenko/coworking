<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('/assets/css/order-block.css') }}"/>
<script src="{{ asset('/assets/js/View_main.js') }}"></script>
<script src="{{ asset('/assets/js/DataPickerUA.js') }}"></script>

<div class="order">
<div class="sizeof-video">
	<video id="video" loop preload="auto" muted poster="assets/4p.png" autoplay style="position: absolute; right: 0; bottom: 0; min-width: 100%; min-height: 100%; width: auto; height: auto; z-index: -1000;  ">
		<source src="{{ asset('/assets/video/Office.mp4') }}" type="video/webm">
	</video>
</div>


	<form id="first-form" action="reservation" method="POST" name='test'>
		<input type='hidden' name="_token" value="{{csrf_token()}}">
	</form>
		<!-- this is an anchor -->
	<div  class="row" style="padding-top:0">

		<div class="block-on-video">
            <div class="main-titles">
                <h1 >РОБОЧІ ТА НАВЧАЛЬНІ ПРОСТОРИ </h1>
                <h3>З досвідченою командою IT</h3>
            </div>

				{{--<section class="socials">--}}
                    {{--<ul>--}}
                        {{--<li><a target="_blank" href="https://twitter.com" class="icon fa-twitter-square fa-3x"><span class="label">Twitter</span></a>--}}
                        {{--</li>--}}
                        {{--<li><a target="_blank" href="https://www.facebook.com" class="icon fa-facebook-square fa-3x"><span class="label">Facebook</span></a>--}}
                        {{--</li>--}}
                        {{--<li><a target="_blank" href="https://www.linkedin.com/" class="icon fa-linkedin-square fa-3x"><span class="label">Dribbble</span></a>                       <li><a target="_blank" href="https://www.instagram.com" class="icon fa-instagram-square fa-3x"><span class="label">Instagram</span></a></li>--}}
					{{--</li>--}}
						{{--<li><a target="_blank" href="https://www.instagram.com" class="fa fa-instagram fa-3x "><span class="label"></span></a></li>--}}
                        {{--<li><a target="_blank" href="https://plus.google.com" class="icon fa-google-plus-square fa-3x"><span class="label">Google</span></a>--}}
                        {{--</li>--}}
						{{--<li><a target="_blank" href="https://www.youtube.com" class="icon fa-youtube-square fa-3x"><span class="label">Youtube</span></a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</section>--}}
            </div>
	</div>



			<div id="row-3" class="header-btn" style="padding:0; margin:0">
				<div class="row line1">
					<div class="col-offset-2 col-md-12">
						<ul>
			            	<button id="order-btn"><a>ЗАМОВИТИ</a></button>
						</ul>
					</div>
				</div>
				<div class="row line2">
					<div class="4u 12u(medium)">
						<select id="town-select" name="town" form="first-form" required>
							<option></option>
							@foreach($citys as $city)
								<option value="{{$city->id}}">{{$city->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="4u 6u(medium) 12u(small)">
						<input type="text" id="from" class="date-pck" name="fromdate" form="first-form" placeholder="Дата з..." required>
					</div>
					<div class="4u 6u(medium) 12u(small)">
						<input type="text" id="to" class="date-pck" name="todate" form="first-form" placeholder="Дата по..." required>
					</div>
					<div class="8u 12u(medium)">
						<legend>Доступні простори:</legend> <!-- DO NOT FIX/ADD LINES HERE -->
						<select id="place-select" name="place" form="first-form" required>
							<option></option>
						</select>
					</div>
					<div id="num-of-places-selector" class="4u 6u(medium) 12u(small)">
						<legend>Кількість місць:</legend><!-- DO NOT FIX/ADD LINES HERE -->
						<button id="minus-btn">-</button><input id="num-of-places-input" type="text" form="first-form" name="places" value="1" maxlength="2" required><button id="plus-btn">+</button>
					</div>
					<div id="" class="4u 6u(medium) 12u(small)" style="display: none;">
						<legend>Знижка:</legend>
						<select id="discount-selector" form="first-form" name="discount" required>
							@foreach($discountTypes as $discountType)
								<option value="{{$discountType->id}}" @if ($discountType->id == '1') {{'selected'}} @endif>
									{{$discountType->discountname}}
								</option>
							@endforeach
						</select>
					</div>
					<div id="promo-code-div" class="4u$ 4u$(medium) 12u$(small)">
						<legend>Промокод:</legend>
						<input id="promo-code" type="text" name="pr-code" form="first-form" value="" maxlength="8">
					</div>
					<div class="2u text-left">
						<a  href="#" id="order-back-btn" class="button fa-arrow-circle-left"></a>
					</div>
					<div class="2u -8u">
						<input id="first-form-submit" type="submit" name="OK" form="first-form" value="&#xf0a9;">
					</div>
				</div>
			</div>
</div>
