<?php

/**
 * feria_selloeditorial actions.
 *
 * @package    rnfl
 * @subpackage feria_selloeditorial
 * @author     Your name here
 */
class feria_selloeditorialActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->FeriaSelloeditorials = FeriaSelloeditorialQuery::create()->find();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->FeriaSelloeditorial = FeriaSelloeditorialPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->FeriaSelloeditorial);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new FeriaSelloeditorialForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new FeriaSelloeditorialForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $FeriaSelloeditorial = FeriaSelloeditorialQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($FeriaSelloeditorial, sprintf('Object FeriaSelloeditorial does not exist (%s).', $request->getParameter('id')));
    $this->form = new FeriaSelloeditorialForm($FeriaSelloeditorial);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $FeriaSelloeditorial = FeriaSelloeditorialQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($FeriaSelloeditorial, sprintf('Object FeriaSelloeditorial does not exist (%s).', $request->getParameter('id')));
    $this->form = new FeriaSelloeditorialForm($FeriaSelloeditorial);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $FeriaSelloeditorial = FeriaSelloeditorialQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($FeriaSelloeditorial, sprintf('Object FeriaSelloeditorial does not exist (%s).', $request->getParameter('id')));
    $FeriaSelloeditorial->delete();

    $this->redirect('feria_selloeditorial/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $FeriaSelloeditorial = $form->save();

      $this->redirect('feria_selloeditorial/edit?id='.$FeriaSelloeditorial->getId());
    }
  }
}
