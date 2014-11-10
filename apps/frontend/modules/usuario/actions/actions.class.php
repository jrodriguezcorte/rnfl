<?php

/**
 * usuario actions.
 *
 * @package    rnfl
 * @subpackage usuario
 * @author     Your name here
 */
class usuarioActions extends sfActions
{
  public function executeBienvenido(sfWebRequest $request)
  {
    
  }    
  
  public function executeIndex(sfWebRequest $request)
  {  
  
  }
  
  public function executeIndexajax(sfWebRequest $request)
  {
      $miid = sfContext::getInstance()->getUser()->getGuardUser()->getId();
      
      $Usuario = UsuarioQuery::create()->filterBySfGuardUser($miid)->findOne();
      
      $id_grupo = $Usuario->getSfGuardUserGroup();
      
      if ($id_grupo == 1) {
         $Usuarios = UsuarioQuery::create()->orderByLogin('asc')->find();
         foreach ($Usuarios as $list) {
            if ($list->getSfGuardUserGroup() == 1) {
                $admin = '   <a id="admin" style="vertical-align:middle;" title="Eliminar Privilegio de Administrador" href="/usuario/noadmin/id/'.$list->getId().'"><img src="/images/noadmin.png"></a>';
            } else {
                $admin = '   <a id="admin" style="vertical-align:middle;" title="Convertir en Administrador" href="/usuario/admin/id/'.$list->getId().'"><img src="/images/admin.png"></a>';
            }
            $arreglo[] = array(
                'Nombre' => $list->getNombre(),
                'Apellido' => $list->getApellido(),
                'Login' => $list->getLogin(),
                'Correo' => $list->getCorreo(),
                '' => ''
                . '      <a style="vertical-align:middle;" title="Ver" href="/usuario/show/id/'.$list->getId().'"><img src="/images/search_mini.png"></a>'
                . $admin,
            );
        }          
      } else {
            $arreglo[] = array(
                'Nombre' => $Usuario->getNombre(),
                'Apellido' => $Usuario->getApellido(),
                'Login' => $Usuario->getLogin(),
                'Correo' => $Usuario->getCorreo(),
                '' => ''
                . '      <a style="vertical-align:middle;" title="Ver" href="/usuario/show/id/'.$Usuario->getId().'"><img src="/images/search_mini.png"></a>'
                . '    ',
            );         
      }
      
        return $this->renderText(json_encode($arreglo));
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Usuario = UsuarioPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Usuario);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new UsuarioForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new UsuarioForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Usuario = UsuarioQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Usuario, sprintf('Object Usuario does not exist (%s).', $request->getParameter('id')));
    $this->form = new UsuarioForm($Usuario);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Usuario = UsuarioQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Usuario, sprintf('Object Usuario does not exist (%s).', $request->getParameter('id')));
    $this->form = new UsuarioForm($Usuario);

       $params = $request->getParameter('usuario');
        $conuser = Propel::getConnection('propel');
        try {
            $conuser->beginTransaction();
            
            $Sfusuario = SfGuardUserQuery::create()->findOneByUsername($params['login']);
            if (count($Sfusuario) > 0) {
                $Sfusuario->setUsername($params['login']);
                $Sfusuario->setPassword($params['contrasena']);
                $Sfusuario->save($conuser);
            }
            $nuevousuario = UsuarioQuery::create()->findOneByLogin($params['login']);
            $nuevousuario->setNombre($params['nombre']);
            $nuevousuario->setApellido($params['apellido']);
            $nuevousuario->setCedula($params['cedula']);
            $nuevousuario->setContrasena(md5($params['contrasena']));
            $nuevousuario->setTelefono($params['telefono']);
            $nuevousuario->setCorreo($params['correo']);


            $nuevousuario->save($conuser);
           
            $conuser->commit();
        } catch (Exception $e) {
            $conuser->rollback();
            throw $e;
        }
        
        $this->redirect('/usuario/index');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Usuario = UsuarioQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Usuario, sprintf('Object Usuario does not exist (%s).', $request->getParameter('id')));
    $Usuario->delete();

    $this->redirect('usuario/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
        $params = $request->getParameter('usuario');
        $conuser = Propel::getConnection('propel');
        try {
            $conuser->beginTransaction();

            $nuevousuario = UsuarioQuery::create()->findOneByLogin($params['login']);
            $nuevousuario->setNombre($params['nombre']);
            $nuevousuario->setApellido($params['apellido']);
            $nuevousuario->setCedula($params['cedula']);
            $nuevousuario->setContrasena(md5($params['contrasena']));
            $nuevousuario->setTelefono($params['telefono']);
            $nuevousuario->setCorreo($params['correo']);


            $nuevousuario->save($conuser);
           
            $conuser->commit();
        } catch (Exception $e) {
            $conuser->rollback();
            throw $e;
        }
        
        $this->redirect('/usuario/index');
  }
  
 
    public function executeAjaxverificarrif(sfWebRequest $request) {
        $rif = $request->getParameter('rif');
        
        $arreglo = array();
       

        return $this->renderText(json_encode($arreglo));
    }
    
    public function executeAdmin(sfWebRequest $request) {
        $id = $request->getParameter('id');
        
        $Usuario = UsuarioQuery::create()->filterById($id)->findOne();
        $sf_guard_user = $Usuario->getSfGuardUser();
        $Usuario->setSfGuardUserGroup(1);
        $Usuario->save();
        
        $Grupo = sfGuardUserGroupQuery::create()->filterByUserId($sf_guard_user)->findOne();
        $Grupo->delete();
        $sfusuariogrupo = new SfGuardUserGroup();
        $sfusuariogrupo->setUserId($sf_guard_user);
        $sfusuariogrupo->setGroupId(1);
        $sfusuariogrupo->save();
        
        $this->redirect('/usuario/index');
    }    
   
    
    public function executeNoadmin(sfWebRequest $request) {
        $id = $request->getParameter('id');
        
        $Usuario = UsuarioQuery::create()->filterById($id)->findOne();
        $sf_guard_user = $Usuario->getSfGuardUser();
        $Usuario->setSfGuardUserGroup(2);
        $Usuario->save();
        
        $Grupo = sfGuardUserGroupQuery::create()->filterByUserId($sf_guard_user)->findOne();
        $Grupo->delete();
        $sfusuariogrupo = new SfGuardUserGroup();
        $sfusuariogrupo->setUserId($sf_guard_user);
        $sfusuariogrupo->setGroupId(2);
        $sfusuariogrupo->save();
        
        $this->redirect('/usuario/index');
    }     
}
