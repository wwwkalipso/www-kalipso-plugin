jQuery(function($) {
    $(document).ready(function(){
        $(document).find('.wwwkalipso-google-place-btn-add').click(function (e) {
            var restotaunt_name, address, rating, place;
            restotaunt_name = $(this).parent().find('input[name=www_restotaunt_name]').val();
            address = $(this).parent().find('input[name=www_address]').val();
            rating = $(this).parent().find('input[name=www_rating]').val();
            place = $(this).parent().find('input[name=www_place_id]').val();

            data = {
                action: 'google_place',
                nonce : nonce,
                place_name: restotaunt_name,
                formatted_address: address,
                rating: rating,
                place_id: place
            }
            console.log(data);
            console.log(ajaxurl+ '?action=google_place');
            $.post( ajaxurl, data, function(response) {
                alert('Получено с сервера: ' + response.data.message );

            });
            return false;
        });


    });

});