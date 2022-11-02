@extends('adminlte::page')

@section('title', '顧客一覧')

@section('content_header')
    <h1>顧客一覧</h1>
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('customers/create') }}" class="btn btn-success">顧客登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>氏名</th>
                                <th>カナ</th>
                                <th>電話番号</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td><a href="{{ route('customers.show', ['customer' => $customer->id]) }}">{{ $customer->id }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->kana }}</td>
                                    <td>{{ $customer->tel }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-4 pt-4 card-footer">
                        {{ $customers->links() }}
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
