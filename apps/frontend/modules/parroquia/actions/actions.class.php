<?php

/**
 * parroquia actions.
 *
 * @package    rnfl
 * @subpackage parroquia
 * @author     Your name here
 */
class parroquiaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  }
 
    public function executeIndexajax() {
        $Parroquias = ParroquiaQuery::create()->orderByNombre('asc')->find();
        
        foreach ($Parroquias as $list) {
            $Municipio = MunicipioQuery::create()->filterById($list->getIdMunicipio())->findOne();
            $Estado = EstadoQuery::create()->filterById($Municipio->getIdEstado())->findOne();
            $Pais = PaisQuery::create()->filterById($Estado->getIdPais())->findOne();
            $arreglo[] = array(
                'Nombre' => $list->getNombre(),
                'Pais' => $Pais->getNombre(),
                'Estado' => $Estado->getNombre(),
                'Municipio' => $Municipio->getNombre(),
                '' => ''
                . '      <a style="vertical-align:middle;" title="Ver" href="/parroquia/show/id/'.$list->getId().'"><img src="/images/search_mini.png"></a>'
                . '    ',
            );
        }        

        return $this->renderText(json_encode($arreglo));
    }   

  public function executeShow(sfWebRequest $request)
  {
    $this->Parroquia = ParroquiaPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Parroquia);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ParroquiaForm();
    
    $this->form->setDefault('id_municipio', 1);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ParroquiaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Parroquia = ParroquiaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Parroquia, sprintf('Object Parroquia does not exist (%s).', $request->getParameter('id')));
    $this->form = new ParroquiaForm($Parroquia);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Parroquia = ParroquiaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Parroquia, sprintf('Object Parroquia does not exist (%s).', $request->getParameter('id')));
    $this->form = new ParroquiaForm($Parroquia);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Parroquia = ParroquiaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Parroquia, sprintf('Object Parroquia does not exist (%s).', $request->getParameter('id')));
    $Parroquia->delete();

    $this->redirect('parroquia/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Parroquia = $form->save();

      $this->redirect('parroquia/edit?id='.$Parroquia->getId());
    }
  }
}
