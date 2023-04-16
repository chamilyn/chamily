function init() {

}
jQuery(document).ready(function () {
    init();
    $("[del").on("click", function (evt) {
        if (
        confirm(`Do you want to delete Event : ${$(this).attr('obj_id')} ?`)
        ) {
        $.ajax({
            url: `/admin/event/${$(this).attr('obj_id')}`,
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
