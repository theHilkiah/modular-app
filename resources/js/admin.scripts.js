(function($){
    $(function(){
        let adjustMainSection = function()
        {
            $('#main,[role="main"]', document).css('min-height', function(){
                let headerHgt = $('#header', document).outerHeight(true);
                let footerHgt = $('#footer', document).outerHeight(true);
                return window.innerHeight - footerHgt - headerHgt;
            });
        };

        $(document).ready(adjustMainSection);
        $(window).on('load resize', adjustMainSection);
    });
})(jQuery);
