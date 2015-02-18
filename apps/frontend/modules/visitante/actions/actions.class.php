<?php

/**
 * visitante actions.
 *
 * @package    rnfl
 * @subpackage visitante
 * @author     Your name here
 */
class visitanteActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  }

    public function executeIndexajax(sfWebRequest $request) {
       $id_feria = $request->getParameter('id_feria');
       $Visitantes = VisitanteQuery::create()->filterByIdFeria($id_feria)->orderByFecha('desc')->find();

        foreach ($Visitantes as $list) {
            $arreglo[] = array(
                'Fecha' => implode("-", array_reverse(explode("-", $list->getFecha()))),
                'Numero' => $list->getNumero(),
                '' => ''
                . '      <a style="vertical-align:middle;" title="Ver" href="/visitante/show/id_feria/'.$list->getIdFeria().'/id/' . $list->getId() . '"><img src="/images/search_mini.png"></a>'
                . '    ',
            );
        }
        
        return $this->renderText(json_encode($arreglo));
    }  
  
  public function executeShow(sfWebRequest $request)
  {
    $this->Visitante = VisitantePeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Visitante);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new VisitanteForm();
    
    $this->form->setDefault('fecha', date("Y-m-d"));
    
    $this->form->setDefault('id_feria', $request->getParameter('id_feria'));
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new VisitanteForm();

    $this->processForm($request, $this->form);
    
    $this->form->setDefault('id_feria', $request->getParameter('id_feria'));

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Visitante = VisitanteQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Visitante, sprintf('Object Visitante does not exist (%s).', $request->getParameter('id')));
    $this->form = new VisitanteForm($Visitante);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Visitante = VisitanteQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Visitante, sprintf('Object Visitante does not exist (%s).', $request->getParameter('id')));
    $this->form = new VisitanteForm($Visitante);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Visitante = VisitanteQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Visitante, sprintf('Object Visitante does not exist (%s).', $request->getParameter('id')));
    $Visitante->delete();

    $this->redirect('visitante/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {      
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Visitante = $form->save();

      $this->redirect("visitante/index?id_feria=".$Visitante->getIdFeria());
    }
  }
}
