<?php

namespace App\Http\Controllers;

use App\Models\Loja;
use Illuminate\Http\Request;

class LojasController extends Controller
{
    public function showAll()
    {
        $lista = Loja::all();

        return view('lojas.list',  ['lista' => $lista]);
    }
    public function compose(){
        return view('lojas.compose');
    }
    public function store(Request $request){
        Loja::create([
            'fabricante' => $request->fabricante,
            'modelo' => $request->modelo,
            'marca' => $request->marca,
            'ano' => $request->ano,
            'quantidade' => $request->quantidade
        ]);
       // return $this-> showAll();
       return redirect('/lojas');
    }

    public function edit(Request $request){
        $loja = Loja::find($request -> id);
        return view('lojas.compose',['loja' => $loja]);
    }
    public function update(Request $request){
        $loja = Loja::find($request -> id);
        $loja->fabricante = $request->fabricante;
        $loja->modelo = $request->modelo;
        $loja->marca = $request->marca;
        $loja->ano = $request->ano;
        $loja->quantidade = $request->quantidade;
        $loja->save();
        //return $this-> showAll();
        return redirect('/lojas');
    }

    public function delete(Request $request){
        $loja = Loja::find($request -> id);
        $loja->delete();
        //return $this-> showAll();
        return redirect('/lojas');
    }
}
