@extends('controleOrcamentario.layout.principal')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
@component('controleOrcamentario.layout.components.selectMes',['btnNovo' => 'btnDespesaMensal', 'ano' => $ano , 'mes' => $mes])@endcomponent
<div id="tbDespesaMensal">
  <table class="table-container">
      <thead>
          <tr>
              <th>Nome</th>
              <th>Valor</th>
              <th style="width: 120px; text-align: center;">Ação</th>
          </tr>
      </thead>
      <tbody id="tbodyDespesaMensal"></tbody>
  </table>
  <div style="color: rgb(0, 0, 0);font-weight: bold;text-align: right; margin-top: 10px; margin-bottom: 10px;padding-right: 5px;">
      Total da Despesa: <span class="valorTotal" id="valorTotal"></span>
  </div>
</div>
@endsection
@section('javascript')
<script src="{{ asset('js/DespesaMensal/DespesaMensal.js') }}"></script>
@endsection