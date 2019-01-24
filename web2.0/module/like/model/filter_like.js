$(document).ready(function () {
    
    var source =
    {
        dataType: "json",
        dataFields: [
            { name: 'ProName', type: 'string' },
            { name: 'Mail', type: 'string' },
            { name: 'ProType', type: 'string' },
            { name: 'Ubica', type: 'string' }
        ],
        id: 'id',
        url: "module/like/controller/controller_like.php?op=datatable"
    };
    

    var dataAdapter = new $.jqx.dataAdapter(source);
    $('#dataTable').jqxDataTable(
    {
        width: $("dataTable").width(),
        pageable: true,
        pagerButtonsCount: 10,
        source: dataAdapter,
        sortable: true,
        pageable: true,
        altRows: true,
        filterable: true,
        columnsResize: true,
        pagerMode: 'advanced',
        columns: [
          { text: 'Nombre', dataField: 'ProName'},
          { text: 'Correo', dataField: 'Mail' },
          { text: 'Tipo', dataField: 'ProType' },
          { text: 'Ubicacion', dataField: 'Ubica' }
      ]
    });  
});
