<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="order">
    <div class="sizeof-video">
        <video id="video" loop preload="auto" muted autoplay
               style="position: absolute; right: 0; bottom: 0; min-width: 100%; min-height: 100%; width: auto; height: auto; z-index: -1000;  ">
            <source src="{{ asset('video/Office.mp4') }}" type="video/webm">
        </video>
        <div class="block-on-video">
            <div class="main-titles">
             Робочі та навчальні простори
                <div class="title-inblock"> Створеннні на эвропейському досвіді</div>
            </div>
        </div>

        <div class="block">
            <div class="block-with-button">
                <div class="col-offset-2 col-md-12">
                    <button type="submit" name="OK" form="first-form" id="order-btn">ЗАМОВИТИ</button>
                </div>
            </div>
        </div>
    </div>
    <div class="order-link">
    <img class="link" src="{{ asset('images/main/link.png') }}">
    </div>
</div>
<form id="first-form" action="reservation" method="POST" name='test'>
    <input type='hidden' name="_token" value="{{csrf_token()}}">
</form>

