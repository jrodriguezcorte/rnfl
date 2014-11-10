<link rel="stylesheet" href="/js/jqwidgets/jqwidgets/styles/jqx.base.css" type="text/css" />
<link rel="stylesheet" href="/js/jqwidgets/jqwidgets/styles/jqx.ui-redmond.css" type="text/css" />
<script type="text/javascript" src="/js/jqwidgets/jqwidgets/jqxcore.js"></script>  
<script type="text/javascript" src="/js/jqwidgets/jqwidgets/jqxdata.js"></script> 
<script type="text/javascript" src="/js/jqwidgets/jqwidgets/jqxbuttons.js"></script>
<script type="text/javascript" src="/js/jqwidgets/jqwidgets/jqxscrollbar.js"></script>
<script type="text/javascript" src="/js/jqwidgets/jqwidgets/jqxlistbox.js"></script>
<script type="text/javascript" src="/js/jqwidgets/jqwidgets/jqxdropdownlist.js"></script>
<script type="text/javascript" src="/js/jqwidgets/jqwidgets/jqxmenu.js"></script>
<script type="text/javascript" src="/js/jqwidgets/jqwidgets/jqxgrid.js"></script>
<script type="text/javascript" src="/js/jqwidgets/jqwidgets/jqxgrid.pager.js"></script>
<script type="text/javascript" src="/js/jqwidgets/jqwidgets/jqxgrid.sort.js"></script>
<script type="text/javascript" src="/js/jqwidgets/jqwidgets/jqxgrid.filter.js"></script>
<script type="text/javascript" src="/js/jqwidgets/jqwidgets/jqxgrid.columnsresize.js"></script>
<script type="text/javascript" src="/js/jqwidgets/jqwidgets/jqxgrid.selection.js"></script> 
<script type="text/javascript" src="/js/jqwidgets/jqwidgets/jqxpanel.js"></script>
<script type = "text/javascript" src = "/js/jqwidgets/jqwidgets/globalization/globalize.js" ></script>    
<script type = "text/javascript" src = "/js/jqwidgets/jqwidgets/globalization/globalize.culture.es-VE.js" ></script> 
<script type="text/javascript" src = "/js/jqwidgets/jqwidgets/jqxtabs.js"></script>
<script type="text/javascript" src = "/js/jqwidgets/jqwidgets/jqxcheckbox.js"></script>

<script type="text/javascript">
    
        $(document).ready(function() {
        $('#jqxTabs').jqxTabs({ width: '100%', height: 200, position: 'top'});    
            // prepare the data
        var source =
                    {
                        datatype: "json",
                        datafields: [
                            {name: 'Nombre'},
                            {name: 'Apellido'},
                            {name: 'Cedula'},
                            {name: 'Email'},
                            {name: ''},
                        ],
                        url: "<?php echo url_for('actividad/listadoponente?id_feria='.$sf_params->get('id_feria').'&id='.$sf_params->get('id')) ?>",
                        pager: function(pagenum, pagesize, oldpagenum) {
                            // callback called when a page or page size is changed.
                        }
                    };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#jqxgrid").jqxGrid(
                    {
                        width: 1050,
                        rowsheight: 50,
                        source: dataAdapter,
                        selectionmode: 'multiplerowsextended',
                        sortable: true,
                        pageable: true,
                        filterable: true,
                        altrows: true,
                        autoheight: true,
                        columnsresize: true,
                        autoshowfiltericon: true,
                        theme: 'ui-redmond',
                        columns: [
                            {text: 'Nombre', datafield: 'Nombre', width: 200  },
                            {text: 'Apellido', datafield: 'Apellido', width: 200  },
                            {text: 'Cédula', datafield: 'Cedula', width: 200  },
                            {text: 'Correo Electrónico', datafield: 'Emailt', width: 200  },
                            {text: '', datafield: '', width: 100 ,cellsalign: 'center'},                            
                        ]
                    });
            $("#jqxgrid").on("sort", function(event) {
                var sortinformation = event.args.sortinformation;
                var sortdirection = sortinformation.sortdirection.ascending ? "ascending" : "descending";
                if (!sortinformation.sortdirection.ascending && !sortinformation.sortdirection.descending) {
                    sortdirection = "null";
                }
                var eventData = "Triggered 'sort' event <div>Column:" + sortinformation.sortcolumn + ", Direction: " + sortdirection + "</div>";
                $('#events').jqxPanel('prepend', '<div style="margin-top: 5px;">' + eventData + '</div>');
            });
            // clear the sorting.
            $('#clearsortingbutton').click(function() {
                $("#jqxgrid").jqxGrid('removesort');
            });
            // show/hide sort background
            $('#sortbackground').on('change', function(event) {
                $("#jqxgrid").jqxGrid({showsortcolumnbackground: event.args.checked});
            });
            $("#jqxgrid").on("pagechanged", function(event) {
                var args = event.args;
                var eventData = "pagechanged <div>Page:" + args.pagenum + ", Page Size: " + args.pagesize + "</div>";
                // get page information.
                var paginginformation = $("#jqxgrid").jqxGrid('getpaginginformation');
                $('#paginginfo').html("<div style='margin-top: 5px;'>Page:" + paginginformation.pagenum + ", Page Size: " + paginginformation.pagesize + ", Pages Count: " + paginginformation.pagescount + "</div>");
            });
            $("#jqxgrid").on("pagesizechanged", function(event) {
                var args = event.args;
                var eventData = "pagesizechanged <div>Page:" + args.pagenum + ", Page Size: " + args.pagesize + ", Old Page Size: " + args.oldpagesize + "</div>";
                // get page information.          
                var paginginformation = $("#jqxgrid").jqxGrid('getpaginginformation');
                $('#paginginfo').html("<div style='margin-top: 5px;'>Page:" + paginginformation.pagenum + ", Page Size: " + paginginformation.pagesize + ", Pages Count: " + paginginformation.pagescount + "</div>");
            });            
        });

</script>   

</head>

<?php include_partial('usuario/menuferia') ?>

<div class="jumbotron">
<?php $id = $sf_params->get('id'); 
       $Actividad = ActividadQuery::create()->filterById($id)->findOne();
?>
    <h3>Ponentes asociados a la actividad <b><?php echo $Actividad->getNombre() ?></b></h3>
<br>
<div class="table-responsive">
<body class='default'>
    <div id='jqxWidget' style="font-size: 13px; font-family: Verdana; float: left;">
        <div id='jqxTabs'>
            <ul>
                <li style="margin-left: 30px;">Listado</li>
                <li>Agregar</li>
            </ul>
            <div id='jqxgrid'>

            </div>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td><b>Cédula</b></td>
                        <td><input type="text" id="cedula"/></td>
                    </tr>
                    <tr>
                        <td><b>Nombre</b></td>
                        <td><input type="text" id="nombre"/></td>
                    </tr>
                    <tr>
                        <td><b>Apellido</b></td>
                        <td><input type="text" id="apellido"/></td>
                    </tr>                    
                </table>
                <input type="button" id="buscar" value="buscar">      

            </div>       
        </div>   
</body>
</div>
</html>
<table width="100%">
    <tr>
        <td>&nbsp;</td>
    </tr>    
    <tr>
        <td><?php echo link_to(image_tag('add.png'),"actividad/new?id_feria=$id_feria",array('title' => 'Agregar'))?></td>
    </tr>
</table>
</div>

<script type="text/javascript">
   
</script>