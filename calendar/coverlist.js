var xmlHttp

function editcover(cid,title,subtitle,photo,date)
{
	showcovereditor(cid,title,subtitle,photo,date);	
}

function deletecover(cid)
{
	var url = "deletecover.php";
	var postContent = "cid="+encodeURIComponent(cid);
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	{
	alert ("Browser does not support HTTP Request")
	return
	}
	xmlHttp.open("POST", url, true);
	xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xmlHttp.onreadystatechange=deletecoverCallback 
	xmlHttp.send(postContent);
	showprogressdlg();
}

function deletecoverCallback() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") { 
 //document.getElementById("addcoverresult").innerHTML=xmlHttp.responseText 
 dismissprogressdlg();
 alert(xmlHttp.responseText);
 getcoverlist();
 } 
}

function viewapps(cid)
{

}

function addcover()
{
	var url = "addcover.php"
	var cid = document.getElementById("coverid").value
	var date = document.getElementById("date").value
	var title = document.getElementById("title").value
	var subtitle = document.getElementById("subtitle").value
    var photo = document.getElementById("photo").value
	var postContent = "cid="+encodeURIComponent(cid)+"&date=" + encodeURIComponent(date) +"&title=" + encodeURIComponent(title)+"&subtitle=" + encodeURIComponent(subtitle)+"&photo=" + encodeURIComponent(photo);
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	{
	alert ("Browser does not support HTTP Request")
	return
	}
	xmlHttp.open("POST", url, true);
	xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xmlHttp.onreadystatechange=addcoverCallback 
	xmlHttp.send(postContent);
	hidecovereditor()
	showprogressdlg();
}

function addcoverCallback() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") { 
 //document.getElementById("addcoverresult").innerHTML=xmlHttp.responseText
 dismissprogressdlg(); 
 alert(xmlHttp.responseText);
 hidecovereditor();
 getcoverlist();
 } 
}

function getcoverlist()
{ 
var date1 = document.getElementById("date1").value
var date2 = document.getElementById("date2").value
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
var url="coverlist.php"
url=url+"?date1="+date1
url=url+"&date2="+date2
xmlHttp.onreadystatechange=coverlistCallback 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
showprogressdlg();
}

function coverlistCallback() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 dismissprogressdlg();
 document.getElementById("coverlist").innerHTML=xmlHttp.responseText 
 } 
}

function GetXmlHttpObject()
{
var xmlHttp=null;
try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 //Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}

function hidecovereditor() {
document.getElementById("coverid").value="";
document.getElementById("date").value="";
document.getElementById("title").value="";
document.getElementById("subtitle").value="";
document.getElementById("photo").value="";
document.getElementById('addcover').style.display='none';
}

function showcovereditor(cid,title,subtitle,photo,date) {
hidecovereditor();
var undefined;
if(cid!=undefined)
	document.getElementById("coverid").value=cid;
if(date!=undefined)
	document.getElementById("date").value=date;
if(title!=undefined)
	document.getElementById("title").value=title;
if(subtitle!=undefined)
	document.getElementById("subtitle").value=subtitle;
if(photo!=undefined)
	document.getElementById("photo").value=photo;
document.getElementById('addcover').style.display='block';
}

var x, y;
function getXY(){
  if(window.pageYOffset) {
	// all except IE
	y = window.pageYOffset;
	x = window.pageXOffset;
  } else if(document.documentElement 
    && document.documentElement.scrollTop) {
    // IE 6 Strict
    y = document.documentElement.scrollTop;
    x = document.documentElement.scrollLeft;
  } else if(document.body) {
    // all other IE
    y = document.body.scrollTop;
    x = document.body.scrollLeft; 
  }
}

function showuploaddlg()
{
getXY();
scroll(0,0);
var msg = document.createElement("div");
msg.id = "layer";
with(msg.style)
{
width = "100%";
height = "100%";
background = "#000000";
position = "absolute";
left = "0";
top = "0";
filter = 'Alpha(opacity=70)';
opacity = '0.7';
}
document.body.appendChild(msg);

var Alert = document.createElement("div");
Alert.id = "MessageBox";
Alert.style.backgroundColor='#ffffff';
Alert.innerHTML = '<iframe src="uploaddlg.html" width="100%" height="100%" onclick="dismissuploaddlg()" />';
with(Alert.style)
{
position = "absolute";
left = "10%";
top = "10%";
width = "80%";
height = "80%";
}
document.body.appendChild(Alert);
}

function dismissuploaddlg()
{
scroll(x,y);
document.body.removeChild(document.getElementById("layer"))
document.body.removeChild(document.getElementById("MessageBox"))
}

function showprogressdlg()
{
getXY();
scroll(0,0);
var msg = document.createElement("div");
msg.id = "layer";
with(msg.style)
{
width = "100%";
height = "100%";
background = "#000000";
position = "absolute";
left = "0";
top = "0";
filter = 'Alpha(opacity=70)';
opacity = '0.7';
}
document.body.appendChild(msg);

var Alert = document.createElement("div");
Alert.id = "MessageBox";
Alert.style.backgroundColor='#ffffff';
Alert.innerHTML = "<center>‘ÿ»Î÷–°£°£°£</center>";
with(Alert.style)
{
position = "absolute";
left = "40%";
top = "40%";
width = "20%";
height = "20%";
}
document.body.appendChild(Alert);
}

function dismissprogressdlg()
{
scroll(x,y);
document.body.removeChild(document.getElementById("layer"))
document.body.removeChild(document.getElementById("MessageBox"))
}

function insertimgurl(url)
{
document.getElementById("photo").value = url;
}