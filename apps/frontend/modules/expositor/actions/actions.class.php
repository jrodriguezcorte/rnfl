<?php

/**
 * expositor actions.
 *
 * @package    rnfl
 * @subpackage expositor
 * @author     Your name here
 */
class expositorActions extends sfActions
{
  public $prueba = 0;
    
  public function executeIndex(sfWebRequest $request)
  {
      
  }
  
  public function executeIndexexp(sfWebRequest $request)
  {
      
  }  

    public function executeIndexajax() {
        
        $miid = sfContext::getInstance()->getUser()->getGuardUser()->getId();
        $Usuario = UsuarioQuery::create()->filterBySfGuardUser($miid)->findOne();
        $sf_guard_user = $Usuario->getSfGuardUserGroup();
        if ($sf_guard_user != 1) {
            
                $Expositores = ExpositorQuery::create()
                                    ->orderByNombre('asc')
                                        ->filterByIdUsuario($Usuario->getId())
                                    ->find();
        } else {       
        
            $Expositores = ExpositorQuery::create()
                                        ->orderByNombre('asc')
                                        ->find();
        }
        $i = 0;
        foreach ($Expositores as $list) {
            $Pais = PaisQuery::create()->filterById($list->getIdPais())->findOne();
            $arreglo[$i] = array(
                '' => ''
                . '      <a style="vertical-align:middle;" title="Ver" href="/expositor/show/id/'.$list->getId().'"><img src="/images/search_mini.png"></a>'
                . '    ',                
                'Nombre' => $list->getNombre(),
                'Apellido' => $list->getApellido(),
                'Pais' => $Pais->getNombre(),
                'Rif' => $list->getRif(),
                'Email' => $list->getEmail(),
                'Local' => $list->getTelefonoLocal(),
                'Celular' => $list->getTelefonoCelular(),
                
            );
            $i++;
        }        

        return $this->renderText(json_encode($arreglo));
    } 
    
    public function executeIndexajaxexp(sfWebRequest $request) {
        $id_feria = $request->getParameter('id_feria');
        
        $miid = sfContext::getInstance()->getUser()->getGuardUser()->getId();
        $Usuario = UsuarioQuery::create()->filterBySfGuardUser($miid)->findOne();
        $sf_guard_user = $Usuario->getSfGuardUserGroup();
        if ($sf_guard_user == 3) {
            
                $Expositores = ExpositorQuery::create()
                                    ->orderByNombre('asc')
                                        ->filterByIdUSuario($Usuario->getId())
                                    ->find();
        } else {
                 $Expositores = ExpositorQuery::create()
                                    ->orderByNombre('asc')
                                    ->useExpositorFeriaQuery()
                                        ->filterByIdFeria($id_feria)
                                    ->endUse()    
                                    ->find();           
        }
        
        $i = 0;
        foreach ($Expositores as $list) {
            $Pais = PaisQuery::create()->filterById($list->getIdPais())->findOne();
            
            $ExpositorFeria = ExpositorFeriaQuery::create()->
                                filterByIdUsuario($Usuario->getId())->
                                filterByIdFeria($id_feria)->
                                findOne();
            
            if ($sf_guard_user == 3 && count($ExpositorFeria) > 0) {
                $asociar_feria = '';
            } else {
                $asociar_feria = '<a style="vertical-align:middle;" title="Asociar a la feria" href="/expositor_feria/new/id_feria/'.$id_feria.'/id_expositor/' . $list->getId() . '"><img src="/images/go_mini.png"></a>';
            }
            
            $arreglo[$i] = array(
                                '' => $asociar_feria
                . '      <a style="vertical-align:middle;" title="Ver" href="/expositor/mostrar/id_feria/'.$id_feria.'/id_expositor/' . $list->getId() . '"><img src="/images/search_mini.png"></a>'                
                . '      ', 
                'Nombre' => $list->getNombre(),
                'Apellido' => $list->getApellido(),
                'Pais' => $Pais->getNombre(),
                'Rif' => $list->getRif(),
                'Email' => $list->getEmail(),
                'Local' => $list->getTelefonoLocal(),
                'Celular' => $list->getTelefonoCelular(),
                
            );        
            $i++;
        }        

        return $this->renderText(json_encode($arreglo));
    }     
  
  public function executeShow(sfWebRequest $request)
  {
    $this->Expositor = ExpositorPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Expositor);
  }
  
  public function executeMostrar(sfWebRequest $request)
  {
    $this->Expositor = ExpositorPeer::retrieveByPk($request->getParameter('id_expositor'));
    $this->forward404Unless($this->Expositor);
  }  

  public function executeNew(sfWebRequest $request)
  {
    $miid = sfContext::getInstance()->getUser()->getGuardUser()->getId();
    $Usuario = UsuarioQuery::create()->filterBySfGuardUser($miid)->findOne();
        
    $this->form = new ExpositorForm();
    
    $this->form->setDefault('id_pais', 1);
    
    $this->form->setDefault('es_venezolano', 1);
    
    $this->form->setDefault('id_usuario', $Usuario->getId());
  }
  
  public function executeNuevo(sfWebRequest $request)
  {
      
    $miid = sfContext::getInstance()->getUser()->getGuardUser()->getId();
    $Usuario = UsuarioQuery::create()->filterBySfGuardUser($miid)->findOne();  
    
    $this->form = new ExpositorForm();
    
    $this->form->setDefault('id_pais', 1);
    
    $this->form->setDefault('es_venezolano', 1);
    
    $this->form->setDefault('id_usuario', $Usuario->getId());
            
  }  
  
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ExpositorForm();
    
    $this->processForm($request, $this->form);

    $this->setTemplate('new');
    
  }
  
   public function executeCrear(sfWebRequest $request)
  {
    list($resto,$id_feria) = explode("id_feria/", $_SERVER['HTTP_REFERER']);

    $this->prueba = $id_feria;
            
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ExpositorForm();
    
    $this->procesarForm($request, $this->form);

    $this->setTemplate('nuevo');
    
  } 

  public function executeEdit(sfWebRequest $request)
  {
    $Expositor = ExpositorQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Expositor, sprintf('Object Expositor does not exist (%s).', $request->getParameter('id')));
    $this->form = new ExpositorForm($Expositor);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Expositor = ExpositorQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Expositor, sprintf('Object Expositor does not exist (%s).', $request->getParameter('id')));
    $this->form = new ExpositorForm($Expositor);
    list($resto,$id_feria) = explode("id_feria/", $_SERVER['HTTP_REFERER']);

    $this->prueba = $id_feria;
    $this->processForm($request, $this->form);

  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Expositor = ExpositorQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Expositor, sprintf('Object Expositor does not exist (%s).', $request->getParameter('id')));
    $Expositor->delete();

     list($resto,$id_feria) = explode("id_feria/", $_SERVER['HTTP_REFERER']);

      $this->prueba = $id_feria;
    
      if ($this->prueba != '') {
        $this->redirect('feria/info?id_feria='.$this->prueba);
      } else {
        $this->redirect('ponente/index');  
      }  
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Expositor = $form->save();

      if ($this->prueba != '') {
        $this->redirect('feria/info?id_feria='.$this->prueba);;
      } else {
        $this->redirect('expositor/index');  
      }      }
  }
  
  protected function procesarForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));

    if ($form->isValid())
    {
      $Expositor = $form->save();
      
      if ($this->prueba != '') {
        $this->redirect('feria/info?id_feria='.$this->prueba);;
      } else {
        $this->redirect('expositor/index');  
      }      
      
    }
  }  
}
