@extends('controleOrcamentario.layout.principal')
@section('content')
<fieldset>
  <legend>Renda Mensal</legend>
  <form name="formRendaMensal" id="formRendaMensal" method="POST" action="{{route('controle-orcamentario.rendaMensal.store')}}">
    <input type="hidden" name="HDN_ANO_RENDA_MENSAL" id="HDN_ANO_RENDA_MENSAL" value="<?=$ANO?>">
    <input type="hidden" name="HDN_MES_RENDA_MENSAL" id="HDN_MES_RENDA_MENSAL" value="<?=$MES?>">
    <input type="hidden" name="HDN_COD_RENDA_MENSAL" id="HDN_COD_RENDA_MENSAL" value="<?= isset($rendaMensal['COD_RENDA_MENSAL']) ? $rendaMensal['COD_RENDA_MENSAL'] : $COD_RENDA_MENSAL?>">
    @csrf 
    <div class="row">
      <div class="grid-6">
        <div class="input-grpoup flex-row">
          <label for="name">Nome:</label>
          <input type="text" id="NOME_RENDA_MENSAL" name="NOME_RENDA_MENSAL" value="<?= isset($rendaMensal['NOME_RENDA_MENSAL']) ? $rendaMensal['NOME_RENDA_MENSAL'] : '' ?>">
        </div>
      </div>
      <div class="grid-6">
        <div class="input-grpoup flex-row">
          <label for="name">Valor:</label>
          <input type="text" id="VALOR_RENDA_MENSAL" name="VALOR_RENDA_MENSAL"  value="<?= isset($rendaMensal['VALOR_RENDA_MENSAL']) ? $rendaMensal['VALOR_RENDA_MENSAL'] : '' ?>" class="money">
        </div>
      </div>
    </div>
    <div class="action">
      <button name="btnInserir" id="btnInserir" type="button" class="button-padrao">Inserir</button>
      <button name="btnLimpar"  id="btnLimpar"  type="button" class="button-padrao">Limpar</button>
    </div>
  </form>
</fieldset>
@endsection
@section('javascript')
<script src="{{asset('js/rendaMensal/rendaMensal.js')}}"></script>
@endsection