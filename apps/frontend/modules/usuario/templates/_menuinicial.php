<?php
$miid = sfContext::getInstance()->getUser()->getGuardUser()->getId();
$Usuario = UsuarioQuery::create()->filterBySfGuardUser($miid)->findOne();
$sf_guard_user = $Usuario->getSfGuardUserGroup();
?>
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
                <?php
                if ($sf_guard_user != 3) {
                    ?>  
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Registro <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><?php echo link_to("Feria", "feria/new") ?></li>
                            <li><?php echo link_to("Expositor", "expositor/new") ?></li>
                            <li><?php echo link_to("Ponente", "ponente/new") ?></li>                 
                        </ul>
                    </li>
                <?php } ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Consulta <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><?php echo link_to("Feria", "feria/index") ?></li>
                        <li><?php echo link_to("Expositor", "expositor/index") ?></li>
                        <li><?php echo link_to("Ponente", "ponente/index") ?></li>
                    </ul>
                </li>
                <li>
                    <?php echo link_to("Usuario", "usuario/index") ?>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

