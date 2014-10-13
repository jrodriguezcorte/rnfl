<?php

/**
 * expositor_selloeditorial actions.
 *
 * @package    rnfl
 * @subpackage expositor_selloeditorial
 * @author     Your name here
 */
class expositor_selloeditorialActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->ExpositorSelloeditorials = ExpositorSelloeditorialQuery::create()->find();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->ExpositorSelloeditorial = ExpositorSelloeditorialPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->ExpositorSelloeditorial);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ExpositorSelloeditorialForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ExpositorSelloeditorialForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $ExpositorSelloeditorial = ExpositorSelloeditorialQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($ExpositorSelloeditorial, sprintf('Object ExpositorSelloeditorial does not exist (%s).', $request->getParameter('id')));
    $this->form = new ExpositorSelloeditorialForm($ExpositorSelloeditorial);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $ExpositorSelloeditorial = ExpositorSelloeditorialQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($ExpositorSelloeditorial, sprintf('Object ExpositorSelloeditorial does not exist (%s).', $request->getParameter('id')));
    $this->form = new ExpositorSelloeditorialForm($ExpositorSelloeditorial);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $ExpositorSelloeditorial = ExpositorSelloeditorialQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($ExpositorSelloeditorial, sprintf('Object ExpositorSelloeditorial does not exist (%s).', $request->getParameter('id')));
    $ExpositorSelloeditorial->delete();

    $this->redirect('expositor_selloeditorial/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $ExpositorSelloeditorial = $form->save();

      $this->redirect('expositor_selloeditorial/edit?id='.$ExpositorSelloeditorial->getId());
    }
  }
}
