<?php

/**
 * ponente actions.
 *
 * @package    rnfl
 * @subpackage ponente
 * @author     Your name here
 */
class ponenteActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {

  }
  
    public function executeIndexajax() {
        $Ponentes = PonenteQuery::create()->orderByNombre('asc')->find();
        
        foreach ($Ponentes as $list) {
            $Pais = PaisQuery::create()->filterById($list->getNacionalidad())->findOne();
            $arreglo[] = array(
                'Nombre' => $list->getNombre(),
                'Apellido' => $list->getApellido(),
                'Cedula' => $list->getCedula(),
                'Rif' => $list->getRif(),
                'Sexo' => $list->getSexo(),
                'Pais' => $Pais->getNombre(),
                'Correo' => $list->getEmail(),
                '' => ''
                . '      <a style="vertical-align:middle;" title="Ver" href="/ponente/show/id/'.$list->getId().'"><img src="/images/search_mini.png"></a>'
                . '    ',
            );
        }        

        return $this->renderText(json_encode($arreglo));
    }   

  public function executeShow(sfWebRequest $request)
  {
    $this->Ponente = PonentePeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Ponente);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PonenteForm();
    
    $this->form->setDefault('nacionalidad', 1);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PonenteForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Ponente = PonenteQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Ponente, sprintf('Object Ponente does not exist (%s).', $request->getParameter('id')));
    $this->form = new PonenteForm($Ponente);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Ponente = PonenteQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Ponente, sprintf('Object Ponente does not exist (%s).', $request->getParameter('id')));
    $this->form = new PonenteForm($Ponente);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Ponente = PonenteQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Ponente, sprintf('Object Ponente does not exist (%s).', $request->getParameter('id')));
    $Ponente->delete();

    $this->redirect('ponente/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Ponente = $form->save();

      $this->redirect('ponente/edit?id='.$Ponente->getId());
    }
  }
}
