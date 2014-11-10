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
       $Actividades = ActividadQuery::create()->filterByIdFeria($id_feria)->orderByFecha('desc')->find();
       
        foreach ($Actividades as $list) {
            list($fecha,$hora) = explode(" ", $list->getHora());
            $arreglo[] = array(
                'Nombre' => $list->getNombre(),
                'Fecha' => implode("-", array_reverse(explode("-", $list->getFecha()))),
                'Hora' => $hora,
                '' => ''
                . '      <a style="vertical-align:middle;" title="Ver" href="/actividad/show/id_feria/'.$list->getIdFeria().'/id/' . $list->getId() . '"><img src="/images/search_mini.png"></a>'
                . '      <a style="vertical-align:middle;" title="Información de Ponentes" href="/actividad/ponente/id_feria/'.$id_feria.'/id/' . $list->getId() .'"><img src="/images/ponente_mini.png"></a>'
               . '    ',
            );
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

        $this->form->setDefault('fecha', date("Y-m-d"));

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
        $request->checkCSRFProtection();

        $Actividad = ActividadQuery::create()->findPk($request->getParameter('id'));
        $this->forward404Unless($Actividad, sprintf('Object Actividad does not exist (%s).', $request->getParameter('id')));
        $Actividad->delete();

        $this->redirect('actividad/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));

        $params = $request->getParameter($form->getName());
        $params['hora_minuto'] = $params['hora']['hour'] . ':' . $params['hora']['minute'];
        $params['hora'] = (string) $params['hora']['year'] . '-' . $params['hora']['month'] . '-' . $params['hora']['day'] . ' ' . $params['hora_minuto'];


        if ($form->isValid()) {
            $Actividad = $form->save();

            $Actividad->setHora($params['hora']);
            $Actividad->save();

            $this->redirect('actividad/edit?id=' . $Actividad->getId().'&id_feria='.$params['id_feria']);
        } 
    }

    public function executePonente(sfWebRequest $request) {
        
    }
    
    public function executeListadoponente(sfWebRequest $request) {
       $id_feria = $request->getParameter('id_feria');
       $id_actividad = $request->getParameter('id');
       
       $Actividad = ActividadQuery::create()->filterById($id_actividad)->findOne();
       $miid = sfContext::getInstance()->getUser()->getGuardUser()->getId();
      
       $Usuario = UsuarioQuery::create()->filterBySfGuardUser($miid)->findOne();
       $id_usuario = $Usuario->getId(); 
       $id_grupo = $Usuario->getSfGuardUserGroup();
                 
       $PonenteActividads = PonenteActividadQuery::create()
               ->filterByIdFeria($id_feria)
               ->filterByIdActividad($id_actividad)
               ->find();
              
        foreach ($PonenteActividads as $list) {
            $id_ponente = $list->getIdPonente();
            if ($id_usuario == $Actividad->getIdUsuario() || $id_grupo == 1) {
                 $eliminar = '<a style="vertical-align:middle;" class="eliminar" title="Eliminar" href="/actividad/deleteponente/id_actividad/'.$id_actividad.'/id_feria/'.$id_feria.'/id_ponente/'.$id_ponente.'" onclick="return confirm(¿Está seguro de eliminar este elemento?)" ><img  class="eliminar" src="/images/delete_mini.png"></a>';    
                //$eliminar = '<a style="vertical-align:middle;" id="'.$id_ponente.'" title="Eliminar" href="#"  ><img  class="eliminar" src="/images/delete_mini.png"></a>';    
            }  else {
                 $eliminar = '';
            }            
            $Ponente = PonenteQuery::create()->filterById($id_ponente)->findOne();
            $arreglo[] = array(
                'Nombre' => $Ponente->getNombre(),
                'Apellido' => $Ponente->getApellido(),
                'Cedula' => $Ponente->getCedula(),
                'Email' => $Ponente->getEmail(),                
                '' => ''
                . '      <a style="vertical-align:middle;" title="Ver" href="/ponente/show/id/'.$Ponente->getId().'"><img src="/images/search_mini.png"></a>'
                . $eliminar
            );
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
