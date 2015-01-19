<?php

/**
 * banco actions.
 *
 * @package    rnfl
 * @subpackage banco
 * @author     Your name here
 */
class bancoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  }

    public function executeIndexajax() {
        $Bancos = BancoQuery::create()->orderByNombre('asc')->find();
        
        foreach ($Bancos as $list) {
            $Pais = PaisQuery::create()->filterById($list->getIdPais())->findOne();
            $arreglo[] = array(
                'Nombre' => $list->getNombre(),
                'Pais' => $Pais->getNombre(),
                '' => ''
                . '      <a style="vertical-align:middle;" title="Ver" href="/banco/show/id/'.$list->getId().'"><img src="/images/search_mini.png"></a>'
                . '    ',
            );
        }        

        return $this->renderText(json_encode($arreglo));
    }  

  public function executeShow(sfWebRequest $request)
  {
    $this->Banco = BancoPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Banco);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new BancoForm();
    
    $this->form->setDefault('id_pais', 1);
    
    $this->form->setDefault('id_moneda', 1);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new BancoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Banco = BancoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Banco, sprintf('Object Banco does not exist (%s).', $request->getParameter('id')));
    $this->form = new BancoForm($Banco);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Banco = BancoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Banco, sprintf('Object Banco does not exist (%s).', $request->getParameter('id')));
    $this->form = new BancoForm($Banco);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Banco = BancoQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Banco, sprintf('Object Banco does not exist (%s).', $request->getParameter('id')));
    $Banco->delete();

    $this->redirect('banco/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Banco = $form->save();

      $this->redirect('banco/edit?id='.$Banco->getId());
    }
  }
}
