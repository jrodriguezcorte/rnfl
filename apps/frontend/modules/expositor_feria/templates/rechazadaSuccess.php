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
                            {name: ''},
                            {name: 'Observaciones'},
                            {name: 'Nombre'},
                            {name: 'Apellido'},
                            {name: 'Rif'},
                            {name: 'Telefono Local'},
                            {name: 'Telefono Celular'},
                            {name: 'Email'},
                            
                        ],
                        url: "<?php echo url_for('expositor_feria/rechazadaajax?id_feria='.$sf_params->get('id_feria')) ?>",
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
                            {text: '', datafield: '', width: 100 ,cellsalign: 'center'}, 
                            {text: 'Observaciones', datafield: 'Observaciones', width: 200  },
                            {text: 'Nombre', datafield: 'Nombre', width: 200  },
                            {text: 'Apellido', datafield: 'Apellido', width: 200  },
                            {text: 'Rif', datafield: 'Rif', width: 200  },
                            {text: 'Telefono Local', datafield: 'Telefono Local', width: 200  },
                            {text: 'Telefono Celular', datafield: 'Telefono Celular', width: 200  },
                            {text: 'Email', datafield: 'Email', width: 350  },                                                       
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
<h2>Solicitudes Rechazadas</h2>
<br>
<div class="table-responsive">
<body class='default'>
    <div id='jqxWidget' style="font-size: 13px; font-family: Verdana; float: left;">
        <div id="jqxgrid">
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
        <td>&nbsp;</td>
    </tr>
</table>
</div>
