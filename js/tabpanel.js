$(document).ready(function () {
   $('.tab-panel .tab-link a').on('click', function (e) {
        var currentAttrValue = jQuery(this).attr('href');

        // Show/Hide Tabs
        //Fade effect
        //   $('.tab-panel ' + currentAttrValue).fadeIn(1000).siblings().hide();
        //Sliding effect
        $('.tab-panel ' + currentAttrValue).slideDown(400).siblings().slideUp(400);

        //Sliding up-down effect
       // $('.tab-panel ' + currentAttrValue).siblings().slideUp(400);
        // $('.tab-panel ' + currentAttrValue).delay(400).slideDown(400);

        // Change/remove current tab to active
        $(this).parent('li').addClass('active').siblings().removeClass('active');

        e.preventDefault();
    });
});

