/**
 * Created by sulochana on 9/18/16.
 */

function msgbox(body,title,type,btn_default_txt,btn_optional_txt,def_function,opt_function) {
    var xhttp = new XMLHttpRequest();
    if (type=="undefined"){
        type = 0;
    }
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("msgbox_responder").innerHTML += this.responseText;
        }
    };
    xhttp.open("POST", "../templates/msgbox.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("title="+title+"&\
                body="+body+"&\
                btn_default_txt="+btn_default_txt+"&\
                btn_optional_txt="+btn_optional_txt+"&\
                def_function="+def_function+"&\
                opt_function="+opt_function+"&\
                type="+type);
}


function closemsgbox () {
    var element = document.getElementById("msgbox");element.outerHTML = "";
}
