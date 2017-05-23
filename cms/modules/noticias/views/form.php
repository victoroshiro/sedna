<div class="form-group">
	<label>Data de Criação: </label>
	<br>
	<p class="help-block"><?= gmdate ("d/m/Y h:ia",strtotime(@$noticia->data_criacao)) ?></p>
</div>

<div class="form-group">
    <label for="link_only_label_1">Habilitado: </label><br>
    <div class="btn-group" data-toggle="buttons">
        <label id="link_only_label_1" class="btn btn-primary <?= @$noticia->habilitado == '1' ? 'active' : ''; if (empty($noticia)) { echo "active"; }?>">
            <input
                type="radio"
                name="habilitado"
                id="link_only_1"
                autocomplete="off"
                value="1"
                <?php if (empty($noticia)) { echo "checked='checked'"; } ?>
                >
                Sim
        </label>
        <label id="link_only_label_0" class="btn btn-primary  <?= @$noticia->habilitado == '0' ? 'active' : ''?>">
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
    <label for="link_only_label_1">Destaque: </label><br>
    <div class="btn-group" data-toggle="buttons">
        <label id="link_only_label_1" class="btn btn-primary <?= @$noticia->destaque == '1' ? 'active' : ''; if (empty($noticia)) { echo "active"; }?>">
            <input
                type="radio"
                name="destaque"
                id="link_only_1"
                autocomplete="off"
                value="1"
                <?php if (empty($noticia)) { echo "checked='checked'"; } ?>
                >
                Sim
        </label>
        <label id="link_only_label_0" class="btn btn-primary  <?= @$noticia->destaque == '0' ? 'active' : ''?>">
            <input
                type="radio"
                name="destaque"
                id="link_only_0"
                autocomplete="off"
                value="0">
                Não
        </label>
    </div>
</div>

<div class="form-group">
	<label for="data_noticia">Data da Notícia: </label>
	<input name="data_noticia" id="data_noticia" type="text" class="form-control data_noticia" value="<?= @$noticia->data_noticia_f ?>">
</div>

<div class="form-group">
	<label for="titulo">Titulo: </label>
	<input name="titulo" id="titulo" type="text" class="form-control" value="<?= @$noticia->titulo ?>">
</div>

<div class="form-group">
    <label for="lf">Resumo: </label>
    <textarea name="resumo" id="resumo" class="form-control" rows="3"><?= @$noticia->resumo ?></textarea>
</div>

<div class="form-group">
	<label for="descricao">Descrição: </label>
	<textarea id="descricao" name="descricao"><?= @$noticia->descricao ?></textarea>
</div>

<div class="form-group">
	<label for="description">Description: </label>
	<input name="description" id="description" type="text" class="form-control" placeholder="Entre 150 e 160 caracteres" maxlength="160" value="<?= @$noticia->description ?>">
</div>

<div class="row">
    <div class="col-md-6">
        <?php if (!empty($noticia->imagem)): ?>
            <div class="form-group">
                <img src="<?= site_url('../userfiles/noticias/'.@$noticia->imagem); ?>" width="300px">
            </div>
        <?php endif ?>

        <div class="form-group">
            <label for="imagem">Imagem (600x335px): </label>
            <input name="imagem" id="imagem" type="file">
        </div>
    </div>
</div>

<script type="text/javascript">
	$(".data_noticia").datepicker({dateFormat: "dd/mm/yy"});
</script>