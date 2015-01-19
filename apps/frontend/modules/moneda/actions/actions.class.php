<?php

/**
 * moneda actions.
 *
 * @package    rnfl
 * @subpackage moneda
 * @author     Your name here
 */
class monedaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Monedas = MonedaQuery::create()->find();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Moneda = MonedaPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Moneda);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new MonedaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new MonedaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Moneda = MonedaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Moneda, sprintf('Object Moneda does not exist (%s).', $request->getParameter('id')));
    $this->form = new MonedaForm($Moneda);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Moneda = MonedaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Moneda, sprintf('Object Moneda does not exist (%s).', $request->getParameter('id')));
    $this->form = new MonedaForm($Moneda);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Moneda = MonedaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Moneda, sprintf('Object Moneda does not exist (%s).', $request->getParameter('id')));
    $Moneda->delete();

    $this->redirect('moneda/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Moneda = $form->save();

      $this->redirect('moneda/edit?id='.$Moneda->getId());
    }
  }
}
