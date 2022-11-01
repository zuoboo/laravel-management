@extends('adminlte::page')

@section('title', '購入画面')

@section('content_header')
    <h1>購入画面</h1>
@stop

@section('content')
    <script src={{ asset('js/common.js') }}></script>

    <body>
        <form method="POST" action="{{ route('purchases.store') }}">
            @csrf
            日付<br>
            <input type="date" id="today"><br>
            会員名<br>
            <select name="customer_id">
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->id }} : {{ $customer->name }}</option>
                @endforeach
            </select><br>
            商品<br>
            <div class="card-body table-responsive p-0">
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
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->id }}
                                <input type="hidden" name="items[]" value="{{ $item->id }}"></td>
                                <td>{{ $item->name }}</td>
                                <td>¥{{ number_format($item->price) }}
                                    <input class="count_price" type="hidden" id="price{{ $loop->index }}"
                                        value="{{ $item->price }}" data-price="{{ $loop->index }}">
                                </td>
                                <td>
                                    <select name="quantity[]" id="quantity{{ $loop->index }}"
                                        data-number="{{ $loop->index }}" onchange="keisan({{ $loop->index }})">
                                        @for ($i = 0; $i < 10; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                    </select>
                                </td>
                                <td>
                                    <input type="text" id="field{{ $loop->index }}" name="field{{ $item->id }}"
                                        value="0">円
                                </td>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row mt-4">
                合計
                <input type="text" name="field_total" id="sum_total_price">円
                <button type="submit" class="ml-4 btn btn-primary">登録</button>
            </div>
        </form>
    </body>


@stop

@section('css')
@stop

@section('js')
@stop
