<!DOCTYPE html>
<html>
    <?php $this->load->view('admin/inc/header') ?>
    <body>
        <div id="header">
            <!-- Top -->
            <?php $this->load->view('admin/inc/top') ?>
            <!-- End of Top-->

            <!-- The navigation bar -->
            <?php $this->load->view('admin/inc/menu') ?>
            <!-- End of navigation bar" -->
        </div>
        
        <!-- Main Content -->
        <div class="container">
            <h1>Exportar</h1>
            <?php $this->load->view('admin/inc/messages') ?>

            <form method="post" action="<?php echo site_url('exportar/gerar_excel'); ?>" id="form_banners">
                <div id="acoes" class="text-right">
                    <input class="btn btn-default" type="button" onclick="location.href = '<?php echo site_url('home'); ?>'" value="Cancelar" />
                    <input class="btn btn-success" type="submit" value="Gerar Excel" />
                </div>
                
                <div class="col-sm-12 col-xs-12 col-lg-12 form-group exportar-filtros">
                    <label>Opções: </label>
                    <div class="radio">
                        <label for="contatos">
                            <input type="radio" name="origem" id="contatos" value="Contato" checked="checked">
                            Contato
                        </label>
                    </div>
                    <div class="radio">
                        <label for="newsletter">
                            <input type="radio" name="origem" id="newsletter" value="Newsletter">
                            Newsletter
                        </label>
                    </div>
                    
                    <span class="validate_error"></span>
                    <span class="validate_success"></span>
                </div>
            </form>
        </div>
        <!-- End of Main Content -->
            
        <?php $this->load->view('admin/inc/footer') ?>
    </body>