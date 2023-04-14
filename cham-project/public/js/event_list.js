function init() {

}
function renderTable() {
    let table = $("#table_id").DataTable({
    createdRow: function (row, data, dataIndex) {
        $("td", row).eq(0).addClass("text-center");
    },
    aaSorting: [],
    dom:
    "<'row'<'col-sm-3'l><'col-sm-5'f><'col-sm-4'B >>" +
    "<'row'<'col-sm-12'tr>>" +
    "<'row'<'col-sm-6 col-md-5'i><'col-sm-6 col-md-7'p>>",
    buttons: {
    buttons: [
        {
        className: "btn btn-primary btn-sm",
        text: '<span class="fas fa-plus" aria-hidden="true"></span>',
        action: function (e, dt, node, config) {
            window.location.href = "/admin/event/create";
        },
        },
    ],
    dom: {
        button: {
        className: "btn",
        },
    },
    },
    ajax: {
    url: "/get_event_datatable",
    data: {
        filter_txt_sup: null,
        filter_model: null,
        filter_comp: null,
        filter_serial: null,
    },
    },
    paging: true,
    deferRender: true,
    bStateSave: true,

    aLengthMenu: [
    [25, 50, 100, 200, -1],
    [25, 50, 100, 200, "All"],
    ],
    columns: [
    { data: "numinx" },
    { data: "dv_no" },
    { data: "so_no" },
    { data: "dv_date" },
    { data: "dealer_name" },
    {
        data: null,
        render: function (data, type, row) {
        return (
            '<a href="/dvpdf/' +
            data.id +
            '" pdf target="' +
            data.id +
            '" class="btn pdf-export"><span class="fas fa-file-pdf" aria-hidden="true"></span></a>' +
            ' <a class="btn btn-info" href="/dv/' +
            data.id +
            '"><span aria-hidden="true" class="fas fa-list-alt"></span></a>' +
            `<button type="button" class="btn btn-danger" style="margin-bottom: 0px;" ${data.del_btn == 2 ? 'disabled' : ''} del obj_id="
            ${data.id}"><span class="fas fa-trash-alt" aria-hidden="true"></span></button>`
        );
        },
    },
    ],
    columnDefs: [
    { targets: [0, 5], orderable: false },
    // { targets: [0], className: 'righttext'}
    ],
    
    initComplete: function () {

    $(".dataTables_filter input")
        .unbind() // Unbind previous default bindings
        .bind("input", function(e) { // Bind our desired behavior
            // If the length is 3 or more characters, or the user pressed ENTER, search
            if(this.value.length >= 3 || e.keyCode == 13) {
                // Call the API search function
                table.search(this.value).draw();
            }
            // Ensure we clear the search if they backspace far enough
            if(this.value == "") {
                table.search("").draw();
            }
            return;
    });
    }
});
}

jQuery(document).ready(function () {
init();

let filter_txt_sup = $("#filter_txt_sup").val();
let filter_model = $("#modelselected").val();
let filter_comp = $("#compselected").val();
let filter_serial = $("#serial").val();
renderTable(filter_txt_sup, filter_model, filter_comp, filter_serial);

$("#searchfilter").on("click", function (evt) {
    filter_txt_sup = $("#filter_txt_sup").val();
    filter_model = $("#modelselected").val();
    filter_comp = $("#compselected").val();
    filter_serial = $("#serial").val();
    $("#table_id").DataTable().destroy();
    renderTable(filter_txt_sup, filter_model, filter_comp, filter_serial);
});

$("#modelselected").select2({
    placeholder: "Select Model",
    minimumInputLength: 3,
    ajax: {
    url: "/get_model_data",
    type: "post",
    dataType: "json",
    delay: 250,
    data: function (params) {
        return {
        _token: $('meta[name="csrf-token"]').attr("content"),
        search: params.term, // search term
        };
    },
    processResults: function (response) {
        return {
        results: response,
        };
    },
    cache: true,
    },
});

$("#table_id").on("click", " [del] ", function (evt) {
    if (
    confirm("Do you want to delete This DV?" + jQuery(this).attr("obj_id"))
    ) {
    $.ajax({
        url: "/dv/" + jQuery(this).attr("obj_id"),
        method: "delete",
        data: {
        _token: $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (result) {
        if (result.status == "success") {
            location.reload();
        } else {
            alert(result.message);
        }
        },
    });
    }
    evt.stopImmediatePropagation();
});
});
