<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RendaMensal extends Model
{
    protected $table ='renda_mensal';
    protected $primaryKey = 'COD_RENDA_MENSAL';
    protected $fillable = ['ANO_RENDA_MENSAL', 'MES_RENDA_MENSAL', 'NOME_RENDA_MENSAL','VALOR_RENDA_MENSAL'];

    public $timestamps = false;

    public function setValorRendaMensalAttribute($value)
    {
        // Remove as vírgulas do valor antes de salvar no banco de dados
        $this->attributes['VALOR_RENDA_MENSAL'] = str_replace(',', '.', str_replace('.','',$value));
    }
}
