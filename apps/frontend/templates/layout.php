<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <title>Sistema de Registro Nacional de Ferias del Libro</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body style="background-image:  url('/images/background.jpg'); background-attachment: fixed;">
    <div class="jumbotron2">
        <table class="table table-hover table-responsive">
            <tr>
                <td style="padding-left: 40px;"><?php echo image_tag('logo.png') ?></td>
                <td style="vertical-align: middle;"><h3><b> Sistema de Registro Nacional de Ferias del Libro </b></h3></td>
                <td style="text-align: right; vertical-align: middle; padding-right: 20px;">
                    <?php echo link_to(image_tag('home.png'),'usuario/bienvenido',array('title' => 'Home'))?>
                    &nbsp;&nbsp;&nbsp;&nbsp;<?php echo link_to(image_tag('logout.png'),'/logout',array('title' => 'Cerrar Sesión'))?>
                </td>                
            </tr>
        </table>
    </div>      
    <div class="container container-fluid">

      <!-- Main component for a primary marketing message or call to action -->
        <?php echo $sf_content ?>

    </div> <!-- /container -->

</body>          
          
