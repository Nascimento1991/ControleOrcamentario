<?php

namespace App\Http\Controllers;

use App\DespesaMensal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DespesaMensalRequest;

class DespesaMensalController extends Controller
{
    public function index($ano = null, $mes = null){
        return view('ControleOrcamentario/DespesaMensal.index',['ano' => $ano, 'mes' => $mes]);
    }

    public function show($ano, $mes)
    {
        $despesaMensal = DespesaMensal::where('ANO_DESPESA_MENSAL', $ano)->where('MES_DESPESA_MENSAL', $mes)->get()->toArray();
        return response()->json($despesaMensal, 200);
    }

    public function create($ano, $mes, $coddespesaMensal = null){
        if(!empty($coddespesaMensal)){
            $despesaMensal = DespesaMensal::where(['COD_DESPESA_MENSAL' => $coddespesaMensal])->first()->toArray();
            return view('controleOrcamentario/despesaMensal.add', ['ANO' => $ano, 'MES' => $mes, 'despesaMensal' => $despesaMensal]);
        }
        return view('controleOrcamentario/despesaMensal.add',['ANO' => $ano, 'MES' => $mes , 'COD_DESPESA_MENSAL' => $coddespesaMensal]);
    }
    public function store(DespesaMensalRequest $request){
        // Cria um novo registro com os dados validados
        $data = array_merge($request->validated(), [
            'ANO_DESPESA_MENSAL' => $request->input('HDN_ANO_DESPESA_MENSAL'),
            'MES_DESPESA_MENSAL' => $request->input('HDN_MES_DESPESA_MENSAL'),
        ]);

        if(!empty($request->input('HDN_COD_DESPESA_MENSAL'))){
            $despesaMensal = DespesaMensal::where('COD_DESPESA_MENSAL', $request->input('HDN_COD_DESPESA_MENSAL'))->first();
            if(!empty($despesaMensal)){
                $despesaMensal->update($data);
                return response()->json(['message' => 'Despesa Mensal Atualizada com Sucesso!', 'despesaMensal' => $despesaMensal], 200);
            }
        }
        $despesaMensal = DespesaMensal::create($data);

        // Retorna uma resposta de sucesso
        return response()->json(['message' => 'Despesa Mensal Criado com Sucesso!', 'despesaMensal' => $despesaMensal], 201);
    }


    public function delete(Request $request){
        $despesaMensal = DespesaMensal::where('COD_DESPESA_MENSAL', $request->codDespesaMensal)->first();
        if($despesaMensal){
            $despesaMensal->delete();
            return response()->json(['message' => 'Despesa Mensal Deletada com Sucesso!'], 200);
        }
        return response()->json(['message' => 'Despesa Mensal não Encontrada!'], 404);
    }
}

