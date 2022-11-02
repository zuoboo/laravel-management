@extends('adminlte::page')

@section('title', '顧客登録')

@section('content_header')
    <h1>顧客登録</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card card-primary">
                <form method="POST" action="{{ route('customers.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">氏名</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="kana">カナ</label>
                            <input type="text" class="form-control" id="kana" name="kana" value="{{ old('kana') }}">
                        </div>
                        <div class="form-group">
                            <label for="tel">電話番号</label>
                            <input type="tel" class="form-control" id="tel" name="tel" value="{{ old('tel') }}">
                        </div>
                        <div class="form-group">
                            <label for="email">メールアドレス</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="postcode">郵便番号</label>
                            <input type="number" class="form-control" id="postcode" name="postcode" value="{{ old('postcode') }}">
                        </div>
                        <div class="form-group">
                            <label for="address">住所</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                        </div>
                        <div class="form-group">
                            <label class="mr-4">性別</label>
                            <input type="radio" id="gender0" name="gender" value="0">
                            <label for="gender0" class="ml-2 mr-4">男性</label>
                            <input type="radio" id="gender1" name="gender" value="1">
                            <label for="gender1" class="ml-2 mr-4">女性</label>
                            <input type="radio" id="gender2" name="gender" value="2">
                            <label for="gender2" class="ml-2 mr-4">その他</label>
                        </div>
                        <div class="form-group">
                            <label for="birthday">生年月日</label>
                            <input type="date" class="form-control" id="birthday" name="birthday" value="{{ old('birthday') }}">
                        </div>
                        <div class="form-group">
                            <label for="memo">メモ</label>
                            <textarea class="form-control" id="memo" name="memo" value="{{ old('memo') }}"></textarea>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
