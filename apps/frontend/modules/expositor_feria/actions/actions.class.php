<?php

/**
 * expositor_feria actions.
 *
 * @package    rnfl
 * @subpackage expositor_feria
 * @author     Your name here
 */
class expositor_feriaActions extends sfActions
{
  public $prueba = 0;  
    
  public function executeIndex(sfWebRequest $request)
  {
      
  }

  public function executeIndexajax() {
        $Expositores = ExpositorQuery::create()->orderByNombre('desc')->find();
        
        $i = 0;
        foreach ($Expositores as $list) {
            $Pais = PaisQuery::create()->filterById($list->getIdPais())->findOne();
            $arreglo[$i] = array(
                'Nombre' => $list->getNombre(),
                'Apellido' => $list->getApellido(),
                'Cedula' => $list->getCedula(),
                'Rif' => $list->getRif(),
                'Pais' => $Pais->getNombre(),
                '' => ''
                . '      <a style="vertical-align:middle;" title="Ver" href="/expositor/show/id/'.$list->getId().'"><img src="/images/search_mini.png"></a>'
                . '    ',
            );
            $i++;
        }        

        return $this->renderText(json_encode($arreglo));
  }   
  
   public function executeEspera(sfWebRequest $request)
  {
      
  } 
  
  public function executeEsperaajax(sfWebRequest $request)
  {
      $id_feria = $request->getParameter('id_feria');
      
      $miid = sfContext::getInstance()->getUser()->getGuardUser()->getId();
      
      $Usuario = UsuarioQuery::create()->filterBySfGuardUser($miid)->findOne();
      $id_usuario = $Usuario->getId();
      
 
      $id_grupo = $Usuario->getSfGuardUserGroup();

      $bandera = false;
      
      if ($id_grupo == 1) {
        $bandera = true;   
      }    
      
      if ($id_grupo == 2) {
          $FeriaOrg = FeriaQuery::create()->filterById($id_feria)
                  ->filterByIdUsuario($id_usuario)
                  ->find();
          if (count($FeriaOrg) > 0) {
              $bandera = true;
          }
      }
      
      if ($bandera) {
                    $ExpositorFeria = ExpositorFeriaQuery::create()
                      ->Join('Status')
                      ->orderById('desc')                     
                      ->condition('cond2', 'Status.id_status =1')
                      ->condition('cond3', 'Status.IdFeria = ?', $id_feria)
                      ->condition('cond4', 'ExpositorFeria.IdFeria = ?', $id_feria)
                      ->combine(array('cond3', 'cond4'), 'and', 'cond34')
                      ->where(array('cond2', 'cond34'), 'and')
                      ->where('Status.StatusActual = true')      
                      ->find();
        
         $i = 0;           
         foreach ($ExpositorFeria as $list) {

            $id_expositor = $list->getIdExpositor(); 
            $Expositor = ExpositorQuery::create()->filterById($id_expositor)->findOne();
            $arreglo[$i] = array(
                'Nombre' => $Expositor->getNombre(),
                'Apellido' => $Expositor->getApellido(),
                'Rif' => $Expositor->getRif(),
                'Telefono Local' => $Expositor->getTelefonoLocal(),
                'Telefono Celular' => $Expositor->getTelefonoCelular(),
                'Email' => $Expositor->getEmail(),
                '' => ''
                . '      <a style="vertical-align:middle;" title="Aprobar" href="/expositor_feria/aprobarsolicitud/id/'.$list->getId().'/id_feria/'.$id_feria.'/id_expositor/'.$id_expositor.'"><img src="/images/check_mini.png"></a>'
                . '      <a style="vertical-align:middle;" title="Rechazar" href="/expositor_feria/rechazarsolicitud/id/'.$list->getId().'/id_feria/'.$id_feria.'/id_expositor/'.$id_expositor.'"><img src="/images/delete_mini.png"></a>'
                . '      <a style="vertical-align:middle;" title="Ver" href="/expositor_feria/mostrar/id/'.$list->getId().'/id_feria/'.$id_feria.'/id_expositor/'.$id_expositor.'"><img src="/images/search_mini.png"></a>',
            );
            $i++;
        }          
      } else {
                    $ExpositorFeria = ExpositorFeriaQuery::create()
                      ->Join('Status')
                      ->orderById('desc')
                      ->condition('cond1', 'ExpositorFeria.IdUsuario = ?', $id_usuario)                     
                      ->condition('cond2', 'Status.id_status =1')
                      ->combine(array('cond1', 'cond2'), 'and', 'cond12')
                      ->condition('cond3', 'Status.IdFeria = ?', $id_feria)
                      ->condition('cond4', 'ExpositorFeria.IdFeria = ?', $id_feria)
                      ->combine(array('cond3', 'cond4'), 'and', 'cond34')
                      ->where(array('cond12', 'cond34'), 'and')
                      ->where('Status.StatusActual = true')       
                      ->find();
          
         $i = 0;           
         foreach ($ExpositorFeria as $list) {

            $id_expositor = $list->getIdExpositor(); 
            $Expositor = ExpositorQuery::create()->filterById($id_expositor)->findOne();
            $arreglo[$i] = array(
                'Nombre' => $Expositor->getNombre(),
                'Apellido' => $Expositor->getApellido(),
                'Rif' => $Expositor->getRif(),
                'Telefono Local' => $Expositor->getTelefonoLocal(),
                'Telefono Celular' => $Expositor->getTelefonoCelular(),
                'Email' => $Expositor->getEmail(),
                '' => ''
                . '      <a style="vertical-align:middle;" title="Ver" href="/expositor_feria/mostrar/id/'.$list->getId().'/id_feria/'.$id_feria.'/id_expositor/'.$id_expositor.'"><img src="/images/search_mini.png"></a>',
            );
            $i++;
        }    
      }
      
        return $this->renderText(json_encode($arreglo));
  }  
  
