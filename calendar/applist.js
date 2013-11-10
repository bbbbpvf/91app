var xmlHttp

function deleteapp(aid)
{
	var url = "deleteapp.php";
	var postContent = "cid="+encodeURIComponent(aid);
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	{
	alert ("Browser does not support HTTP Request")
	return
	}
	xmlHttp.open("POST", url, true);
	xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xmlHttp.onreadystatechange=deleteappCallback 
	xmlHttp.send(postContent);
	showprogressdlg();
}

function deleteappCallback() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") { 
 //document.getElementById("addappresult").innerHTML=xmlHttp.responseText 
 dismissprogressdlg();
 alert(xmlHttp.responseText);
 getapplist();
 } 
}

function getapplist()
{ 
var currHref = location.href;
var index = currHref.lastIndexOf("?");
var cid = "";
if(index != "-1"){    cid = currHref.substr(index+1);}
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
var url="applist.php"
url=url+"?cid="+cid
xmlHttp.onreadystatechange=applistCallback 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
showprogressdlg();
}

function applistCallback() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
document.getElementById("applist").innerHTML=xmlHttp.responseText;
dismissprogressdlg();
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

function showappeditor(aid,title,subtitle,description,count,score,oldprice,newprice,url,photos,flag,cid,date) {
hideappeditor();
var undefined;
if(aid!=undefined)
	document.getElementById("appid").value=aid;
if(title!=undefined)
	document.getElementById("title").value=decodeURIComponent(title);
if(subtitle!=undefined)
	document.getElementById("subtitle").value=decodeURIComponent(subtitle);
if(description!=undefined)
	document.getElementById("description").value=decodeURIComponent(description);
if(count!=undefined)
	document.getElementById("count").value=count;
if(score!=undefined)
	document.getElementById("score").value=score;
if(oldprice!=undefined)
	document.getElementById("oldprice").value=oldprice;
if(newprice!=undefined)
	document.getElementById("newprice").value=newprice;
if(url!=undefined)
	document.getElementById("url").value=decodeURIComponent(url);
if(photos!=undefined)
	document.getElementById("photos").value=decodeURIComponent(photos);
if(flag!=undefined)
	document.getElementById("flag").value=flag;
document.getElementById('addapp').style.display='block';

var c = window.document.body.scrollHeight;
window.scroll(0,c); 
}

function hideappeditor() {
document.getElementById("appid").value="";
document.getElementById("date").value="";
document.getElementById("title").value="";
document.getElementById("subtitle").value="";
document.getElementById("description").value="";
document.getElementById("count").value="";
document.getElementById("score").value="";
document.getElementById("oldprice").value="";
document.getElementById("newprice").value="";
document.getElementById("url").value="";
document.getElementById("photos").value="";
document.getElementById("flag").value="";
document.getElementById('addapp').style.display='none';
}


function insertimgurl(url)
{
document.getElementById("photos").value += (url +"|");
}



function addapp()
{
	var postUrl = "addapp.php"
	var aid = document.getElementById("appid").value
	var date = document.getElementById("date").value
	var title = document.getElementById("title").value
	var subtitle = document.getElementById("subtitle").value
	var description = document.getElementById("description").value
	var count = document.getElementById("count").value
	var score = document.getElementById("score").value
	var oldprice = document.getElementById("oldprice").value
	var newprice = document.getElementById("newprice").value
	var url = document.getElementById("url").value
    var photos = document.getElementById("photos").value
	var flag = document.getElementById("flag").value
	var cid = document.getElementById("coverid").value
	if(cid == undefined|| cid == ""){
	var currHref = location.href;
	var index = currHref.lastIndexOf("?");
	if(index != "-1"){    cid = currHref.substr(index+1);}
	}
	
	var postContent = "aid="+encodeURIComponent(aid)+"&date=" + encodeURIComponent(date) +"&title=" + encodeURIComponent(title)+"&subtitle=" + encodeURIComponent(subtitle)+"&description=" + encodeURIComponent(description)+"&count=" + encodeURIComponent(count)+"&score=" + encodeURIComponent(score)+"&oldprice=" + encodeURIComponent(oldprice)+"&newprice=" + encodeURIComponent(newprice)+"&url=" + encodeURIComponent(url)+"&photos=" + encodeURIComponent(photos)+"&flag=" + encodeURIComponent(flag)+"&cid=" + encodeURIComponent(cid);
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	{
	alert ("Browser does not support HTTP Request")
	return
	}
	xmlHttp.open("POST", postUrl, true);
	xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xmlHttp.onreadystatechange=addappCallback 
	xmlHttp.send(postContent);
	hideappeditor()
	showprogressdlg();
}


function addappCallback() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") { 
 //document.getElementById("addappresult").innerHTML=xmlHttp.responseText
 dismissprogressdlg(); 
 alert(xmlHttp.responseText);
 hideappeditor();
 getapplist();
 } 
}