<?php

/**
 * region actions.
 *
 * @package    rnfl
 * @subpackage registro
 * @author     Your name here
 */
class registroActions extends sfActions
{
    public function executeAjaxregistrar(sfWebRequest $request) {
        $email = $request->getParameter('email');
        $rif = $request->getParameter('rif');
        $institucion = $request->getParameter('institucion');

        $conuser = Propel::getConnection('propel');
        try {
            $conuser->beginTransaction();

            $Sfusuario = SfGuardUserQuery::create()->findOneByUsername($rif);
            if (count($Sfusuario) == 0) {
                $sfusuario = new SfGuardUser();
                $sfusuario->setUsername($rif);
                $sfusuario->setPassword('123456');
                $sfusuario->save($conuser);
            }
            $sfusuario = SfGuardUserQuery::create()->findOneByUsername($rif);

            $id_usuario_creado = $sfusuario->getId();
            

            $nuevousuario = new Usuario();

            $nuevousuario->setNombre($institucion);
            $nuevousuario->setApellido($institucion);
            $nuevousuario->setLogin($rif);
            $nuevousuario->setContrasena(md5('123456'));
            $nuevousuario->setSfGuardUser($id_usuario_creado);
            $nuevousuario->setSfGuardUserGroup(2);
            $nuevousuario->setCorreo($email);

            $nuevousuario->save($conuser);
            
            //GUARDO LA RELACION GRUPO-USUARIO
            $sfusuariogrupo = new SfGuardUserGroup();
            $sfusuariogrupo->setUserId($sfusuario->getId());
            $sfusuariogrupo->setGroupId(2);
            $sfusuariogrupo->save($conuser);

            $conuser->commit();
        } catch (Exception $e) {
            $conuser->rollback();
            throw $e;
        }        
        
        $arreglo = array();
       

        return $this->renderText(json_encode($arreglo));
    }    
}
