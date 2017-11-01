<?PHP
$tipo = $this->session->userdata('tipo');
?>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav" aria-expanded="false">
            <span class="sr-only">Navegação</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="main-nav">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo site_url('admin'); ?>" title="Home" class="img-link"><img src="<?php echo site_url('../assets/images/logo.png'); ?>" class="img-menu"></a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('banners'); ?>">Banners</a></li>
                <li><a href="<?php echo site_url('quem_somos'); ?>">Quem Somos</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Fidelidade <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('texto_fidelidades'); ?>">Texto de Fidelidade</a></li>
                <li><a href="<?php echo site_url('fidelidades'); ?>">Fidelidade</a></li>
              </ul>
            </li>
            <li><a href="<?php echo site_url('noticias'); ?>">Notícias</a></li>
            <li><a href="<?php echo site_url('imprensas'); ?>">Imprensa</a></li>
            <li><a href="<?php echo site_url('seminovos'); ?>">Seminovos</a></li>
            <li><a href="<?php echo site_url('embarcacoes'); ?>">Embarcações</a></li>
            <li><a href="<?php echo site_url('landing_pages'); ?>">Landing Pages</a></li>
            <li><a href="<?php echo site_url('exportar'); ?>">Exp. Contatos</a></li>
          </ul>
          
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo site_url('usuarios'); ?>"><span class="glyphicon glyphicon-user"></span> Usuários</a></li>
            <li><a href="<?php echo site_url('admin/sair'); ?>"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
          </ul>          
        </div><!-- /.navbar-collapse -->
      </div>
    </div>
  </div><!-- /.container-fluid -->
</nav>
