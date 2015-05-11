<?php

/**
 * cuenta actions.
 *
 * @package    rnfl
 * @subpackage cuenta
 * @author     Your name here
 */
class cuentaActions extends sfActions
{
  public $prueba = 0;  
    
  public function executeIndex(sfWebRequest $request)
  {
  }

    public function executeIndexajax(sfWebRequest $request) {
        
        $id_feria = $request->getParameter('id_feria');
        $Cuentas = CuentaQuery::create()->filterByIdFeria($id_feria)->
                orderByIdBanco('asc')->
                find();
        
        foreach ($Cuentas as $list) {
            $Banco = BancoQuery::create()->filterById($list->getIdBanco())->findOne();
            $activo =  $list->getActivo();
            if ($activo) {
                $estado = 'Activo';
            } else {
                $estado = 'Inactivo';
            }
            $arreglo[] = array(
                'Banco' => $Banco->getNombre(),
                'Numero' => $list->getNumero(),
                'Beneficiario' => $list->getBeneficiario(),
                'Estado' => $estado,
                '' => ''
                . '      <a style="vertical-align:middle;" title="Ver" href="/cuenta/show/id_feria/'.$list->getIdFeria().'/id/' . $list->getId() . '"><img src="/images/search_mini.png"></a>'
                . '    ',
            );
        }        

        return $this->renderText(json_encode($arreglo));
   }  
    
  public function executeShow(sfWebRequest $request)
  {
    $this->Cuenta = CuentaPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Cuenta);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CuentaForm();
    
    $this->form->setDefault('id_feria', $request->getParameter('id_feria'));
    
    
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->forward404Unless($request->isMethod(sfRequest::POST));

    list($resto,$id_feria) = explode("id_feria/", $_SERVER['HTTP_REFERER']);

    $this->prueba = $id_feria;       
    
    $this->form = new CuentaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Cuenta = CuentaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Cuenta, sprintf('Object Cuenta does not exist (%s).', $request->getParameter('id')));
    $this->form = new CuentaForm($Cuenta);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Cuenta = CuentaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Cuenta, sprintf('Object Cuenta does not exist (%s).', $request->getParameter('id')));
    $this->form = new CuentaForm($Cuenta);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $id_feria = $request->getParameter('id_feria');  
    $request->checkCSRFProtection();

    $Cuenta = CuentaQuery::create()->findPk($request->getParameter('id'));
 //   $this->forward404Unless($Cuenta, sprintf('Object Cuenta does not exist (%s).', $request->getParameter('id')));
 //   $Cuenta->delete();
    $Cuenta->setActivo(false);
    $Cuenta->save();
    
    $this->redirect('cuenta/index?id_feria='.$id_feria);
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $params = $request->getParameter($form->getName());
    
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Cuenta = $form->save();

      $this->redirect('cuenta/index?id_feria=' . $params['id_feria']);
    }
  }
}
