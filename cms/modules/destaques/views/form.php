<div class="form-group">
    <label for="link_only_label_1">Habilitado: </label><br>
    <div class="btn-group" data-toggle="buttons">
        <label id="link_only_label_1" class="btn btn-primary <?= @$destaque->habilitado == '1' ? 'active' : ''; if (empty($destaque)) { echo "active"; }?>">
            <input
                type="radio"
                name="habilitado"
                id="link_only_1"
                autocomplete="off"
                value="1"
                <?php if (empty($destaque)) { echo "checked='checked'"; } ?>
                >
                Sim
        </label>
        <label id="link_only_label_0" class="btn btn-primary  <?= @$destaque->habilitado == '0' ? 'active' : ''?>">
            <input
                type="radio"
                name="habilitado"
                id="link_only_0"
                autocomplete="off"
                value="0">
                Não
        </label>
    </div>
</div>

<div class="form-group">
    <label for="titulo">Título: </label>
    <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo @$destaque->titulo; ?>" />
    <span class="validate_error"></span>
    <span class="validate_success"></span>
</div>

<div class="form-group">
    <label for="lf">Categoria: </label>
    <select name="categoria" id="categoria" class="form-control">
        <?php if (@$destaque->categoria == 0): ?>
            <option value="0" selected="selected">Yachts</option>
            <option value="1">Sedna Sport Fishing Yachts</option>
            <option value="2">Sedna Super Sport Yachts</option>

        <?php elseif(@$destaque->categoria == 1): ?>
            <option value="0" >Yachts</option>
            <option value="1" selected="selected">Sedna Sport Fishing Yachts</option>
            <option value="2">Sedna Super Sport Yachts</option>
        <?php else: ?>
            <option value="0" >Yachts</option>
            <option value="1">Sedna Sport Fishing Yachts</option>
            <option value="2" selected="selected">Sedna Super Sport Yachts</option>
        <?php endif ?>
    </select>
</div>

<div class="form-group">
    <label for="link">Link: </label>
    <input type="text" name="link" id="link" class="form-control" value="<?php echo @$destaque->link; ?>" />
    <span class="validate_error"></span>
    <span class="validate_success"></span>
</div>

<div class="form-group">
    <label for="target_blank">Abrir link em nova aba?: </label>
    <select name="target_blank" id="target_blank" class="form-control">
        <?php if (@$destaque->target_blank == 0): ?>
            <option value="0" selected="selected">Não</option>
            <option value="1">Sim</option>
        <?php else: ?>
            <option value="0">Não</option>
            <option value="1" selected="selected">Sim</option>
        <?php endif ?>
    </select>
    <span class="validate_error"></span>
    <span class="validate_success"></span>
</div>

<?php if (!empty($destaque->imagem)): ?>
    <div class="form-group">
        <b class="help-block">Imagem atual:</b>
        <img src="<?php echo site_url('../userfiles/destaques/'.$destaque->imagem); ?>" width="250px" />
        <span class="validate_error"></span>
        <span class="validate_success"></span>
    </div>
<?php endif ?>
<div class="form-group">
    <label for="imagem">Imagem (480x280px): </label>
    <input name="imagem" id="imagem" type="file" />
    <span class="validate_error"></span>
    <span class="validate_success"></span>
</div>
