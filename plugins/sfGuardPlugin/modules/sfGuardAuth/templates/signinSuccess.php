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
                                                            
                                                                <br><label>RIF</label>
                                                                    <br><input type="text" value="" id="rif" name="rif" class="ancho_input">
                                                                            <br><center>* Ingrese el RIF bajo el siguiente formato: <b>V-000000000</b></center>  
                                                                                <br><label>Institución</label>
                                                                                    <br><input type="text" value="" id="usuario" name="usuario" class="ancho_input">                                                                                
                                                                                            <br><label>Correo Electrónico</label>
                                                                                                <input type="text" value="" name="email" id="email" class="ancho_input">
                                                                                                    <div>
                                                                                                        <br>
                                                                                                            <button id="registrar" class="btn btn-primary">Enviar</button>
                                                                                                    </div>
                                                                                                    
                                                                                                    </div>
                                                                                                    </div>
                                                                                                    </div>
                                                                                                    </div>
                                                                                                    </div>
                                                                                                    </div>
                                                                                                    <br>
                                                                                                    <br>
                                                                                                    <br>



                                                                                                                </body>

                                                                                                                </html>


                                                                                                                <script>
                                                                                                                    jQuery(document).ready(function() {
                                                                                                                    jQuery("#rif").blur(function(e) {
                                                                                                                    var rif = $('#rif').val();
                                                                                                                    /*
                                                                                                                            $.ajax({
                                                                                                                            type: "POST",
                                                                                                                                    url: "<?php echo url_for('usuario/ajaxverificarrif') ?>",
                                                                                                                                    data:   "rif=" + rif,
                                                                                                                                    success: function(html){
                                                                                                                                    var JSONobject = JSON.parse(html);
                                                                                                                                            $("#feria_id_municipio").parent("td").attr('id', 'municipio');
                                                                                                                                            $("#feria_id_municipio").parent("td").empty();
                                                                                                                                            $("#municipio").html(JSONobject.municipio);
                                                                                                                                            $("#feria_id_parroquia").parent("td").attr('id', 'parroquia');
                                                                                                                                            $("#feria_id_parroquia").parent("td").empty();
                                                                                                                                            $("#parroquia").html(JSONobject.parroquia);
                                                                                                                                    }
                                                                                                                      
                                                                                                                            }); //fin de ajax   
                                                                                                                    */        
                                                                                                                    });        
                                                                                                                            
                                                                                                                    $('#email').blur(function(){
                                                                                                                        $('#email:last').filter(function(){
                                                                                                                            var emil = $('#email').val();
                                                                                                                            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                                                                                                                            if (!emailReg.test(emil)) {
                                                                                                                                alert('El formato de correo introducido es inválido. Inténtelo nuevamente');
                                                                                                                                $('#email:last').val('');
                                                                                                                            }
                                                                                                                        });
                                                                                                                    });
                                                                                                                    
                                                                                                                    $('#registrar').click(function(){
                                                                                                                        var institucion = $('#usuario').val();
                                                                                                                        var rif = $('#rif').val();
                                                                                                                        var email = $('#email').val();
                                                                                                                        var dataString = 'institucion=' + institucion + '&rif=' + rif  + '&email=' + email;
                                                                                                                        $.ajax({
                                                                                                                            type: "POST",
                                                                                                                                    url: "<?php echo url_for('registro/ajaxregistrar') ?>",
                                                                                                                                    data:   dataString,
                                                                                                                                    success: function(html){
                                                                                                                                    
                                                                                                                                           
                                                                                                                                    }
                                                                                                                      
                                                                                                                        }); //fin de ajax
                                                                                                                    });    

                                                                                                                });                            
                                                                                                                </script>    

