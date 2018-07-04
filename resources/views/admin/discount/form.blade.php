{!! csrf_field() !!}

{{--<div class="form-group">--}}
{{--<label class="control-label col-md-4 col-sm-3 col-xs-12">Кількість промокодів </label>--}}
{{--<div class="col-md-5 col-sm-5 col-xs-12">--}}
{{--<input type="text" id="count" name="count" size="3" value="10" class="form-control"--}}
{{--placeholder="Кількість промокодів">--}}
{{--</div>--}}
{{--</div>--}}
<div class="form-group">
    <label class="control-label col-md-4 col-sm-3 col-xs-12">Розмір знижки (у відсотках) </label>
    <div class="col-md-5 col-sm-5 col-xs-12">
        <input type="number" min="0" max="100" step="1" name="amount" id="amount"
               class="form-control" value="{{$amount}}">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-4 col-sm-3 col-xs-12">Термін дії (днів) </label>{{--Количество дней на которые можно получить скидку--}}
        <div class="col-md-5 col-sm-5 col-xs-12">
            <input type="number" min="1" max="365" step="1" name="days_covered" id="amount"
                class="form-control" placeholder="1">
        </div>
</div>
<div class="form-group">
    <label class="control-label col-md-4 col-sm-3 col-xs-12"> </label>
    <div class="col-md-5 col-sm-5 col-xs-12">
        <div class="checkbox no-padding">
            <label class="no-padding">
                <input type="checkbox" class="flat" checked="checked" name="one_time_only"
                       value="1"> Одноразовий
            </label>
            <label>
                <input type="checkbox" class="flat" checked="checked" name="is_valid" value="1">
                Дійсний
            </label>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-4 col-sm-3 col-xs-12">Дiйсний до: </label>
    <div class="col-md-5 col-sm-5 col-xs-12">
        <input class="date-picker form-control col-md-7 col-xs-12" name="valid_till_date"
               id="valid-date" required="required" type="datetime-local" min="{{$min}}"
               value="{{$valid_till_date}}">
    </div>
</div>
<script></script>
<div class="ln_solid"></div>
<div class="form-group">
    <div class="col-md-5 col-sm-5 col-xs-12 col-md-offset-4">
        <a href="{{route('discount.index')}}" class="btn btn-warning">Відміна</a>
        <button class="btn btn-primary disabled" type="reset">Очистити</button>
        <button type="submit" class="btn btn-success ">Готово</button>
    </div>
</div>
