<!DOCTYPE html>
<html>
	<?php $this->load->view('admin/inc/header') ?>

	<body>
		<div id="header">
			<?php $this->load->view('admin/inc/top') ?>
			<?php $this->load->view('admin/inc/menu') ?>
		</div>
		
		<div class="container">
			<h1>Landing Pages</h1>
			<?php $this->load->view('admin/inc/messages') ?>
			
			<form method="post" action="<?php echo site_url('landing_pages/salvar'); ?>" id="form_novidades" enctype="multipart/form-data">
					
				<div id="acoes" class="text-right">
					<input class="btn btn-default" type="button" onclick="location.href = '<?php echo site_url('landing_pages'); ?>'" value="Cancelar" />
					<input class="btn btn-success" type="submit" value="Salvar" />
				</div>
				
				<?php include 'form.php'; ?>			

				<div id="acoes" class="text-right">
					<input class="btn btn-default" type="button" onclick="location.href = '<?php echo site_url('landing_pages'); ?>'" value="Cancelar" />
					<input class="btn btn-success" type="submit" value="Salvar" />
				</div>
			   
				<!-- End of fieldset -->
			</form>
		</div>
		
		<?php $this->load->view('admin/inc/footer') ?>
		
		<script>
			CKEDITOR.replace('descricao')
		</script>
	</body>
</html>