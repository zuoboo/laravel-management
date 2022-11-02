@extends('adminlte::page')

@section('title', '商品詳細')

@section('content_header')
    <h1>顧客詳細</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">氏名</label>
                        <div class="form-control" id="name">
                            {{ $customer->name }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kana">カナ</label>
                        <div class="form-control" id="kana">{{ $customer->kana }}</div>
                    </div>
                    <div class="form-group">
                        <label for="tel">電話番号</label>
                        <div class="form-control" id="tel">
                            {{ $customer->tel }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="postcode">郵便番号</label>
                        <div class="form-control" id="postcode">
                            {{ $customer->postcode }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">住所</label>
                        <div class="form-control" id="address">
                            {{ $customer->address }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender">性別</label>
                        <div class="form-control" id="gender">
                            {{ config("gender.$customer->gender") }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="birthday">生年月日</label>
                        <div class="form-control" id="birthday">
                            {{ $customer->birthday }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="memo">メモ</label>
                        <div class="border rounded pt-2 pb-2 pl-2" id="memo">
                            {{ $customer->memo }}
                        </div>
                    </div>

                </div>
                <div class="card-footer text-right">
                    <button type="submit" onclick="location.href = '/customers'" class="btn btn-primary">戻る</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
