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
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('banners'); ?>">Banners</a></li>
                <li><a href="<?php echo site_url('quem_somos'); ?>">Quem Somos</a></li>
                <li><a href="<?php echo site_url('dra_fairbanks'); ?>">Dra. Flavia</a></li>
              </ul>
            </li>
            <li><a href="<?php echo site_url('ginecologia'); ?>">Ginecologia</a></li>
            <li><a href="<?php echo site_url('imprensa'); ?>">Imprensa</a></li>
            <li><a href="<?php echo site_url('noticias'); ?>">Notícias</a></li>
            <li><a href="<?php echo site_url('mitos_verdades'); ?>">Mitos e Verdades</a></li>
            <li><a href="<?php echo site_url('sexualidade'); ?>">Sexualidade</a></li>
            <li><a href="<?php echo site_url('obstetricia'); ?>">Obstetrícia</a></li>
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