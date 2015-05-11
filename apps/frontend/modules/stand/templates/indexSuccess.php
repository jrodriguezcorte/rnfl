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
<script type="text/javascript">
        $(document).ready(function() {
            // prepare the data
            var source =
                    {
                        datatype: "json",
                        datafields: [
                            {name: 'Costo en Bs'},
                            {name: 'Costo en USD'},
                            {name: 'Metros'},
                            {name: 'Estado'},
                            {name: ''},
                        ],
                        url: "<?php echo url_for('stand/indexajax?id_feria='.$sf_params->get('id_feria')) ?>",
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
                            {text: 'Metros Cuadrados (m<sup>2</sup>)', datafield: 'Metros', width: 200  },
                            {text: 'Costo en Bs', datafield: 'Costo en Bs', width: 200 },
                            {text: 'Costo en USD', datafield: 'Costo en USD', width: 200 },
                            {text: 'Estado', datafield: 'Estado', width: 200 },
                            {text: '', datafield: '', width: 100 ,cellsalign: 'center'},                            
                        ]
                    });
            $('#events').jqxPanel({width: 500, height: 300});
            $("#jqxgrid").on("sort", function(event) {
                $("#events").jqxPanel('clearcontent');
                var sortinformation = event.args.sortinformation;
                var sortdirection = sortinformation.sortdirection.ascending ? "ascending" : "descending";
                if (!sortinformation.sortdirection.ascending && !sortinformation.sortdirection.descending) {
                    sortdirection = "null";
                }
                var eventData = "Triggered 'sort' event <div>Column:" + sortinformation.sortcolumn + ", Direction: " + sortdirection + "</div>";
                $('#events').jqxPanel('prepend', '<div style="margin-top: 5px;">' + eventData + '</div>');
            });
            $('#clearsortingbutton').jqxButton({height: 25});
            $('#sortbackground').jqxCheckBox({checked: true, height: 25});
            // clear the sorting.
            $('#clearsortingbutton').click(function() {
                $("#jqxgrid").jqxGrid('removesort');
            });
            // show/hide sort background
            $('#sortbackground').on('change', function(event) {
                $("#jqxgrid").jqxGrid({showsortcolumnbackground: event.args.checked});
            });
            $("#jqxgrid").on("pagechanged", function(event) {
                $("#eventslog").css('display', 'block');
                if ($("#events").find('.logged').length >= 5) {
                    $("#events").jqxPanel('clearcontent');
                }
                var args = event.args;
                var eventData = "pagechanged <div>Page:" + args.pagenum + ", Page Size: " + args.pagesize + "</div>";
                $('#events').jqxPanel('prepend', '<div class="logged" style="margin-top: 5px;">' + eventData + '</div>');
                // get page information.
                var paginginformation = $("#jqxgrid").jqxGrid('getpaginginformation');
                $('#paginginfo').html("<div style='margin-top: 5px;'>Page:" + paginginformation.pagenum + ", Page Size: " + paginginformation.pagesize + ", Pages Count: " + paginginformation.pagescount + "</div>");
            });
            $("#jqxgrid").on("pagesizechanged", function(event) {
                $("#eventslog").css('display', 'block');
                $("#events").jqxPanel('clearcontent');
                var args = event.args;
                var eventData = "pagesizechanged <div>Page:" + args.pagenum + ", Page Size: " + args.pagesize + ", Old Page Size: " + args.oldpagesize + "</div>";
                $('#events').jqxPanel('prepend', '<div style="margin-top: 5px;">' + eventData + '</div>');
                // get page information.          
                var paginginformation = $("#jqxgrid").jqxGrid('getpaginginformation');
                $('#paginginfo').html("<div style='margin-top: 5px;'>Page:" + paginginformation.pagenum + ", Page Size: " + paginginformation.pagesize + ", Pages Count: " + paginginformation.pagescount + "</div>");
            });
        });
</script>

</head>
<?php include_partial('usuario/menuferia') ?>

<div class="jumbotron">
<?php $id_feria = $sf_params->get('id_feria'); 
       $Feria = FeriaQuery::create()->filterById($id_feria)->findOne();
        $miid = sfContext::getInstance()->getUser()->getGuardUser()->getId();
        $Usuario = UsuarioQuery::create()->filterBySfGuardUser($miid)->findOne();
        $sf_guard_user = $Usuario->getSfGuardUserGroup();               
?>
<h2>Listado de Stands asociados a la feria <?php echo $Feria->getNombre() ?></h2>
<br>
<?php if ($sf_guard_user == 1 || $Usuario->getId() == $Feria->getIdUsuario()) { ?> 
<table width="100%">
    <tr>
        <td>&nbsp;</td>
    </tr>    
    <tr>
        <td><?php echo link_to(image_tag('add.png'),"stand/new?id_feria=$id_feria",array('title' => 'Agregar'))?></td>
    </tr>
</table>
<?php } else { ?>
<table width="100%">
    <tr>
        <td>&nbsp;</td>
    </tr>    
    <tr>
        <td>&nbsp;</td>
    </tr>
</table>
<?php } ?>
<div class="table-responsive">
    <br>
<body class='default'>
    <div id='jqxWidget' style="font-size: 13px; font-family: Verdana; float: left;">
        <div id="jqxgrid">
        </div>
    </div>
</body>
</div>
</html>
<?php if ($sf_guard_user == 1 || $Usuario->getId() == $Feria->getIdUsuario()) { ?> 
<table width="100%">
    <tr>
        <td>&nbsp;</td>
    </tr>    
    <tr>
        <td><?php echo link_to(image_tag('add.png'),"stand/new?id_feria=$id_feria",array('title' => 'Agregar'))?></td>
    </tr>
</table>
<?php } else { ?>
<table width="100%">
    <tr>
        <td>&nbsp;</td>
    </tr>    
    <tr>
        <td>&nbsp;</td>
    </tr>
</table>
<?php } ?>
</div>