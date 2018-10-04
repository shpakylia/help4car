$(document).ready(function () {

    //initialize date format with id date

    mobiscroll.settings = {
        lang: 'ru',                     // Specify language like: lang: 'pl' or omit setting to use default
        theme: 'ios'                    // Specify theme like: theme: 'ios' or omit setting to use default
    };
    mobiscroll.calendar('#date', {
        display: 'center',              // Specify display mode like: display: 'bottom' or omit setting to use default
        dateFormat: 'yy-mm-dd',      //formating value
        timeFormat: 'HH:ii:ss',      //formating value
        controls: ['calendar', 'time']  // More info about controls: https://docs.mobiscroll.com/4-4-0/javascript/calendar#opt-controls
    });

    $('#brand_id').change(function () {
        var brand_id = $(this).val();
        var token  = $(this).parents('form').find('[name=_token]').val();
        console.log(token);
        $.ajax({
            type: 'POST',
            url: '/admin/ajax/modals',
            data: {
                '_token': token,
                'brand_id': brand_id
            },
            success: function (data) {
                if(data['modals'] != null){
                    var modals = data['modals'];
                    var modal_dom = $('select.modal_id');
                    modal_dom.find('option').remove();
                    for(var key in modals) {
                        modal_dom.html(modal_dom.html() + '<option value="'+ modals[key]['id']+'">'+ modals[key]['title']+'</option>');
                    }
                }
            }
        })
    })
});
// data: {
//                 '_token': '<?php echo csrf_token() ?>',
//                 'brand_id': brand_id
//             },