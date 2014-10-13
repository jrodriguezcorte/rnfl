<?php

/**
 * linea_editorial actions.
 *
 * @package    rnfl
 * @subpackage linea_editorial
 * @author     Your name here
 */
class linea_editorialActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->LineaEditorials = LineaEditorialQuery::create()->find();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->LineaEditorial = LineaEditorialPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->LineaEditorial);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new LineaEditorialForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new LineaEditorialForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $LineaEditorial = LineaEditorialQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($LineaEditorial, sprintf('Object LineaEditorial does not exist (%s).', $request->getParameter('id')));
    $this->form = new LineaEditorialForm($LineaEditorial);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $LineaEditorial = LineaEditorialQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($LineaEditorial, sprintf('Object LineaEditorial does not exist (%s).', $request->getParameter('id')));
    $this->form = new LineaEditorialForm($LineaEditorial);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $LineaEditorial = LineaEditorialQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($LineaEditorial, sprintf('Object LineaEditorial does not exist (%s).', $request->getParameter('id')));
    $LineaEditorial->delete();

    $this->redirect('linea_editorial/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $LineaEditorial = $form->save();

      $this->redirect('linea_editorial/edit?id='.$LineaEditorial->getId());
    }
  }
}
