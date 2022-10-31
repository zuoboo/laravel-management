<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index(Request $request)
    {
        $items = Item::SearchItems($request->search)->select()->paginate(5);
        // 商品一覧取得
        // $items = Item
        //     ::where('items.status', 'active',)
        //     ->select()
        //     ->paginate(10);

        return view('item.index', compact('items'));

    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $request->detail,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }

    public function store(StoreItemRequest $request)
    {
        Item::create([
            'name' => $request->name,
            'type' => $request->type,
            'detail' => $request->detail,
        ]);

        return to_route('item.index');
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        // dd($item);
        // $updateData = $request->validated();
        return view('item.edit', compact('item'));

    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->name = $request->name;
        $item->type = $request->type;
        $item->detail = $request->detail;
        $item->save();

        return redirect()
        ->route('item.index')
        ->with('message', '商品情報を更新しました');
    }

    public function show(Item $item) {
        // dd($item);
        return view('item.show', compact('item'));

    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()
        ->route('item.index')
        ->with('message', '商品情報を削除しました');
    }

    public function deletedItemIndex(){
        $deletedItems = Item::onlyTrashed()->paginate(5);
        return view('item.deleted-items', compact('deletedItems'));
    }
    public function deletedItemDestroy($id){
        Item::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('deleted-items.index')->with('message', '削除しました');
    }
    public function deletedItemRestore($id){

        Item::onlyTrashed()->findOrFail($id)->restore();
        $item = Item::findOrFail($id);
        return redirect()->route('item.index')->with('message', $item->name.'を復元しました。');
    }
}
