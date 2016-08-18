/**
 * Created by emalsha on 8/16/16.
 */
document.getElementById('setting').addEventListener("click",function () {
    document.getElementById('dropdown').classList.toggle("show");
});

window.onclick = function (event) {
    if (!event.target.match('topbox_account_settings')){
        var dropdowns = document.getElementsByClassName("top_dropdown");
        var i;
        for (i = 0;i < dropdowns.length; i++){
            var openDropDown = dropdowns[i];
            if (openDropDown.classList.contains('show')){
                openDropDown.classList.remove('show');
            }
        }
    }
}