<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Models\Purchase;
use App\Models\Customer;
use App\Models\Item;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Order::paginate(50));
        $orders = Order::groupBy('id')
            ->selectRaw('id, customer_name, sum(subtotal) as total, status, created_at')
            ->paginate(50);

        return view('purchases.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::select('id', 'name', 'kana')->get();
        $items = Item::select('id', 'name', 'price')->get();

        return view('purchases.create', compact('customers', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePurchaseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePurchaseRequest $request)
    {
        DB::beginTransaction();

        try {
            $items = $request->items;
            $quantity = $request->quantity;
            $purchase = Purchase::create([
                'customer_id' => $request->customer_id,
                'status' => true,
            ]);
            foreach ($quantity as $key => $value) {
                if ($quantity[$key] > 0) {
                    $purchase->items()->attach($items[$key], ['quantity' => $quantity[$key]]);
                }
            }
            DB::commit();

            return redirect()->route('home')->with('message', '購入情報を登録しました。');

        } catch (\Exception $e) {
            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        $items = Order::where('id', $purchase->id)->get(); //小計
        $order = Order::groupBy('id') // 合計
            ->where('id', $purchase->id)
            ->selectRaw('id, customer_name, sum(subtotal) as total, status, created_at, updated_at')
            ->get();

        return view('purchases.show', compact('items', 'order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        $purchase = Purchase::find($purchase->id);
        $allItems = Item::select('id', 'name', 'price')->get();
        $items = [];

        foreach ($allItems as $allItem) {
            $quantity = 0;
            foreach ($purchase->items as $item) {
                if ($allItem->id === $item->id) {
                    $quantity = $item->pivot->quantity;
                }
            }

            array_push($items, [
                'id' => $allItem->id,
                'name' => $allItem->name,
                'price' => $allItem->price,
                'quantity' => $quantity,
            ]);
        }
        // dd($items);
        $count = count($items);
        $order = Order::groupBy('id')
            ->where('id', $purchase->id)
            ->selectRaw('id, customer_name, customer_id, status, created_at, updated_at')
            ->get();


        return view('purchases.edit', compact('items', 'order', 'count'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePurchaseRequest  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePurchaseRequest $request, Purchase $purchase)
    {
        // dd($request, $purchase);
        DB::beginTransaction();

        try {
            $purchase->status = $request->status;
            $purchase->save();
            $quantity = $request->quantity;
            $items = $request->items;

            $a = [];
            foreach ($quantity as $key => $value) {
                if ($quantity[$key] > 0) {
                    $a = $a + [$items[$key] => ['quantity' => $quantity[$key]]];
                }
            }
            $purchase->items()->sync($a);

            DB::commit();
            return redirect()->route('home')->with('message', '購買履歴を更新しました。');

        } catch (\Exception $e) {
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
