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
                <h1>Notícias</h1>

                <?php $this->load->view('admin/inc/messages') ?>

                <h2 class="h4">Pesquisar</h2>
                <form name="busca" id="busca" action="<?php echo site_url('imprensas'); ?>" method="post">
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
                            <a class="btn btn-default" href="<?php echo site_url('imprensas/limpar'); ?>">
                                Cancelar
                            </a>
                        </div>
                    </div>
                </form>

                <hr>

                <div id="acoes" class="text-right">
                    <div class="btn btn-danger" name="excluir-registros" data-module="imprensas">
                        Excluir
                    </div>
                    <a class="btn btn-default" href="<?php echo site_url('imprensas/cria'); ?>">                                    
                        Incluir
                    </a>
                </div>
                <!-- <legend>Resultado</legend> -->
                <table class="table table-striped middle-vertical-align">
                    <thead>
                        <tr class="text-center">
                            <td>
                                <input type="checkbox" name="selecionar_todos" onclick="selecionar_todos(this)" id="selecionar_todos" value="" />
                            </td>
                            <td>Data</td>
                            <td>Título</td>
                            <td>Data de Publicação</td>
                        </tr>
                    </thead>
                    <tbody class="text-center" id="sortable">
                        <?php if ($imprensas_lista): ?>
                            <?php foreach ($imprensas_lista as $key => $imprensa): ?>
                                <tr id="<?php echo $imprensa->id ?>">
                                    <td class="selecao text-center">
                                        <input type="checkbox" name="" id="" value="<?php echo $imprensa->id ?>" />
                                    </td>
                                    <td align="center" >
                                        <?php echo $imprensa->data_imprensa_f; ?>
                                    </td>
                                    <td align="center" >
                                        <?php echo $imprensa->titulo; ?>
                                    </td>
                                    <td align="center" >
                                        <?php echo $imprensa->data_criacao; ?>
                                    </td>
                                    <td align="center">
                                        <a href="<?php echo site_url('imprensas/editar/'.$imprensa->id); ?>">Modificar</a>
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

                <div id="acoes" class="text-right">
                    <div class="btn btn-danger" name="excluir-registros" data-module="imprensas">
                        Excluir
                    </div>
                    <a class="btn btn-default" href="<?php echo site_url('imprensas/cria'); ?>">
                        Incluir
                    </a>
                </div>

                <?PHP if (isset($links)): ?>
                    <!-- Page-ination -->
                    <div class="pagination">
                        <?php echo $links; ?>
                    </div>
                    <!-- End Page-ination -->
                <?PHP endif; ?>

            </div>
        </div>
    </div>

        <?php $this->load->view('admin/inc/footer') ?>
    </body>
</html>
