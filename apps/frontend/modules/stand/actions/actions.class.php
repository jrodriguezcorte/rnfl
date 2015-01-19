<?php

/**
 * stand actions.
 *
 * @package    rnfl
 * @subpackage stand
 * @author     Your name here
 */
class standActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      
  }
  
    public function executeIndexajax(sfWebRequest $request) {
       $id_feria = $request->getParameter('id_feria');
       $Stands = StandQuery::create()->filterByIdFeria($id_feria)->orderById('desc')->find();
       
        foreach ($Stands as $list) {
            $arreglo[] = array(
                'Metros' => $list->getMetros(),
                'Costo en Bs' => $list->getCostoBs(),
                'Costo en USD' => $list->getCostoDs(),
                '' => ''
                . '      <a style="vertical-align:middle;" title="Ver" href="/stand/show/id_feria/'.$list->getIdFeria().'/id/' . $list->getId() . '"><img src="/images/search_mini.png"></a>'
               . '    ',
            );
        }
        
        return $this->renderText(json_encode($arreglo));
    }  

  public function executeShow(sfWebRequest $request)
  {
    $this->Stand = StandPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Stand);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new StandForm();
    
    $this->form->setDefault('id_feria', $request->getParameter('id_feria'));
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new StandForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Stand = StandQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Stand, sprintf('Object Stand does not exist (%s).', $request->getParameter('id')));
    $this->form = new StandForm($Stand);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Stand = StandQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Stand, sprintf('Object Stand does not exist (%s).', $request->getParameter('id')));
    $this->form = new StandForm($Stand);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Stand = StandQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Stand, sprintf('Object Stand does not exist (%s).', $request->getParameter('id')));
    $Stand->delete();

    $this->redirect('stand/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $params = $request->getParameter($form->getName());
    
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Stand = $form->save();

      $this->redirect('stand/edit?id=' . $Stand->getId().'&id_feria='.$params['id_feria']);
    }
  }
  
  public function executeListado(sfWebRequest $request)
  {
      $valor = $request->getParameter('valor');
      
      $id_feria = $request->getParameter('id_feria');
      
      $Stand = StandQuery::create()->filterById($valor)->filterByIdFeria($id_feria)->findOne();
      
      $costo = '';
      if (count($Stand) > 0) {
            if ($Stand->getCostoBs() == '') {
                $costo = '';
            } else {
                $costo = $Stand->getCostoBs().' Bs';
            }

            if ($Stand->getCostoDs() == '') {
                $costo .= '   ';
            } else {
                $costo .= '   '.$Stand->getCostoDs().' USD';
            }
      }
      
      return $this->renderText(json_encode($costo));
  }  
}
