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
            <div id="main">
                <h1>Destaques</h1>

                <?php $this->load->view('admin/inc/messages') ?>
                <div id="acoes" class="text-right">
                    <form action="<?php echo site_url('destaques/salvar_ordem'); ?>" method="POST" class="pull-left">
                        <input type="hidden" value="" name="new_order_array" class="new_order_input">
                        <button class="btn btn-success reorder_button" disabled>
                            Salvar Ordem
                        </button>
                    </form>

                    <div class="btn btn-danger" name="excluir-registros" data-module="destaques">
                        Excluir
                    </div>
                    <a class="btn btn-default" href="<?php echo site_url('destaques/cria'); ?>">                                    
                        Incluir
                    </a>
                </div>

                <table class="table table-striped middle-vertical-align">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <td>
                                <input type="checkbox" name="selecionar_todos" onclick="selecionar_todos(this)" id="selecionar_todos" value="" />
                            </td>
                            <td>Foto</td>
                            <td>Nome</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody class="text-center" id="sortable">
                        <?php if ($destaques): ?>
                            <?php foreach ($destaques as $key => $destaque): ?>
                                <tr id="<?php echo $destaque->id ?>">
                                    <td>
                                        <span class="ui-icon ui-icon-arrowthick-2-n-s"></span>  
                                    </td>
                                    <td class="selecao"><input type="checkbox" name="" id="" value="<?php echo $destaque->id ?>" /></td>
                                    <td>
                                        <?php if ($destaque->imagem): ?>
                                        <a href="<?php echo base_url('destaques/editar/'.$destaque->id); ?>">
                                            <img src="<?php echo site_url('../userfiles/destaques/'.$destaque->imagem); ?>" width="200px" />
                                        </a>
                                        <?php endif ?>
                                        <?php if ($destaque->video_destaque == 1): ?>
                                            <a href="<?php echo base_url('destaques/editar/'.$destaque->id); ?>">
                                                <img src="https://img.youtube.com/vi/<?php echo $destaque->video_id ?>/0.jpg" width="200px" />
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                    <td align="center"><?php echo $destaque->titulo; ?></td>
                                    <td align="center">
                                        <?php if ($destaque->habilitado == 1): ?>
                                            Sim
                                        <?php else: ?>
                                            Não
                                        <?php endif ?>
                                    </td>
                                    <td align="center"><a href="<?php echo site_url('destaques/editar/'.$destaque->id); ?>">Modificar</a></td>
                                </tr>
                            <?php endforeach ?>
                        <?php else: ?>
                            <tr class="odd">
                                <td class="col-first" colspan="5">Nenhum item cadastrado no sistema.</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>

                <div id="acoes" class="text-right">
                    <form action="<?php echo site_url('destaques/salvar_ordem'); ?>" method="POST" class="pull-left">
                        <input type="hidden" value="" name="new_order_array" class="new_order_input">
                        <button class="btn btn-success reorder_button" disabled>
                            Salvar Ordem
                        </button>
                    </form>

                    <div class="btn btn-danger" name="excluir-registros" data-module="destaques">
                        Excluir
                    </div>
                    <a class="btn btn-default" href="<?php echo site_url('destaques/cria'); ?>">                                    
                        Incluir
                    </a>
                </div>
            </div>
        </div>
        <!-- End of bgwrap -->

        <!-- Footer -->
        <?php $this->load->view('admin/inc/footer') ?>
        <!-- End of Footer -->
    </body>
</html>
