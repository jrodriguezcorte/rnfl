<?php

/**
 * sello_editorial actions.
 *
 * @package    rnfl
 * @subpackage sello_editorial
 * @author     Your name here
 */
class sello_editorialActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      
  }

    public function executeIndexajax() {
        $SellosEditoriales = SelloEditorialQuery::create()->orderByNombre('asc')->find();
        
        foreach ($SellosEditoriales as $list) {
            $Pais = PaisQuery::create()->filterById($list->getIdPais())->findOne();
            $arreglo[] = array(
                'Nombre' => $list->getNombre(),
                'Pais' => $Pais->getNombre(),
                '' => ''
                . '      <a style="vertical-align:middle;" title="Ver" href="/sello_editorial/show/id/'.$list->getId().'"><img src="/images/search_mini.png"></a>'
                . '    ',
            );
        }        

        return $this->renderText(json_encode($arreglo));
    }   
    
  public function executeShow(sfWebRequest $request)
  {
    $this->SelloEditorial = SelloEditorialPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->SelloEditorial);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new SelloEditorialForm();
    
    $this->form->setDefault('id_pais', 1);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new SelloEditorialForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $SelloEditorial = SelloEditorialQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($SelloEditorial, sprintf('Object SelloEditorial does not exist (%s).', $request->getParameter('id')));
    $this->form = new SelloEditorialForm($SelloEditorial);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $SelloEditorial = SelloEditorialQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($SelloEditorial, sprintf('Object SelloEditorial does not exist (%s).', $request->getParameter('id')));
    $this->form = new SelloEditorialForm($SelloEditorial);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $SelloEditorial = SelloEditorialQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($SelloEditorial, sprintf('Object SelloEditorial does not exist (%s).', $request->getParameter('id')));
    $SelloEditorial->delete();

    $this->redirect('sello_editorial/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $SelloEditorial = $form->save();

      $this->redirect('sello_editorial/edit?id='.$SelloEditorial->getId());
    }
  }
}