  public function executeMostrar(sfWebRequest $request)
  {
    $id_feria = $request->getParameter('id_feria');
    $id_expositor = $request->getParameter('id_expositor');
                    $this->ExpositorFeria = ExpositorFeriaQuery::create()
                      ->Join('Expositor')
                      ->orderById('desc')
                      ->condition('cond1', 'ExpositorFeria.IdExpositor = ?', $id_expositor)                     
                      ->condition('cond2', 'Expositor.Id = ?', $id_expositor)
                      ->condition('cond3', 'ExpositorFeria.IdFeria = ?', $id_feria)
                      ->combine(array('cond1', 'cond2'), 'and', 'cond12')
                      ->where(array('cond12', 'cond3'), 'and')
                      ->findOne();    
                    
  }
  
   public function executeAprobarsolicitud(sfWebRequest $request)
  {
    $id_feria = $request->getParameter('id_feria');
    $id_expositor = $request->getParameter('id_expositor');
    $id = $request->getParameter('id');
    $Status = StatusQuery::create()->
        filterByIdFeria($id_feria)->
        filterByIdExpositor($id_expositor)->
        filterByIdExpositorFeria($id)->
        filterByIdStatus(1)->    
        filterByStatusActual(true)->    
        findOne(); 
    if (count($Status) > 0) {
        $Status->setStatusActual(false);
        $Status->save();
        
        $StatusNuevo = new Status();
        $StatusNuevo->setIdExpositor($id_expositor);
        $StatusNuevo->setIdFeria($id_feria);
        $StatusNuevo->setIdStatus(2);
        $StatusNuevo->setIdExpositorFeria($id);
        $StatusNuevo->setStatusActual(true);
        $StatusNuevo->save(); 
        
        
    }
    
    $this->redirect('expositor_feria/aprobada?id_feria='.$id_feria.'&id_expositor='.$id_expositor.'&id='.$id);
    
  }  

   public function executeAprobada(sfWebRequest $request)
  {

  }  
  
