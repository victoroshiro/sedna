<footer id="footer" class="text-center">
    <a href="<?php echo site_url() ?>" target="_blank" title="Ir para o site">Ir para o Site</a> &bull;
    <a href="<?php echo site_url('admin'); ?>" title="Painel de Controle">Painel de Controle</a> &bull;
    <?php  
        if($this->session->userdata('tipo') == 1){
    ?>
		    <a href="<?php echo site_url('usuarios'); ?>" title="Usuários">Usuários</a> &bull;
    <?php  
    	}
    ?>
    <a href="<?php echo site_url('admin/sair'); ?>" title="Logout">Logout</a>
</footer>