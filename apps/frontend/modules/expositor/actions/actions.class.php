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
        $Expositores = ExpositorQuery::create()->orderByNombre('desc')->find();
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
        
        $Expositores = ExpositorQuery::create()->orderByNombre('desc')->find();
        
        $i = 0;
        foreach ($Expositores as $list) {
            $Pais = PaisQuery::create()->filterById($list->getIdPais())->findOne();
            $arreglo[$i] = array(
                                '' => ''
                . '      <a style="vertical-align:middle;" title="Ver" href="/expositor/mostrar/id_feria/'.$id_feria.'/id_expositor/' . $list->getId() . '"><img src="/images/search_mini.png"></a>'                
                . '      <a style="vertical-align:middle;" title="Asociar a la feria" href="/expositor_feria/new/id_feria/'.$id_feria.'/id_expositor/' . $list->getId() . '"><img src="/images/go_mini.png"></a>', 
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
    $this->form = new ExpositorForm();
    
    $this->form->setDefault('id_pais', 1);
    
    $this->form->setDefault('es_venezolano', 1);
  }
  
  public function executeNuevo(sfWebRequest $request)
  {
    $this->form = new ExpositorForm();
    
    $this->form->setDefault('id_pais', 1);
    
    $this->form->setDefault('es_venezolano', 1);
            
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

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Expositor = ExpositorQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Expositor, sprintf('Object Expositor does not exist (%s).', $request->getParameter('id')));
    $Expositor->delete();

    $this->redirect('expositor/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Expositor = $form->save();

      $this->redirect('expositor/edit?id='.$Expositor->getId());
    }
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
        $this->redirect('expositor/index?id='.$Expositor->getId());  
      }      
      
    }
  }  
}
