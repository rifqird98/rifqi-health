<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Category;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = Artikel::with('category')->paginate(10);
        $i = 1;
        return view('pages.Artikel.index', compact('data','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::all();
        return view('pages.artikel.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['foto'] = $request->file('foto')->store('artikel/foto', 'public');
        Artikel::create($data);
        return redirect()->route('artikel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $Artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $Artikel)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $Artikel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Artikel::with('category')->findOrFail($id);
        $category = Category::all();
        return view('pages.artikel.edit',compact('data','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $Artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['foto'] = $request->file('foto')->store('artikel/foto', 'public');
        $item = Artikel::findOrFail($id);
        $item->update($data);

        return redirect()->route('artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $Artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= Artikel::findOrFail($id);
        $data->delete();

        return redirect()->route('artikel.index');
    }
}
