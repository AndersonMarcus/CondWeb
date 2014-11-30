<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/animate.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/prettyPhoto.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/main.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/responsive.css'); ?>" rel="stylesheet">
    </head>
    <body style="background-color: black">
        <?php
        $email = array('name' => 'email', 'placeholder' => 'NOME');
        $senha = array('name' => 'senha', 'placeholder' => 'SENHA');
        $submit = array('name' => 'submit', 'value' => 'ENTRAR', 'title' => 'ENTRAR');
        ?>
        <section style="position: relative; left: 450px; top: 200px;">
           
                </div> 
               
                <h1 class="navbar-brand" style="font-family: fantasy; position: relative; top: 0px; font-style: italic; left: 50px; font-size:50px;">CondWeb</h1>	
              
                  <div class="container">
                       
                      <div class="form-group" style="position: absolute; left:50px; top:120px;">
 <div class="col-sm-5 col-sm-offset-1">
                    <div class="form-group"> 
                        <?= form_open(base_url() . 'login/new_user') ?>

                        <?= form_input($email) ?><p><?= form_error('email') ?></p>
                    </div>
                    <div class="form-group"> 

                        <?= form_password($senha) ?><p><?= form_error('senha') ?></p>
                    </div>
     <div class="form-group" style="position: absolute; left:60px; top:120px; "> 

                        <?= form_submit($submit) ?>
                        <?= form_close() ?>
                        <?php
                        if ($this->session->flashdata('usuario_incorrecto')) {
                            ?>
                            <p><?= $this->session->flashdata('usuario_incorrecto') ?></p>
                            <?php
                        }
                        ?>
                    </div>
                    </div>   
                </div>
                        </div>
               

              
        </section>
    </body>
</html>