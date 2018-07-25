<div class="container">
    <div class="col-md-12" >
        <div class="panel-group row">
            @foreach($prices as $price)
                <div class="rate-panel col-md-3">
                    <div class="panel-primary">
                        <div class="panel-heading">
                            {{ $price->duration }}
                        </div>
                        <div class="panel-body">
                            {{ $price->amount }} грн.
                        </div>
                        <div class="panel-footer">
                            <ul>
                                <li><span class="glyphicon glyphicon-ok" style="color: #337ab7;"></span> Доступ до усіх функцій</li>
                                <li><span class="glyphicon glyphicon-ok" style="color: #337ab7;"></span> Підтримка chat/on-line</li>
                                <li><span class="glyphicon glyphicon-ok" style="color: #337ab7;"></span> Безпечний доступ</li>
                            </ul>
                        </div>
                        <button class="btn-success" onclick="goToOrder()"><a href="/#order-form" class="order-btn">ЗАМОВИТИ</a></button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

