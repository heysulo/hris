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

        $('.request-tabs '+currentAttributeValue).show().siblings().hide();

        $(this).parent('li').addClass('active').siblings().removeClass('active');

        e.preventDefault();
    })
});

document.getElementById('setting').addEventListener("click",function () {
    document.getElementById('dropdown').classList.toggle("show");
});

window.onclick = function (event) {
    if (!event.target.matches('.topbox_account_settings')){
        var dropdowns = document.getElementsByClassName("top_dropdown_content_click");
        var i;
        for (i = 0;i < dropdowns.length; i++){
            var openDropDown = dropdowns[i];
            if (openDropDown.classList.contains('show')){
                openDropDown.classList.remove('show');
            }
        }
    }

    if (!event.target.matches('.availability_button')){

        if ($('.availability_dropdown_content').css('display') == 'block'){
            $('.availability_dropdown_content').toggle(".availability_dropdown_show");
        }
    }


};
