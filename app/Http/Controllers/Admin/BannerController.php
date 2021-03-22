<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Banner::all();
        return view('backend.pages.banner.data',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Banner::all();
        $status = [
            'utama' => 'utama',
            'promosi' => 'promosi',
            'produk' => 'produk',
        ];
        return view('backend.pages.banner.add',[
            'items' => $items,
            'status' => $status
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $data=$request->all();

        $data['slug'] = Str::slug($request->name);
        $data['banner_image'] = $request->file('banner_image')->store('assets/banner', 'public');

        Banner::create($data);
        return redirect()->route('banner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Banner::findOrFail($id);
        // dd($transaction);exit;
        return view('backend.pages.banner.delete',
        [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Banner::findOrFail($id);
        $status = [
            'utama' => 'utama',
            'promosi' => 'promosi',
            'produk' => 'produk',
        ];
        return view('backend.pages.banner.edit',[
            'item' => $item,
            'status' => $status,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, $id)
    {
        $data = $request->all();

        if ($request->file('banner_image')) 
        {
            $data['banner_image'] = $request->file('banner_image')->store('assets/banner', 'public');    
        }

        $item = Banner::findOrFail($id);
        // Storage::disk('local')->delete('assets/category'.$item->image);
        $item->update($data);

        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Banner::findorFail($id);
        $item->delete();

        return redirect()->route('banner.index');
    }

    
}
