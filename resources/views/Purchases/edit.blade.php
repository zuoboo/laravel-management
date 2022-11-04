@extends('adminlte::page')

@section('title', '購買履歴 編集')

@section('content_header')
    <h1>購買履歴 編集</h1>
@stop

@section('content')
    <script src={{ asset('js/common.js') }}></script>

    <body>
        <form method="post" action="{{ route('purchases.update', ['purchase' => $order[0]->id]) }}">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="date">日付</label>
                                <input disabled class="form-control" id="date" name="date"
                                    value="{{ $order[0]->created_at }}">
                            </div>
                            <div class="form-group">
                                <label for="customer_name">顧客名</label>
                                <input disabled class="form-control" type="text" id="customer" name="customer"
                                    value="{{ $order[0]->customer_name }}">
                            </div>
                            <div class="card-body table-responsive p-0">
                                <label for="items">商品</label>
                                <table class="table table-hover text-nowrap table-striped">
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
                                        @foreach ($items as $key => $value)
                                            <tr>
                                                <td>{{ $value['id'] }}
                                                    <input type="hidden" name="items[]" value="{{ $value['id'] }}">
                                                </td>
                                                <td>{{ $value['name'] }}</td>
                                                <td>¥{{ number_format($value['price']) }}
                                                    <input class="count_price" type="hidden" id="price{{ $loop->index }}"
                                                        value="{{ $value['price'] }}" data-price="{{ $loop->index }}">
                                                </td>
                                                <td>
                                                    <select name="quantity[]" id="quantity{{ $loop->index }}"
                                                        data-number="{{ $loop->index }}"
                                                        onchange="keisan({{ $loop->index }})">
                                                        @for ($i = 0; $i < 10; $i++)
                                                            <option value="{{ $i }}"
                                                                {{ $value['quantity'] == $i ? 'selected' : '' }}>
                                                                {{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </td>
                                                <td>
                                                    <input disabled type="text" id="field{{ $loop->index }}"
                                                        name="field{{ $value['id'] }}"
                                                        value="{{ $value['price'] * $value['quantity'] }}">円
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group">
                                <label for="status">ステータス</label><br>
                                <input type="radio" id="status1" name="status" value="1"
                                    {{ $order[0]->status == 1 ? 'checked' : '' }}>
                                <label class="font-weight-normal" for="status1">未キャンセル</label>
                                <input class="ml-2" type="radio" id="status0" name="status" value="0"
                                    {{ $order[0]->status == 0 ? 'checked' : '' }}>
                                <label class="font-weight-normal" for="status0">キャンセルする</label>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <label for="sum">合計</label>
                            <input disabled type="text" name="field_total" id="sum_total_price">円
                            <button type="submit" class="ml-4 btn btn-primary">更新</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>


@stop

@section('css')
@stop

@section('js')
@stop
