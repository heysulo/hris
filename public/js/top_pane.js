/**
 * Created by emalsha on 8/16/16.
 */
document.getElementById('setting').addEventListener("click",function () {
    document.getElementById('dropdown').classList.toggle("show");
});

window.onclick = function (event) {
    if (!event.target.matches('.topbox_account_settings')){
        var dropdowns = document.getElementsByClassName("top_dropdown_content");
        var i;
        for (i = 0;i < dropdowns.length; i++){
            var openDropDown = dropdowns[i];
            if (openDropDown.classList.contains('show')){
                openDropDown.classList.remove('show');
            }
        }
    }
}