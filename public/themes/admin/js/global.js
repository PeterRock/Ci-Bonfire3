jQuery(function ($) {
    $(document).ready(function () {
        /* Nofication Close Buttons */
        $('.notification a.close').click(function (e) {
            e.preventDefault();

            $(this).parent('.notification').fadeOut();
        });

        /*
         Check All Feature
         */
        $(".check-all").click(function () {
            $("table input[type=checkbox]").attr('checked', $(this).is(':checked'));
        });

        /*
         Set focus on the first form field
         */
        $(":input:visible:first").focus();

        $('.table-sticky').stickyTableHeaders();
    });
});
