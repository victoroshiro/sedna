<!DOCTYPE html>
<html>
	<?php $this->load->view('admin/inc/header') ?>
	<body>
		<div id="header">
			<?php $this->load->view('admin/inc/top') ?>
			<?php $this->load->view('admin/inc/menu') ?>
		</div>
		
		<div class="container embarcacoes">
			<h1>Embarcações</h1>
			<?php $this->load->view('admin/inc/messages') ?>

				<ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#template" aria-controls="home" role="tab" data-toggle="tab">Template</a></li>
		            <li role="presentation"><a href="#descricao-tab" aria-controls="descricao-tab" role="tab" data-toggle="tab">Descrição</a></li>
		            <li role="presentation"><a href="#especificacao-tab" aria-controls="especificacao-tab" role="tab" data-toggle="tab">Especificações Técnicas</a></li>
		            <li role="presentation"><a href="#serie-tab" aria-controls="serie-tab" role="tab" data-toggle="tab">Itens de Série</a></li>
		            <li role="presentation"><a href="#galeria" aria-controls="galeria" role="tab" data-toggle="tab">Galeria</a></li>
		            <li role="presentation"><a href="#panorama" aria-controls="panorama" role="tab" data-toggle="tab">Panomara</a></li>
				</ul>
				<div class="tab-content">
				    <div role="tabpanel" class="tabs-imoveis tab-pane fade in active" id="template">
				    	<form method="post" action="<?php echo site_url('embarcacoes/atualizar'); ?>" id="form_novidades" enctype="multipart/form-data">
				    		<input type="hidden" name="id" value="<?= $embarcacao->id ?>">
				    		<div id="acoes" class="text-right">
				    			<input class="btn btn-default" type="button" onclick="location.href = '<?php echo site_url('embarcacoes'); ?>'" value="Cancelar" />
				    			<input class="btn btn-success" type="submit" value="Salvar" />
				    		</div>
					    	<div class="col-md-12">
					    		<div class="form-group">
					    			<label>Data de Criação: </label>
					    			<br>
					    			<p class="help-block"><?= gmdate ("d/m/Y h:ia",strtotime(@$embarcacao->data_criacao)) ?></p>
					    		</div>
					    	</div>

					    	<div class="col-md-12">
					    		<div class="form-group">
					    		    <label for="link_only_label_1">Habilitado: </label><br>
					    		    <div class="btn-group" data-toggle="buttons">
					    		        <label id="link_only_label_1" class="btn btn-primary <?= @$embarcacao->habilitado == '1' ? 'active' : ''; if (empty($embarcacao)) { echo "active"; }?>">
					    		            <input
					    		                type="radio"
					    		                name="habilitado"
					    		                id="link_only_1"
					    		                autocomplete="off"
					    		                value="1"
					    		                <?php if (empty($embarcacao)) { echo "checked='checked'"; } ?>
					    		                >
					    		                Sim
					    		        </label>
					    		        <label id="link_only_label_0" class="btn btn-primary  <?= @$embarcacao->habilitado == '0' ? 'active' : ''?>">
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
					    		        <label id="link_only_label_1" class="btn btn-primary <?= @$embarcacao->destaque == '1' ? 'active' : ''; if (empty($embarcacao)) { echo "active"; }?>">
					    		            <input
					    		                type="radio"
					    		                name="destaque"
					    		                id="link_only_1"
					    		                autocomplete="off"
					    		                value="1"
					    		                <?php if (empty($embarcacao)) { echo "checked='checked'"; } ?>
					    		                >
					    		                Sim
					    		        </label>
					    		        <label id="link_only_label_0" class="btn btn-primary  <?= @$embarcacao->destaque == '0' ? 'active' : ''?>">
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
									    <option <?php echo ($embarcacao->categoria == 'cimitarra') ? 'selected="selected"' : ''; ?> value="cimitarra">Cimitarra</option>
									    <option <?php echo ($embarcacao->categoria == 'cimitarra-yachts') ? 'selected="selected"' : ''; ?> value="cimitarra-yachts">Cimitarra Yachts</option>
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
									<input name="marca" id="marca" type="text" class="form-control" value="<?= $embarcacao->marca ?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="modelo">Modelo: </label>
									<input name="modelo" id="modelo" type="text" class="form-control" value="<?= $embarcacao->modelo ?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="ano">Ano: </label>
									<input name="ano" id="ano" type="text" class="form-control" value="<?= $embarcacao->ano ?>">
								</div>
							</div>
					    	<div class="col-md-12">
					    		<div class="form-group">
					    			<label for="titulo">Título: </label>
					    			<input name="titulo" id="titulo" type="text" class="form-control" value="<?= $embarcacao->titulo ?>">
					    		</div>
					    	</div>
					    	<div class="col-md-12">
					    		<div class="form-group">
					    			<label for="valor">Valor: </label>
					    			<input name="valor" id="valor" type="text" class="form-control money" value="<?= @doubleToMoney($embarcacao->valor) ?>">
					    		</div>
					    	</div>
				    	    <div class="col-md-12">
					    		<div class="form-group">
					    	        <label for="lf">Tamanho (pés): </label>
					    	        <input name="area" id="area" type="text" class="form-control" value="<?= $embarcacao->area ?>" placeholder="Tamanho em pés"/>
					    	    </div>
				    	    </div>
					    	<div class="form-group">
								<label for="lf">Resumo: </label>
								<textarea name="resumo" id="resumo" class="form-control" rows="3"><?php echo $embarcacao->resumo ?></textarea>
							</div>
							
							<div class="form-group">
							    <label for="link">Link Vídeo: </label>
							    <input type="text" name="link" id="link" class="form-control" <?php echo !empty($embarcacao->link) ? 'value="http://www.youtube.com/watch?v=' . $embarcacao->link . '"' : '' ?> />
							</div>

							<div class="form-group">
								<label for="description">Description: </label>
								<input name="description" id="description" type="text" class="form-control" placeholder="Entre 150 e 160 caracteres" maxlength="160" value="<?= @$embarcacao->description ?>">
							</div>

							<fieldset class="info-pool">
                                <p>
                                    <label for="lf">Foto Banner atual: </label>
                                    <img src="<?= site_url('../userfiles/embarcacoes/'.$embarcacao->imagem3); ?>" width="200px" height="180px"/>
                                    <span class="validate_error"></span>
                                    <span class="validate_success"></span>
                                </p>
								<p>
                                    <label for="lf">Foto Lista atual: </label>
                                    <img src="<?= site_url('../userfiles/embarcacoes/'.$embarcacao->imagem2); ?>" width="200px" height="180px"/>
                                    <span class="validate_error"></span>
                                    <span class="validate_success"></span>
                                </p>
							</fieldset>
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

					    	<div id="acoes" class="text-right">
					    		<input class="btn btn-default" type="button" onclick="location.href = '<?php echo site_url('embarcacoes'); ?>'" value="Cancelar" />
					    		<input class="btn btn-success" type="submit" value="Salvar" />
					    	</div>
					    </form>
				    </div>
				    <div role="tabpanel" class="tabs-imoveis tab-pane fade in" id="descricao-tab">
				    	<form method="post" action="<?php echo site_url('embarcacoes/salva_descricao'); ?>" id="form_novidades" enctype="multipart/form-data">
				    		<input type="hidden" name="id_embarcacoes" value="<?= $embarcacao->id ?>">
				    		<div id="acoes" class="text-right">
				    			<input class="btn btn-default" type="button" onclick="location.href = '<?php echo site_url('embarcacoes'); ?>'" value="Cancelar" />
				    			<input class="btn btn-success" type="submit" value="Salvar" />
				    		</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="titulo">Título: </label>
									<input name="titulo" id="titulo" type="text" class="form-control" value="<?php echo ($embarcacao_descricao) ? $embarcacao_descricao->titulo : ''; ?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
								    <label for="lf">Descrição da Embarcação: </label><br />
								    <textarea name="descricao" id="descricao" cols="30" rows="10"><?php echo ($embarcacao_descricao) ? $embarcacao_descricao->descricao : ''; ?></textarea>
								</div>
							</div>
							<?php  
								if($embarcacao_descricao){
							?>
								
						    		<input type="hidden" name="id_embarcacao_descricao" value="<?= $embarcacao_descricao->id ?>">
									<div class="col-md-12">
										<fieldset class="info-pool">
			                                <p>
			                                    <label for="lf">Imagem (direita) atual: </label>
			                                    <img src="<?= site_url('../userfiles/embarcacoes/'.$embarcacao_descricao->imagem); ?>" width="200px" height="180px"/>
			                                    <span class="validate_error"></span>
			                                    <span class="validate_success"></span>
			                                </p>
											<p>
			                                    <label for="lf">Foto Parallax atual: </label>
			                                    <img src="<?= site_url('../userfiles/embarcacoes/'.$embarcacao_descricao->imagem2); ?>" width="200px" height="180px"/>
			                                    <span class="validate_error"></span>
			                                    <span class="validate_success"></span>
			                                </p>
										</fieldset>
									</div>
							<?php  
								}
							?>
							<div class="col-md-12">
								<fieldset class="info-pool">
								    <legend>Imagem (direita) (1580 x 744): </legend>
								    <p>
								        <input name="imagem" id="imagem" type="file" />
								        <span class="validate_error"></span>
								        <span class="validate_success"></span>
								    </p>
								    <legend>Imagem Parallax(1577 x 1051): </legend>
								    <p>
								        <input name="imagem2" id="imagem2" type="file" />
								        <span class="validate_error"></span>
								        <span class="validate_success"></span>
								    </p>
								</fieldset>
							</div>
			    		</form>
		    		</div>
		    		<div role="tabpanel" class="tabs-imoveis tab-pane fade in" id="especificacao-tab">
				    	<form method="post" action="<?php echo site_url('embarcacoes/salva_especificacoes'); ?>" id="form_novidades" enctype="multipart/form-data">
				    		<input type="hidden" name="id_embarcacoes" value="<?= $embarcacao->id ?>">
				    		<div id="acoes" class="text-right">
				    			<input class="btn btn-default" type="button" onclick="location.href = '<?php echo site_url('embarcacoes'); ?>'" value="Cancelar" />
				    			<input class="btn btn-success" type="submit" value="Salvar" />
				    		</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="titulo">Título: </label>
									<input name="titulo" id="titulo" type="text" class="form-control" value="<?php echo ($embarcacao_especificacoes) ? $embarcacao_especificacoes->titulo : ''; ?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
								    <label for="lf">Especificações Técnicas: </label><br />
								    <textarea name="descricao" id="descricao-especificacao" cols="30" rows="10"><?php echo ($embarcacao_especificacoes) ? $embarcacao_especificacoes->descricao : ''; ?></textarea>
								</div>
							</div>
							<?php  
								if($embarcacao_especificacoes){
							?>
						    		<input type="hidden" name="id_embarcacao_especificacoes" value="<?= $embarcacao_especificacoes->id ?>">
							<?php  
								}
							?>
			    		</form>
		    		</div>
		    		<div role="tabpanel" class="tabs-imoveis tab-pane fade in" id="serie-tab">
				    	<form method="post" action="<?php echo site_url('embarcacoes/salva_serie'); ?>" id="form_novidades" enctype="multipart/form-data">
				    		<input type="hidden" name="id_embarcacoes" value="<?= $embarcacao->id ?>">
				    		<div id="acoes" class="text-right">
				    			<input class="btn btn-default" type="button" onclick="location.href = '<?php echo site_url('embarcacoes'); ?>'" value="Cancelar" />
				    			<input class="btn btn-success" type="submit" value="Salvar" />
				    		</div>
							<div class="col-md-12">
								<div class="form-group">
								    <label for="lf">Lado Esquerdo (painel): </label><br />
								    <textarea name="descricao_um" id="descricao-serie" cols="30" rows="10"><?php echo ($embarcacao_serie) ? $embarcacao_serie->descricao_um : ''; ?></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
								    <label for="lf">Lado Direito (painel): </label><br />
								    <textarea name="descricao_dois" id="descricao-serie-dois" cols="30" rows="10"><?php echo ($embarcacao_serie) ? $embarcacao_serie->descricao_dois : ''; ?></textarea>
								</div>
							</div>
							<?php  
								if($embarcacao_serie){
							?>
						    		<input type="hidden" name="id_embarcacao_serie" value="<?= $embarcacao_serie->id ?>">
							<?php  
								}
							?>
			    		</form>
		    		</div>
		            <div role="tabpanel" class="tabs-imoveis tab-pane fade in" id="galeria">
                                <form method="post" action="embarcacoes/galeria" id="form_galeria" enctype="multipart/form-data">
                                    <input type="hidden" name="id_embarcacao" value="<?= $embarcacao->id; ?>" />

                                    <div id="acoes" class="text-right margin-top-s">
                                        <input class="btn btn-default" type="button" onclick="location.href = 'embarcacoes'" value="Cancelar" />
                                        <input class="btn btn-success" type="submit" value="Salvar" />
                                    </div>

                                    <fieldset class="form-galeria">
                                        <p class="disclaimer"><u>*Cadastre várias imagens por vez.</u></p>
                                        <p>
                                        <label for="lf" class="label-img-galeria">Imagem (800 x 600): </label>
                                        <input type="file" multiple name="imagem[]" />
                                        <span class="validate_error"></span>
                                        <span class="validate_success"></span>
                                        </p>
                                    </fieldset>
                                </form>
		        	        
	        	        <div class="container">
	        	            <fieldset class="lista-galeria">
	        	            <?php 
	        	            	if (isset($imagens_group)){
	        	            ?>
		        	            	<legend>Galeria</legend>
	        	            <?php
	        	                	foreach ($imagens_group as $key => $imagens){
	        	            ?>
	    	    	                    <div class="row clearfix">
	    	    	                        <?php 
	    	    	                        	foreach ($imagens as $imagem){
	    	    	                        ?>
	    		    	                            <div class="col-md-3 text-center margin-bottom-m">
	    		    	                            	<div class="atualiza-titulo">
		    		    	                            	<input type="hidden" name="id_imagem" value="<?= $imagem->id; ?>" />
		    		    	                                <img src="<?php echo site_url('../userfiles/embarcacoes/'.$imagem->imagem); ?>" class="galeria-imoveis img-responsive margin-bottom-xs" />
		    		    	                                <p class="link-galeria-lista">
		    		    	                                	Tipo: <!-- <input type="text" name="titulo" id="new-link" value="<?php echo $imagem->titulo; ?>"/> -->
		    		    	                                	<select name="titulo" id="new-link">
		    		    	                                		<option <?php echo ($imagem->titulo == 'interior') ? 'selected="selected"' : ''; ?> value="interior">Interior</option>
		    		    	                                		<option <?php echo ($imagem->titulo == 'exterior') ? 'selected="selected"' : ''; ?> value="exterior">Exterior</option>
		    		    	                                	</select>
		    		    	                                </p>
		    		    	                                <a href="#" class="btn btn-success save-edit-link"/>
		    		    	                                    Editar tipo <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
		    		    	                                </a>
		    		    	                                <a href="<?php echo site_url('embarcacoes/exclui_imagem_galeria/'.$imagem->id); ?>" class="btn btn-danger" />
		    		    	                                    Deletar imagem<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
		    		    	                                </a>
	    		    	                            	</div>
	    		    	                            </div> 
	    	    	                        <?php 
	    	    	                        	}
	    	    	                        ?>
	    	    	                    </div>
	        	            <?php 
	        	            		}
	        	            	}
	        	            ?>
	        	            </fieldset>
	        	        </div>		            	
		            </div>


                            <div role="tabpanel" class="tabs-imoveis tab-pane fade in" id="panorama">
                                <form method="post" action="embarcacoes/panorama" id="form_galeria" enctype="multipart/form-data">
                                    <input type="hidden" name="id_embarcacao" value="<?= $embarcacao->id; ?>" />

                                    <div id="acoes" class="text-right margin-top-s">
                                        <input class="btn btn-default" type="button" onclick="location.href = 'embarcacoes'" value="Cancelar" />
                                        <input class="btn btn-success" type="submit" value="Salvar" />
                                    </div>

                                    <fieldset class="form-galeria">
                                        <p class="disclaimer"><u>*Cadastre várias imagens por vez.</u></p>
                                        <p>
                                            <label for="lf" class="label-img-galeria">Imagem: </label>
                                            <input type="file" multiple name="imagem[]" />
                                            <label for="lf" class="label-img-galeria">Descrição: </label>
                                            <textarea name="descricao_panorama" id="descricao_panorama"></textarea>
                                            
                                        </p>
                                    </fieldset>
                                </form>
		        	        
	        	        <div class="container">
	        	            <fieldset class="lista-galeria">
	        	            <?php 
	        	            	if (isset($panoramas_group)){
	        	            ?>
		        	            	<legend>Panorama</legend>
	        	            <?php
	        	                	foreach ($panoramas_group as $key => $imagens){
	        	            ?>
	    	    	                    <div class="row clearfix">
	    	    	                        <?php 
	    	    	                        	foreach ($imagens as $imagem){
	    	    	                        ?>
	    		    	                            <div class="col-md-3 text-center margin-bottom-m">
	    		    	                            	<div class="atualiza-titulo">
		    		    	                            	<input type="hidden" name="id_imagem" value="<?= $imagem->id; ?>" />
		    		    	                                <img src="<?php echo site_url('../userfiles/embarcacoes/'.$imagem->imagem); ?>" class="galeria-imoveis img-responsive margin-bottom-xs" />
		    		    	                                <a href="<?php echo site_url('embarcacoes/exclui_imagem_panorama/'.$imagem->id); ?>" class="btn btn-danger" />
		    		    	                                    Deletar imagem<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
		    		    	                                </a>
	    		    	                            	</div>
	    		    	                            </div> 
	    	    	                        <?php 
	    	    	                        	}
	    	    	                        ?>
	    	    	                    </div>
	        	            <?php 
	        	            		}
	        	            	}
	        	            ?>
	        	            </fieldset>
	        	        </div>		            	
		            </div>



				</div>
		</div>

		<script>

		    $(document).ready(function(){
			    
			    CKEDITOR.replace('descricao');
			    CKEDITOR.replace('descricao-especificacao');
			    CKEDITOR.replace('descricao-serie');
			    CKEDITOR.replace('descricao-serie-dois');
			    CKEDITOR.replace('descricao_panorama');
			    CKEDITOR.replace('resumo');

			    $('.normal').show();
		    	
		    	$(".money").maskMoney({symbol: 'R$', showSymbol: true, thousands: '.', decimal: ',', symbolStay: true});

		    	//Categorias
		    	$('#categoria').on('change', function(){
		    	    
		    	    $('#subcategoria option').remove().append("<option value='false'>Selecione primeiro a Categoria</option>");
		    	    
		    	    if($(this).val() == 'cimitarra'){

		    	        var options = '<option <?php echo ($embarcacao->subcategoria == '360') ? 'selected="selected"' : ''; ?> value="360">360</option>'+
		    	                      '<option <?php echo ($embarcacao->subcategoria == '400') ? 'selected="selected"' : ''; ?> value="400">400</option>'+  
		    	                      '<option <?php echo ($embarcacao->subcategoria == '460') ? 'selected="selected"' : ''; ?> value="460">460</option>';
		    	    }

		    	    if($(this).val() == 'cimitarra-yachts'){
		    	        
		    	        var options = '<option <?php echo ($embarcacao->subcategoria == '540') ? 'selected="selected"' : ''; ?> value="540">540</option>'+
		    	                      '<option <?php echo ($embarcacao->subcategoria == '600') ? 'selected="selected"' : ''; ?> value="600">600</option>'+
		    	                      '<option <?php echo ($embarcacao->subcategoria == '640') ? 'selected="selected"' : ''; ?> value="640">640</option>'+
		    	                      '<option <?php echo ($embarcacao->subcategoria == '780') ? 'selected="selected"' : ''; ?> value="780">780</option>';
		    	    }

		    	    $('#subcategoria').append(options);
		    	});

		    	// Código para select de subcategoria começar com algo, mas não é obrigatório.
		    	$('#categoria').val('<?php echo $embarcacao->categoria; ?>').change();

		    	$('.save-edit-link').click(function(event){
		    	    event.preventDefault();

		    	    var button = $(this);

		    	    $.ajax({
		    	        url: $('base').attr('href')+'embarcacoes/atualiza_link',
		    	        type: 'POST',
		    	        data: {titulo: button.prev().find('#new-link').val(), id_imagem: button.closest('.atualiza-titulo').find('input:hidden').val()},
		    	        dataType: 'JSON',
		    	        success: function(response){
		    	            alert(response.message);
		    	        },
		    	        error: function(response){
		    	            alert('Ocorreu um erro no envio. Tente novamente mais tarde.');
		    	        }
		    	    });
		    	});
		    });
		</script>
		<?php
		    if($this->session->flashdata('tab_gal')){
		?>
		        <script>
		            $(document).ready(function(){
		                $('a[href="#tabs-2"]').click();
		            });
		        </script>
		<?php
		    }
		?>
		<?php
		    if($this->session->flashdata('tab_pan')){
		?>
		        <script>
		            $(document).ready(function(){
		                $('a[href="#panorama"]').click();
		            });
		        </script>
		<?php
		    }
		?>
		<?php $this->load->view('admin/inc/footer') ?>

	</body>
</html>
