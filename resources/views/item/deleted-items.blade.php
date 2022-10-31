@extends('adminlte::page')

@section('title', '削除商品一覧')

@section('content_header')
    <h1>削除商品一覧</h1>
@stop

@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (session('message'))
            $(function() {
                toastr.success('{{ session('message') }}');
            });
        @endif
    </script>
    <form class="form-inline my-2 my-lg-0">
        <div class="form-group">
            <input type="search" class="form-control mr-sm-2" name="search" value="{{ request('search') }}"
                placeholder="キーワードを入力" aria-label="検索...">
        </div>
        <input type="submit" value="検索" class="btn btn-info">
    </form>

    <div class="row pt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">削除商品一覧</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>種別</th>
                                <th>価格</th>
                                <th>削除日時</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deletedItems as $item)
                                <tr>
                                    <td><a href="{{ route('item.show', ['item' => $item->id]) }}">{{ $item->id }}</a>
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ config("type.$item->type") }}</td>
                                    <td>¥{{ number_format($item->price) }}</td>
                                    <td>{{ $item->deleted_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a method="patch" class="btn btn-outline-primary mr-2" href="{{ route('deleted-items.restore', ['item' => $item->id]) }}">復元する
                                                @csrf
                                            </a>
                                            <form action="{{ route('deleted-items.destroy', ['item' => $item->id]) }}" method="post"
                                                id="delete_{{ $item->id }}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger" onclick="return deletePost(this)"
                                                    data-id="{{ $item->id }}">完全に削除
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-4 pt-4">
                        {{ $deletedItems->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deletePost(e) {
            'use strict';
            return confirm('本当に削除してもいいですか？');
        }
    </script>
@stop

@section('css')
@stop

@section('js')
@stop