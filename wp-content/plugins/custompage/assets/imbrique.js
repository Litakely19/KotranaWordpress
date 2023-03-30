(function ($) {
    $(document).on('change','#brandproduct-select',function(e) {
        e.preventDefault();
        console.log($(this).val());
        $.ajax({
                url: getModels.js,
                type: "POST",
                data: {
                  'action': 'getModels'
                }
            }).done(function(response) {
                console.log(response);
            } );
                
        });
})(jQuery);