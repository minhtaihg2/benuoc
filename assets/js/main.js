(function($) {
            
    $(document).ready(function() {
        $('#pop').popper();
        
        $('.navbar-nav li').on('click', function () {
            $(this).parent().find('.active').removeClass('active');
            $(this).addClass('active');
        });
    });
})(jQuery);