  public function executeAprobadaajax(sfWebRequest $request)
  {
      $id_feria = $request->getParameter('id_feria');
      
      $miid = sfContext::getInstance()->getUser()->getGuardUser()->getId();
      
      $Usuario = UsuarioQuery::create()->filterBySfGuardUser($miid)->findOne();
      $id_usuario = $Usuario->getId();
      
 
      $id_grupo = $Usuario->getSfGuardUserGroup();
 
      $bandera = false;
      
      if ($id_grupo == 1) {
        $bandera = true;   
      }    
      
      if ($id_grupo == 2) {
          $FeriaOrg = FeriaQuery::create()->filterById($id_feria)
                  ->filterByIdUsuario($id_usuario)
                  ->find();
          if (count($FeriaOrg) > 0) {
              $bandera = true;
          }
      }
      
      if ($bandera) {
                    $ExpositorFeria = ExpositorFeriaQuery::create()
                      ->Join('Status')
                      ->orderById('desc')                     
                      ->condition('cond2', 'Status.id_status =2')
                      ->condition('cond3', 'Status.IdFeria = ?', $id_feria)
                      ->condition('cond4', 'ExpositorFeria.IdFeria = ?', $id_feria)
                      ->combine(array('cond3', 'cond4'), 'and', 'cond34')
                      ->where(array('cond2', 'cond34'), 'and')
                      ->where('Status.StatusActual = true')       
                      ->find();
                  
         $i = 0;           
         foreach ($ExpositorFeria as $list) {

            $id_expositor = $list->getIdExpositor(); 
            $Expositor = ExpositorQuery::create()->filterById($id_expositor)->findOne();
            $arreglo[$i] = array(
                'Nombre' => $Expositor->getNombre(),
                'Apellido' => $Expositor->getApellido(),
                'Rif' => $Expositor->getRif(),
                'Telefono Local' => $Expositor->getTelefonoLocal(),
                'Telefono Celular' => $Expositor->getTelefonoCelular(),
                'Email' => $Expositor->getEmail(),
                '' => ''
                . '      <a style="vertical-align:middle;" title="Revertir" href="/expositor_feria/revertirsolicitud/id/'.$list->getId().'/id_feria/'.$id_feria.'/id_expositor/'.$id_expositor.'"><img src="/images/back_mini.png"></a>'
                . '      <a style="vertical-align:middle;" title="Ver" href="/expositor_feria/mostrar/id/'.$list->getId().'/id_feria/'.$id_feria.'/id_expositor/'.$id_expositor.'"><img src="/images/search_mini.png"></a>',
            );
            $i++;
        }          
      } else {
                    $ExpositorFeria = ExpositorFeriaQuery::create()
                      ->Join('Status')
                      ->orderById('desc')
                      ->condition('cond1', 'ExpositorFeria.IdUsuario = ?', $id_usuario)                     
                      ->condition('cond2', 'Status.id_status =2')
                      ->combine(array('cond1', 'cond2'), 'and', 'cond12')
                      ->condition('cond3', 'Status.IdFeria = ?', $id_feria)
                      ->condition('cond4', 'ExpositorFeria.IdFeria = ?', $id_feria)
                      ->combine(array('cond3', 'cond4'), 'and', 'cond34')
                      ->where(array('cond12', 'cond34'), 'and')
                       ->where('Status.StatusActual = true')       
                      ->find();
          
         $i = 0;           
         foreach ($ExpositorFeria as $list) {

            $id_expositor = $list->getIdExpositor(); 
            $Expositor = ExpositorQuery::create()->filterById($id_expositor)->findOne();
            $arreglo[$i] = array(
                'Nombre' => $Expositor->getNombre(),
                'Apellido' => $Expositor->getApellido(),
                'Rif' => $Expositor->getRif(),
                'Telefono Local' => $Expositor->getTelefonoLocal(),
                'Telefono Celular' => $Expositor->getTelefonoCelular(),
                'Email' => $Expositor->getEmail(),
                '' => ''
                . '      <a style="vertical-align:middle;" title="Ver" href="/expositor_feria/mostrar/id/'.$list->getId().'/id_feria/'.$id_feria.'/id_expositor/'.$id_expositor.'"><img src="/images/search_mini.png"></a>',
            );
            $i++;
        }    
      }
      
        return $this->renderText(json_encode($arreglo));
  } 
  
