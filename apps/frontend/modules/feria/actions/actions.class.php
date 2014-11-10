<?php

/**
 * feria actions.
 *
 * @package    rnfl
 * @subpackage feria
 * @author     Your name here
 */
class feriaActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        
    }
    
    public function executeIndexajax() {
        $Ferias = FeriaQuery::create()->orderByFechaInicio('desc')->find();
        
        foreach ($Ferias as $list) {
            $Pais = PaisQuery::create()->filterById($list->getIdPais())->findOne();
            $Estado = EstadoQuery::create()->filterById($list->getIdEstado())->findOne();
            $Municipio = MunicipioQuery::create()->filterById($list->getIdMunicipio())->findOne();
            $Region = RegionQuery::create()->filterById($list->getIdRegion())->findOne();
            $arreglo[] = array(
                'Nombre' => $list->getNombre(),
                'Fecha de Inicio' => implode("-", array_reverse(explode("-", $list->getFechaInicio()))),
                'Fecha de Cierre' => implode("-", array_reverse(explode("-", $list->getFechaFin()))),
                'Pais' => $Pais->getNombre(),
                'Estado' => $Estado->getNombre(),
                'Municipio' => $Municipio->getNombre(),
                'Region' => $Region->getNombre(),
                '' => ''
                . '      <a style="vertical-align:middle;" title="Ver" href="/feria/show/id/'.$list->getId().'"><img src="/images/search_mini.png"></a>'
                . '      <a style="vertical-align:middle;" title="Ingresar" href="/feria/info/id_feria/'.$list->getId().'"><img src="/images/go_mini.png"></a>'
                . '    ',
            );
        }        

        return $this->renderText(json_encode($arreglo));
    }  
    
    public function executeInfo(sfWebRequest $request) {
        
        $this->Feria = FeriaPeer::retrieveByPk($request->getParameter('id_feria'));

    }    

    public function executeShow(sfWebRequest $request) {
        $this->Feria = FeriaPeer::retrieveByPk($request->getParameter('id'));
        $this->forward404Unless($this->Feria);
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new FeriaForm();

        $this->form->setDefault('id_pais', 1);

        $this->form->setDefault('id_estado', 1);

        $this->form->setDefault('id_municipio', 1);

        $this->form->setDefault('id_parroquia', 1);

        $this->form->setDefault('id_region', 1);

        $this->form->setDefault('fecha_inicio', date("Y-m-d"));

        $this->form->setDefault('fecha_fin', date("Y-m-d"));
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new FeriaForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $Feria = FeriaQuery::create()->findPk($request->getParameter('id'));
        $this->forward404Unless($Feria, sprintf('Object Feria does not exist (%s).', $request->getParameter('id')));
        $this->form = new FeriaForm($Feria);
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $Feria = FeriaQuery::create()->findPk($request->getParameter('id'));
        $this->forward404Unless($Feria, sprintf('Object Feria does not exist (%s).', $request->getParameter('id')));
        $this->form = new FeriaForm($Feria);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $Feria = FeriaQuery::create()->findPk($request->getParameter('id'));
        $this->forward404Unless($Feria, sprintf('Object Feria does not exist (%s).', $request->getParameter('id')));
        $Feria->delete();

        $this->redirect('feria/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $Feria = $form->save();

            $this->redirect('feria/edit?id=' . $Feria->getId());
        }
    }

    public function executeAjaxcargarmunicipios(sfWebRequest $request) {
        $id_estado = $request->getParameter('id_estado');
        $Municipios = MunicipioQuery::create()->filterByIdEstado($id_estado)->orderByNombre('asc')->find();

        $arreglo = array();

        $arreglo['municipio'] = '<select name="feria[id_municipio]" id="feria_id_municipio">';
        foreach ($Municipios as $Municipio) {
            $arreglo['municipio'].='<option value="' . $Municipio->getId() . '">' . $Municipio->getNombre() . '</option>';
        }
        $arreglo['municipio'].= '</select>';

        $Municipio = MunicipioQuery::create()->filterByIdEstado($id_estado)->orderByNombre('asc')->findOne();
        $id_municipio = $Municipio->getId();

        $Parroquias = ParroquiaQuery::create()->filterByIdMunicipio($id_municipio)->orderByNombre('asc')->find();
        $arreglo['parroquia'] = '<select name="feria[id_parroquia]" id="feria_id_parroquia">';
        foreach ($Parroquias as $Parroquia) {
            $arreglo['parroquia'].='<option value="' . $Parroquia->getId() . '">' . $Parroquia->getNombre() . '</option>';
        }
        $arreglo['parroquia'].= '</select>';

        return $this->renderText(json_encode($arreglo));
    }

    public function executeAjaxcargarparroquias(sfWebRequest $request) {
        $id_municipio = $request->getParameter('id_municipio');
        $Parroquias = ParroquiaQuery::create()->filterByIdMunicipio($id_municipio)->orderByNombre('asc')->find();

        $html = '<select name="feria[id_parroquia]" id="feria_id_parroquia">';
        foreach ($Parroquias as $Parroquia) {
            $html.='<option value="' . $Parroquia->getId() . '">' . $Parroquia->getNombre() . '</option>';
        }
        $html.= '</select>';
        return $this->renderText($html);
    }

    public function executePruebaajax() {
      //  $Ferias = FeriaQuery::create()->orderByFechaInicio('desc')->find();

        $Ferias = MunicipioQuery::create()->orderByNombre('asc')->find();
/*        foreach ($Ferias as $list) {
            $arreglo[] = array(
                'Nombre' => $list->getNombre(),
                'Descripcion' => $list->getIdEstado(),
            );
        }
*/
        
        foreach ($Ferias as $list) {
            $arreglo[] = array(
                'Nombre' => $list->getNombre(),
                'Descripcion' => '<a title="Ver" href="/municipio/show/id/'.$list->getId().'"><img src="/images/search_mini.png"></a>',
            );
        }        

        return $this->renderText(json_encode($arreglo));
    }

    public function executePrueba() {
        
    }
}
