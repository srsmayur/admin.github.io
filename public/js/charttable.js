
$(document).ready(function() {

        $('#table-4').DataTable( {
            "ajax": "http://localhost/Admin-panel/public/charttable/readdata",
            "columns": [
                { "data": "title" },
                { "data": "category" },
                { "data": "tag_name" },
                { "data": "start_date" },
                { "data": "end_date" },
                { "data": "image" , render: getImg}
            ]

        } );

    $(".pagination a").click(function (ev) {
        replaceCheckboxes();
    });
    function getImg(data, type, full, meta) {
        var path = "http://localhost/Admin-panel/public";
        var imagedata = data;

        var imagepath = path+imagedata;

        return '<img src="'+ imagepath +'" />';

    }
});