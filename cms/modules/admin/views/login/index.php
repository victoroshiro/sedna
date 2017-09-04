<!DOCTYPE html>
<html>
    <head>
        <!-- Meta -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <base href="<?php echo base_url(); ?>" /> 
        <!-- End of Meta -->


        <title>CMS - Cimitarra</title>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="<?php echo site_url('modules/admin/assets/css/styles.css'); ?>">

        <?php if (@$msg): ?>
            <script>
                abrir("<?php echo $msg ?>");
            </script>
        <?php endif ?>

    </head>
    <body>
      <div class="wrapper">
        <form class="form-signin" action="<?php echo site_url('admin/logar'); ?>" method="POST">
          <div class="logo-login">
            <img src="<?php echo site_url('../assets/images/logo.png'); ?>">
          </div>      
          <h2 class="form-signin-heading text-center">CMS Cimitarra</h2>
          <input type="text" class="form-control" name="usuario" placeholder="Usuário" required autofocus>
          <input type="password" class="form-control" name="senha" placeholder="Senha" required>      
          <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
        </form>
      </div>       
    </body>
</html>