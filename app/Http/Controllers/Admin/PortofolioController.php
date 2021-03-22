<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Portofolio::all();
        return view ('backend.pages.portofolio.data',[
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
        return view('backend.pages.portofolio.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();

        $data['slug'] = Str::slug($request->name);
        $data['image'] = $request->file('image')->store('assets/portofolio', 'public');

        Portofolio::create($data);
        return redirect()->route('portofolio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Portofolio::findOrFail($id);
        // dd($transaction);exit;
        return view('backend.pages.portofolio.delete',
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
        $item = Portofolio::findOrFail($id);
        return view('backend.pages.portofolio.edit',[
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        if ($request->file('image')) 
        {
            $data['image'] = $request->file('image')->store('assets/portofolio', 'public');    
        }

        $item = Portofolio::findOrFail($id);
        // Storage::disk('local')->delete('assets/category'.$item->image);
        $item->update($data);

        return redirect()->route('portofolio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Portofolio::findorFail($id);
        $item->delete();

        return redirect()->route('portofolio.index');
    }
}
