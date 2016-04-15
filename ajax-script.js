jQuery(document).ready(function($) {
    $('#contact-form-page').on('submit', function(e){

        e.preventDefault();
        //  e.stopPropagation();
        var data = {
            'action': 'send_letter',
            //'dataType' : 'json',
            'nonce' : ajax_object.nonce,
            'organization' : $('#organization').val(),
            'email' : $('#contact_email').val(),
            'telephone': $('#contact_telephone').val(),
            'area' : $('#arean').val(),
            'cultures' : $('#cultures').val(),
            'analysis': $('#analysis_of_land').val(),
            'fertilization' : $('#fertilization').val(),
            'countries': $('#favourit_countries').val(),
            'european': $('#european_fertilizer').val()
        };

        $.post(ajax_object.ajax_url, data, function(response) {
            alert(response);
        });
    });



});