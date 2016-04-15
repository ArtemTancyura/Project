jQuery(document).ready(function($) {
    $('.contact').on('submit', function(){
        //console.log('success');
        // e.preventDefault();
        // e.stopPropagation();
        var data = {
            'action': 'my_action',
            //'dataType' : 'jsonp',
            'nonce' : ajax_object.nonce,
            'organization' : $('#organization').val(),
            'area' : $('#area').val(),
            'cultures': $('#cultures').val(),
            'analysis_of_land' : $('#analysis_of_land').val(),
            'fertilization' : $('#fertilization').val(),
            'favourit_countries': $('#favourit_countries').val(),
            'european_fertilizer' : $('#european_fertilizer').val(),
            'contact_telephone': $('#contact_telephone').val(),
            'contact_email' : $('#contact_email').val()
         };

        // We can also pass the url value separately from ajaxurl for front end AJAX implementations
        $.post(ajax_object.ajax_url, data, function(response) {
            alert(response);
            $('#organization').val('');
            $('#area').val('');
            $('#cultures').val('');
            $('#analysis_of_land').val('');
            $('#fertilization').val('');
            $('#favourit_countries').val('');
            $('#european_fertilizer').val('');
            $('#contact_telephone').val('');
            $('#contact_email').val('');
        });
    });



});