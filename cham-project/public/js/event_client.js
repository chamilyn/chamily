let event_list = [];
let month_text = [];
let current_year = 0;
let current_month = 0;
let last_prev_month = 0;
let last_next_month = 0;
let last_prev_year = 0;
let last_next_year = 0;
function init() {
    current_year = parseInt(new Date().getFullYear());
    current_month = parseInt(new Date().getMonth()+1);
    month_text[1] = 'JAN';
    month_text[2] = 'FEB';
    month_text[3] = 'MAR';
    month_text[4] = 'APR';
    month_text[5] = 'MAY';
    month_text[6] = 'JUN';
    month_text[7] = 'JUL';
    month_text[8] = 'AUG';
    month_text[9] = 'SEP';
    month_text[10] = 'OCT';
    month_text[11] = 'NOV';
    month_text[12] = 'DEC';
    $.ajax({
        url: `/get_event_schedules`,
        method: "GET",
        success: function (results) {
            event_list = results;
            if (event_list) {
                let keys = Object.keys(event_list);
                last_prev_year = parseInt(keys[0]);
                last_prev_month = parseInt(Object.keys(event_list[keys[0]])[0]);
                if (keys.length > 1) {
                    last_next_year = keys[1];
                    last_next_month = parseInt(Object.keys(event_list[keys[1]])[Object.keys(event_list[keys[1]]).length - 1]);
                } else {
                    last_next_year = keys[0];
                    last_next_month = parseInt(Object.keys(event_list[keys[0]])[Object.keys(event_list[keys[0]]).length - 1]);
                }
            }
            renderEventList(current_year, current_month);
        },
    });
}
function renderEventList(year, month) {
    $('#main_table').html("");
    year = parseInt(year);
    month = parseInt(month);
    if (event_list[year] && event_list[year][month].length) {
        for (const key in event_list[year][month]) {
            let event =  event_list[year][month][key];
            $('#main_table').append(`<div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="/storage/events/${event.img_path}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">${event.build_date}</h5>
                        <p class="card-text">${event.name}${(event.desc ? ' : '+event.desc : '')}</p>
                        <a href="${(event.url ? event.url : 'https://www.facebook.com/cgm48official')}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        </div>`);
        }
    } else {
        $('#main_table').append(`<div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-12">
                <div class="card-body text-center">
                    No Event on This Month
                </div>
            </div>
        </div>
    </div>`);
    }
    $('.textbgcl').html(`${month_text[month]} ${year}`);
}
jQuery(document).ready(function () {
    init();
    $('#arrow_up').on('click', function (evt) {
        if (current_month != 12){
            current_month++;
        } else {
            current_month = 1;
            current_year++;
        }
        $('#arrow_down').attr('disabled', false);
        if (current_year == last_next_year && current_month == last_next_month) {
            $(this).attr('disabled', true);
        } else {
            $(this).attr('disabled', false);
        }
        renderEventList(current_year, current_month);
    });
    $('#arrow_down').on('click', function (evt) {
        if (current_month != 1){
            current_month--;
        } else {
            current_month = 12;
            current_year--;
        }
        $('#arrow_up').attr('disabled', false);
        if (current_year == last_prev_year && current_month == last_prev_month) {
            $(this).attr('disabled', true);
        } else {
            $(this).attr('disabled', false);
        }
        renderEventList(current_year, current_month);
    });
});
