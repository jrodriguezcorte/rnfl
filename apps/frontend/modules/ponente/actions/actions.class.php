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
  
    public function executeIndexajax(sfWebRequest $request) {
        $Ponentes = PonenteQuery::create()->filterByActivo(true)->orderByNombre('asc')->find();
        $id_feria = $request->getParameter('id_feria');
        if ($id_feria != '') {
            $feria = '/id_feria/'.$id_feria;
        } else {
            $feria = '';
        }        
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
                . '      <a style="vertical-align:middle;" title="Ver" href="/ponente/show/id/'.$list->getId().$feria.'"><img src="/images/search_mini.png"></a>'
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
    
    list($resto,$id_feria) = explode("id_feria/", $_SERVER['HTTP_REFERER']);

    $this->prueba = $id_feria;     

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
    list($resto,$id_feria) = explode("id_feria/", $_SERVER['HTTP_REFERER']);

    $this->prueba = $id_feria;
    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Ponente = PonenteQuery::create()->findPk($request->getParameter('id'));
   // $this->forward404Unless($Ponente, sprintf('Object Ponente does not exist (%s).', $request->getParameter('id')));
   // $Ponente->delete();
    $Ponente->setActivo(false);
    $Ponente->save();
    
     list($resto,$id_feria) = explode("id_feria/", $_SERVER['HTTP_REFERER']);

      $this->prueba = $id_feria;
    
      if ($this->prueba != '') {
        $this->redirect('feria/info?id_feria='.$this->prueba);
      } else {
        $this->redirect('ponente/index');  
      }  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Ponente = $form->save();

      if ($this->prueba != '') {
        $this->redirect('feria/info?id_feria='.$this->prueba);
      } else {
        $this->redirect('ponente/index');  
      }
    }
  }
}
