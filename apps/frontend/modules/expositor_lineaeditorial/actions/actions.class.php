<?php

/**
 * expositor_lineaeditorial actions.
 *
 * @package    rnfl
 * @subpackage expositor_lineaeditorial
 * @author     Your name here
 */
class expositor_lineaeditorialActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->ExpositorLineaeditorials = ExpositorLineaeditorialQuery::create()->find();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->ExpositorLineaeditorial = ExpositorLineaeditorialPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->ExpositorLineaeditorial);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ExpositorLineaeditorialForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ExpositorLineaeditorialForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $ExpositorLineaeditorial = ExpositorLineaeditorialQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($ExpositorLineaeditorial, sprintf('Object ExpositorLineaeditorial does not exist (%s).', $request->getParameter('id')));
    $this->form = new ExpositorLineaeditorialForm($ExpositorLineaeditorial);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $ExpositorLineaeditorial = ExpositorLineaeditorialQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($ExpositorLineaeditorial, sprintf('Object ExpositorLineaeditorial does not exist (%s).', $request->getParameter('id')));
    $this->form = new ExpositorLineaeditorialForm($ExpositorLineaeditorial);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $ExpositorLineaeditorial = ExpositorLineaeditorialQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($ExpositorLineaeditorial, sprintf('Object ExpositorLineaeditorial does not exist (%s).', $request->getParameter('id')));
    $ExpositorLineaeditorial->delete();

    $this->redirect('expositor_lineaeditorial/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $ExpositorLineaeditorial = $form->save();

      $this->redirect('expositor_lineaeditorial/edit?id='.$ExpositorLineaeditorial->getId());
    }
  }
}
