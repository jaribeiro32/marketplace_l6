<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;

class StoreController extends Controller
{
    public function index()
    {
//        $stores = \App\Store::paginate(10);
        $store = auth()->user()->store;
        return view('admin.stores.index', compact('store'));
    }

    public function create()
    {
        if (auth()->user()->store->count()) {
            flash('O usuário logado já possui uma loja')->warning();
            return redirect()->route('admin.stores.index');
        }

        $users = \App\User::all(['id', 'name']);
        return view('admin.stores.create', compact('users'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->all();
        $user = auth()->user();
        // $user = \App\User::find($data['user']);
        $store = $user->store()->create($data);

        flash('Loja criada com sucesso!')->success();
        return redirect()->route('admin.stores.index');
    }

    public function edit($store)
    {
        $store = \App\Store::find($store);

        return view('admin.stores.edit', compact('store'));
    }

    public function update(StoreRequest $request, $store)
    {
        $data = $request->all();

        $store = \App\Store::find($store);
        $store->update($data);

        flash('Loja atualizada com sucesso!')->success();
        return redirect()->route('admin.stores.index');
    }

    public function destroy($store)
    {
        $store = \App\Store::find($store);
        $store->delete();

        flash('Loja removida com sucesso!')->success();
        return redirect()->route('admin.stores.index');
    }
}
