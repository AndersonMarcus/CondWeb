<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Home | Corlate</title>

        <!-- core CSS -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/animate.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/prettyPhoto.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/main.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/responsive.css'); ?>" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="<?php echo base_url('assets/js/html5shiv.js'); ?>></script>
        <script src="<?php echo base_url('assets/js/respond.min.js'); ?>"></script>
        <![endif]-->   
        <link rel="shortcut icon" href="<?php echo base_url('assets/images/ico/favicon.ico'); ?>">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href=" <?php echo base_url('assets/images/ico/apple-touch-icon-144-precomposed.png'); ?>">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url('assets/images/ico/apple-touch-icon-114-precomposed.png'); ?>">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('assets/images/ico/apple-touch-icon-72-precomposed.png'); ?>">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url('assets/images/ico/apple-touch-icon-57-precomposed.png'); ?>">
    </head><!--/head-->


    <body class="homepage">

        <header id="header">
            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-xs-4">
                            <div class="top-number"><p><i class="fa fa-phone-square"></i> 47-8895-9680</p></div>
                        </div>
                        <div class="col-sm-6 col-xs-8">
                            <div class="social">
                                <ul class="social-share">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                </ul>
                                <div class="search">
                                    <form role="form">
                                        <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                                        <i class="fa fa-search"></i>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.container-->
            </div><!--/.top-bar-->

            <nav class="navbar navbar-inverse" role="banner">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>

                    </div>
                <h1 class="navbar-brand" style="font-family: fantasy; font-style: italic; font-size:50px;">CondWeb</h1>	
                    <div class="collapse navbar-collapse navbar-right">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="<?php echo base_url(''); ?>">Início</a></li>
                            <li><a href="<?php echo base_url('about.php'); ?>">Leis</a></li>
                           

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cadastro <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url('condominios'); ?>">Condomínio</a></li>
                                    <li><a href="<?php echo base_url('usuarios'); ?>">Usuário</a></li>
                                    <li><a href="<?php echo base_url('apartamentos'); ?>">Apartamento</a></li>
                                    <li><a href="<?php echo base_url('pagar'); ?>">Contas a Pagar</a></li>
                                    <li><a href="<?php echo base_url('receber'); ?>">Contas a Receber</a></li>
                                    

                                </ul>
                            </li>

                            <li><a href="<?php echo base_url('application/view/contact-us.php'); ?>">Contato</a></li> 
                             <li> <?=anchor(base_url().'login/logout_ci', 'Logout')?></li>  
                        </ul>
                    </div>
                </div><!--/.container-->
            </nav><!--/nav-->

            <section >
                <div class="container">
                    <div class="center"> 
                        <br/>
                        <h2>Cadastro de Contas a Pagar</h2>

                    </div> 

                    <?php echo form_open('pagar/inserir', 'id="form-pagar"'); ?>             

                    <div class="form-group">
                        <div class="col-sm-5 col-sm-offset-1">


                            <label for="total">Escolha o condomínio:</label><br/>

                            <select class="form-control" name="condominios" id="condominios"  >
                                <?= $options_condominios ?>

                            </select>
                            <div class="form-group"> 
                                <label for="nome">Nome da conta:</label><br/>
                                <input type="text" class="form-control" name="nome" value="<?php echo set_value('nome'); ?>"/>
                                <div class="error"><?php echo form_error('nome'); ?></div></div>
                            <div class="form-group">
                                <label for="valor">Valor:</label><br/>
                                <input type="text" class="form-control" name="valor" value="<?php echo set_value('valor'); ?>"/>
                                <div class="error"><?php echo form_error('valor'); ?></div></div></div>
                        <div class="col-sm-5"> 
                            <div class="form-group">
                                <label for="valorQtd">Quantidade:</label><br/>
                                <input type="text" class="form-control" name="valorQtd" value="<?php echo set_value('valorQtd'); ?>"/>
                                <div class="error"><?php echo form_error('valorQtd'); ?></div></div>


                            <div class="form-group">
                                <label for="total">Total:</label><br/>
                                <input  class="form-control" type="text" name="total" value="<?php echo set_value('total'); ?>"/>
                                <div class="error"><?php echo form_error('total'); ?></div></div>

                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-primary btn-lg" style="position: relative; left: 100px;"/>
                    </div>
                </div>
                <?php echo form_close(); ?>


            </section>
            <br/><br/>
            <!-- Lista as Pessoas Cadastradas -->
            <div class="center">        
                <h4>Contas a Pagar Cadastradas</h4>

            </div> 
            <div class="form-group">


            </div>
            <div  class="center">

                <?php foreach ($pagar as $contasPagar): ?>
                    <li>
                        <a title="Deletar" href="<?php echo base_url() . 'pagar/deletar/' . $contasPagar->idContasPagar; ?>" onclick="return confirm('Confirma a exclusão deste registro?')">
                            <img src="<?php echo base_url('assets/images/lixo.png'); ?>" />
                        </a>
                        <span> - </span>
                        
                        <a title="Editar" href="<?php echo base_url() . 'pagar/editar/' . $contasPagar->idContasPagar; ?>"><?php echo $contasPagar->nome,''; ?></a>
                        <span></span>
                        <span><?php echo $contasPagar->valor; ?></span>
                        




                    </li>
                <?php endforeach ?>

            </div>

            <br/><br/><br/><br/>

            <!-- Fim Lista -->
            <footer id="footer" class="midnight-blue">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            &copy; 2014 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">Andrsn</a>. All Rights Reserved.
                        </div>
                        <div class="col-sm-6">
                            <ul class="pull-right">
                                <li><a href="#">Início</a></li>
                                <li><a href="#">Leis</a></li>
                                <li><a href="#">Sobre</a></li>
                                <li><a href="#">Contato</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer><!--/#footer-->

            <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
            <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
            <script src="<?php echo base_url('assets/js/jquery.prettyPhoto.js'); ?>"></script>
            <script src="<?php echo base_url('assets/js/jquery.isotope.min.js'); ?>"></script>
            <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
            <script src="<?php echo base_url('assets/js/wow.min.js'); ?>"></script>

    </body>
</html>

