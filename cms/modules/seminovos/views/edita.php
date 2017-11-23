<!DOCTYPE html>
<html>
	<?php $this->load->view('admin/inc/header') ?>

	<body>
		<div id="header">
			<?php $this->load->view('admin/inc/top') ?>
			<?php $this->load->view('admin/inc/menu') ?>
		</div>
		
		<div class="container">
			<h1>Seminovos</h1>
			<?php $this->load->view('admin/inc/messages') ?>

			<ul class="nav nav-tabs" role="tablist">
			    <li role="presentation" class="active"><a href="#template" aria-controls="home" role="tab" data-toggle="tab">Template</a></li>
	            <li role="presentation"><a href="#galeria" aria-controls="galeria" role="tab" data-toggle="tab">Galeria</a></li>
			</ul>
			<div class="tab-content">
			    <div role="tabpanel" class="tabs-imoveis tab-pane fade in active" id="template">
					<form method="post" action="<?php echo site_url('seminovos/atualizar'); ?>" id="form_novidades" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?= $seminovo->id ?>">
							
						<div id="acoes" class="text-right">
							<input class="btn btn-default" type="button" onclick="location.href = '<?php echo site_url('seminovos'); ?>'" value="Cancelar" />
							<input class="btn btn-success" type="submit" value="Salvar" />
						</div>
						
						<?php include 'form.php'; ?>
					

						<div id="acoes" class="text-right">
							<input class="btn btn-default" type="button" onclick="location.href = '<?php echo site_url('seminovos'); ?>'" value="Cancelar" />
							<input class="btn btn-success" type="submit" value="Salvar" />
						</div>
					   
						<!-- End of fieldset -->
					</form>
				</div>
				<div role="tabpanel" class="tabs-imoveis tab-pane fade in" id="galeria">
                    <form method="post" action="seminovos/galeria" id="form_galeria" enctype="multipart/form-data">
                        <input type="hidden" name="id_seminovo" value="<?= $seminovo->id; ?>" />

                        <div id="acoes" class="text-right margin-top-s">
                            <input class="btn btn-default" type="button" onclick="location.href = 'seminovos'" value="Cancelar" />
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
	    		    	                                <img src="<?php echo site_url('../userfiles/seminovos/'.$imagem->imagem); ?>" class="galeria-imoveis img-responsive margin-bottom-xs" />
	    		    	                                <a href="<?php echo site_url('seminovos/exclui_imagem_galeria/'.$imagem->id); ?>" class="btn btn-danger" />
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
		
		<?php $this->load->view('admin/inc/footer') ?>
		
		<script>CKEDITOR.replace('descricao')</script>
	</body>
</html>