   public function executeRevertirsolicitud(sfWebRequest $request)
  {
    $id_feria = $request->getParameter('id_feria');
    $id_expositor = $request->getParameter('id_expositor');
    $id = $request->getParameter('id');
    $Status = StatusQuery::create()->
        filterByIdFeria($id_feria)->
        filterByIdExpositor($id_expositor)->
        filterByIdExpositorFeria($id)->     
        filterByStatusActual(true)->    
        findOne(); 
    if (count($Status) > 0) {
        $Status->setStatusActual(false);
        $Status->save();
        
        $StatusNuevo = new Status();
        $StatusNuevo->setIdExpositor($id_expositor);
        $StatusNuevo->setIdFeria($id_feria);
        $StatusNuevo->setIdStatus(1);
        $StatusNuevo->setIdExpositorFeria($id);
        $StatusNuevo->setStatusActual(true);
        $StatusNuevo->save(); 
        
        
    }
    
    $this->redirect('expositor_feria/espera?id_feria='.$id_feria.'&id_expositor='.$id_expositor.'&id='.$id);
    
  }   
  
  public function executeRechazarsolicitud(sfWebRequest $request)
  {

  }
  
  public function executeEsrechazada(sfWebRequest $request)
  {
      $observaciones = $request->getParameter('observaciones');
      $id_feria = $request->getParameter('id_feria');
      $id_expositor = $request->getParameter('id_expositor');
      $id = $request->getParameter('id');
      
    $Status = StatusQuery::create()->
        filterByIdFeria($id_feria)->
        filterByIdExpositor($id_expositor)->
        filterByIdExpositorFeria($id)->     
        filterByStatusActual(true)->    
        findOne(); 
    if (count($Status) > 0) {
        $Status->setStatusActual(false);
        $Status->save();
        
        $StatusNuevo = new Status();
        $StatusNuevo->setIdExpositor($id_expositor);
        $StatusNuevo->setIdFeria($id_feria);
        $StatusNuevo->setIdStatus(3);
        $StatusNuevo->setIdExpositorFeria($id);
        $StatusNuevo->setStatusActual(true);
        $StatusNuevo->setObservaciones($observaciones);
        $StatusNuevo->save();       
      
    }
      $this->redirect('expositor_feria/rechazada?id_feria='.$id_feria.'&id_expositor='.$id_expositor.'&id='.$id);
  }  
  
   public function executeRechazada(sfWebRequest $request)
  {
      
  } 
  
