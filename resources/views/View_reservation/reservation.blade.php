<div id="banner-wrapper">
    <form id="banner" class="form">
        <div class="form__select-block form__select-block-first">
            {{--<label>Мiсто</label>--}}
            <select class="city-select" required>
                <option class="selected" selected="selected" disabled>Оберiть мiсто...</option>
                @foreach($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form__select-block">
            <label>Мiсце</label>
            <select class="place-select" required>
                <option selected="selected" disabled>Оберiть мiсце</option>
            </select>
        </div>
        <div class="form__select-block">
            <label>Простiр</label>
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
        {{--place were seats will be rendered--}}
        <div class="seats-block">
            <div class="seats-block_buttons">

            </div>
        </div>
    </form>

    <div class="block_with_form">
        <div class="block_with_form__nav">
            <button class="nav_button nav_button-hide">—</button>
            <button class="nav_button nav_button-close">X</button>
        </div>
        <div class="form__title">Контактнi даннi</div>
        <form class="form-reserve">
            <input type="text" class="input" name="name" placeholder="Iмя">
            <input type="email" class="input" name="email" placeholder="email">
            <input type="text" class="input" name="telephone" placeholder="телефон">
            <button class="form__button" type="button">Замовити</button>
        </form>
        <span class="sum">CУМА</span>
        <span class="form__title">Обранi мiсця</span>
        <div class="result">

        </div>

    </div>


    {{--<div class="result">--}}

    {{--</div>--}}
</div>


