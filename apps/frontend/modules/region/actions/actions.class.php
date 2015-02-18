<?php

/**
 * region actions.
 *
 * @package    rnfl
 * @subpackage region
 * @author     Your name here
 */
class regionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  }

    public function executeIndexajax() {
        $Regiones = RegionQuery::create()->orderByNombre('asc')->find();
        
        foreach ($Regiones as $list) {
            $arreglo[] = array(
                'Nombre' => $list->getNombre(),
                '' => ''
                . '      <a style="vertical-align:middle;" title="Ver" href="/region/show/id/'.$list->getId().'"><img src="/images/search_mini.png"></a>'
                . '    ',
            );
        }        

        return $this->renderText(json_encode($arreglo));
    }  
    
  public function executeShow(sfWebRequest $request)
  {
    $this->Region = RegionPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Region);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new RegionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new RegionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Region = RegionQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Region, sprintf('Object Region does not exist (%s).', $request->getParameter('id')));
    $this->form = new RegionForm($Region);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Region = RegionQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Region, sprintf('Object Region does not exist (%s).', $request->getParameter('id')));
    $this->form = new RegionForm($Region);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Region = RegionQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Region, sprintf('Object Region does not exist (%s).', $request->getParameter('id')));
    $Region->delete();

    $this->redirect('region/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Region = $form->save();

      $this->redirect('region/index');
    }
  }
}
