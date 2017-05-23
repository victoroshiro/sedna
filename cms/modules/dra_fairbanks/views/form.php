<div class="form-group">
	<label>Data de Criação: </label>
	<br>
	<p class="help-block"><?= gmdate ("d/m/Y h:ia",strtotime(@$quem->data_criacao)) ?></p>
</div>
<div class="form-group">
	<label for="titulo">Titulo: </label>
	<input name="titulo" id="titulo" type="text" class="form-control" value="<?= @$quem->titulo ?>">
</div>

<div class="form-group">
	<label for="descricao">Descrição: </label>
	<textarea id="descricao" name="descricao"><?= @$quem->descricao ?></textarea>
</div>

<div class="form-group">
	<label for="description">Description: </label>
	<input name="description" id="description" type="text" class="form-control" placeholder="Entre 150 e 160 caracteres" maxlength="160" value="<?= @$quem->description ?>">
</div>