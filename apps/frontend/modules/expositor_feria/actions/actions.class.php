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
  public function executeIndex(sfWebRequest $request)
  {
    $this->ExpositorFerias = ExpositorFeriaQuery::create()->find();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->ExpositorFeria = ExpositorFeriaPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->ExpositorFeria);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ExpositorFeriaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

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
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $ExpositorFeria = $form->save();

      $this->redirect('expositor_feria/edit?id='.$ExpositorFeria->getId());
    }
  }
}
