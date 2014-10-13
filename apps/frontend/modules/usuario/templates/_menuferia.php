 <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Menú</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Actividad <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><?php echo link_to("Agregar", "actividad/new")  ?></li>
                  <li><?php echo link_to("Listado", "actividad/index")  ?></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Expositor <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><?php echo link_to("Agregar", "expositor/new")  ?></li>
                  <li><?php echo link_to("Listado", "expositor/index")  ?></li>                    
                  <li><?php echo link_to("Asociar expositor a la Feria", "expositor_feria/new")  ?></li>
                  <li><?php echo link_to("Listado de expositores de la Feria", "expositor_feria/index")  ?></li>
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
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Visitante <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><?php echo link_to("Agregar", "visitante/new")  ?></li>
                  <li><?php echo link_to("Listado", "visitante/index")  ?></li>
                </ul>
              </li>              
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sello Editorial <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><?php echo link_to("Agregar", "sello_editorial/new")  ?></li>
                  <li><?php echo link_to("Listado", "sello_editorial/index")  ?></li>
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
                  <li><a href="#">Agregar</a></li>
                  <li><a href="#">Listado</a></li>
                </ul>
              </li>              
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
</div>