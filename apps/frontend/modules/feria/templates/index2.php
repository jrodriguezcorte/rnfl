<h2>Listado de Ferias</h2>
<br>
<div class="table-responsive">
  <table class="table">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Fecha de inicio</th>
      <th>Fecha de cierre</th>
      <th>País</th>
      <th>Estado</th>
      <th>Municipio</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Ferias as $Feria): ?>
    <tr>
      <td><?php echo $Feria->getNombre() ?></td>
      <td><?php echo implode("-", array_reverse(explode("-", $Feria->getFechaInicio()))); ?></td>
      <td><?php echo implode("-", array_reverse(explode("-", $Feria->getFechaFin()))); ?></td>
      <td><?php $Pais = PaisQuery::create()->filterById($Feria->getIdPais())->findOne();
                echo $Pais->getNombre() ?>
      </td>
      <td><?php $Estado = EstadoQuery::create()->filterById($Feria->getIdEstado())->findOne();
                echo $Estado->getNombre() ?>
      </td>
      <td><?php $Municipio = MunicipioQuery::create()->filterById($Feria->getIdMunicipio())->findOne();
                echo $Municipio->getNombre() ?>
      </td>
      <td>
            <?php echo link_to(image_tag('search_mini.png'),'feria/show?id='.$Feria->getId(),array('title' => 'Ver'))?>
            <?php echo link_to(image_tag('go_mini.png'),'feria/new',array('title' => 'Ingresar'))?>
      </td>    
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    <center>
    <ul class="pagination">    
        <li><?php echo link_to('&laquo;', 'feria/index?page=' . $Ferias->getFirstPage(), 'class=css_paginador') ?></li>
        <li><?php echo link_to('&lt;', 'feria/index?page=' . $Ferias->getPreviousPage(), 'class=css_paginador') ?></li>
        <?php $links = $Ferias->getLinks();
        foreach ($links as $page):
            ?>
            <?php echo ($page == $Ferias->getPage()) ? '<li class="active"><a class="css_paginador" href="#">'.$page.'</a>' : '<li>'.link_to($page, 'feria/index?page=' . $page, 'class=css_paginador') ?></li>
        <?php endforeach ?>
    <li><?php echo link_to('&gt;', 'feria/index?page=' . $Ferias->getNextPage(), 'class=css_paginador') ?></li>
    <li><?php echo link_to('&raquo;', 'feria/index?page=' . $Ferias->getLastPage(), 'class=css_paginador') ?></li>
    </center>  
    </ul>
</div>
<br><br>