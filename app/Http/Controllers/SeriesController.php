<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Serie as Serie;
use Illuminate\Http\Request;
use Illuminate\View\ViewServiceProvider;


class SeriesController extends Controller
{

    public function index(Request $request) {

        //var_dump($request->query());
       //echo $request->query(key: 'parametro');
        //echo $request->url();
        //exit();
        $mensagem = $request -> session()->get('mensagem');
      
        $series = Serie:: query()->orderBy('nome')->get();
       

        //return view('series.index', ['series' => $series]);
        
        return view('series.index', compact('series','mensagem'));
    }

    public function create(){
        
        return view('series.create');

    }

    public function store(SeriesFormRequest $request)

    {
        
        $nome = $request->nome;
        
        $serie = Serie::create($request->all());
        $request -> session()->flash('mensagem', "Série {$serie->id} criada com sucesso {$serie->nome}");

        return redirect()->route('listar_series');
        #echo "Seria com id ($serie->id) criada: ($serie->nome)";
        #$serie = new Serie();
        #$serie->nome = $nome;
        #var_dump($serie->save());
    }

    public function destroy(Request $request){
        Serie:: destroy($request->id);

        $request -> session()->flash('mensagem', "Série removida com sucesso");

        return redirect()->route('listar_series');
    }

}