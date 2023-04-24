function init() {

}
jQuery(document).ready(function () {
    init();
    $("[del").on("click", function (evt) {
        if (
        confirm(`Do you want to delete Feedback : ${$(this).attr('obj_id')} ?`)
        ) {
        $.ajax({
            url: `/admin/feedbacks/${$(this).attr('obj_id')}`,
            method: "delete",
            data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (result) {
            if (result == "success") {
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