  public function executeRechazadaajax(sfWebRequest $request)
  {
      $id_feria = $request->getParameter('id_feria');
      
      $miid = sfContext::getInstance()->getUser()->getGuardUser()->getId();
      
      $Usuario = UsuarioQuery::create()->filterBySfGuardUser($miid)->findOne();
      $id_usuario = $Usuario->getId();
      
 
      $id_grupo = $Usuario->getSfGuardUserGroup();
 
      $bandera = false;
      
      if ($id_grupo == 1) {
        $bandera = true;   
      }    
      
      if ($id_grupo == 2) {
          $FeriaOrg = FeriaQuery::create()->filterById($id_feria)
                  ->filterByIdUsuario($id_usuario)
                  ->find();
          if (count($FeriaOrg) > 0) {
              $bandera = true;
          }
      }
      
      if ($bandera) {
                    $ExpositorFeria = ExpositorFeriaQuery::create()
                      ->Join('Status')
                      ->orderById('desc')                     
                      ->condition('cond2', 'Status.id_status =3')
                      ->condition('cond3', 'Status.IdFeria = ?', $id_feria)
                      ->condition('cond4', 'ExpositorFeria.IdFeria = ?', $id_feria)
                      ->combine(array('cond3', 'cond4'), 'and', 'cond34')
                      ->where(array('cond2', 'cond34'), 'and')
                      ->where('Status.StatusActual = true')      
                      ->find();
                  
         $i = 0;           
         foreach ($ExpositorFeria as $list) {

            $id_expositor = $list->getIdExpositor(); 
            $Expositor = ExpositorQuery::create()->filterById($id_expositor)->findOne();
            $Status = StatusQuery::create()->
                    filterByIdExpositor($id_expositor)->
                    filterByIdFeria($id_feria)->
                    filterByIdStatus(3)->
                    filterByStatusActual(true)->
                    findOne();
            $arreglo[$i] = array(
                'Nombre' => $Expositor->getNombre(),
                'Apellido' => $Expositor->getApellido(),
                'Rif' => $Expositor->getRif(),
                'Telefono Local' => $Expositor->getTelefonoLocal(),
                'Telefono Celular' => $Expositor->getTelefonoCelular(),
                'Email' => $Expositor->getEmail(),
                'Observaciones' => $Status->getObservaciones(),
                '' => ''
                . '      <a style="vertical-align:middle;" title="Revertir" href="/expositor_feria/revertirsolicitud/id/'.$list->getId().'/id_feria/'.$id_feria.'/id_expositor/'.$id_expositor.'"><img src="/images/back_mini.png"></a>'
                . '      <a style="vertical-align:middle;" title="Ver" href="/expositor_feria/mostrar/id/'.$list->getId().'/id_feria/'.$id_feria.'/id_expositor/'.$id_expositor.'"><img src="/images/search_mini.png"></a>',
            );
            $i++;
        }          
      } else {
                    $ExpositorFeria = ExpositorFeriaQuery::create()
                      ->Join('Status')
                      ->orderById('desc')
                      ->condition('cond1', 'ExpositorFeria.IdUsuario = ?', $id_usuario)                     
                      ->condition('cond2', 'Status.id_status =3')
                      ->combine(array('cond1', 'cond2'), 'and', 'cond12')
                      ->condition('cond3', 'Status.IdFeria = ?', $id_feria)
                      ->condition('cond4', 'ExpositorFeria.IdFeria = ?', $id_feria)
                      ->combine(array('cond3', 'cond4'), 'and', 'cond34')
                      ->where(array('cond12', 'cond34'), 'and')
                      ->where('Status.StatusActual = true')       
                      ->find();
          
         $i = 0;           
         foreach ($ExpositorFeria as $list) {

            $id_expositor = $list->getIdExpositor(); 
            $Expositor = ExpositorQuery::create()->filterById($id_expositor)->findOne();
            $Status = StatusQuery::create()->
                    filterByIdExpositor($id_expositor)->
                    filterByIdFeria($id_feria)->
                    filterByIdStatus(3)->
                    filterByStatusActual(true)->
                    findOne();
            $arreglo[$i] = array(
                'Nombre' => $Expositor->getNombre(),
                'Apellido' => $Expositor->getApellido(),
                'Rif' => $Expositor->getRif(),
                'Telefono Local' => $Expositor->getTelefonoLocal(),
                'Telefono Celular' => $Expositor->getTelefonoCelular(),
                'Email' => $Expositor->getEmail(),
                'Observaciones' => $Status->getObservaciones(),
                '' => ''
                . '      <a style="vertical-align:middle;" title="Ver" href="/expositor_feria/mostrar/id/'.$list->getId().'/id_feria/'.$id_feria.'/id_expositor/'.$id_expositor.'"><img src="/images/search_mini.png"></a>',
            );
            $i++;
        }    
      }
      
        return $this->renderText(json_encode($arreglo));
  }  
  
  public function executePago(sfWebRequest $request)
  {
      
  } 
  
