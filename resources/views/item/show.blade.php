@extends('adminlte::page')

@section('title', '商品詳細')

@section('content_header')
    <h1>商品詳細</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">名前</label>
                        <div class="form-control" id="name">
                            {{ $item->name }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type">種別</label>
                        <div class="form-control" id="type">{{ config("type.$item->type") }}</div>
                    </div>
                    <div class="form-group">
                        <label for="price">価格</label>
                        <div class="form-control" id="price">
                            {{ $item->price }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="detail">詳細</label>
                        <div class="border rounded pt-2 pb-2 pl-2" id="detail">
                            {!! nl2br($item->detail) !!}
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" onclick="location.href = '/items'" class="btn btn-primary">戻る</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
