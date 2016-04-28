$(document).ready(function(){
});

function search(str) {
    var url = "searchbar.php"; 
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();

    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("result").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST", url, true);
    xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xmlhttp.send("q="+str);
    
    }


$(window).load(function() {
});