  public function executePagoajax(sfWebRequest $request)
  {
      $id_feria = $request->getParameter('id_feria');
      
      $miid = sfContext::getInstance()->getUser()->getGuardUser()->getId();
      
      $Usuario = UsuarioQuery::create()->filterBySfGuardUser($miid)->findOne();
      $id_usuario = $Usuario->getId();
      
 
      $id_grupo = $Usuario->getSfGuardUserGroup();
 
      if ($id_grupo == 1) {
                    $ExpositorFeria = ExpositorFeriaQuery::create()
                      ->Join('Status')
                      ->orderById('desc')                     
                      ->condition('cond2', 'Status.id_status =2')
                      ->condition('cond3', 'Status.IdFeria = ?', $id_feria)
                      ->condition('cond4', 'ExpositorFeria.IdFeria = ?', $id_feria)
                      ->combine(array('cond3', 'cond4'), 'and', 'cond34')
                      ->where(array('cond2', 'cond34'), 'and')
                      ->where('Status.StatusActual = true')      
                      ->find();
                    
                   
         $i = 0;           
         foreach ($ExpositorFeria as $list) {

            $id_expositor = $list->getIdExpositor(); 
            $Expositor = ExpositorQuery::create()->filterById($id_expositor)->findOne();
            $arreglo[$i] = array(
                'Nombre' => $Expositor->getNombre(),
                'Apellido' => $Expositor->getApellido(),
                'Rif' => $Expositor->getRif(),
                'Telefono Local' => $Expositor->getTelefonoLocal(),
                'Telefono Celular' => $Expositor->getTelefonoCelular(),
                'Email' => $Expositor->getEmail(),
                '' => ''
                . '      <a style="vertical-align:middle;" title="Ver" href="/expositor_feria/mostrar/id/'.$list->getId().'/id_feria/'.$id_feria.'/id_expositor/'.$id_expositor.'"><img src="/images/search_mini.png"></a>'
                . '      <a style="vertical-align:middle;" title="Registrar" href="/pago_expositor/new/id/'.$list->getId().'/id_feria/'.$id_feria.'/id_expositor/'.$id_expositor.'"><img src="/images/go_mini.png"></a>',
            );
            $i++;
        }          
      } else {
                    $ExpositorFeria = ExpositorFeriaQuery::create()
                      ->Join('Status')
                      ->orderById('desc')
                      ->condition('cond1', 'ExpositorFeria.IdUsuario = ?', $id_usuario)                     
                      ->condition('cond2', 'Status.id_status =2')
                      ->combine(array('cond1', 'cond2'), 'and', 'cond12')
                      ->condition('cond3', 'Status.IdFeria = ?', $id_feria)
                      ->condition('cond4', 'ExpositorFeria.IdFeria = ?', $id_feria)
                      ->combine(array('cond3', 'cond4'), 'and', 'cond34')
                      ->where(array('cond12', 'cond34'), 'and')
                      ->where('Status.StatusActual = true')       
                      ->find();
          
         $i = 0;           
         foreach ($ExpositorFeria as $list) {

            $id_expositor = $list->getIdExpositor(); 
            $Expositor = ExpositorQuery::create()->filterById($id_expositor)->findOne();
            $arreglo[$i] = array(
                'Nombre' => $Expositor->getNombre(),
                'Apellido' => $Expositor->getApellido(),
                'Rif' => $Expositor->getRif(),
                'Telefono Local' => $Expositor->getTelefonoLocal(),
                'Telefono Celular' => $Expositor->getTelefonoCelular(),
                'Email' => $Expositor->getEmail(),
                '' => ''
                . '      <a style="vertical-align:middle;" title="Ver" href="/expositor_feria/mostrar/id/'.$list->getId().'/id_feria/'.$id_feria.'/id_expositor/'.$id_expositor.'"><img src="/images/search_mini.png"></a>'
                . '      <a style="vertical-align:middle;" title="Registrar" href="/pago_expositor/new/id/'.$list->getId().'/id_feria/'.$id_feria.'/id_expositor/'.$id_expositor.'"><img src="/images/go_mini.png"></a>',
            );
            $i++;
        }    
      }
      
        return $this->renderText(json_encode($arreglo));
  }  
  
   public function executePagoregistrado(sfWebRequest $request)
  {

  }  
  
