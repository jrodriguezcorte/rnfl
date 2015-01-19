<?php

/**
 * pago_expositor actions.
 *
 * @package    rnfl
 * @subpackage pago_expositor
 * @author     Your name here
 */
class pago_expositorActions extends sfActions
{
    
  public function executeIndex(sfWebRequest $request)
  {
    $this->PagoExpositors = PagoExpositorQuery::create()->find();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->PagoExpositor = PagoExpositorPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->PagoExpositor);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PagoExpositorForm();
    
    $this->form->setDefault('id_feria', $request->getParameter('id_feria'));
    
    $this->form->setDefault('id_expositor', $request->getParameter('id_expositor'));
    
    $this->form->setDefault('id_expositor_feria', $request->getParameter('id'));
    
    $miid = sfContext::getInstance()->getUser()->getGuardUser()->getId();
      
    $Usuario = UsuarioQuery::create()->filterBySfGuardUser($miid)->findOne();    
    
    $this->form->setDefault('id_usuario', $Usuario->getId());
    
    $this->form->setDefault('fecha_pago', date("Y-m-d"));
    
    // Caso Nacional  
    $Bancos = BancoQuery::create()
     ->leftJoin('Cuenta')
     ->orderByNombre('asc')
     ->where('Banco.IdPais = 1')                     
     ->where('Cuenta.IdFeria = ?', $request->getParameter('id_feria'))
     ->find();  
                  
    $arreglo = array();
    foreach ($Bancos as $Banco) {
        $arreglo[$Banco->getId()] = $Banco->getNombre();
    }
    
    
    $this->form->setWidget('id_banco', new sfWidgetFormChoice(array(
        'choices' => $arreglo,
        'label' => 'Depósito realizado en el Banco',
    )));       
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PagoExpositorForm();

    $this->processForm($request, $this->form); 

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $PagoExpositor = PagoExpositorQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($PagoExpositor, sprintf('Object PagoExpositor does not exist (%s).', $request->getParameter('id')));
    $this->form = new PagoExpositorForm($PagoExpositor);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $PagoExpositor = PagoExpositorQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($PagoExpositor, sprintf('Object PagoExpositor does not exist (%s).', $request->getParameter('id')));
    $this->form = new PagoExpositorForm($PagoExpositor);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $PagoExpositor = PagoExpositorQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($PagoExpositor, sprintf('Object PagoExpositor does not exist (%s).', $request->getParameter('id')));
    $PagoExpositor->delete();

