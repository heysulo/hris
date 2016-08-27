/**
 * Created by emalsha on 8/27/16.
 */



/* ------------------------------------------
Dashboard page ,
Notification area javascript
    * This jQuery to create tab menu.
*/
$(document).ready(function(){
    $('.request-tabs .tab-links a').on('click',function (e) {
        var currentAttributeValue = $(this).attr('href');

        $('.tabs '+currentAttributeValue).show().siblings().hide();

        $('this').parent('li').addClass('active').siblings().removeClass('active');

        e.preventDefault();
    })
});
