<?php

/**
 * actividad actions.
 *
 * @package    rnfl
 * @subpackage actividad
 * @author     Your name here
 */
class actividadActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        
    }

    public function executeIndexajax(sfWebRequest $request) {
       $id_feria = $request->getParameter('id_feria');
       $Actividades = ActividadQuery::create()->filterByIdFeria($id_feria)->orderByFechaSugerida('desc')->find();
       $i = 0;
       $miid = sfContext::getInstance()->getUser()->getGuardUser()->getId();
      
       $Usuario = UsuarioQuery::create()->filterBySfGuardUser($miid)->findOne();
       $id_usuario = $Usuario->getId(); 
       $id_grupo = $Usuario->getSfGuardUserGroup();
       
       foreach ($Actividades as $list) {
            $cerrar = ''; 
            if ($id_grupo == 1) {
                 if ( !$list->getActividadCerrada()) {
                     $cerrar = '<a style="vertical-align:middle;" title="Cerrar Actividad" href="/actividad/cerrar/id_feria/'.$id_feria.'/id/' . $list->getId() .'"><img src="/images/check_mini.png"></a>';
                 }   
            }           
            list($fecha,$hora) = explode(" ", $list->getHora());
            $arreglo[$i] = array(
                'Nombre' => $list->getTitulo(),
                'Fecha' => implode("-", array_reverse(explode("-", $list->getFechaSugerida()))),
                'Hora' => $hora,
                '' => ''
                . '      <a style="vertical-align:middle;" title="Ver" href="/actividad/show/id_feria/'.$list->getIdFeria().'/id/' . $list->getId() . '"><img src="/images/search_mini.png"></a>'
                . '      <a style="vertical-align:middle;" title="Asocia Ponentes" href="/actividad/ponente/id_feria/'.$id_feria.'/id/' . $list->getId() .'"><img src="/images/ponente_mini.png"></a>'
               . $cerrar,
            );
            $i++;
        }
                
        return $this->renderText(json_encode($arreglo));
    }

    public function executeInsertarponente(sfWebRequest $request) {
        
        $id_feria = $request->getParameter('id_feria');
        $id_actividad = $request->getParameter('id');
        
        $datos = json_decode($_POST['myData'],true);
        $nombre = $datos['Nombre'];       
        $apellido = $datos['Apellido'];
        $cedula = $datos['Cedula'];
        $rif = $datos['Rif'];
        $email = $datos['Email']; 
        $telefono_local = $datos['TelefonoLocal'];
        $telefono_celular = $datos['TelefonoCelular'];
                
        $Ponente = PonenteQuery::create()->filterByEmail($email)
                ->filterByCedula($cedula)
                ->findOne();
        
        if (count($Ponente) == 0) {

           $Ponente = new Ponente();
           $Ponente->setNombre($nombre);
           $Ponente->setApellido($apellido);
           $Ponente->setCedula($cedula);
           $Ponente->setRif($rif);
           $Ponente->setEmail($email);
           $Ponente->setTelefonoLocal($telefono_local);
           $Ponente->setTelefonoCelular($telefono_celular);        
           $Ponente->setNacionalidad(1);
           $Ponente->setSexo('Masculino');
          $Ponente->save();                      
        }
        
        $id_ponente = $Ponente->getId();
        
        $PonenteActividad = PonenteActividadQuery::create()
                ->filterByIdFeria($id_feria)
                ->filterByIdActividad($id_actividad)
                ->filterByIdPonente($id_ponente)
                ->findOne();
        
        if (count($PonenteActividad) == 0) {
            $PonenteActividad = new PonenteActividad();
            $PonenteActividad->setIdPonente($id_ponente);
            $PonenteActividad->setIdFeria($id_feria);
            $PonenteActividad->setIdActividad($id_actividad);
            $PonenteActividad->save();
            $arreglo = 'Se ha asociado el ponente a la Actiivdad de forma exitosa';
        } else {
            $arreglo = 'El ponente ya se encuentra asociado a la Actividad';
        }
        
        return $this->renderText(json_encode($arreglo));
    }
    
    public function executeShow(sfWebRequest $request) {
        $this->Actividad = ActividadPeer::retrieveByPk($request->getParameter('id'));
        $this->forward404Unless($this->Actividad);
    }

    public function executeNew(sfWebRequest $request) {
        
        $this->form = new ActividadForm();

        $this->form->setDefault('id_tipo_actividad', 1);

        $this->form->setDefault('fecha_sugerida', date("Y-m-d"));

        $this->form->setDefault('hora', date("Y-m-d H:m"));

        $this->form->setDefault('alcanzo_tiempo', true);
        
        $this->form->setDefault('id_feria', $request->getParameter('id_feria'));
        
        $miid = sfContext::getInstance()->getUser()->getGuardUser()->getId();
      
        $Usuario = UsuarioQuery::create()->filterBySfGuardUser($miid)->findOne();
        
        $this->form->setDefault('id_usuario', $Usuario->getId());
    }

    public function executeCreate(sfWebRequest $request) {
      
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new ActividadForm();
        
        $this->processForm($request, $this->form);
        
        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $Actividad = ActividadQuery::create()->findPk($request->getParameter('id'));
        $this->forward404Unless($Actividad, sprintf('Object Actividad does not exist (%s).', $request->getParameter('id')));
        $this->form = new ActividadForm($Actividad);
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $Actividad = ActividadQuery::create()->findPk($request->getParameter('id'));
        $this->forward404Unless($Actividad, sprintf('Object Actividad does not exist (%s).', $request->getParameter('id')));
        $this->form = new ActividadForm($Actividad);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $id_feria = $request->getParameter('id_feria');
        $request->checkCSRFProtection();       
        $Actividad = ActividadQuery::create()->findPk($request->getParameter('id'));
        $this->forward404Unless($Actividad, sprintf('Object Actividad does not exist (%s).', $request->getParameter('id')));
        $Actividad->delete();

        $this->redirect('actividad/index?id_feria=' . $id_feria);
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));

        $params = $request->getParameter($form->getName());
        $params['hora_minuto'] = $params['hora']['hour'] . ':' . $params['hora']['minute'].':00';
        $params['hora']= (string) date("Y-m-d").' '.$params['hora_minuto'];

        if ($form->isValid()) {
            $Actividad = $form->save();

            $Actividad->setHora($params['hora']);
            $Actividad->save();

            $this->redirect('actividad/index?id_feria='.$params['id_feria']);
        } 
    }

    public function executePonente(sfWebRequest $request) {
       $id_feria = $request->getParameter('id_feria');
       $id_actividad = $request->getParameter('id');
       
       $Actividad = ActividadQuery::create()->filterById($id_actividad)->findOne();
       $this->PonenteActividads = PonenteActividadQuery::create()
               ->filterByIdFeria($id_feria)
               ->filterByIdActividad($id_actividad)
               ->find();      
    }

    public function executeAdd(sfWebRequest $request) {
       $id_feria = $request->getParameter('id_feria');
       $id_actividad = $request->getParameter('id_actividad');
       $id_ponente = $request->getParameter('id');
       
       $PonenteActividad = PonenteActividadQuery::create()
               ->filterByIdActividad($id_actividad)
               ->filterByIdFeria($id_feria)
               ->filterByIdPonente($id_ponente)
               ->findOne();
       
       if (count($PonenteActividad) == 0) {
           $PonenteActividad = new PonenteActividad();
           $PonenteActividad->setIdActividad($id_actividad);
           $PonenteActividad->setIdFeria($id_feria);
           $PonenteActividad->setIdPonente($id_ponente);
           $PonenteActividad->save();
           
       } 

       $this->redirect('actividad/ponente?id_feria=' . $id_feria.'&id='.$id_actividad);
    }    

    public function executeCerrar(sfWebRequest $request) {
       $id_feria = $request->getParameter('id_feria');
       $id_actividad = $request->getParameter('id');
       
       $Actividad = ActividadQuery::create()
               ->filterById($id_actividad)
               ->filterByIdFeria($id_feria)
               ->findOne();
       
       if (count($Actividad) > 0) {
           $Actividad->setActividadCerrada(true);
           $Actividad->save();
           
       } 

       $this->redirect('actividad/index?id_feria=' . $id_feria);
    }
    
    public function executeListadoponente(sfWebRequest $request) {
       $id_feria = $request->getParameter('id_feria');
       $id_actividad = $request->getParameter('id');
       
       $Actividad = ActividadQuery::create()->filterById($id_actividad)->findOne();
       $miid = sfContext::getInstance()->getUser()->getGuardUser()->getId();
      
       $Usuario = UsuarioQuery::create()->filterBySfGuardUser($miid)->findOne();
       $id_usuario = $Usuario->getId(); 
       $id_grupo = $Usuario->getSfGuardUserGroup();
       $i = 0;          

        $Ponentes = PonenteQuery::create()->orderByNombre('asc')->find();
         
        foreach ($Ponentes as $Ponente) {  

            $arreglo[$i] = array(
                'Nombre' => $Ponente->getNombre(),
                'Apellido' => $Ponente->getApellido(),
                'Cedula' => $Ponente->getCedula(),
                'Rif' => $Ponente->getRif(),
                'Email' => $Ponente->getEmail(), 
                'TelefonoLocal' => $Ponente->getTelefonoLocal(),
                'TelefonoCelular' => $Ponente->getTelefonoCelular(),
                '' => ''
                . '      <a style="vertical-align:middle;" title="Ver" href="/ponente/show/id/'.$Ponente->getId().'"><img src="/images/search_mini.png"></a>'
                . '      <a style="vertical-align:middle;" title="Asociar" href="/actividad/add/id_feria/'.$id_feria.'/id_actividad/'.$id_actividad.'/id/'.$Ponente->getId().'"><img src="/images/ponente_mini.png"></a>'
            );
            $i++;
        }
        
        return $this->renderText(json_encode($arreglo));        
    } 
    
    public function executeDeleteponente(sfWebRequest $request) {
       $id_feria = $request->getParameter('id_feria');
       $id_actividad = $request->getParameter('id_actividad');
       $id_ponente = $request->getParameter('id_ponente');
       
       $PonenteActividad = PonenteActividadQuery::create()
               ->filterByIdFeria($id_feria)
               ->filterByIdActividad($id_actividad)
               ->filterByIdPonente($id_ponente)
               ->findOne();
       
       if (count($PonenteActividad) > 0) {
           $PonenteActividad->delete();
       }
       
       $this->redirect('actividad/ponente?id_feria=' . $id_feria.'&id='.$id_actividad);
       
    }    
}
