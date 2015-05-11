<?php
$miid = sfContext::getInstance()->getUser()->getGuardUser()->getId();
$Usuario = UsuarioQuery::create()->filterBySfGuardUser($miid)->findOne();
$sf_guard_user = $Usuario->getSfGuardUserGroup();

$id_feria = $sf_params->get('id_feria');
$Feria = FeriaQuery::create()->filterById($id_feria)->findOne();
if (count($Feria) > 0) {
    $nombre = $Feria->getNombre();
} else {
    $nombre = '';
}

$Expositor = ExpositorQuery::create()->
        filterByIdUsuario($Usuario->getId())->
        findOne();

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
        <?php if ($sf_guard_user != 3) { ?>
        <table width="100%">
        <?php } else { ?>
            <br><br><br>    
        <table width="30%">    
        <?php } ?>    
            <tr>              
                    <?php if ($sf_guard_user != 3) { ?>
                <td>
                    <?php echo link_to(image_tag('menu/cuenta.png','size=100x100'),"cuenta/index?id_feria=$id_feria",array('title' => 'Cuenta'))?>
                </td> 
                   <?php } ?>
                <td>
                    <?php echo link_to(image_tag('menu/stand.png','size=100x100'),"stand/index?id_feria=$id_feria",array('title' => 'Stand'))?>
                </td> 
                    <?php if ($sf_guard_user != 3) { ?>
                <td>
                    <?php echo link_to(image_tag('menu/actividad.png','size=100x100'),"actividad/index?id_feria=$id_feria",array('title' => 'Actividad'))?>
                </td>
                <td>
                    <?php echo link_to(image_tag('menu/actividad_finalizada.png','size=100x100'),"actividad_finalizada/index?id_feria=$id_feria",array('title' => 'Actividad Finalizada'))?>
                </td>
                <td>
                    <?php echo link_to(image_tag('menu/ponente.png','size=100x100'),"ponente/index?id_feria=$id_feria",array('title' => 'Ponente'))?>
                    <?php } ?>
                </td>
                <td>
                    <?php echo link_to(image_tag('menu/expositor.png','size=100x100'),"expositor/indexexp?id_feria=$id_feria",array('title' => 'Expositor'))?>
                </td>
            </tr>
        </table>
        <table align="center" width="90%">
            <tr>              
                <td>
                    <?php echo link_to(image_tag('menu/solicitud_espera.png','size=50X50'),"expositor_feria/espera?id_feria=$id_feria",array('title' => 'Solicitud en Espera'))?>
                </td> 
                <td>
                    <?php echo link_to(image_tag('menu/solicitud_aprobada.png','size=50X50'),"expositor_feria/aprobada?id_feria=$id_feria",array('title' => 'Solicitud Aprobada'))?>
                </td> 
                <td>
                    <?php echo link_to(image_tag('menu/solicitud_rechazada.png','size=50X50'),"expositor_feria/rechazada?id_feria=$id_feria",array('title' => 'Solicitud Rechazada'))?>
                </td>
                <td>
                    <?php echo link_to(image_tag('menu/registrar_pago.png','size=50X50'),"expositor_feria/pago?id_feria=$id_feria",array('title' => 'Registrar Información de Pago'))?>
                </td>
                <?php if ($sf_guard_user != 3) { ?>
                <td>
                    <?php echo link_to(image_tag('menu/solicitud_por_verificar.png','size=50X50'),"expositor_feria/pagoregistrado?id_feria=$id_feria",array('title' => 'Pago por Verificar'))?>
                </td>
                <?php } ?>
                <td>
                    <?php echo link_to(image_tag('menu/pago_aprobado.png','size=50X50'),"pago_expositor/pagoaprobado?id_feria=$id_feria",array('title' => 'Pago Aprobado'))?>
                </td>
                <td>
                    <?php echo link_to(image_tag('menu/pago_rechazado.png','size=50X50'),"pago_expositor/pagorechazado?id_feria=$id_feria",array('title' => 'Pago Rechazado'))?>
                </td>                
            </tr>
        </table>       
        
        
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right" role="menu">
<?php echo link_to(image_tag('back.png', array('style' => 'margin-top: 10%;')), 'usuario/bienvenido', array('title' => 'Volver al Menú Principal')) ?>
                </ul>
            </div>        
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