  public function executePagoregistradoajax(sfWebRequest $request)
  {
      $id_feria = $request->getParameter('id_feria');
      
      $miid = sfContext::getInstance()->getUser()->getGuardUser()->getId();
      
      $Usuario = UsuarioQuery::create()->filterBySfGuardUser($miid)->findOne();
      $id_usuario = $Usuario->getId();
      
 
      $id_grupo = $Usuario->getSfGuardUserGroup();
 
      if ($id_grupo == 1) {
        $bandera = true;   
      }    
      
      if ($id_grupo == 2) {
          $FeriaOrg = FeriaQuery::create()->filterById($id_feria)
                  ->filterByIdUsuario($id_usuario)
                  ->find();
          if (count($FeriaOrg) > 0) {
              $bandera = true;
          }
      }
      
      if ($bandera) {
                 
                $PagoExpositors = PagoExpositorQuery::create()
                      ->Join('Status')
                      ->orderById('desc')                     
                      ->condition('cond2', 'Status.id_status =4')
                      ->condition('cond3', 'Status.IdFeria = ?', $id_feria)
                      ->condition('cond4', 'PagoExpositor.IdFeria = ?', $id_feria)
                      ->combine(array('cond3', 'cond4'), 'and', 'cond34')
                      ->where(array('cond2', 'cond34'), 'and')
                      ->where('Status.StatusActual = true')      
                      ->find();        

        $i = 0;        
        foreach ($PagoExpositors as $PagoExpositor) {
            $id_expositor = $PagoExpositor->getIdExpositor();
            $id_expositor_feria = $PagoExpositor->getIdExpositorFeria();
                    $Expositor = ExpositorQuery::create()->
                            filterById($id_expositor)->
                            findOne();
             if ($PagoExpositor->getEsPagoBancoNacional()) {
                 $forma_pago = "Internacional";
                 $Banco = BancoQuery::create()
                      ->orderById('desc')                     
                      ->where('Banco.Id = ?', $PagoExpositor->getIdBanco())    
                      ->findOne(); 
                 $Moneda = MonedaQuery::create()->filterById($Banco->getIdMoneda())->findOne();
                 $monto = $PagoExpositor->getMonto().' '.$Moneda->getSimbolo();
             } else {
                 $forma_pago = "Nacional";
                 $monto = $PagoExpositor->getMonto().' Bs';
             }      
                    
             $arreglo[$i] = array(
                '' => '      <a style="vertical-align:middle;" title="Pago Verificado" href="/pago_expositor/pagoverificado/id/'.$PagoExpositor->getId().'/id_feria/'.$id_feria.'/id_expositor/'.$id_expositor.'"><img src="/images/check_mini.png"></a>'
                    . '      <a style="vertical-align:middle;" title="Pago Rechazado" href="/pago_expositor/rechazarsolicitud/id/'.$PagoExpositor->getId().'/id_feria/'.$id_feria.'/id_expositor/'.$id_expositor.'/id_expositor_feria/'.$id_expositor_feria.'"><img src="/images/delete_mini.png"></a>'
                    . '      <a style="vertical-align:middle;" title="Ver" href="/pago_expositor/mostrar/id/'.$PagoExpositor->getId().'/id_feria/'.$id_feria.'/id_expositor/'.$id_expositor.'"><img src="/images/search_mini.png"></a>',
                'Nombre' => $Expositor->getNombre(),
                'Apellido' => $Expositor->getApellido(),
                'Rif' => $Expositor->getRif(),
                'Tipo de Pago' => $forma_pago,
                'Monto' => $monto, 
            ); 
            $i++; 
                            
        }
        
                  
      } else { 
                
                    $PagoExpositors = PagoExpositorQuery::create()
                      ->Join('Status')
                      ->orderById('desc')
                      ->condition('cond1', 'PagoExpositor.IdUsuario = ?', $id_usuario)                     
                      ->condition('cond2', 'Status.id_status =2')
                      ->combine(array('cond1', 'cond2'), 'and', 'cond12')
                      ->condition('cond3', 'Status.IdFeria = ?', $id_feria)
                      ->condition('cond4', 'PagoExpositor.IdFeria = ?', $id_feria)
                      ->combine(array('cond3', 'cond4'), 'and', 'cond34')
                      ->where(array('cond12', 'cond34'), 'and')
                      ->where('Status.StatusActual = true')       
                      ->find();                

        $i = 0;        
        foreach ($PagoExpositors as $PagoExpositor) {
            $id_expositor = $PagoExpositor->getIdExpositor();
                    $Expositor = ExpositorQuery::create()->
                            filterById($id_expositor)->
                            findOne();
             $arreglo[$i] = array(
                '' => '      <a style="vertical-align:middle;" title="Ver" href="/pago_expositor/mostrar/id/'.$PagoExpositor->getId().'/id_feria/'.$id_feria.'/id_expositor/'.$id_expositor.'"><img src="/images/search_mini.png"></a>',
                'Nombre' => $Expositor->getNombre(),
                'Apellido' => $Expositor->getApellido(),
                'Rif' => $Expositor->getRif(),               
            ); 
            $i++; 
                            
        }
   
      }
        return $this->renderText(json_encode($arreglo));
  } 
  
