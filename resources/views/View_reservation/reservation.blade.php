<div id="banner-wrapper">
    <form id="banner" class="form">
        <div class="form__select-block form__select-block-first">
            <select class="city-select" required>
                <option class="selected" selected="selected" disabled>Оберiть мiсто...</option>
                @foreach($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form__select-block">
            <select class="place-select" required>
                <option selected="selected" disabled>Оберiть мiсце</option>
            </select>
        </div>
        <div class="form__select-block">
            <select class="space-select" required>
                <option selected="selected" disabled>Оберiть простiр</option>
            </select>
        </div>
        <div class="select-block__datapicker-block">
            <div class="datapicker-block">
                <div class="date-pck fromdate" form="second-form" required></div>
                <input class="turn from">
            </div>
            <div class="datapicker-block">
                <div class="date-pck todate" form="second-form" required></div>
                <input class="turn to">
            </div>
        </div>
        <div class="datepicker__error-block">

        </div>
        <div class="seats-block_buttons">

        </div>
        {{--place were seats will be rendered--}}
        <div class="seats-block">

        </div>
        <a  class="button-next"><img  name="sea_room" src={{asset('images/section2/btn-choose.png')}}> </a>
        {{--<button type="button" class="form_button-next">Далі</button>--}}
    </form>

    {{--import block into  another layout  --}}
    <div class="block_with_form">
        <div class="block_with_form-users_info">
            <span class="form__title">Контактнi даннi</span>
            <form class="form-reserve">
                <input type="text" class="input" name="name" placeholder="Iмя">
                <input type="email" class="input" name="email" placeholder="email">
                <input type="text" class="input" name="telephone" placeholder="телефон">
                <button class="form__button" type="button">Замовити</button>
            </form>
        </div>
        <div class="block_with_form-db_info">
            <span class="form__title">Обранi мiсця</span>
            <div class="sum"></div>
        </div>
    </div>
</div>


