<!DOCTYPE html>
<html>
    <?php $this->load->view('admin/inc/header') ?>
    <body>
    <div id="header">
        <?php $this->load->view('admin/inc/top') ?>
        <?php $this->load->view('admin/inc/menu') ?>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Doutora Flavia Fairbanks</h1>

                <?php $this->load->view('admin/inc/messages') ?>

                <h2 class="h4">Pesquisar</h2>
                <form name="busca" id="busca" action="<?php echo site_url('dra_fairbanks'); ?>" method="post">
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label for="texto">Texto:</label>
                            <input type="text" class="form-control" name="texto" id="texto" value="<?php echo @$texto ?>">
                            <span class="validate_error"></span>
                            <span class="validate_success"></span>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-default" href="javascript: void(0);" onclick="$('#busca').submit();">
                                Buscar
                            </a>
                            <a class="btn btn-default" href="<?php echo site_url('dra_fairbanks/limpar'); ?>">
                                Cancelar
                            </a>
                        </div>
                    </div>
                </form>

                <hr>
                <!-- <legend>Resultado</legend> -->
                <table class="table table-striped middle-vertical-align">
                    <thead>
                        <tr class="text-center">
                            <td>
                                <input type="checkbox" name="selecionar_todos" onclick="selecionar_todos(this)" id="selecionar_todos" value="" />
                            </td>
                            <td>Título</td>
                            <td>Data de Publicação</td>
                        </tr>
                    </thead>
                    <tbody class="text-center" id="sortable">
                        <?php if ($dra_fairbanks_lista): ?>
                            <?php foreach ($dra_fairbanks_lista as $key => $quem): ?>
                                <tr id="<?php echo $quem->id ?>">
                                    <td class="selecao text-center">
                                        <input type="checkbox" name="" id="" value="<?php echo $quem->id ?>" />
                                    </td>
                                    <td align="center" >
                                        <?php echo $quem->titulo; ?>
                                    </td>
                                    <td align="center" >
                                        <?php echo $quem->data_criacao; ?>
                                    </td>
                                    <td align="center">
                                        <a href="<?php echo site_url('dra_fairbanks/editar/'.$quem->id); ?>">Modificar</a>
                                    </td>
                                </tr>        
                            <?php endforeach ?>
                        <?php else: ?>
                            <tr>
                                <td class="col-first" colspan="4">Nenhum item cadastrado no sistema.</td>
                            </tr>     
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

        <?php $this->load->view('admin/inc/footer') ?>
    </body>
</html>