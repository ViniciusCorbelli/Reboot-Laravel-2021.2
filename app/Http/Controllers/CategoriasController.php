<?php

namespace App\Http\Controllers;

use App\Categorias;
use App\Produtos;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categorias::all();
        return view('admin.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = new Categorias();
        $produtos = Produtos::all();
        return view('admin.categorias.create', compact('categoria', 'produtos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = Categorias::create($request->except('produtos_id'));
        //$categoria->produtos()->sync($request->produtos_id);
        //$categoria->save();
        return redirect()->route('categorias.index')->with('sucess', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Categorias $categoria)
    {
        return view('admin.categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorias $categoria)
    {
        $produtos = Produtos::all();
        return view('admin.categorias.edit', compact('categoria', 'produtos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorias $categoria)
    {
        $categoria->update($request->except('produtos_id'));
        //$categoria->produtos()->sync($request->produtos_id);
       // $categoria->save();

        return redirect()->route('categorias.index')->with('sucess', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorias $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('sucess', true);
    }
}
