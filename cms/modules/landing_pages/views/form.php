<div class="form-group">
	<label>Data de Criação: </label>
	<br>
	<p class="help-block"><?php echo (!@$landing_page || empty($landing_page)) ? date("d/m/Y H:i:s") : $landing_page->data_criacao; ?></p>
</div>

<div class="form-group">
    <label for="link_only_label_1">Habilitado: </label><br>
    <div class="btn-group" data-toggle="buttons">
        <label id="link_only_label_1" class="btn btn-primary <?= @$landing_page->habilitado == '1' ? 'active' : ''; if (empty($landing_page)) { echo "active"; }?>">
            <input
                type="radio"
                name="habilitado"
                id="link_only_1"
                autocomplete="off"
                value="1"
                <?php if (empty($landing_page)) { echo "checked='checked'"; } ?>
                >
                Sim
        </label>
        <label id="link_only_label_0" class="btn btn-primary  <?= @$landing_page->habilitado == '0' ? 'active' : ''?>">
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
    <label for="link_only_label_1">Mostrar no menu lateral: </label><br>
    <div class="btn-group" data-toggle="buttons">
        <label id="link_only_label_1" class="btn btn-primary <?= @$landing_page->habilitado == '1' ? 'active' : ''; if (empty($landing_page)) { echo "active"; }?>">
            <input
                type="radio"
                name="habilitado"
                id="link_only_1"
                autocomplete="off"
                value="1"
                <?php if (empty($landing_page)) { echo "checked='checked'"; } ?>
                >
                Sim
        </label>
        <label id="link_only_label_0" class="btn btn-primary  <?= @$landing_page->habilitado == '0' ? 'active' : ''?>">
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
	<label for="title">Title: </label>
	<input name="title" id="title" type="text" class="form-control" placeholder="Máximo de 70 caracters, tente manter as palavras mais importantes nos primeiros 55" maxlength="70" value="<?= @$landing_page->title ?>">
</div>

<div class="form-group">
	<label for="description">Description: </label>
	<input name="description" id="description" type="text" class="form-control" placeholder="Entre 150 e 160 caracteres" maxlength="160" value="<?= @$landing_page->description ?>">
</div>

<div class="form-group">
	<label for="keywords">Keywords: </label>
	<input name="keywords" id="keywords" type="text" class="form-control" placeholder="Máximo de 100 caracteres, lembre que todas as keywors inseridas aqui devem estar no conteúdo da landing page" maxlength="100" value="<?= @$landing_page->keywords ?>">
</div>

<div class="form-group">
	<label for="titulo">Titulo: </label>
	<input name="titulo" id="titulo" type="text" class="form-control" value="<?= @$landing_page->titulo ?>">
</div>

<div class="form-group">
	<label for="descricao">Descrição: </label>
	<textarea id="descricao" name="descricao"><?= @$landing_page->descricao ?></textarea>
</div>