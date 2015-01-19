
<head>
<link rel="stylesheet" href="/js/jqwidgets/jqwidgets/styles/jqx.base.css" type="text/css" />
<link rel="stylesheet" href="/js/jqwidgets/jqwidgets/styles/jqx.ui-redmond.css" type="text/css" />
    <script type="text/javascript" src = "/js/jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src = "/js/jqwidgets/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src = "/js/jqwidgets/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src = "/js/jqwidgets/jqwidgets/jqxdatatable.js"></script> 
    <script type="text/javascript" src = "/js/jqwidgets/jqwidgets/jqxlistbox.js"></script> 
    <script type="text/javascript" src = "/js/jqwidgets/jqwidgets/jqxdropdownlist.js"></script> 
    <script type="text/javascript" src = "/js/jqwidgets/jqwidgets/jqxdata.js"></script> 
    <script type="text/javascript" src = "/js/jqwidgets/jqwidgets/jqxtooltip.js"></script> 
    <script type="text/javascript" src = "/js/jqwidgets/jqwidgets/jqxinput.js"></script> 
    <script type="text/javascript">
        $(document).ready(function () {           
            var source =
                    {
                        datatype: "json",
                        id: 'ID',
                        datafields: [
                            {name: ''},                                
                            {name: 'Nombre'},
                            {name: 'Apellido'},
                            {name: 'Cedula'},
                            {name: 'Rif'},
                            {name: 'Email'},
                            {name: 'TelefonoLocal'},
                            {name: 'TelefonoCelular'},
                        ],
                        url: "<?php echo url_for('actividad/listadoponente?id_feria='.$sf_params->get('id_feria').'&id='.$sf_params->get('id')) ?>",
                addRow: function (rowID, rowData, position, commit) {
                    // synchronize with the server - send insert command
                    // call commit with parameter true if the synchronization with the server is successful 
                    // and with parameter false if the synchronization failed.
                    // you can pass additional argument to the commit callback which represents the new ID if it is generated from a DB.
                    commit(true);
                },
                updateRow: function (rowID, rowData, commit) {
                    // synchronize with the server - send update command
                    // call commit with parameter true if the synchronization with the server is successful 
                    // and with parameter false if the synchronization failed.
                    commit(true);
                },
                deleteRow: function (rowID, commit) {
                    // synchronize with the server - send delete command
                    // call commit with parameter true if the synchronization with the server is successful 
                    // and with parameter false if the synchronization failed.
                    commit(true);
                }                    
                   };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#table").jqxDataTable(
            {
                width: 850,
                height: 500,
                source: dataAdapter,                
                pageable: true,
                editable: true,
                showToolbar: true,
                altrows: true,
                filterable: true,
                filterMode: 'advanced',
                ready: function()
                {
                    // called when the DataTable is loaded.         
                },
                pagerButtonsCount: 8,
                toolbarHeight: 35,
                renderToolbar: function(toolBar)
                {
                    theme = "";
                    var toTheme = function (className) {
                        if (theme == "") return className;
                        return className + " " + className + "-" + theme;
                    }
                    // appends buttons to the status bar.
                    var container = $("<div style='overflow: hidden; position: relative; height: 100%; width: 100%;'></div>");
                    var buttonTemplate = "<div style='float: left; padding: 3px; margin: 2px;'><div style='margin: 4px; width: 16px; height: 16px;'></div></div>";
                    var addButton = $(buttonTemplate);
                    var editButton = $(buttonTemplate);
                    var deleteButton = $(buttonTemplate);
                    var cancelButton = $(buttonTemplate);
                    var updateButton = $(buttonTemplate);
                    container.append(addButton);
                    container.append(editButton);
                    container.append(deleteButton);
                    container.append(cancelButton);
                    container.append(updateButton);
                    toolBar.append(container);
                    addButton.jqxButton({cursor: "pointer", enableDefault: false,  height: 25, width: 25 });
                    addButton.find('div:first').addClass(toTheme('jqx-icon-plus'));
                    addButton.jqxTooltip({ position: 'bottom', content: "Agregar"});
                    editButton.jqxButton({ cursor: "pointer", disabled: true, enableDefault: false,  height: 25, width: 25 });
                    deleteButton.find('div:first').addClass(toTheme('jqx-icon-delete'));
                    deleteButton.jqxTooltip({ position: 'bottom', content: "Eliminar"});
                    updateButton.jqxButton({ cursor: "pointer", disabled: true, enableDefault: false,  height: 25, width: 25 });
                    updateButton.find('div:first').addClass(toTheme('jqx-icon-save'));
                    updateButton.jqxTooltip({ position: 'bottom', content: "Guardar Cambios"});
                    cancelButton.jqxButton({ cursor: "pointer", disabled: true, enableDefault: false,  height: 25, width: 25 });
                    cancelButton.find('div:first').addClass(toTheme('jqx-icon-cancel'));
                    cancelButton.jqxTooltip({ position: 'bottom', content: "Cancelar"});
                    var updateButtons = function (action) {
                        switch (action) {
                            case "Select":
                                addButton.jqxButton({ disabled: false });
                                deleteButton.jqxButton({ disabled: false });
                                editButton.jqxButton({ disabled: false });
                                cancelButton.jqxButton({ disabled: true });
                                updateButton.jqxButton({ disabled: true });
                                break;
                            case "Unselect":
                                addButton.jqxButton({ disabled: false });
                                deleteButton.jqxButton({ disabled: true });
                                editButton.jqxButton({ disabled: true });
                                cancelButton.jqxButton({ disabled: true });
                                updateButton.jqxButton({ disabled: true });
                                break;
                            case "Edit":
                                addButton.jqxButton({ disabled: true });
                                deleteButton.jqxButton({ disabled: true });
                                editButton.jqxButton({ disabled: true });
                                cancelButton.jqxButton({ disabled: false });
                                updateButton.jqxButton({ disabled: false });
                                break;
                            case "End Edit":
                                addButton.jqxButton({ disabled: false });
                                deleteButton.jqxButton({ disabled: false });
                                editButton.jqxButton({ disabled: false });
                                cancelButton.jqxButton({ disabled: true });
                                updateButton.jqxButton({ disabled: true });
                                break;
                        }
                    }
                    var rowIndex = null;
                    $("#table").on('rowSelect', function (event) {
                        var args = event.args;
                        rowIndex = args.index;
                        updateButtons('Select');
                    });
                    $("#table").on('rowUnselect', function (event) {
                        updateButtons('Unselect');
                    });
                    $("#table").on('rowEndEdit', function (event) {
                        updateButtons('End Edit');
                    });
                    $("#table").on('rowBeginEdit', function (event) {
                        updateButtons('Edit');
                    });
                    addButton.click(function (event) {
                        if (!addButton.jqxButton('disabled')) {
                            // add new empty row.
                            $("#table").jqxDataTable('addRow', null, {}, 'first');
                            // select the first row and clear the selection.
                            $("#table").jqxDataTable('clearSelection');
                            $("#table").jqxDataTable('selectRow', 0);
                            // edit the new row.
                            $("#table").jqxDataTable('beginRowEdit', 0);
                            updateButtons('add');
                        }
                    });
                    cancelButton.click(function (event) {
                        if (!cancelButton.jqxButton('disabled')) {
                            // cancel changes.
                            $("#table").jqxDataTable('endRowEdit', rowIndex, true);
                        }
                    });
                    updateButton.click(function (event) {
                        if (!updateButton.jqxButton('disabled')) {
                            // save changes.
                            $("#table").jqxDataTable('endRowEdit', rowIndex, false);

                            var rows = $("#table").jqxDataTable('getRows');
                            dataString = JSON.stringify(rows[0]);
                            $.ajax({
                                type: "POST",
                                url: "<?php echo url_for('actividad/insertarponente?id_feria='.$sf_params->get('id_feria').'&id='.$sf_params->get('id')) ?>",
                                data: {myData: dataString},
                                success: function(data) {
                                    //Escribimos las sugerencias que nos manda la consulta
                                    alert(data);
                                    location.reload();
                                }
                            });                                                       
                        }    
                    });
                    editButton.click(function () {
                        if (!editButton.jqxButton('disabled')) {
                            $("#table").jqxDataTable('beginRowEdit', rowIndex);
                            updateButtons('edit');
                        }
                    });
                    deleteButton.click(function () {
                        if (!deleteButton.jqxButton('disabled')) {
                            $("#table").jqxDataTable('deleteRow', rowIndex);
                            updateButtons('delete');
                        }
                    });
                },
                columns: [
                  
                  { text: '', editable: false, dataField: '', width: 100 },
                  { text: 'Nombre', editable: true, dataField: 'Nombre', width: 200, 
                      validation: function (cell, value) {
                          if (value == '' ) return { message: "Debe ingresar un nombre", result: false };
                          return true;
                      }               
                  },
                  { text: 'Apellido', editable: true, dataField: 'Apellido', width: 200, 
                      validation: function (cell, value) {
                          if (value == '' ) return { message: "Debe ingresar un apellido", result: false };
                          return true;
                      }                
                  },
                  { text: 'Cedula', editable: true, dataField: 'Cedula', width: 200, 
                      validation: function (cell, value) {
                          var zippattern = /^[VE]\d{7,8}?$/;
                          if (zippattern.test(value)!=true) return { message: "Debe ingresar la cédula bajo el siguiente formato V00000000", result: false };
                          return true;
                      }                   
                  },
                  { text: 'Rif', editable: true, dataField: 'Rif', width: 200, 
                      validation: function (cell, value) {
                          var zippattern = /^[VE]\d{8,9}?$/;
                          if (zippattern.test(value)!=true) return { message: "Debe ingresar el Rif bajo el siguiente formato V000000000", result: false };
                          return true;
                      }                    
                  },
                  { text: 'Email', editable: true, dataField: 'Email', width: 200,
                      validation: function (cell, value) {
                          var zippattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                          if (zippattern.test(value)!=true) return { message: "Debe ingresar un correo válido", result: false };
                          return true;
                      }                      
                  
                  },
                  { text: 'Teléfono Local', editable: true, dataField: 'TelefonoLocal', width: 200, 
                      validation: function (cell, value) {
                          var zippattern = /([0-9]{4})([-])([0-9]{7})$/;
                          if (zippattern.test(value)!=true) return { message: "Debe ingresar el teléfono bajo el siguiente formato 0000-0000000", result: false };
                          return true;
                      }                  
                  },
                  { text: 'Teléfono Celular', editable: true, dataField: 'TelefonoCelular', width: 200, 
                      validation: function (cell, value) {
                          var zippattern = /([0-9]{4})([-])([0-9]{7})$/;
                          if (zippattern.test(value)!=true) return { message: "Debe ingresar el teléfono bajo el siguiente formato 0000-0000000", result: false };
                          return true;
                      }                  
                  },
                  { text: 'Id', editable: false, dataField: 'ID', width: 200 },
                  
             ]
            });
        });
    </script>
