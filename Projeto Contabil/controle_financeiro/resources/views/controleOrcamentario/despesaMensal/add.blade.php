@extends('controleOrcamentario.layout.principal')
@section('content')
<fieldset>
  <legend>Despesa Mensal</legend>
  <form name="formDespesaMensal" id="formDespesaMensal" method="POST" action="">
    <input type="hidden" name="HDN_ANO_DESPESA_MENSAL" id="HDN_ANO_DESPESA_MENSAL" value="<?=$ANO?>">
    <input type="hidden" name="HDN_MES_DESPESA_MENSAL" id="HDN_MES_DESPESA_MENSAL" value="<?=$MES?>">
    <input type="hidden" name="HDN_COD_DESPESA_MENSAL" id="HDN_COD_DESPESA_MENSAL" value="<?= isset($despesaMensal['COD_DESPESA_MENSAL']) ? $despesaMensal['COD_DESPESA_MENSAL'] : $COD_DESPESA_MENSAL?>">
    @csrf 
    <div class="row">
      <div class="grid-6">
        <div class="input-grpoup flex-row">
          <label for="name">Nome:</label>
          <input type="text" id="NOME_DESPESA_MENSAL" name="NOME_DESPESA_MENSAL" value="<?= isset($despesaMensal['NOME_DESPESA_MENSAL']) ? $despesaMensal['NOME_DESPESA_MENSAL'] : '' ?>">
        </div>
      </div>
      <div class="grid-6">
        <div class="input-grpoup flex-row">
          <label for="name">Valor:</label>
          <input type="text" id="VALOR_DESPESA_MENSAL" name="VALOR_DESPESA_MENSAL"  value="<?= isset($despesaMensal['VALOR_DESPESA_MENSAL']) ? $despesaMensal['VALOR_DESPESA_MENSAL'] : '' ?>" class="money">
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
<script src="{{ asset('js/DespesaMensal/DespesaMensal.js') }}"></script>
@endsection