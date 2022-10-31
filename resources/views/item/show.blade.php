@extends('adminlte::page')

@section('title', '商品詳細')

@section('content_header')
    <h1>商品詳細</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
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
                {{-- <form method="POST"> --}}
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">名前</label>
                            <div  class="form-control" id="name">
                                {{ $item->name }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="type">種別</label>
                            {{-- <input type="number" class="form-control" id="type" name="type" placeholder="1, 2, 3, ..."> --}}
                            {{-- @foreach (config('type') as $item_id => $status) --}}
                            <div class="form-control" id="type">{{ config("type.$item->type") }}</div>
                            {{-- @endforeach --}}
                        </div>
                        <div class="form-group">
                            <label for="price">価格</label>
                            <div  class="form-control" id="price">
                                {{ $item->price }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <div class="border rounded pt-2 pb-2 pl-2" id="name">
                                {!! nl2br($item->detail) !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" onclick="location.href = '/items'" class="btn btn-primary">戻る</button>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
