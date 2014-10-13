<?php

/**
 * ponente_actividad actions.
 *
 * @package    rnfl
 * @subpackage ponente_actividad
 * @author     Your name here
 */
class ponente_actividadActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->PonenteActividads = PonenteActividadQuery::create()->find();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->PonenteActividad = PonenteActividadPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->PonenteActividad);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PonenteActividadForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PonenteActividadForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $PonenteActividad = PonenteActividadQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($PonenteActividad, sprintf('Object PonenteActividad does not exist (%s).', $request->getParameter('id')));
    $this->form = new PonenteActividadForm($PonenteActividad);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $PonenteActividad = PonenteActividadQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($PonenteActividad, sprintf('Object PonenteActividad does not exist (%s).', $request->getParameter('id')));
    $this->form = new PonenteActividadForm($PonenteActividad);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $PonenteActividad = PonenteActividadQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($PonenteActividad, sprintf('Object PonenteActividad does not exist (%s).', $request->getParameter('id')));
    $PonenteActividad->delete();

    $this->redirect('ponente_actividad/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $PonenteActividad = $form->save();

      $this->redirect('ponente_actividad/edit?id='.$PonenteActividad->getId());
    }
  }
}
