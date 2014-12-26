<?php $id_feria = $sf_params->get('id_feria'); 
       $Feria = FeriaQuery::create()->filterById($id_feria)->findOne();
       if (count($Feria) > 0) {
           $nombre = $Feria->getNombre();
       } else {
           $nombre = '';
       }
?>
<div class="alert feria-registro" role="alert">
    <h4>Sección de registro asociado a la feria  <b><?php echo $nombre ?></b></h4>
</div>
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Menu</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Stand <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
                  <li><?php echo link_to("Agregar", "stand/new?id_feria=$id_feria")  ?></li>
                  <li><?php echo link_to("Listado", "stand/index?id_feria=$id_feria")  ?></li>
          </ul>
        </li>          
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Actividad <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
                  <li><?php echo link_to("Agregar", "actividad/new?id_feria=$id_feria")  ?></li>
                  <li><?php echo link_to("Listado", "actividad/index?id_feria=$id_feria")  ?></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Expositor <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
                  <li><?php echo link_to("Agregar", "expositor/nuevo?id_feria=$id_feria")  ?></li>
                  <li><?php echo link_to("Listado", "expositor/indexexp?id_feria=$id_feria")  ?></li>
          </ul>        
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Estado de Solicitudes <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
                  <li><?php echo link_to("Solicitud en Espera", "expositor_feria/espera?id_feria=$id_feria")  ?></li>  
                  <li><?php echo link_to("Aprobadas", "expositor_feria/aprobada?id_feria=$id_feria")  ?></li>
                  <li><?php echo link_to("Rechazadas", "expositor_feria/rechazada?id_feria=$id_feria")  ?></li>                                    
                  <li><?php echo link_to("Registrar Información de Pago", "expositor_feria/pago?id_feria=$id_feria")  ?></li>
                  <li><?php echo link_to("Pago por Verificar", "expositor_feria/pagoregistrado?id_feria=$id_feria")  ?></li>
                  <li><?php echo link_to("Pago Aprobado", "pago_expositor/pagoaprobado?id_feria=$id_feria")  ?></li>
                  <li><?php echo link_to("Pago Rechazado", "pago_expositor/pagorechazado?id_feria=$id_feria")  ?></li>
          </ul>
        </li>        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ponente <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
                  <li><?php echo link_to("Agregar", "ponente/new?id_feria=$id_feria")  ?></li>
                  <li><?php echo link_to("Listado", "ponente/index?id_feria=$id_feria")  ?></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Visitante <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
                  <li><?php echo link_to("Agregar", "visitante/new?id_feria=$id_feria")  ?></li>
                  <li><?php echo link_to("Listado", "visitante/index?id_feria=$id_feria")  ?></li>
          </ul>
        </li>
      </ul>
<div class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right" role="menu">
      <?php echo link_to(image_tag('back.png', array('style' => 'margin-top: 10%;') ),'usuario/bienvenido',array('title' => 'Volver al Menú Principal'))?>
    </ul>
  </div>        
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
