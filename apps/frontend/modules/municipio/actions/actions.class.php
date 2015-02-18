<?php

/**
 * municipio actions.
 *
 * @package    rnfl
 * @subpackage municipio
 * @author     Your name here
 */
class municipioActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  }

    public function executeIndexajax() {
        $Municipios = MunicipioQuery::create()->orderByNombre('asc')->find();
        
        foreach ($Municipios as $list) {
            $Estado = EstadoQuery::create()->filterById($list->getIdEstado())->findOne();  
            $Pais = PaisQuery::create()->filterById($Estado->getIdPais())->findOne();
            $arreglo[] = array(
                'Nombre' => $list->getNombre(),
                'Pais' => $Pais->getNombre(),
                'Estado' => $Estado->getNombre(),
                '' => ''
                . '      <a style="vertical-align:middle;" title="Ver" href="/municipio/show/id/'.$list->getId().'"><img src="/images/search_mini.png"></a>'
                . '    ',
            );
        }        

        return $this->renderText(json_encode($arreglo));
    } 
    
  public function executeShow(sfWebRequest $request)
  {
    $this->Municipio = MunicipioPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Municipio);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new MunicipioForm();
    
    $this->form->setDefault('id_estado', 1);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new MunicipioForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Municipio = MunicipioQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Municipio, sprintf('Object Municipio does not exist (%s).', $request->getParameter('id')));
    $this->form = new MunicipioForm($Municipio);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Municipio = MunicipioQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Municipio, sprintf('Object Municipio does not exist (%s).', $request->getParameter('id')));
    $this->form = new MunicipioForm($Municipio);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Municipio = MunicipioQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Municipio, sprintf('Object Municipio does not exist (%s).', $request->getParameter('id')));
    $Municipio->delete();

    $this->redirect('municipio/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Municipio = $form->save();

      $this->redirect('municipio/index');
    }
  }
}
