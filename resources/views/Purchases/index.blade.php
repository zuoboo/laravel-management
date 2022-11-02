@extends('adminlte::page')

@section('title', '顧客購買履歴')

@section('content_header')
    <h1>顧客購買履歴</h1>
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

    <div class="row pt-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>氏名</th>
                                <th>合計金額</th>
                                <th>ステータス</th>
                                <th>購入日</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>
                                        <a href="{{ route('purchases.show', ['purchase' => $order->id]) }}">{{ $order->id }}</a>
                                    </td>
                                    <td>{{ $order->customer_name }}</td>
                                    <td>¥{{ number_format($order->total) }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ $order->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-4 pt-4 card-footer">
                        {{ $orders->links() }}
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
