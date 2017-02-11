var path = "/hris/app/";
if (window.location.host == "hrisucsc.azurewebsites.net"){
    path = "/app/";
}else{
    path = "/hris/app/";
}

document.getElementById('dashboard').addEventListener("click",function () {
    location.href=path+"user/dashboard.php";
});

document.getElementById('profile').addEventListener("click",function () {
    location.href=path+"user/member.php";
});

document.getElementById('skill_directory').addEventListener("click",function () {
    location.href=path+"user/skill_directory.php";
});

document.getElementById('groups').addEventListener("click",function () {
    location.href=path+"user/groups.php";
});

$(document).ready(function(){
    if($('#admin').length > 0){
        document.getElementById('admin').addEventListener("click",function () {
            location.href=path+"admin/administration.php";
        });
    }
});

document.getElementById('advancedSearch').addEventListener("click",function () {
    location.href=path+"user/advancedSearch.php";
});