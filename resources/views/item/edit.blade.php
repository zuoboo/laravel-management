@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>商品編集</h1>
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
                <form method="post" action="{{ route('item.update', ['item' => $item->id]) }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">名前</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}"
                            placeholder="名前">
                    </div>

                    <div class="form-group">
                        <label for="type">種別</label><br>
                        <select name="type">
                            @foreach (config('type') as $item_id => $status)
                                <option value="{{ $item_id }}" >{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">価格</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ $item->price }}">
                    </div>

                    <div class="form-group">
                        <label for="detail">詳細</label>
                        <textarea class="form-control" id="detail" name="detail" value="{{ $item->detail }}">{{ $item->detail }}</textarea>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">更新</button>
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
