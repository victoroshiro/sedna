<div class="form-group">
    <label for="link_only_label_1">Habilitado: </label><br>
    <div class="btn-group" data-toggle="buttons">
        <label id="link_only_label_1" class="btn btn-primary <?= @$banner->habilitado == '1' ? 'active' : ''; if (empty($banner)) { echo "active"; }?>">
            <input
                type="radio"
                name="habilitado"
                id="link_only_1"
                autocomplete="off"
                value="1"
                <?php if (empty($banner)) { echo "checked='checked'"; } ?>
                >
                Sim
        </label>
        <label id="link_only_label_0" class="btn btn-primary  <?= @$banner->habilitado == '0' ? 'active' : ''?>">
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
    <label for="video_banner">Banner de vídeo: </label><br>
    <div class="btn-group" data-toggle="buttons">
        <label id="video_banner" class="btn btn-primary <?= @$banner->video_banner == '1' ? 'active' : ''?>">
            <input
                type="radio"
                name="video_banner"
                id="video_banner_1"
                autocomplete="off"
                value="1"
                >
                Sim
        </label>
        <label id="video_banner_label_0" class="btn btn-primary  <?= @$banner->video_banner == '0' ? 'active' : '';  if (empty($banner)) { echo "active"; } ?>">
            <input
                type="radio"
                name="video_banner"
                id="video_banner_0"
                autocomplete="off"
                value="0"
                <?php if (empty($banner)) { echo "checked='checked'"; } ?>
                >
                Não
        </label>
    </div>
</div>


<div class="form-group">
    <label for="titulo">Título: </label>
    <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo @$banner->titulo; ?>" />
    <span class="validate_error"></span>
    <span class="validate_success"></span>
</div>

<div class="form-group">
    <label for="lf">Resumo: </label>
    <textarea name="resumo" id="resumo" class="form-control" rows="3"><?= @$banner->resumo ?></textarea>
</div>

<div class="form-group">
    <label for="link">Link: </label>
    <input type="text" name="link" id="link" class="form-control" value="<?php echo @$banner->link; ?>" />
    <span class="validate_error"></span>
    <span class="validate_success"></span>
</div>

<div class="form-group">
    <label for="video_id">Link do Vídeo: </label>
    <input type="text" name="video_id" id="video_id" class="form-control" <?php echo !empty($banner->video_id) ? 'value="http://www.youtube.com/watch?v=' . $banner->video_id . '"' : '' ?>">
</div>

<div class="form-group">
    <label for="target_blank">Abrir link em nova aba?: </label>
    <select name="target_blank" id="target_blank" class="form-control">
        <?php if (@$banner->target_blank == 0): ?>
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

<?php if (!empty($banner->imagem)): ?>
    <div class="form-group">
        <b class="help-block">Imagem atual:</b>
        <img src="<?php echo site_url('../userfiles/banners/'.$banner->imagem); ?>" width="250px" />
        <span class="validate_error"></span>
        <span class="validate_success"></span>
    </div>
<?php endif ?>
<div class="form-group">
    <label for="imagem">Imagem (1900x909px): </label>
    <input name="imagem" id="imagem" type="file" />
    <span class="validate_error"></span>
    <span class="validate_success"></span>
</div>