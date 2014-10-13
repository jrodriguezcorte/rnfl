<?php

/**
 * actividad actions.
 *
 * @package    rnfl
 * @subpackage actividad
 * @author     Your name here
 */
class actividadActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Actividads = ActividadQuery::create()->find();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Actividad = ActividadPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Actividad);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ActividadForm();
    
     $this->form->setDefault('id_tipo_actividad', 1);
     
     $this->form->setDefault('fecha', date("Y-m-d"));
     
     $this->form->setDefault('hora', date("Y-m-d H:m"));
     
     $this->form->setDefault('alcanzo_tiempo', true);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ActividadForm();
    
    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Actividad = ActividadQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Actividad, sprintf('Object Actividad does not exist (%s).', $request->getParameter('id')));
    $this->form = new ActividadForm($Actividad);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Actividad = ActividadQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Actividad, sprintf('Object Actividad does not exist (%s).', $request->getParameter('id')));
    $this->form = new ActividadForm($Actividad);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Actividad = ActividadQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Actividad, sprintf('Object Actividad does not exist (%s).', $request->getParameter('id')));
    $Actividad->delete();

    $this->redirect('actividad/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Actividad = $form->save();

      $this->redirect('actividad/edit?id='.$Actividad->getId());
    }
  }
}
