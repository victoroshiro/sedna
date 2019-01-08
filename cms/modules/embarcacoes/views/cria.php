<!DOCTYPE html>
<html>
	<?php $this->load->view('admin/inc/header') ?>

	<body>
		<div id="header">
			<?php $this->load->view('admin/inc/top') ?>
			<?php $this->load->view('admin/inc/menu') ?>
		</div>
		
		<div class="container">
			<h1>Embarcações</h1>
			<?php $this->load->view('admin/inc/messages') ?>

				<ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#template" aria-controls="home" role="tab" data-toggle="tab">Template</a></li>
				</ul>
				<div class="tab-content">
				    <div role="tabpanel" class="tabs-imoveis tab-pane fade in active" id="template">
				    	<form method="post" action="<?php echo site_url('embarcacoes/salvar'); ?>" id="form_novidades" enctype="multipart/form-data">
				    			
				    		<div id="acoes" class="text-right">
				    			<input class="btn btn-default" type="button" onclick="location.href = '<?php echo site_url('embarcacoes'); ?>'" value="Cancelar" />
				    			<input class="btn btn-success" type="submit" value="Salvar" />
				    		</div>
					    	<div class="col-md-12">
					    		<div class="form-group">
					    			<label>Data de Criação: </label>
					    			<br>
					    			<p class="help-block"><?= gmdate ("d/m/Y h:ia",strtotime(@$embarcacoes->data_criacao)) ?></p>
					    		</div>
					    	</div>
					    	<div class="col-md-12">
						    	<div class="form-group">
						    	    <label for="link_only_label_1">Habilitado: </label><br>
						    	    <div class="btn-group" data-toggle="buttons">
						    	        <label id="link_only_label_1" class="btn btn-primary active">
						    	            <input
						    	                type="radio"
						    	                name="habilitado"
						    	                id="link_only_1"
						    	                autocomplete="off"
						    	                value="1"
						    	                checked='checked'
						    	                >
						    	                Sim
						    	        </label>
						    	        <label id="link_only_label_0" class="btn btn-primary">
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
					    	</div>
					    	<div class="col-md-12">
						    	<div class="form-group">
						    	    <label for="link_only_label_1">Destaque: </label><br>
						    	    <div class="btn-group" data-toggle="buttons">
						    	        <label id="link_only_label_1" class="btn btn-primary active">
						    	            <input
						    	                type="radio"
						    	                name="destaque"
						    	                id="link_only_1"
						    	                autocomplete="off"
						    	                value="1"
						    	                checked='checked'
						    	                >
						    	                Sim
						    	        </label>
						    	        <label id="link_only_label_0" class="btn btn-primary">
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
					    	</div>
					    	<div class="col-md-12">
					    		<div class="form-group">
					    			<label for="categoria">Categoria: </label>
					    			<select name="categoria" id="categoria" class="select form-control">
					    			    <option value="false">Selecione a Categoria</option>
					    			    <option value="Yachts">Yachts</option>
                                        <option value="Sport-Fishing-Yachts">Sedna Sport Fishing Yachts</option>
                                        <option value="Super-Sport-Yachts">Sedna Super Sport Yachts</option>

                                    </select>
					    		</div>
					    	</div>
					    	<div class="col-md-12">
					    		<div class="form-group">
					    			<label for="subcategoria">Subcategoria: </label>
					    			<select name="subcategoria" id="subcategoria" class="select form-control">
					    			    <option value="false">Selecione a Subcategoria</option>
					    			</select>
					    		</div>
					    	</div>
					    	<div class="col-md-12">
					    		<div class="form-group">
					    			<label for="marca">Marca: </label>
					    			<input name="marca" id="marca" type="text" class="form-control" value="">
					    		</div>
					    	</div>
					    	<div class="col-md-12">
					    		<div class="form-group">
					    			<label for="modelo">Modelo: </label>
					    			<input name="modelo" id="modelo" type="text" class="form-control" value="">
					    		</div>
					    	</div>
					    	<div class="col-md-12">
					    		<div class="form-group">
					    			<label for="ano">Ano: </label>
					    			<input name="ano" id="ano" type="text" class="form-control" value="">
					    		</div>
					    	</div>
					    	<div class="col-md-12">
					    		<div class="form-group">
					    			<label for="titulo">Título: </label>
					    			<input name="titulo" id="titulo" type="text" class="form-control" value="">
					    		</div>
					    	</div>
					    	<div class="col-md-12">
					    		<div class="form-group">
					    			<label for="valor">Valor: </label>
					    			<input name="valor" id="valor" type="text" class="form-control money" value="">
					    		</div>
					    	</div>
				    	    <div class="col-md-12">
					    		<div class="form-group">
					    	        <label for="lf">Tamanho: </label>
					    	        <input name="area" id="area" type="text" class="form-control" value="" placeholder="Tamanho em pés"/>
					    	    </div>
				    	    </div>
					    	<div class="form-group">
								<label for="lf">Resumo: </label>
								<textarea name="resumo" id="resumo" class="form-control" rows="3"></textarea>
							</div>
							 <div class="form-group">
							    <label for="lf">Descrição da Embarcação: </label><br />
							    <textarea name="descricao" id="descricao" cols="30" rows="10"></textarea>
							</div>
							<div class="form-group">
								<label for="description">Description: </label>
								<input name="description" id="description" type="text" class="form-control" placeholder="Entre 150 e 160 caracteres" maxlength="160" value="">
							</div>
							<div class="form-group">
							    <label for="link">Link Vídeo: </label>
							    <input type="text" name="link" id="link" class="form-control" />
							</div>
                            <fieldset class="info-pool">
                                <legend>Imagem Banner Aberto(1580 x 744): </legend>
                                <p>
                                    <input name="imagem3" id="imagem3" type="file" />
                                    <span class="validate_error"></span>
                                    <span class="validate_success"></span>
                                </p>
                                <legend>Imagem Lista(860 x 485): </legend>
                                <p>
                                    <input name="imagem2" id="imagem2" type="file" />
                                    <span class="validate_error"></span>
                                    <span class="validate_success"></span>
                                </p>
                            </fieldset>
					    </div>
						<div id="acoes" class="text-right">
							<input class="btn btn-default" type="button" onclick="location.href = '<?php echo site_url('embarcacoes'); ?>'" value="Cancelar" />
							<input class="btn btn-success" type="submit" value="Salvar" />
						</div>
					</div>
			   </div>  
				<!-- End of fieldset -->
			</form>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				CKEDITOR.replace('descricao')
				CKEDITOR.replace('resumo')
				$(".money").maskMoney({symbol: 'R$', showSymbol: true, thousands: '.', decimal: ',', symbolStay: true});

				//Categorias
				$('#categoria').on('change', function(){
				    
				    $('#subcategoria option').remove().append("<option value='false'>Selecione primeiro a Categoria</option>");
				    
				    if($(this).val() == 'cimitarra'){

				        var options = "<option value='360'>360</option>"+
				                      "<option value='400'>400</option>"+  
				                      "<option value='460'>460</option>";
				    }

				    if($(this).val() == 'cimitarra-yachts'){
				        
				        var options = "<option value='540'>540</option>"+
				                      "<option value='600'>600</option>"+
				                      "<option value='640'>640</option>"+
				                      "<option value='780'>780</option>";
				    }

				    $('#subcategoria').append(options);
				});

				// Código para select de subcategoria começar com algo, mas não é obrigatório.
				$('#categoria').val('cimitarra').change();
			});
		</script>
		<?php $this->load->view('admin/inc/footer') ?>

	</body>
</html>