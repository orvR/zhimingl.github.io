// JavaScript Document
function showResult(str) 
{
if (str == "0") { document.getElementById("livesearch").innerHTML=""; return;}
if (window.XMLHttpRequest) xmlhttp=new XMLHttpRequest();
else { xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");}

xmlhttp.onreadystatechange=process;
xmlhttp.open("POST","search_result.php", true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("r="+str);
}

function process() {

if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
{
	document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
}

}

function showUserDetail(str) 
{
if (str == "0") { document.getElementById("livesearch").innerHTML=""; return;}
if (window.XMLHttpRequest) xmlhttp=new XMLHttpRequest();
else { xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");}

xmlhttp.onreadystatechange=process;
xmlhttp.open("POST","search_result.php", true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("r="+str);
}
