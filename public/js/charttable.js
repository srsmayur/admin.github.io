
$(document).ready(function() {

    var col_name = ["ID","title","category","tag_name","comment","start_date","end_date","image","create_at"];
    data_table= $("#table-4").dataTable({
        "bProcessing":true,
        "bServerSide":true,
        "sAjaxSource": "http://localhost/Admin-panel/public/charttable/readdata",
        "iDisplayLength": parseInt('10'),
        "sPaginationType": "bootstrap",
        "sDom": "<'row'<'col-xs-6 col-left'l><'col-xs-6 col-right'<'export-data'T>f>r>t<'row'<'col-xs-6 col-left'i><'col-xs-6 col-right'p>>",
        "aaSorting": [[5, 'desc']],
        "aoColumns": [
            {
                "bVisible": false,
                "bSortable": true, //id
            },
            {
                "bSortable": true, //title
            },
            {
                "bSortable": true, //category
            },
            {
                "bSortable": true, //tag_name
            },
            {
                "bSortable": true, //comment
            },
            {
                //  "bVisible": false,
                "bSortable": true, //start_date
            },
            {
                "bSortable": true, //end_date
            },
            {
                "bSortable": true, //image
            },
            {
                "bSortable": true, //create_at
            },
        ]
    });


    $(".pagination a").click(function (ev) {
        replaceCheckboxes();
    });

    var table = $('#table-4').dataTable();

    $('#table-4 tbody').on('click','img.icon-delete',function(){
        table
            .row( $(this).parents('tr'))
            .remove()
            .draw();
    });


});