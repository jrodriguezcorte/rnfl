<!DOCTYPE html>
<!--
<html lang="en">
    <head>
        <title id='Description'>This example shows how to enable sorting and sort by a column.
        </title>
        <link rel="stylesheet" href="/js/jqwidgets/jqwidgets/styles/jqx.base.css" type="text/css" />
        <script type="text/javascript" src="/js/jqwidgets/jqwidgets/jqxcore.js"></script>
        <script type="text/javascript" src="/js/jqwidgets/jqwidgets/jqxdata.js"></script> 
        <script type="text/javascript" src="/js/jqwidgets/jqwidgets/jqxbuttons.js"></script>
        <script type="text/javascript" src="/js/jqwidgets/jqwidgets/jqxscrollbar.js"></script>
        <script type="text/javascript" src="/js/jqwidgets/jqwidgets/jqxmenu.js"></script>
        <script type="text/javascript" src="/js/jqwidgets/jqwidgets/jqxgrid.js"></script>
        <script type="text/javascript" src="/js/jqwidgets/jqwidgets/jqxgrid.sort.js"></script>
        <script type="text/javascript" src="/js/jqwidgets/jqwidgets/jqxgrid.filter.js"></script>
        <script type="text/javascript" src="/js/jqwidgets/jqwidgets/jqxgrid.selection.js"></script> 
        <script type="text/javascript" src="/js/jqwidgets/jqwidgets/jqxpanel.js"></script>
        <script type="text/javascript" src="/js/jqwidgets/jqwidgets/jqxcheckbox.js"></script>
        <script type="text/javascript" src="/js/jqwidgets/jqwidgets/jqxlistbox.js"></script>
        <script type="text/javascript" src="/js/jqwidgets/jqwidgets/jqxdropdownlist.js"></script>
        <script type="text/javascript" src="/js/jqwidgets/jqwidgets/globalization/globalize.culture.es-VE.js"></script>
-->
<script type="text/javascript">
    /*    
     $(document).ready(function() {
     // prepare the data
     var source =
     {
     datatype: "json",
     datafields: [
     {name: 'Nombre'},
     {name: 'Descripcion'},
     ],
     url: "<?php echo url_for('feria/pruebaajax') ?>",
     sortcolumn: 'Nombre',
     sortdirection: 'asc',
     async: true
     };              
     var dataAdapter = new $.jqx.dataAdapter(source);
     // create jqxgrid.
     $("#jqxgrid").jqxGrid(
     {
     width: 850,
     height: 450,
     source: dataAdapter,
     sortable: true,
     filterable: true,
     altrows: true,
     columns: [
     {text: 'Nombre', datafield: 'Nombre', width: 255},
     {text: 'Descripcion', datafield: 'Descripcion', width: 255},
     ]
     });                         
     $('#events').jqxPanel({width: 300, height: 80});
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
     });
     */
</script>
<link rel="stylesheet" href="/js/jqwidgets/jqwidgets/styles/jqx.base.css" type="text/css" />
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
                            {name: 'Nombre'},
                            {name: 'Descripcion'},
                        ],
                        url: "<?php echo url_for('feria/pruebaajax') ?>",
                        pager: function(pagenum, pagesize, oldpagenum) {
                            // callback called when a page or page size is changed.
                        }
                    };
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#jqxgrid").jqxGrid(
                    {
                        width: 850,
                        source: dataAdapter,
                        selectionmode: 'multiplerowsextended',
                        sortable: true,
                        pageable: true,
                        filterable: true,
                        altrows: true,
                        autoheight: true,
                        columnsresize: true,
                        columns: [
                            {text: 'Nombre', datafield: 'Nombre', width: 255},
                            {text: 'Descripcion', datafield: 'Descripcion', width: 255},
                        ]
                    });
            $('#events').jqxPanel({width: 300, height: 300});
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
<body class='default'>
    <div id='jqxWidget' style="font-size: 13px; font-family: Verdana; float: left;">
        <div id="jqxgrid">
        </div>
    </div>
</body>
</html>
