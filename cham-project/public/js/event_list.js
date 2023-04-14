function init() {

}
jQuery(document).ready(function () {
init();
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