  public function executeShow(sfWebRequest $request)
  {
    $this->ExpositorFeria = ExpositorFeriaPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->ExpositorFeria);
  } 

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ExpositorFeriaForm();
    
    $this->prueba = $request->getParameter('id_feria');
    
    $this->form->setDefault('id_feria', $request->getParameter('id_feria'));
    
    $this->form->setDefault('id_expositor', $request->getParameter('id_expositor'));
    
    $this->form->setDefault('id_pais', 1);
    
    $this->form->setDefault('id_tipo_distribuidor', 1);
    
    $Stands = StandQuery::create()->filterByIdFeria($request->getParameter('id_feria'))
            ->filterByActivo(true)
            ->find();
    
    $arreglo = array();
    foreach ($Stands as $Stand) {
        $arreglo[$Stand->getId()] = $Stand->getMetros();
    }       
    
    $this->form->setWidget('id_stand', new sfWidgetFormChoice(array(
        'choices' => $arreglo,
        'label' => 'Stand (m<sup>2</sup>)'
    )));
    
    $miid = sfContext::getInstance()->getUser()->getGuardUser()->getId();
      
    $Usuario = UsuarioQuery::create()->filterBySfGuardUser($miid)->findOne();    
    
    $this->form->setDefault('id_usuario', $Usuario->getId());
  }

  public function executeCreate(sfWebRequest $request)
  {      
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    
 //   list($resto,$id_feria) = explode("id_feria/", $_SERVER['HTTP_REFERER']);

 //   list($id_feria,$resto) = explode("/id_expositor/", $id_feria);
    
 //   list($id_feria) = explode("/id", $id_feria);
    
    $this->prueba = $id_feria;  

    $this->form = new ExpositorFeriaForm();
    
    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $ExpositorFeria = ExpositorFeriaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($ExpositorFeria, sprintf('Object ExpositorFeria does not exist (%s).', $request->getParameter('id')));
    $this->form = new ExpositorFeriaForm($ExpositorFeria);
  }

  public function executeUpdate(sfWebRequest $request)
  {
          
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $ExpositorFeria = ExpositorFeriaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($ExpositorFeria, sprintf('Object ExpositorFeria does not exist (%s).', $request->getParameter('id')));
    $this->form = new ExpositorFeriaForm($ExpositorFeria);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $ExpositorFeria = ExpositorFeriaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($ExpositorFeria, sprintf('Object ExpositorFeria does not exist (%s).', $request->getParameter('id')));
    $ExpositorFeria->delete();

    $this->redirect('expositor_feria/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $linea_editorial = $request["expositor_feria"]["opciones"]; 
    $id_expositor = $request["expositor_feria"]["id_expositor"]; 
    $id_feria = $request["expositor_feria"]["id_feria"];
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $ExpositorFeria = $form->save();

      $expositor_lineaeditorials = ExpositorLineaeditorialQuery::create()->
      filterByIdFeria($id_feria)->
      filterByIdExpositor($id_expositor)->
      find();
      
      if (count($expositor_lineaeditorials) > 0) {
        foreach ($expositor_lineaeditorials as $expositor_lineaeditorial) {
            $expositor_lineaeditorial->delete();
        }    
      }
      
      for($i = 0; $i < count($linea_editorial); $i++ ) {
          $linea_editorial_current = new ExpositorLineaeditorial();
          $linea_editorial_current->setIdExpositor($id_expositor);
          $linea_editorial_current->setIdFeria($id_feria);
          $linea_editorial_current->setLineaEditorial($linea_editorial[$i]);
          $linea_editorial_current->save();
      }
      
      $VerificarStatus = StatusQuery::create()->
            filterByIdExpositor($id_expositor)->
            filterByIdFeria($id_feria)->
            find();
      
      if (count($VerificarStatus) == 0) {
           $Status = new Status();
           $Status->setIdExpositor($id_expositor);
           $Status->setIdFeria($id_feria);
           $Status->setIdStatus(1);
           $Status->setIdExpositorFeria($ExpositorFeria->getId());
           $Status->setStatusActual(true);
           $Status->save();
      }
                            
      $this->redirect('expositor_feria/espera?id_feria='.$id_feria);
    }
  }
}
