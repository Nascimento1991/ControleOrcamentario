<?php

namespace App\Http\Controllers;

use App\RendaMensal;

use Illuminate\Http\Request;
use App\Http\Requests\RendaMensalRequest;

class RendaMensalController extends Controller
{
    public function index($ano = null, $mes = null){
        return view('controleOrcamentario/rendaMensal.index',['ano'=>$ano, 'mes'=>$mes]);
    }


    public function show($ano, $mes)
    {
        $rendaMensal = RendaMensal::where('ANO_RENDA_MENSAL', $ano)->where('MES_RENDA_MENSAL', $mes)->get()->toArray();
        return response()->json($rendaMensal, 200);
    }

    public function create($ano, $mes, $codrendaMensal = null){
        if(!empty($codrendaMensal)){
            $rendaMensal = RendaMensal::where(['COD_RENDA_MENSAL' => $codrendaMensal])->first()->toArray();
            return view('controleOrcamentario/rendaMensal.add', ['ANO' => $ano, 'MES' => $mes, 'rendaMensal' => $rendaMensal]);
        }
        return view('controleOrcamentario/rendaMensal.add',['ANO' => $ano, 'MES' => $mes , 'COD_RENDA_MENSAL' => $codrendaMensal]);
    }

    public function store(RendaMensalRequest $request){
        // Cria um novo registro com os dados validados
        $data = array_merge($request->validated(), [
            'ANO_RENDA_MENSAL' => $request->input('HDN_ANO_RENDA_MENSAL'),
            'MES_RENDA_MENSAL' => $request->input('HDN_MES_RENDA_MENSAL'),
        ]);

        if(!empty($request->input('HDN_COD_RENDA_MENSAL'))){
            $rendaMensal = RendaMensal::where('COD_RENDA_MENSAL', $request->input('HDN_COD_RENDA_MENSAL'))->first();
            if(!empty($rendaMensal)){
                $rendaMensal->update($data);
                return response()->json(['message' => 'Renda Mensal Atualizada com Sucesso!', 'rendaMensal' => $rendaMensal], 200);
            }
        }
        $rendaMensal = RendaMensal::create($data);

        // Retorna uma resposta de sucesso
        return response()->json(['message' => 'Renda Mensal Criado com Sucesso!', 'rendaMensal' => $rendaMensal], 201);
    }

    public function delete(Request $request){
        $rendaMensal = RendaMensal::where('COD_RENDA_MENSAL', $request->codRendaMensal)->first();
        if($rendaMensal){
            $rendaMensal->delete();
            return response()->json(['message' => 'Renda Mensal Deletada com Sucesso!'], 200);
        }
        return response()->json(['message' => 'Renda Mensal não Encontrada!'], 404);
    }

}
