<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DespesaMensal extends Model
{
    protected $table ='despesa_mensal';
    protected $primaryKey = 'COD_DESPESA_MENSAL';
    protected $fillable = ['ANO_DESPESA_MENSAL', 'MES_DESPESA_MENSAL', 'NOME_DESPESA_MENSAL','VALOR_DESPESA_MENSAL'];

    public $timestamps = false;

    public function setValorDespesaMensalAttribute($value)
    {
        // Remove as vírgulas do valor antes de salvar no banco de dados
        $this->attributes['VALOR_DESPESA_MENSAL'] = str_replace(',', '.', str_replace('.','',$value));
    }
}
