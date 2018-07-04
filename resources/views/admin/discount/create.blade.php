@extends('layouts.admin_main')
@section('content')
    <meta name="_token" content="{!! csrf_token() !!}"/>
    @if(Session::has('flash_message'))
        <div class="alert alert-success" style="text-align: center;">
            {{ Session::get('flash_message') }}
        </div>
    @endif
    <div class="col-md-offset-2 col-md-8 col-sm-10 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Промо-код
                    <small>форма для створення промо-кодів</small>
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown disabled">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br/>
                <form action="{{ route('discount.store') }}" method="POST"
                      class="form-horizontal form-label-left input_mask">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Кількість промокодів </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <input type="number" id="count" name="count" min="0" value="10" class="form-control"
                                   placeholder="Кількість промокодів" required>
                        </div>
                    </div>
                    @include('admin.discount.form')
                </form>
            </div>
        </div>
    </div>
@endsection