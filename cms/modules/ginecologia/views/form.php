<div class="form-group">
	<label>Data de Criação: </label>
	<br>
	<p class="help-block"><?= gmdate ("d/m/Y h:ia",strtotime(@$gineco->data_criacao)) ?></p>
</div>

<div class="form-group">
    <label for="link_only_label_1">Habilitado: </label><br>
    <div class="btn-group" data-toggle="buttons">
        <label id="link_only_label_1" class="btn btn-primary <?= @$gineco->habilitado == '1' ? 'active' : ''; if (empty($gineco)) { echo "active"; }?>">
            <input
                type="radio"
                name="habilitado"
                id="link_only_1"
                autocomplete="off"
                value="1"
                <?php if (empty($gineco)) { echo "checked='checked'"; } ?>
                >
                Sim
        </label>
        <label id="link_only_label_0" class="btn btn-primary  <?= @$gineco->habilitado == '0' ? 'active' : ''?>">
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
	<label for="titulo">Titulo: </label>
	<input name="titulo" id="titulo" type="text" class="form-control" value="<?= @$gineco->titulo ?>">
</div>

<div class="form-group">
    <label for="title">Title (seo): </label>
    <input name="title" id="title" type="text" placeholder="Máximo de 70 caracters, tente manter as palavras mais importantes nos primeiros 55" class="form-control" value="<?= @$gineco->title ?>">
</div>

<div class="form-group">
	<label for="descricao">Descrição: </label>
	<textarea id="descricao" name="descricao"><?= @$gineco->descricao ?></textarea>
</div>

<div class="form-group">
	<label for="description">Description: </label>
	<input name="description" id="description" type="text" class="form-control" placeholder="Entre 150 e 160 caracteres" maxlength="160" value="<?= @$gineco->description ?>">
</div>

<div class="row">
    <div class="col-md-6">
        <?php if (!empty($gineco->imagem)): ?>
            <div class="form-group">
                <img src="<?= site_url('../userfiles/ginecologia/'.@$gineco->imagem); ?>" width="300px">
            </div>
        <?php endif ?>

        <div class="form-group">
            <label for="imagem">Imagem (814x543px): </label>
            <input name="imagem" id="imagem" type="file">
        </div>
    </div>
</div>