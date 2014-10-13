<?php decorate_with(false) ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <title>Sistema de Registro Nacional de Ferias del Libro</title>
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
        <link href="/css/bootstrapflatty.min.css" rel="stylesheet" media="screen">
            <script src="/js/jquery-2.1.1.js"></script>            
            <script src="/js/bootstrap.min.js"></script>
            <style>
                .ancho_input {
                    width: 200px !important;
                }
            </style>
    </head>
    <body style="background-image:  url('/images/background.jpg'); background-attachment: fixed;">
        <div style="background-color:white; background-image:  url('/images/headerimage.jpg'); ">
            <br><br>
                    <center><?php echo image_tag('logo.png') ?></center>
                    <center><h3><b>Sistema de Registro Nacional de Ferias del Libro</b></h3></center>
                    <hr style="width:50%; border: 1px solid darkgrey;">
                        <br>
                            </div>
                            <br>
                                <br>
                                    <div class="container" style="max-width:300px; ">
                                        <div class="row">
                                            <div class="" id="loginModal">
                                                <div class="well">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
                                                        <li><a href="#create" data-toggle="tab">Registrarse</a></li>
                                                    </ul>
                                                    <div id="myTabContent" class="tab-content">
                                                        <div class="tab-pane active in" id="login">
                                                            <form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
                                                                <fieldset>
                                                                    <div id="legend">
                                                                        <br>	
                                                                            <legend class="">Acceder</legend>
                                                                    </div>    
                                                                    <div class="control-group">
                                                                        <!-- Username -->
                                                                        <label class="control-label"  for="username">Usuario</label>
                                                                        <div class="controls">
                                                                            <?php echo $form['username']->render(array('placeholder' => 'Nombre de usuario', 'class' => 'input-xlarge', 'class' => 'ancho_input')) ?> 	
                                                                            <?php echo $form['username']->renderError() ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="control-group">
                                                                        <!-- Password-->
                                                                        <label class="control-label" for="password">Contraseña</label>
                                                                        <div class="controls">
                                                                            <?php echo $form['password']->render(array('placeholder' => 'Contraseña', 'class' => 'ancho_input')) ?>
                                                                            <?php echo $form['password']->renderError('Clave invalida') ?>
                                                                            <?php echo $form['_csrf_token'] ?>
                                                                        </div>
                                                                    </div>


                                                                    <div class="control-group">
                                                                        <!-- Button -->
                                                                        <div class="controls">
                                                                            <br>
                                                                                <button class="btn btn-success">Login</button>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                            </form>                
                                                        </div>
                                                        <div class="tab-pane fade" id="create">
                                                            <form id="tab">
                                                                <label>Usuario</label>
                                                                <?php echo $form['username']->render(array('placeholder' => 'Nombre de usuario', 'class' => 'ancho_input')) ?>
                                                                <label>Nombre</label>
                                                                <input type="text" value="" class="ancho_input">
                                                                    <label>Apellido</label>
                                                                    <input type="text" value="" class="ancho_input">
                                                                        <label>Correo</label>
                                                                        <input type="text" value="" class="ancho_input">
                                                                            <div>
                                                                                <br>
                                                                                <button class="btn btn-primary">Enviar</button>
                                                                            </div>
                                                                            </form>
                                                                            </div>
                                                                            </div>
                                                                            </div>
                                                                            </div>
                                                                            </div>
                                                                            </div>




                                                                            </body>

                                                                            </html>




