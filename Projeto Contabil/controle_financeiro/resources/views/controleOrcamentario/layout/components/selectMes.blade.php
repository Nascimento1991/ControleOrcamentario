<div class="row">
    <div class="grid-4">
        <div class="input-grpoup flex-row">
            <label for="Ano">Ano:</label>
            <input type="text" name="txtAno" id="txtAno" size="4" maxlength="4" value="<?= isset($ano) ? $ano : ''?>" >
        </div>
    </div>
    <div class="grid-7" >
        <div class="input-grpoup flex-row">
            <label for="selMes">Mês:</label>
            <select name="selMes" id="selMes"  style="width: 100%">
                <option value="">SELECIONE</option>
                <option value="01" <?= isset($mes) && $mes  == '01' ? 'selected' : '' ?>>Janiero</option>
                <option value="02" <?= isset($mes) && $mes  == '02' ? 'selected' : '' ?>>Fevereiro</option>
                <option value="03" <?= isset($mes) && $mes  == '03' ? 'selected' : '' ?>>Março</option>
                <option value="04" <?= isset($mes) && $mes  == '04' ? 'selected' : '' ?>>Abril</option>
                <option value="05" <?= isset($mes) && $mes  == '05' ? 'selected' : '' ?>>Maio</option>
                <option value="06" <?= isset($mes) && $mes  == '06' ? 'selected' : '' ?>>Junho</option>
                <option value="07" <?= isset($mes) && $mes  == '07' ? 'selected' : '' ?>>Julho</option>
                <option value="08" <?= isset($mes) && $mes  == '08' ? 'selected' : '' ?>>Agosto</option>
                <option value="09" <?= isset($mes) && $mes  == '09' ? 'selected' : '' ?>>Setembro</option>
                <option value="10" <?= isset($mes) && $mes  == '10' ? 'selected' : '' ?>>Outubro</option>
                <option value="11" <?= isset($mes) && $mes  == '11' ? 'selected' : '' ?>>Novembro</option>
                <option value="12" <?= isset($mes) && $mes  == '12' ? 'selected' : '' ?>>Dezembro</option>
            </select> 
        </div>
    </div>
    <div class="grid-1">
        <div class="input-grpoup flex-row" style="justify-content: center;">
            <button name="{{$btnNovo}}" id="{{$btnNovo}}" type="button" class="button-padrao">Novo</button>
        </div>
    </div>
</div>