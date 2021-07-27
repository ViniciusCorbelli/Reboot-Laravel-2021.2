<?php

namespace App\Http\Controllers;

use App\Produtos;
use App\Categorias;
use App\Http\Requests\ProdutosRequest;
use App\User;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Produtos::class, 'produto');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produtos::all();
        return view('admin.produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produto = new Produtos();
        $categorias = Categorias::all();
        $users = User::all();
        return view('admin.produtos.create', compact('produto', 'categorias', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutosRequest $request)
    {
        $produto = Produtos::create($request->except('categoria_id', 'usuarios_id'));
        $produto->categoria()->associate($request->categoria_id);
        $produto->users()->sync($request->usuarios_id);
        $produto->save();

        return redirect()->route('produtos.index')->with('sucess', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produtos $produto)
    {
        $categorias = Categorias::all();
        $users = User::all();
        return view('admin.produtos.show', compact('produto', 'categorias', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produtos $produto)
    {
        $categorias = Categorias::all();
        $users = User::all();
        return view('admin.produtos.edit', compact('produto', 'categorias', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutosRequest $request, Produtos $produto)
    {
        $produto->update($request->except('categoria_id', 'usuarios_id'));
        $produto->categoria()->associate($request->categoria_id);
        $produto->users()->syncWithoutDetaching($request->usuarios_id);
        $produto->save();
        return redirect()->route('produtos.index')->with('sucess', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produtos $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index')->with('sucess', true);
    }
}
