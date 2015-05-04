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
                                                                        <center><br>Para realizar el cambio de contraseña. Comuníquese a través de <br><b>CORREO</b></center>
                                                                    </div>
                                                                </fieldset>
                                                            </form>                
                                                        </div>
                                                        <div class="tab-pane fade" id="create" style="height:500px; overflow: scroll;">
                                                            
                                                                <br><label>RIF <font color="red">*</font></label>
                                                                    <br><input type="text" value="" id="rif" name="rif" class="ancho_input">
                                                                            <br><center>* Ingrese el RIF bajo el siguiente formato: <b>V000000000</b></center>  
                                                                                <br><label>Institución <font color="red">*</font></label>
                                                                                    <br><input type="text" value="" id="usuario" name="usuario" class="ancho_input">                                                                                
                                                                                            <br>
                                                                                                <label>Tipo de Usuario <font color="red">*</font></label><br>
                                                                                                <select name="organizador" id="organizador">
                                                                                                    <option value="1">Organizador</option>
                                                                                                    <option value="0">Expositor</option>
                                                                                                </select><br><br>
                                                                                                    <label>Ente Organizador <font color="red">*</font></label><br>
                                                                                                <input type="text" value="" name="ente" id="ente" class="ancho_input"><br>
                                                                                                        <label>Sector <font color="red">*</font></label><br>
                                                                                                 <select name="sector" id="sector">
                                                                                                    <option value="1">Publico</option>
                                                                                                    <option value="0">Privado</option>
                                                                                                 </select><br><br>
                                                                                                 <label>Unidad Responsable <font color="red">*</font></label>
                                                                                                <input type="text" value="" name="unidad_responsable" id="unidad_responsable" class="ancho_input">
                                                                                                <label>Correo Electrónico <font color="red">*</font></label>
                                                                                                <input type="text" value="" name="email" id="email" class="ancho_input">
                                                                                                <label>Teléfono <font color="red">*</font></label>
                                                                                                <input type="text" value="" name="telefono" id="telefono" class="ancho_input">    
                                                                                                <br><center>* Ingrese el Teléfono bajo el siguiente formato: <b>0000-0000000</b></center> 
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
    var rif_valido = {};
    jQuery(document).ready(function() {
     
    $("#rif").focusout(function(){
          var rif=$(this).val();
          var dataString = 'rif=' + rif; 
            $.ajax({
                type: "POST",
                        url: "<?php echo url_for('registro/ajaxvalidarrif') ?>",
                        data:   dataString,
                        success: function(html){
                            switch (html) {
                                case '0':
                                    alert('Formato de Rif inválido, inserte nuevamente');
                                    rif_valido.valor = 0;
                                    break;
                                case '1':
                                    alert('No hay conexión a Internet');
                                    rif_valido.valor = 1;
                                    break;
                                case '2':
                                    alert('Rif inválido,c inténtelo nuevamente');
                                    rif_valido.valor = 2;
                                    break;
                                case '3':
                                    alert('Rif válido');
                                    rif_valido.valor = 3;
                                    break;
                            }   
                            
                        }

            }); //fin de ajax

      })    
                                                                                                                            
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
    
     $('#telefono').blur(function(){
        $('#telefono:last').filter(function(){
            var telef = $('#telefono').val();
            var telefonoReg = /([0-9]{4})([-])([0-9]{7})$/;
            if (!telefonoReg.test(telef)) {
                alert('El formato de teléfono introducido es inválido. Inténtelo nuevamente');
                $('#telefono:last').val('');
            }
        });
    });   
                                                                                                                    
    $('#registrar').click(function(event){
        var institucion = $('#usuario').val();
        var organizador = $('#organizador option:selected').val();
        var rif = $('#rif').val();
        var ente = $('#ente').val();
        var sector = $('#sector option:selected').val();
        var unidad_responsable = $('#unidad_responsable').val();
        var email = $('#email').val();
        var telefono = $('#telefono').val();
        if (/*rif_valido.valor == 3 &&*/  institucion != '' && organizador != '' && rif != '' && ente != '' && sector != '' && unidad_responsable != '' && email != '' && telefono != '') {
            var dataString = 'institucion=' + institucion + 
                             '&organizador=' + organizador + 
                             '&rif=' + rif  + 
                             '&ente=' + ente + 
                             '&sector=' + sector +
                             '&unidad_responsable=' + unidad_responsable +
                             '&telefono=' + telefono +
                             '&email=' + email;
            $.ajax({
                type: "POST",
                        url: "<?php echo url_for('registro/ajaxregistrar') ?>",
                        data:   dataString,
                        success: function(html){
                               alert(html);
                                
                        }

            }); //fin de ajax
        } else {
            alert('Recuerde que todos los campos del formulario son obligatorios');
        }    
    });    

});                            
</script>    

