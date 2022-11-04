@extends('adminlte::page')

@section('title', '購買履歴 詳細')

@section('content_header')
    <h1>購買履歴 詳細</h1>
@stop

@section('content')
    <script src={{ asset('js/common.js') }}></script>

    <body>
        <div class="row pt-2">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="date">日付</label>
                            <div class="form-control" id="date">
                                {{ $order[0]->created_at }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="customer_name">顧客名</label>
                            <div class="form-control" id="customer_name">
                                {{ $order[0]->customer_name }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <label for="item">商品</label>
                        <table class="table table-hover table text-nowrap table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>名前</th>
                                    <th>価格</th>
                                    <th>数量</th>
                                    <th>小計</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->item_id }}</td>
                                        <td>{{ $item->item_name }}</td>
                                        <td>¥{{ number_format($item->item_price) }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>¥{{ number_format($item->subtotal) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="total">合計</label>
                            <div class="form-control" id="total">
                                ¥{{ number_format($order[0]->total) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status">ステータス</label>
                            @if ($order[0]->status == true)
                                <div class="form-control" id="status">
                                    未キャンセル
                                </div>
                            @else
                                <div class="form-control" id="status">
                                    キャンセル済
                                </div>
                            @endif
                        </div>

                        @if ($order[0]->status == false)
                            <div class="form-group">
                                <label for="cancel">キャンセル日</label>
                                {{-- <div class="form-control" id="cancel"> --}}
                                <div class="form-control" id="status">
                                    {{ $order[0]->updated_at }}
                                </div>
                            </div>
                        @endif
                    </div>
                    @if ($order[0]->status == true)
                        <div class="card-footer text-right">
                            <a class="btn btn-primary"
                                href="{{ route('purchases.edit', ['purchase' => $order[0]->id]) }}">編集</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </body>


@stop

@section('css')
@stop

@section('js')
@stop
