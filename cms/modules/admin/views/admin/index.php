<?PHP $tipo = $this->session->userdata('tipo'); ?>

<!DOCTYPE html>
<html>
    <?php $this->load->view('inc/header'); ?>
    <body>
        <div id="header">
            <?php $this->load->view('inc/top') ?>
            <?php $this->load->view('inc/menu') ?>                
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="welcome-system">Bem-vindo<?php echo ($this->session->userdata('nome')) ? ", ".$this->session->userdata('nome') : ''; ?></h1>
                    <p>Escolha uma opção:</p>
                    
                    <?php $this->load->view('inc/messages'); ?>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="thumbnail text-center">
                                <a href="<?php echo site_url('banners'); ?>">
                                    <span class="font-lg glyphicon glyphicon-picture"></span>
                                    <div class="caption">Banners (Home)
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="thumbnail text-center">
                                <a href="<?php echo site_url('noticias'); ?>">
                                    <span class="font-lg glyphicon glyphicon-list-alt"></span>
                                    <div class="caption">Notícias
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="thumbnail text-center">
                                <a href="<?php echo site_url('mitos_verdades'); ?>">
                                    <span class="font-lg glyphicon glyphicon-question-sign"></span>
                                    <div class="caption">Mitos e Verdades
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="thumbnail text-center">
                                <a href="<?php echo site_url('ginecologia'); ?>">
                                    <span class="font-lg glyphicon glyphicon-certificate"></span>
                                    <div class="caption">Ginecologia
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="thumbnail text-center">
                                <a href="<?php echo site_url('quem_somos'); ?>">
                                    <span class="font-lg glyphicon glyphicon-user"></span>
                                    <div class="caption">Quem Somos
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="thumbnail text-center">
                                <a href="<?php echo site_url('dra_fairbanks'); ?>">
                                    <span class="font-lg glyphicon glyphicon-heart-empty"></span>
                                    <div class="caption">Dra. Flavia Fairbanks
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="thumbnail text-center">
                                <a href="<?php echo site_url('sexualidade'); ?>">
                                    <span class="font-lg glyphicon glyphicon-bell"></span>
                                    <div class="caption">Sexualidade
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="thumbnail text-center">
                                <a href="<?php echo site_url('obstetricia'); ?>">
                                    <span class="font-lg glyphicon glyphicon-book"></span>
                                    <div class="caption">Obstetrícia
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="thumbnail text-center">
                                <a href="<?php echo site_url('imprensa'); ?>">
                                    <span class="font-lg glyphicon glyphicon-globe"></span>
                                    <div class="caption">Imprensa
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="thumbnail text-center">
                                <a href="<?php echo site_url('landing_pages'); ?>">
                                    <span class="font-lg glyphicon glyphicon-fire"></span>
                                    <div class="caption">Landing Pages
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="thumbnail text-center">
                                <a href="<?php echo site_url('exportar'); ?>">
                                    <span class="font-lg glyphicon glyphicon-floppy-save"></span>
                                    <div class="caption">Exportar Contatos
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('inc/footer') ?>
    </body>
</html>


