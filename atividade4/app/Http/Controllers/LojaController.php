<?php

namespace App\Http\Controllers;

use App\Models\Loja;
use Illuminate\Http\Request;

class LojaController extends Controller
{
    public function showAll()
    {
        $lista = Loja::all();

        return view('loja.list',  ['lista' => $lista]);
    }
    public function compose(){
        return view('loja.compose');

    }
    public function store(Request $request){
        Loja::create([
            'fabricante' => $request->fabricante,  
            'marca' => $request->marca,
            'produto' => $request->produto,
            'cor' => $request->cor,
            'tamanho' => $request->tamanho,
        ]);
       // return $this-> showAll();
       return redirect('/loja');
    }

    public function edit(Request $request){
        $loja = Loja::find($request -> id);
        return view('loja.compose',['veiculo' => $loja]);
    }
    public function update(Request $request){
        $loja = Loja::find($request -> id);
        $loja->fabricante = $request->fabricante;
        $loja->marca = $request->marca;
        $loja->produto = $request->produto;
        $loja->cor = $request->cor;
        $loja->tamanho = $request->tamanho;        
        $loja->save();
        //return $this-> showAll();
        return redirect('/loja');
    }

    public function delete(Request $request){
        $loja = Loja::find($request -> id);
        $loja->delete();
        //return $this-> showAll();
        return redirect('/loja');
    }
}
