var models;
function init() {
  //$("#dealerSelected").select2();
}


jQuery(document).ready(function () {
  init();
  $('#transfer_date').on('change', function (evt) {
    /*let startDate = new Date($("#start_date").val());
    let endDate = new Date($("#end_date").val());
    if (endDate && startDate >= endDate) {
      alert("Start date should be less than end date");
      $("#end_date").val(null).trigger("change");
      return false;
    }
    return true;*/
  });
});
