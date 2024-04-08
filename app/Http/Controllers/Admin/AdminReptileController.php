<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreReptileRequest;
use App\Http\Requests\Admin\UpdateReptileRequest;
use App\Models\Reptile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminReptileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // 爬虫類一覧画面
    public function index()
    {
        //
        $reptiles = Reptile::all();
        return view('admin.reptiles.index',['reptiles' => $reptiles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // 爬虫類登録画面
    public function create()
    {
        //
        return view('admin.reptiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // 爬虫類登録処理
    public function store(StoreReptileRequest $request)
    {
        //
        $savedImagePath = $request->file('image')->store('reptiles','public');
        $reptile = new Reptile($request->validated());
        $reptile->image = $savedImagePath;
        $reptile->save();

        return to_route('admin.reptiles.index')->with('success','新規登録完了');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    //指定した爬虫類の編集
    public function edit(string $id)
    {
        //
        $reptile = Reptile::findOrFail($id);
        return view('admin.reptiles.edit',['reptile' => $reptile]);
    }

    /**
     * Update the specified resource in storage.
     */
    //編集更新処理
    public function update(UpdateReptileRequest $request, string $id)
    {
        //
        $reptile = Reptile::findOrFail($id);
        $updateData = $request->validated();

        //画像を変更する場合
        if ($request->has('image')) {
            //　変更前の画像を削除
            Storage::disk('public')->delete($reptile->image);
            //変更後の画像をアップロード、保存パスを更新対象データにセット
            $updateData['image'] = $request->file('image')->store('reptiles','public');
        }
        
        $reptile->update($updateData);
        
        return to_route('admin.reptiles.index',['reptile' => $reptile])->with('success','更新完了');


    }

    /**
     * Remove the specified resource from storage.
     */
    //削除
    public function destroy(string $id)
    {
        //
        $reptile = Reptile::findOrFail($id);
        $reptile->delete();
        Storage::disk('public')->delete($reptile->image);

        return to_route('admin.reptiles.index')->with('success','削除しました');
    }
}
