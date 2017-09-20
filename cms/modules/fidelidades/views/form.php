<div class="form-group">
	<label>Data de Criação: </label>
	<br>
	<p class="help-block"><?= gmdate ("d/m/Y h:ia",strtotime(@$fidelidade->data_criacao)) ?></p>
</div>

<div class="form-group">
    <label for="link_only_label_1">Habilitado: </label><br>
    <div class="btn-group" data-toggle="buttons">
        <label id="link_only_label_1" class="btn btn-primary <?= @$fidelidade->habilitado == '1' ? 'active' : ''; if (empty($fidelidade)) { echo "active"; }?>">
            <input
                type="radio"
                name="habilitado"
                id="link_only_1"
                autocomplete="off"
                value="1"
                <?php if (empty($fidelidade)) { echo "checked='checked'"; } ?>
                >
                Sim
        </label>
        <label id="link_only_label_0" class="btn btn-primary  <?= @$fidelidade->habilitado == '0' ? 'active' : ''?>">
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
	<label for="data_fidelidade">Data de Cadastro: </label>
	<input name="data_fidelidade" id="data_fidelidade" type="text" class="form-control data_fidelidade" value="<?= @$fidelidade->data_fidelidade_f ?>">
</div>

<div class="form-group">
	<label for="titulo">Titulo: </label>
	<input name="titulo" id="titulo" type="text" class="form-control" value="<?= @$fidelidade->titulo ?>">
</div>

<div class="form-group">
	<label for="descricao">Descrição: </label>
	<textarea id="descricao" name="descricao"><?= @$fidelidade->descricao ?></textarea>
</div>

<div class="form-group">
	<label for="description">Description: </label>
	<input name="description" id="description" type="text" class="form-control" placeholder="Entre 150 e 160 caracteres" maxlength="160" value="<?= @$fidelidade->description ?>">
</div>

<div class="row">
    <div class="col-md-6">
        <?php if (!empty($fidelidade->imagem)): ?>
            <div class="form-group">
                <img src="<?= site_url('../userfiles/fidelidades/'.@$fidelidade->imagem); ?>" width="300px">
            </div>
        <?php endif ?>

        <div class="form-group">
            <label for="imagem">Imagem (870x485px): </label>
            <input name="imagem" id="imagem" type="file">
        </div>
    </div>
</div>

<script type="text/javascript">
	$(".data_fidelidade").datepicker({dateFormat: "dd/mm/yy"});
</script>
