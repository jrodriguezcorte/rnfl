<?php

/**
 * pais actions.
 *
 * @package    rnfl
 * @subpackage pais
 * @author     Your name here
 */
class paisActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      
  }
  
    public function executeIndexajax() {
        $Paises = PaisQuery::create()->orderByNombre('asc')->find();
        
        foreach ($Paises as $list) {
            $arreglo[] = array(
                'Nombre' => $list->getNombre(),
                '' => ''
                . '      <a style="vertical-align:middle;" title="Ver" href="/pais/show/id/'.$list->getId().'"><img src="/images/search_mini.png"></a>'
                . '    ',
            );
        }        

        return $this->renderText(json_encode($arreglo));
    }    

  public function executeShow(sfWebRequest $request)
  {
    $this->Pais = PaisPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Pais);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PaisForm();
    
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PaisForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Pais = PaisQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Pais, sprintf('Object Pais does not exist (%s).', $request->getParameter('id')));
    $this->form = new PaisForm($Pais);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Pais = PaisQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Pais, sprintf('Object Pais does not exist (%s).', $request->getParameter('id')));
    $this->form = new PaisForm($Pais);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Pais = PaisQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Pais, sprintf('Object Pais does not exist (%s).', $request->getParameter('id')));
    $Pais->delete();

    $this->redirect('pais/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Pais = $form->save();

      $this->redirect('pais/edit?id='.$Pais->getId());
    }
  }
}