</head>
<?php $id_feria = $sf_params->get('id_feria'); ?>
<?php $id_actividad = $sf_params->get('id'); ?>
<?php include_partial('usuario/menuferia') ?>
<div class="jumbotron">
<?php
   if (count($PonenteActividads) > 0) {
?>
<h2>Listado de Ponentes Asociados a la Actividad</h2>
<br>    
<table width="100%" border="1">
    <tr>
        <td><b>Nombre</b></td>
        <td><b>Apellido</b></td>
        <td><b>Cédula</b></td>
        <td><b>Rif</b></td>
        <td><b>Email</b></td>
        <td><b>Teléfono Local</b></td>
        <td><b>Teléfono Celular</b></td>    
        <td></td>
    </tr>
<?php
    foreach ($PonenteActividads as $PonenteActividad) {
        
        $id_ponente = $PonenteActividad->getIdPonente();
        $Ponente = PonenteQuery::create()->filterById($id_ponente)->findOne();
?>
    <tr>
        <td><?php echo $Ponente->getNombre() ?></td>
        <td><?php echo $Ponente->getApellido() ?></td>
        <td><?php echo $Ponente->getCedula() ?></td>
        <td><?php echo $Ponente->getRif() ?></td>
        <td><?php echo $Ponente->getEmail() ?></td>
        <td><?php echo $Ponente->getTelefonoLocal() ?></td>
        <td><?php echo $Ponente->getTelefonoCelular() ?></td>
        <td><?php echo link_to(image_tag('delete_mini.png'), 'actividad/deleteponente?id_actividad='.$id_actividad.'&id_feria='.$id_feria.'&id_ponente='.$id_ponente, array('method' => 'delete', 'confirm' => '¿Desea desvincular a este Ponente?','title' => 'Desvincular Ponente')) ?></td>
    </tr>
<?php 
    }  
?>        
</table>
<br>
<br>
<?php
   }
?>
<h2>Asociar Ponente a la Actividad</h2>
<div class="table-responsive">
<body class='default'>
    <div id="table"></div>
</body>
</div>
</html>
</div>