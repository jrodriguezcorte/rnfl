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
  public function executeIndex(sfWebRequest $request)
  {
      
  }

    public function executeIndexajax() {
        $Expositores = ExpositorQuery::create()->orderByNombre('desc')->find();
        
        foreach ($Expositores as $list) {
            $Pais = PaisQuery::create()->filterById($list->getIdPais())->findOne();
            $arreglo[] = array(
                'Nombre' => $list->getNombre(),
                'Apellido' => $list->getApellido(),
                'Cedula' => $list->getCedula(),
                'Rif' => $list->getRif(),
                'Pais' => $Pais->getNombre(),
                '' => ''
                . '      <a style="vertical-align:middle;" title="Ver" href="/expositor/show/id/'.$list->getId().'"><img src="/images/search_mini.png"></a>'
                . '    ',
            );
        }        

        return $this->renderText(json_encode($arreglo));
    }   
  
  public function executeShow(sfWebRequest $request)
  {
    $this->Expositor = ExpositorPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Expositor);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ExpositorForm();
    
    $this->form->setDefault('id_pais', 1);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ExpositorForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
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
}
