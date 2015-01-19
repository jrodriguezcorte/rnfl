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
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Feria <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
                  <li><?php echo link_to("Agregar", "feria/new")  ?></li>
                  <li><?php echo link_to("Listado", "feria/index")  ?></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Expositor <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
                  <li><?php echo link_to("Agregar", "expositor/new")  ?></li>
                  <li><?php echo link_to("Listado", "expositor/index")  ?></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ponente <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
                   <li><?php echo link_to("Agregar", "ponente/new")  ?></li>
                  <li><?php echo link_to("Listado", "ponente/index")  ?></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Banco <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
                  <li><?php echo link_to("Agregar", "banco/new?id_feria=$id_feria")  ?></li>
                  <li><?php echo link_to("Listado", "banco/index?id_feria=$id_feria")  ?></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Espacio Geográfico <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
                  <li><a href="#"><?php echo link_to("Agregar País", "pais/new")  ?></a></li>
                  <li><a href="#"><?php echo link_to("Listado de Países", "pais/index")  ?></a></li>
                  <li><a href="#"><?php echo link_to("Agregar Estado", "estado/new")  ?></a></li>
                  <li><a href="#"><?php echo link_to("Listado de Estados", "estado/index")  ?></a></li>
                  <li><a href="#"><?php echo link_to("Agregar Municipio", "municipio/new")  ?></a></li>
                  <li><a href="#"><?php echo link_to("Listado de Municipios", "municipio/index")  ?></a></li>
                  <li><a href="#"><?php echo link_to("Agregar Parroquia", "parroquia/new")  ?></a></li>
                  <li><a href="#"><?php echo link_to("Listado de Parroquias", "parroquia/index")  ?></a></li>
                  <li><a href="#"><?php echo link_to("Agregar Región", "region/new")  ?></a></li>
                  <li><a href="#"><?php echo link_to("Listado de Región", "region/index")  ?></a></li> 
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuario <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
                  <li><a href="#"><?php echo link_to("Listado", "usuario/index")  ?></a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