    $this->redirect('pago_expositor/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $params = $request->getParameter($form->getName());  
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
        
        $PagoExpositor = $form->save();
      
        /* id mas reciente */
        $id = $PagoExpositor->getId();
        $PagoExpositor->setStatusActual(true);
        $PagoExpositor->save();
        
        $Pago_Expositors = PagoExpositorQuery::create()->
            filterByIdFeria($params['id_feria'])->
            filterByIdExpositor($params['id_expositor'])->
            filterByIdExpositorFeria($params['id_expositor_feria'])-> 
            where('PagoExpositor.Id < '.$id)->
            find();
        
        if (count($Pago_Expositors) > 0) {
            foreach($Pago_Expositors as $Pago_Expositor) {
                $Pago_Expositor->setStatusActual(false);
                $Pago_Expositor->save();
            }
        }
        
        $Status = StatusQuery::create()->
            filterByIdFeria($params['id_feria'])->
            filterByIdExpositor($params['id_expositor'])->
            filterByIdExpositorFeria($params['id_expositor_feria'])->     
            filterByStatusActual(true)->    
            findOne(); 
        if (count($Status) > 0) {
            $Status->setStatusActual(false);
            $Status->save();

            $StatusNuevo = new Status();
            $StatusNuevo->setIdExpositor($params['id_expositor']);
            $StatusNuevo->setIdFeria($params['id_feria']);
            $StatusNuevo->setIdStatus(4);
            $StatusNuevo->setIdExpositorFeria($params['id_expositor_feria']);
            $StatusNuevo->setIdPagoExpositor($id);
            $StatusNuevo->setStatusActual(true);
            $StatusNuevo->save();       

        }
        
      $this->redirect('pago_expositor/edit?id=' . $PagoExpositor->getId().'&id_feria='.$params['id_feria']);
    }
  }
  
  public function executeMostrar(sfWebRequest $request)
  {
    $id = $request->getParameter('id'); 
    $this->PagoExpositor = PagoExpositorQuery::create()->filterById($id)->findOne();
  } 
  
  public function executePagoverificado(sfWebRequest $request)
  {
      $id_feria = $request->getParameter('id_feria');
      $id_expositor = $request->getParameter('id_expositor');
      $id = $request->getParameter('id');
      
    $Status = StatusQuery::create()->
        filterByIdFeria($id_feria)->
        filterByIdExpositor($id_expositor)->
        filterByIdPagoExpositor($id)->     
        filterByStatusActual(true)->  
        filterByIdStatus(4)->      
        findOne(); 
    if (count($Status) > 0) {
        $Status->setStatusActual(false);
        $Status->save();
        
        $StatusNuevo = new Status();
        $StatusNuevo->setIdExpositor($id_expositor);
        $StatusNuevo->setIdFeria($id_feria);
        $StatusNuevo->setIdStatus(5);
        $StatusNuevo->setIdExpositorFeria($Status->getIdExpositorFeria());
        $StatusNuevo->setIdPagoExpositor($id);
        $StatusNuevo->setStatusActual(true);
        $StatusNuevo->setObservaciones($observaciones);
        $StatusNuevo->save();       
      
    }
      $this->redirect('pago_expositor/pagoaprobado?id_feria='.$id_feria.'&id_expositor='.$id_expositor.'&id_expositor_feria='.$id_expositor_feria.'&id='.$id);
  }  
  
  
  public function executePagoaprobado(sfWebRequest $request)
  {
      
  }
  
  public function executePagoaprobadoajax(sfWebRequest $request)
  {
      $id_feria = $request->getParameter('id_feria');
      
      $miid = sfContext::getInstance()->getUser()->getGuardUser()->getId();
      
      $Usuario = UsuarioQuery::create()->filterBySfGuardUser($miid)->findOne();
      $id_usuario = $Usuario->getId();
      
 
      $id_grupo = $Usuario->getSfGuardUserGroup();
 
      if ($id_grupo == 1) {
                    $PagoExpositors = PagoExpositorQuery::create()
                      ->Join('Status')
                      ->orderById('desc')
                      ->condition('cond2', 'Status.id_status =5')
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
                '' =>  '      <a style="vertical-align:middle;" title="Ver" href="/pago_expositor/mostrar/id/'.$PagoExpositor->getId().'/id_feria/'.$id_feria.'/id_expositor/'.$id_expositor.'"><img src="/images/search_mini.png"></a>'
                     . '      <a style="vertical-align:middle;" title="Revertir" href="/pago_expositor/revertirpagoaprobado/id/'.$PagoExpositor->getId().'/id_feria/'.$id_feria.'/id_expositor/'.$id_expositor.'/id_expositor_feria/'.$id_expositor_feria.'"><img src="/images/back_mini.png"></a>', 
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
                      ->condition('cond2', 'Status.id_status =5')
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
  
  public function executeRechazarsolicitud(sfWebRequest $request)
  {

  }
  
public function executeEsrechazada(sfWebRequest $request)
  {
      $observaciones = $request->getParameter('observaciones');
      $id_feria = $request->getParameter('id_feria');
      $id_expositor = $request->getParameter('id_expositor');
      $id_expositor_feria = $request->getParameter('id_expositor_feria');
      $id = $request->getParameter('id');
      
    $Status = StatusQuery::create()->
        filterByIdFeria($id_feria)->
        filterByIdExpositor($id_expositor)->
        filterByIdExpositorFeria($id_expositor_feria)->    
        filterByIdPagoExpositor($id)->     
        filterByStatusActual(true)->  
        filterByIdStatus(4)->      
        findOne(); 
    if (count($Status) > 0) {
        $Status->setStatusActual(false);
        $Status->save();
        
        $StatusNuevo = new Status();
        $StatusNuevo->setIdExpositor($id_expositor);
        $StatusNuevo->setIdFeria($id_feria);
        $StatusNuevo->setIdStatus(6);
        $StatusNuevo->setIdExpositorFeria($id_expositor_feria);
        $StatusNuevo->setIdPagoExpositor($id);
        $StatusNuevo->setStatusActual(true);
        $StatusNuevo->setObservaciones($observaciones);
        $StatusNuevo->save();       
      
    }
      $this->redirect('pago_expositor/pagorechazado?id_feria='.$id_feria.'&id_expositor='.$id_expositor.'&id_expositor_feria='.$id_expositor_feria.'&id='.$id);
  }  
  
   public function executePagorechazado(sfWebRequest $request)
  {
      
  } 
  
  public function executePagorechazadoajax(sfWebRequest $request)
  {
      $id_feria = $request->getParameter('id_feria');
      
      $miid = sfContext::getInstance()->getUser()->getGuardUser()->getId();
      
      $Usuario = UsuarioQuery::create()->filterBySfGuardUser($miid)->findOne();
      $id_usuario = $Usuario->getId();
      
 
      $id_grupo = $Usuario->getSfGuardUserGroup();
 
      if ($id_grupo == 1) {
                    $PagoExpositors = PagoExpositorQuery::create()
                      ->Join('Status')
                      ->orderById('desc')
                      ->condition('cond2', 'Status.id_status =6')
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
            $id_pago_expositor = $PagoExpositor->getId();
                    $Expositor = ExpositorQuery::create()->
                            filterById($id_expositor)->
                            findOne();
            $Status = StatusQuery::create()->
                    filterByIdExpositor($id_expositor)->
                    filterByIdFeria($id_feria)->
                    filterByIdExpositorFeria($id_expositor_feria)->
                    filterByIdPagoExpositor($id_pago_expositor)->
                    filterByIdStatus(6)->
                    filterByStatusActual(true)->
                    findOne(); 
            
            
             $arreglo[$i] = array(
                '' => '      <a style="vertical-align:middle;" title="Ver" href="/pago_expositor/mostrar/id/'.$PagoExpositor->getId().'/id_feria/'.$id_feria.'/id_expositor/'.$id_expositor.'"><img src="/images/search_mini.png"></a>'
                    . '      <a style="vertical-align:middle;" title="Revertir" href="/pago_expositor/revertirpagorechazado/id/'.$PagoExpositor->getId().'/id_feria/'.$id_feria.'/id_expositor/'.$id_expositor.'/id_expositor_feria/'.$id_expositor_feria.'"><img src="/images/back_mini.png"></a>',  
                 'Observaciones' => $Status->getObservaciones(),
                 'Nombre' => $Expositor->getNombre(),
                'Apellido' => $Expositor->getApellido(),
                'Rif' => $Expositor->getRif(),               
            ); 
            $i++; 
                            
        }        
      } else {
                    $PagoExpositors = PagoExpositorQuery::create()
                      ->Join('Status')
                      ->orderById('desc')
                      ->condition('cond1', 'PagoExpositor.IdUsuario = ?', $id_usuario)                     
                      ->condition('cond2', 'Status.id_status =6')
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
            $id_expositor_feria = $PagoExpositor->getIdExpositorFeria();
            $id_pago_expositor = $PagoExpositor->getId();
                    $Expositor = ExpositorQuery::create()->
                            filterById($id_expositor)->
                            findOne();
            $Status = StatusQuery::create()->
                    filterByIdExpositor($id_expositor)->
                    filterByIdFeria($id_feria)->
                    filterByIdExpositorFeria($id_expositor_feria)->
                    filterByIdPagoExpositor($id_pago_expositor)->
                    filterByIdStatus(6)->
                    filterByStatusActual(true)->
                    findOne(); 
             $arreglo[$i] = array(
                '' => '      <a style="vertical-align:middle;" title="Ver" href="/pago_expositor/mostrar/id/'.$PagoExpositor->getId().'/id_feria/'.$id_feria.'/id_expositor/'.$id_expositor.'"><img src="/images/search_mini.png"></a>',
                'Observaciones' => $Status->getObservaciones(),
                 'Nombre' => $Expositor->getNombre(),
                'Apellido' => $Expositor->getApellido(),
                'Rif' => $Expositor->getRif(),               
            ); 
            $i++; 
                            
        }    
      }
      
        return $this->renderText(json_encode($arreglo));
  }  
  
     public function executeRevertirpagorechazado(sfWebRequest $request)
  {
    $id_feria = $request->getParameter('id_feria');
    $id_expositor = $request->getParameter('id_expositor');
    $id_expositor_feria = $request->getParameter('id_expositor_feria');
    $id = $request->getParameter('id');
    
    $PagoExpositor = PagoExpositorQuery::create()->filterById($id)->findOne();
    $PagoExpositor->setStatusActual(false);
    $PagoExpositor->save();
    
    $Status = StatusQuery::create()->
        filterByIdFeria($id_feria)->
        filterByIdExpositor($id_expositor)->
        filterByIdExpositorFeria($id_expositor_feria)->     
        filterByStatusActual(true)-> 
        filterByIdStatus(6)->     
        findOne(); 
    
    if (count($Status) > 0) {
        $Status->setStatusActual(false);
        $Status->save();
        
        $StatusNuevo = new Status();
        $StatusNuevo->setIdExpositor($id_expositor);
        $StatusNuevo->setIdFeria($id_feria);
        $StatusNuevo->setIdStatus(2);
        $StatusNuevo->setIdExpositorFeria($id_expositor_feria);
        $StatusNuevo->setStatusActual(true);
        $StatusNuevo->save(); 
        
        
    }
    
    $this->redirect('expositor_feria/pago?id_feria='.$id_feria);
    
  } 
  
     public function executeRevertirpagoaprobado(sfWebRequest $request)
  {
    $id_feria = $request->getParameter('id_feria');
    $id_expositor = $request->getParameter('id_expositor');
    $id_expositor_feria = $request->getParameter('id_expositor_feria');
    $id = $request->getParameter('id');
    
    $PagoExpositor = PagoExpositorQuery::create()->filterById($id)->findOne();
    $PagoExpositor->setStatusActual(false);
    $PagoExpositor->save();
    
    $Status = StatusQuery::create()->
        filterByIdFeria($id_feria)->
        filterByIdExpositor($id_expositor)->
        filterByIdExpositorFeria($id_expositor_feria)->     
        filterByStatusActual(true)-> 
        filterByIdStatus(5)->     
        findOne(); 
    
    if (count($Status) > 0) {
        $Status->setStatusActual(false);
        $Status->save();
        
        $StatusNuevo = new Status();
        $StatusNuevo->setIdExpositor($id_expositor);
        $StatusNuevo->setIdFeria($id_feria);
        $StatusNuevo->setIdStatus(2);
        $StatusNuevo->setIdExpositorFeria($id_expositor_feria);
        $StatusNuevo->setStatusActual(true);
        $StatusNuevo->save(); 
        
        
    }
    
    $this->redirect('expositor_feria/pago?id_feria='.$id_feria);
    
  }   
  
  public function executeListadobanco(sfWebRequest $request)
  {
      $valor = $request->getParameter('valor');
      
      $id_feria = $request->getParameter('id_feria');
      
      if (!$valor) {
          
        // Caso Nacional  
        $Bancos = BancoQuery::create()
         ->leftJoin('Cuenta')
         ->orderByNombre('asc')
         ->where('Banco.IdPais = 1')                     
         ->where('Cuenta.IdFeria = ?', $id_feria)
         ->find();  
        
      } else {
          
         $Bancos = BancoQuery::create()
         ->leftJoin('Cuenta')
         ->orderByNombre('asc')
         ->where('Banco.IdPais > 1')                     
         ->where('Cuenta.IdFeria = ?', $id_feria)
         ->find();  
                 
      }
      

                
    $arreglo = array();
    foreach ($Bancos as $Banco) {
            $arreglo[$Banco->getId()] = $Banco->getNombre();
    }     

 
      return $this->renderText(json_encode($arreglo));
  }  
  
  public function executeListadocuenta(sfWebRequest $request)
  {
      $valor = $request->getParameter('valor');
      
      $id_feria = $request->getParameter('id_feria');
      
      $Cuenta = CuentaQuery::create()->filterByIdBanco($valor)->filterByIdFeria($id_feria)->findOne();
      
      $arreglo = array();
      if (count($Cuenta) > 0) {
            $arreglo['cuenta'] = $Cuenta->getNumero();
            $arreglo['beneficiario'] = $Cuenta->getBeneficiario();
            $arreglo['swift'] = $Cuenta->getSwift();
            $arreglo['aba'] = $Cuenta->getAba();        
      }
      
      return $this->renderText(json_encode($arreglo));
  }   
}
