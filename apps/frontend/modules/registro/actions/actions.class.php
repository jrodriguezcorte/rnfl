<?php

/**
 * region actions.
 *
 * @package    rnfl
 * @subpackage registro
 * @author     Your name here
 */
class registroActions extends sfActions {

    public function executeAjaxregistrar(sfWebRequest $request) {

        $rif = $request->getParameter('rif');
        $institucion = $request->getParameter('institucion');
        $organizador = $request->getParameter('organizador');
        $ente = $request->getParameter('ente');
        $sector = $request->getParameter('sector');
        $unidad_responsable = $request->getParameter('unidad_responsable');
        $telefono = $request->getParameter('telefono');
        $email = $request->getParameter('email');
        $conuser = Propel::getConnection('propel');
        if ($organizador == 1) {
            $grupo = 2;
        } else {
            $grupo = 3;
        }
        $arreglo = array();
        try {
            $conuser->beginTransaction();

                $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
                $clave_acceso = "";
                for($i=0;$i<8;$i++) {
                $clave_acceso .= substr($str,rand(0,62),1);
                }            
            
            $Sfusuario = SfGuardUserQuery::create()->findOneByUsername($rif);
            if (count($Sfusuario) == 0) {
                $sfusuario = new SfGuardUser();
                $sfusuario->setUsername($rif);
                $sfusuario->setPassword($clave_acceso);
                $sfusuario->save($conuser);
            }
            
            
            $sfusuario = SfGuardUserQuery::create()->findOneByUsername($rif);

            $id_usuario_creado = $sfusuario->getId();


            $nuevousuario = new Usuario();

            $nuevousuario->setNombre($institucion);
            $nuevousuario->setApellido($institucion);
            $nuevousuario->setLogin($rif);
            $nuevousuario->setContrasena(md5($clave_acceso));
            $nuevousuario->setSfGuardUser($id_usuario_creado);
            $nuevousuario->setSfGuardUserGroup($grupo);
            $nuevousuario->setTipoOrganizador($organizador);
            $nuevousuario->setEnteOrganizador($ente);
            $nuevousuario->setSector($sector);
            $nuevousuario->setUnidadResponsable($unidad_responsable);
            $nuevousuario->setTelefono($telefono);
            $nuevousuario->setCorreo($email);
            $nuevousuario->save($conuser);
            
            
            //GUARDO LA RELACION GRUPO-USUARIO
            $sfguardgrupo = SfGuardUserGroupQuery::create()->findOneByUserId($sfusuario->getId());
                    
            if (count($sfguardgrupo) == 0) { 
                $sfusuariogrupo = new SfGuardUserGroup();
                $sfusuariogrupo->setUserId($sfusuario->getId());
                $sfusuariogrupo->setGroupId($grupo);
                $sfusuariogrupo->save($conuser);
                $conuser->commit();
            }
            /* Envio de Correo */
               
 
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: <no-responder@cenal.gob.ve>' . "\r\n";
            $subject = "Bienvenido al Registro Nacional de Ferias del Libro";
            $body = "<HTML>
                     <HEAD>
                     <BODY>
                     Bienvenido,<br>
                     Estimado usuario, este correo se le ha enviado porque se ha creado una nueva cuenta para usted en el Registro Nacional de Ferias del Libro, por favor tome nota:
                     <br><br>
                     
                     <b>Usuario y Clave</b><br>
                     Usuario: ".$rif."<br>
                     Correo Electrónico: ".$email."<br><br>

                     Su contraseña es: ".$clave_acceso."<br><br> 

                     Para ingresar a su cuenta:<br>
                     Por favor siga este enlace :<br>

                     <h2>http://rnfl.cenal.gob.ve</h2><br><br>
    
                     O dirijase a nuestra pagina web www.cenal.gob.ve  y seleccione la opcion <b>Registro Nacional de Ferias del Libro</b>, ubicada en el panel de <b>Servicios en Línea</b>.<br>
                     <br>
                     Por favor tome las precauciones necesarias para guardar esta información.
                    </BODY> 
                    </HEAD>
                     </HTML>
                    ";
            /*    
             $message = $this->getMailer()
               ->compose('no-responder@cenal.gob.ve', $email, $subject, $body, $headers);

             $this->getMailer()->send($message); 
             */
             mail($email, $subject, $body, $headers);
             
            
        //       $arreglo = 'Se ha enviado a su correo su clave de acceso '.$clave_acceso; 
            $arreglo = 'Se ha enviado a su correo su clave de acceso '; 
            
        } catch (Exception $e) {
            $conuser->rollback();
            throw $e;
        }
       
        
        return $this->renderText(json_encode($arreglo));
    }

    public function executeAjaxvalidarrif(sfWebRequest $request) {

        $rif = $request->getParameter('rif');
        $retorno = preg_match("/^([VEJPG]{1})([0-9]{9}$)/", $rif);
        
        if ($retorno) {
            $digitos = str_split($rif);
            $digitos[8] *= 2;
            $digitos[7] *= 3;
            $digitos[6] *= 4;
            $digitos[5] *= 5;
            $digitos[4] *= 6;
            $digitos[3] *= 7;
            $digitos[2] *= 2;
            $digitos[1] *= 3;

            // Determinar dígito especial según la inicial del RIF
            // Regla introducida por el SENIAT
            switch ($digitos[0]) {
                case 'V':
                    $digitoEspecial = 1;
                    break;
                case 'E':
                    $digitoEspecial = 2;
                    break;
                case 'J':
                    $digitoEspecial = 3;
                    break;
                case 'P':
                    $digitoEspecial = 4;
                    break;
                case 'G':
                    $digitoEspecial = 5;
                    break;
            }

            $suma = (array_sum($digitos) - $digitos[9]) + ($digitoEspecial * 4);
            $residuo = $suma % 11;
            $resta = 11 - $residuo;

            $digitoVerificador = ($resta >= 10) ? 0 : $resta;
            if ($digitoVerificador != $digitos[9]) {
                $retorno = false;
                $respuesta = 2;
            }

            if ($retorno) {
                $url = 'http://contribuyente.seniat.gob.ve/getContribuyente/getrif?rif=';
                $url .= $rif;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                //die(var_dump($ch));
                $result = curl_exec($ch);
                if ($result) {
                    try {
                        if (substr($result, 0, 1) != '<') {
                            throw new Exception($result);
                        }
                        $xml = simplexml_load_string($result);
                        if (!is_bool($xml)) {
                            $elements = $xml->children('rif');
                            $seniat = array();
                            $this->_responseJson['code_result'] = 1;
                            foreach ($elements as $key => $node) {
                                $index = strtolower($node->getName());
                                $seniat[$index] = (string) $node;
                            }
                            $this->_responseJson['seniat'] = $seniat;
                            $respuesta = 3;
                        }
                    } catch (Exception $e) {
                        $exception = explode(' ', $result, 2);
                        $this->_responseJson['code_result'] = (int) $exception[0];
                        $retorno =  2;
                        $respuesta = 2;
                    }
                } else {
                    // No hay conexión a internet
                    $this->_responseJson['code_result'] = 0;
                    
                    $retorno =  1;
                    $respuesta = 1;
                }
                

            }
           
        } else {      
            $retorno = 0;           
            $respuesta = 0;
        }
        
        return $this->renderText(json_encode($respuesta));
    }

}
