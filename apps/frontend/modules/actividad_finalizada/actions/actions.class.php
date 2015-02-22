<?php

/**
 * actividad_finalizada actions.
 *
 * @package    rnfl
 * @subpackage actividad_finalizada
 * @author     Your name here
 */
class actividad_finalizadaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->ActividadFinalizadas = ActividadFinalizadaQuery::create()->find();
  }

    public function executeIndexajax(sfWebRequest $request) {
       $id_feria = $request->getParameter('id_feria');
       $Actividades = ActividadQuery::create()->filterByIdFeria($id_feria)->filterByActividadCerrada(true)->orderByFechaSugerida('desc')->find();
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
            $agregar = '';
            $ActividadFinalizada = ActividadFinalizadaQuery::create()->filterByIdActividad($list->getId())->findOne();
            if (count($ActividadFinalizada) == 0) {
              $agregar = '<a style="vertical-align:middle;" title="Agregar Informacion" href="/actividad_finalizada/new/id_feria/'.$id_feria.'/id_actividad/' . $list->getId() .'"><img src="/images/add_mini.png"></a>';  
            }
            
            list($fecha,$hora) = explode(" ", $list->getHora());
            $arreglo[$i] = array(
                'Nombre' => $list->getTitulo(),
                'Fecha' => implode("-", array_reverse(explode("-", $list->getFechaSugerida()))),
                'Hora' => $hora,
                '' => ''
                . '      <a style="vertical-align:middle;" title="Ver" href="/actividad_finalizada/show/id_actividad_finalizada/'.$list->getIdFeria().'/id/' . $list->getId() . '"><img src="/images/search_mini.png"></a>'
                . $agregar
               . $cerrar,
            );
            $i++;
        }
                
        return $this->renderText(json_encode($arreglo));
    }  
  
  public function executeShow(sfWebRequest $request)
  {
    $this->Actividad = ActividadPeer::retrieveByPk($request->getParameter('id'));
    $this->ActividadFinalizada = ActividadFinalizadaQuery::create()->filterByIdActividad($request->getParameter('id'))->findOne();
    $this->forward404Unless($this->Actividad);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ActividadFinalizadaForm();
    
    $this->form->setDefault('id_feria', $request->getParameter('id_feria'));
            
    $this->form->setDefault('id_actividad', $request->getParameter('id_actividad'));
    
    $this->form->setDefault('fecha_ejecucion', date('d-m-Y'));
    
    $this->form->setDefault('hora_fin_ejecucion', date('H:i'));
  
    $this->form->setDefault('hora_ejecucion', date('H:i'));
    
    $this->form->setDefault('incluir_info_geografica', true);
    
    $miid = sfContext::getInstance()->getUser()->getGuardUser()->getId();
      
    $Usuario = UsuarioQuery::create()->filterBySfGuardUser($miid)->findOne();    
    
    $this->form->setDefault('id_usuario', $Usuario->getId());   
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ActividadFinalizadaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $ActividadFinalizada = ActividadFinalizadaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($ActividadFinalizada, sprintf('Object ActividadFinalizada does not exist (%s).', $request->getParameter('id')));
    $this->form = new ActividadFinalizadaForm($ActividadFinalizada);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $ActividadFinalizada = ActividadFinalizadaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($ActividadFinalizada, sprintf('Object ActividadFinalizada does not exist (%s).', $request->getParameter('id')));
    $this->form = new ActividadFinalizadaForm($ActividadFinalizada);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $id_feria = $request->getParameter('id_feria');
      
    $request->checkCSRFProtection();

    $ActividadFinalizada = ActividadFinalizadaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($ActividadFinalizada, sprintf('Object ActividadFinalizada does not exist (%s).', $request->getParameter('id')));
    $ActividadFinalizada->delete();

    $this->redirect('actividad_finalizada/index?id_feria=' . $id_feria);
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $incumplimiento = $request["actividad_finalizada"]["opciones"]; 
    $id_actividad = $request["actividad_finalizada"]["id_actividad"]; 
    $id_feria = $request["actividad_finalizada"]["id_feria"];
    $hora_ejecucion = $request["actividad_finalizada"]["hora_ejecucion"]["hour"];
    $minuto_ejecucion = $request["actividad_finalizada"]["hora_ejecucion"]["minute"];
    $hora_fin_ejecucion = $request["actividad_finalizada"]["hora_fin_ejecucion"]["hour"];
    $minuto_fin_ejecucion = $request["actividad_finalizada"]["hora_fin_ejecucion"]["minute"];    
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $ActividadFinalizada = $form->save();
      $ActividadFinalizada->setHoraEjecucion($hora_ejecucion.':'.$minuto_ejecucion);
      $ActividadFinalizada->setHoraFinEjecucion($hora_fin_ejecucion.':'.$minuto_fin_ejecucion);
      $ActividadFinalizada->save();        
      
      $incumplimiento_actividades = IncumplmientoActividadFinalizadaQuery::create()->
      filterByIdFeria($id_feria)->
      filterByIdActividad($id_actividad)->
      filterByIdActividadFinalizada($ActividadFinalizada->getId())->        
      find();
      
      if (count($incumplimiento_actividades) > 0) {
        foreach ($incumplimiento_actividades as $incumplimiento_actividad) {
            $incumplimiento_actividad->delete();
        }    
      }
      
      for($i = 0; $i < count($incumplimiento); $i++ ) {
          $incumplimiento_current = new IncumplmientoActividadFinalizada();
          $incumplimiento_current->setIdActividad($id_actividad);
          $incumplimiento_current->setIdFeria($id_actividad_finalizada);
          $incumplimiento_current->setIdActividadFinalizada($ActividadFinalizada->getId());
          $incumplimiento_current->setIdIncumplimientoActividad($incumplimiento[$i]);
          $incumplimiento_current->save();
      }      

      $this->redirect('actividad_finalizada/index?id_feria='.$id_feria);
    }
  }
  
    public function executeAjaxcargarmunicipios(sfWebRequest $request) {
        $id_estado = $request->getParameter('id_estado');
        $Municipios = MunicipioQuery::create()->filterByIdEstado($id_estado)->orderByNombre('asc')->find();

        $arreglo = array();

        $arreglo['municipio'] = '<select  id="actividad_finalizada_id_municipio" name="actividad_finalizada[id_municipio]" >';
        foreach ($Municipios as $Municipio) {
            $arreglo['municipio'].='<option value="' . $Municipio->getId() . '">' . $Municipio->getNombre() . '</option>';
        }
        $arreglo['municipio'].= '</select>';

        $Municipio = MunicipioQuery::create()->filterByIdEstado($id_estado)->orderByNombre('asc')->findOne();
        $id_municipio = $Municipio->getId();

        $Parroquias = ParroquiaQuery::create()->filterByIdMunicipio($id_municipio)->orderByNombre('asc')->find();
        $arreglo['parroquia'] = '<select id="actividad_finalizada_id_parroquia" name="actividad_finalizada[id_parroquia]" >';
        foreach ($Parroquias as $Parroquia) {
            $arreglo['parroquia'].='<option value="' . $Parroquia->getId() . '">' . $Parroquia->getNombre() . '</option>';
        }
        $arreglo['parroquia'].= '</select>';

        return $this->renderText(json_encode($arreglo));
    }

    public function executeAjaxcargarparroquias(sfWebRequest $request) {
        $id_municipio = $request->getParameter('id_municipio');
        $Parroquias = ParroquiaQuery::create()->filterByIdMunicipio($id_municipio)->orderByNombre('asc')->find();

        $html = '<select name="actividad_finalizada[id_parroquia]" id="actividad_finalizada_id_parroquia">';
        foreach ($Parroquias as $Parroquia) {
            $html.='<option value="' . $Parroquia->getId() . '">' . $Parroquia->getNombre() . '</option>';
        }
        $html.= '</select>';
        return $this->renderText($html);
    } 
}
