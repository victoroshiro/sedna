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
                <h1>Embarcações</h1>

                <?php $this->load->view('admin/inc/messages') ?>

                <?php  
                    if($this->session->userdata('tipo') == 1){
                ?>

                        <h2 class="h4">Pesquisar</h2>
                        <form name="busca" id="busca" action="<?php echo site_url('embarcacoes'); ?>" method="post">
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
                                    <a class="btn btn-default" href="<?php echo site_url('embarcacoes/limpar'); ?>">
                                        Cancelar
                                    </a>
                                </div>
                            </div>
                        </form>

                        <hr>
                <?php
                    }
                ?>
                <div id="acoes" class="text-right">
                    <a class="btn btn-danger" href="javascript: void(0);" onclick="excluirRegistros('embarcacoes', 'excluir_selecionados');">
                        Excluir
                    </a>
                    <a class="btn btn-default" href="<?php echo site_url('embarcacoes/cria'); ?>">                                    
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
                            <td>Título</td>
                            <td>Data de Modificação</td>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php 
                            if ($embarcacoes){
                                foreach ($embarcacoes as $key => $imovel){
                        ?>
                                    <tr class="cliente-item" id="<?php echo $imovel->id ?>">
                                        <td class="selecao text-center one">
                                            <input type="checkbox" name="" id="" value="<?php echo $imovel->id ?>" />
                                        </td>
                                        <td align="center">
                                            <?php echo $imovel->titulo; ?>
                                        </td>
                                        <td align="center">
                                            <?php echo $imovel->data_criacao; ?>
                                        </td>
                                        <td align="center">
                                            <a href="<?php echo site_url('embarcacoes/editar/'.$imovel->id); ?>">Modificar</a>
                                        </td>
                                    </tr>
                        <?php 
                                }
                            }else{
                        ?>
                                <tr>
                                    <td class="col-first" colspan="5">Nenhum item cadastrado no sistema.</td>
                                </tr>     
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
                <div id="acoes" class="text-right">
                    <a class="btn btn-danger" href="javascript: void(0);" onclick="excluirRegistros('embarcacoes', 'excluir_selecionados');">
                        Excluir
                    </a>
                    <a class="btn btn-default" href="<?php echo site_url('embarcacoes/cria'); ?>">                                    
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