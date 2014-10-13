<?php

/**
 * estado actions.
 *
 * @package    rnfl
 * @subpackage estado
 * @author     Your name here
 */
class estadoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  }

    public function executeIndexajax() {
        $Estados = EstadoQuery::create()->orderByNombre('asc')->find();
        
        foreach ($Estados as $list) {
            $Pais = PaisQuery::create()->filterById($list->getIdPais())->findOne();
            $arreglo[] = array(
                'Nombre' => $list->getNombre(),
                'Pais' => $Pais->getNombre(),
                '' => ''
                . '      <a style="vertical-align:middle;" title="Ver" href="/estado/show/id/'.$list->getId().'"><img src="/images/search_mini.png"></a>'
                . '    ',
            );
        }        

        return $this->renderText(json_encode($arreglo));
    }  
    
  public function executeShow(sfWebRequest $request)
  {
    $this->Estado = EstadoPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Estado);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new EstadoForm();
    
    $this->form->setDefault('id_pais', 1);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EstadoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Estado = EstadoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Estado, sprintf('Object Estado does not exist (%s).', $request->getParameter('id')));
    $this->form = new EstadoForm($Estado);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Estado = EstadoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Estado, sprintf('Object Estado does not exist (%s).', $request->getParameter('id')));
    $this->form = new EstadoForm($Estado);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Estado = EstadoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Estado, sprintf('Object Estado does not exist (%s).', $request->getParameter('id')));
    $Estado->delete();

    $this->redirect('estado/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Estado = $form->save();

      $this->redirect('estado/edit?id='.$Estado->getId());
    }
  }
}
