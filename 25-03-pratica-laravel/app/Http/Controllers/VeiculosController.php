<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculosController extends Controller
{
    public function showAll()
    {
        $lista = Veiculo::all();

        return view('veiculos.list',  ['lista' => $lista]);
    }
    public function compose(){
        return view('veiculos.compose');

    }
    public function store(Request $request){
        Veiculo::create([
            'fabricante' => $request->fabricante,
            'modelo' => $request->modelo,
            'cavalos' => $request->cavalos,
        ]);
       // return $this-> showAll();
       return redirect('/veiculos');
    }

    public function edit(Request $request){
        $veiculos = Veiculo::find($request -> id);
        return view('veiculos.compose',['veiculo' => $veiculos]);
    }
    public function update(Request $request){
        $veiculos = Veiculo::find($request -> id);
        $veiculos->fabricante = $request->fabricante;
        $veiculos->modelo = $request->modelo;
        $veiculos->cavalos = $request->cavalos;
        $veiculos->save();
        //return $this-> showAll();
        return redirect('/veiculos');
    }

    public function delete(Request $request){
        $veiculos = Veiculo::find($request -> id);
        $veiculos->delete();
        //return $this-> showAll();
        return redirect('/veiculos');
    }
}
