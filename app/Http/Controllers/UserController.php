<?php

namespace App\Http\Controllers;

use App\Http\Requests\userRequest;
use App\User;
use App\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct() {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $produtos = Produtos::all();
        return view('admin.users.create', compact('user', 'produtos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->except('produtos_id', 'adm');
        $data['password'] = bcrypt($data['password']);

        if (Auth::user()->adm == true) {
            $data['adm'] = $request->adm == "on" ? true : false;
        }

        $user = User::create($data);
        $user->produtos()->syncWithoutDetaching([1 => ['nota' => 5]]);
        $user->save();

        return redirect()->route('users.index')->with('sucess', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $produtos = Produtos::all();
        return view('admin.users.show', compact('user', 'produtos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $produtos = Produtos::all();
        return view('admin.users.edit', compact('user', 'produtos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->except('produtos_id', 'adm');
        $data['password'] = bcrypt($data['password']);
       
        if (Auth::user()->adm) {
            $data['adm'] = $request->adm == "on" ? true : false;
        }

        $user->update($data);
        $user->produtos()->syncWithoutDetaching($request->produtos_id);
        $user->save();

        return redirect()->route('users.index')->with('sucess', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('sucess', true);
    }
}
