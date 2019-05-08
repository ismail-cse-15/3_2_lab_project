
<?php



require_once("config.php");
// $query="SELECT * from notice ";
// $send= mysqli_query($connection,$query) or die(mysqli_error($connection));


// while ($result=mysqli_fetch_array($send)) {
// $message=base64_decode($result['notice_heading']);
// echo "$message";
// }

 ?>

<!DOCTYPE html >
 <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

 <meta http-equiv="content-type" content="text/html;charset=utf-8" />
 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <head id="SiteHead">
   <title style="image:">
	       RUET Hall Management System
 </title>
   <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
 <link href="Styles/Site.css"rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        function disp_confirm() {
            var r = confirm("Are you sure to perform the action?");
            return r;
        }

        ////////////////////////////////////////// Submit Confirmation ///////////////////////////////////
        function executeOnSubmit() {
            var res = confirm("Are you sure to perform the action?");
            if (res)
                return true;
            else
                return false;
        }
        /////////////////////////////////////////////////////////////////////////////////////////////////

        function DeleteCheckEffect(DeleteCheckBox, EditCheckBox) {
            var delobj = document.getElementById(DeleteCheckBox);
            var editobj = document.getElementById(EditCheckBox);
            editobj.checked = false;
        }
        function EditCheckEffect(hidEditCheckedIDS, EditCheckBox, DeleteCheckBox) {
            var hidobj = document.getElementById(hidEditCheckedIDS);

            var values = hidobj.value.split(",");

            for (i = 0; i < values.length; i++) {
                var tempEditID = values[i];
                var tempobj = document.getElementById(values[i]);
                if (tempEditID != EditCheckBox) {
                    tempobj.checked = false;
                }
            }
            var delobj = document.getElementById(DeleteCheckBox);
            delobj.checked = false;
        }

        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 45 || charCode > 57))
                return false;

            return true;
        }

        function isValueZero(ValueField) {

            var objValueField = document.getElementById(ValueField);
            objValueField.text = 0;
        }

        function disableOnSubmit(target) {
            if (typeof (Page_ClientValidate) == 'function') {
                if (Page_ClientValidate() == false) { return false; }
            }
            target.value = 'Wait';
            target.disabled = true;
            return true;
        }
    </script>

    <script type="text/javascript">

        (function () { document.getElementsByTagName('html')[0].className = 'scripted' })();

    </script>
    <style type="text/css">
        #datetime
        {
            font-family: "Courier New" , monospace;
            letter-spacing: 0.25em; /* border: 3px solid #c00;
            background: #f5f5e5;*/
            text-align: right;
            font-weight: bold;
            padding: 5px 0;
        }
        .scripted #datetime
        {

            text-align: right;
            font-weight: bold;
            padding: 5px 0;
        }
    </style>


    <script type="text/javascript">

        String.prototype.pad = function (l, s, t) {
            return s || (s = " "), (l -= this.length) > 0 ?
				(s = new Array(Math.ceil(l / s.length)
				+ 1).join(s)).substr(0, t = !t ? l : t == 1 ? 0 : Math.ceil(l / 2))
				+ this + s.substr(0, l - t) : this;
        };


        var addLoadEvent = function (func) {
            var oldonload = window.onload;
            if (typeof window.onload != 'function') {
                window.onload = func;
            } else {
                window.onload = function () {
                    if (oldonload) {
                        oldonload();
                    }
                    func();
                }
            }
        };


        var xClock = function () {
            var xC = null, xN = null, xH = null, xI = null,
				    xM = null, xS = null, xT = null, AP = null;

            if (!document.getElementById) return;
            xC = document.getElementById("time");
            if (!xC.nodeName) return;
            xN = new Date();
            xH = xN.getHours().toString().pad(2, '0', 0);
            xM = xN.getMinutes().toString().pad(2, '0', 0);
            xS = xN.getSeconds().toString().pad(2, '0', 0);
            AP = (xH >= 12) ? "PM" : "AM";
            xH = (xH >= 13) ? (xH - 12) : xH;
            sS = (xN.getMilliseconds() >= 500) ? ":" : "&middot;";
            xT = xH + ":" + xM + sS + xS + " " + AP;
            xC.innerHTML = xT;
            xI = !xI ? null : clearTimeout(xI);
            xI = setTimeout(xClock, 500);
        };
        addLoadEvent(xClock);
    </script>



    <link href="slider/nivo.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="jquery/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="jquery/nivoSlider.js"></script>
    <script type="text/javascript">
        $(window).load(function () {
            $('#slider').nivoSlider({
                effect: 'random',
                animSpeed: 500,
                pauseTime: 8000
            });
        });
    </script>

 <script type="text/javascript" language="javascript">
 function changeMouseOver(btn){  if (! btn.style)
   {  alert('Sorry, your browser does not support this operation.');
    return;  }  btn.style.color = '#2E9AFE';
    btn.style.cursor = 'pointer';  return;
   }  function changeMouseOut(btn)  {
      if (! btn.style)  {  alert('Sorry, your browser does not support this operation.');  return;  }  btn.style.color = '#150517';  btn.style.cursor = 'auto';  return;  }  function changeMouseOverHref(btn)  {  if (!  btn.style)  {  alert('Sorry, your browser does not support this operation.');  return;  }  if(btn.href!= '') btn.style.color = '#2E9AFE';  btn.style.cursor = 'pointer';  return;  }  function changeMouseOutHref(btn)  {  if (! btn.style)  {  alert('Sorry, your browser does not support this operation.');  return;  }  if(btn.href!= '') btn.style.color = '#0A5892';  btn.style.cursor = 'auto';  return;  }
 </script>
 <style type="text/css">
  /* <![CDATA[ */
	#MainMenu { background-color:#B5C7DE; }
	#MainMenu img.icon { border-style:none;vertical-align:middle; }
	#MainMenu img.separator { border-style:none;display:block; }
	#MainMenu img.horizontal-separator { border-style:none;vertical-align:middle; }
	#MainMenu ul { list-style:none;margin:0;padding:0;width:auto; }
	#MainMenu ul.dynamic { background-color:#B5C7DE;z-index:1;margin-left:2px; }
	#MainMenu a { color:#284E98;font-family:Verdana;font-size:1em;text-decoration:none;white-space:nowrap;display:block; }
	#MainMenu a.static { padding:5px 10px 5px 10px;text-decoration:none; }
	#MainMenu a.popout { background-image:url("images/WebResource8b1b.gif?d=ahIMn_Ehg-R9-8xkS0oSTJSEmywPo7DdbAqI7JooWuo0NFCfJrqO3qA-cP-y1PsNakjhka9cowlyKtqd5Sr0QTHhF8yE_7-fjLfAhsZZEcQ1&amp;t=636765680300000000");background-repeat:no-repeat;background-position:right center;padding-right:14px; }
	#MainMenu a.dynamic { width:150px;padding:5px 10px 5px 10px;text-decoration:none;border-style:none; }
	#MainMenu a.static.selected { background-color:#507CD1;text-decoration:none; }
	#MainMenu a.dynamic.selected { background-color:#507CD1;text-decoration:none; }
	#MainMenu a.static.highlighted { color:White;background-color:#284E98; }
	#MainMenu a.dynamic.highlighted { color:White;background-color:#284E98; }
	/* ]]> */
 </style>
 <style type="text/css">
	.MenuTreeView_0 { text-decoration:none; }
	.MenuTreeView_1 { color:Black;font-family:Verdana;font-size:8pt; }
	.MenuTreeView_2 { padding:2px 5px 2px 5px; }
	.MenuTreeView_3 { font-weight:bold; }
	.MenuTreeView_4 {  }
	.MenuTreeView_5 { font-weight:normal; }
	.MenuTreeView_6 {  }
	.MenuTreeView_7 {  }
	.MenuTreeView_8 { background-color:White;border-color:#888888;border-width:1px;border-style:Solid;padding:1px 3px 1px 3px; }
	.MenuTreeView_9 { text-decoration:underline; }
	.MenuTreeView_10 { background-color:#CCCCCC;border-color:#888888;border-style:Solid;text-decoration:underline; }

 </style>
</head>
 <body>
    <div align="center">
        <form method="post" action="http://portal.ruet.ac.bd/bbh/Home.aspx" id="ctl00">
<div class="aspNetHidden">
<input type="hidden" name="MenuTreeView_ExpandState" id="MenuTreeView_ExpandState" value="" />
<input type="hidden" name="MenuTreeView_SelectedNode" id="MenuTreeView_SelectedNode" value="" />
<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" />
<input type="hidden" name="MenuTreeView_PopulateLog" id="MenuTreeView_PopulateLog" value="" />
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE"
value="/wEPDwULLTE4ODI3NTEyMDcPZBYCZg9kFgICAw9kFgQCAw88KwAJAQAPFgYeDU5ldmVyRXhwYW5kZWRkHgxTZWxlY3RlZE5vZGVkHglMYXN0SW5kZXhmZGQCBA9kFgYCAw8PFgIeBFRleHQFKklQOiA0Mi4wLjQuMjUxLCBQQzogNDIuMC40LTI1MS5yb2JpLmNvbS5iZGRkAgUPFgIeC18hSXRlbUNvdW50AgQWCGYPZBYCAgEPDxYCHghJbWFnZVVybAUeU2xpZGVySW1hZ2VIYW5kbGVyLmFzaHg/cXNJZD0yFgIeBXRpdGxlBWRLVUVUIE1haW4gR2F0ZSBDb21wbGV4LCB0aGUgYmVhdXRpZnVsIGNvbnRyaWJ1dGlvbiwgY3JlYXRpb24gYW5kIGRyZWFtIG9mIFZDIHNpciBvZiB0aGlzIFVuaXZlcnNpdHkuZAIBD2QWAgIBDw8WAh8FBR5TbGlkZXJJbWFnZUhhbmRsZXIuYXNoeD9xc0lkPTYWAh8GBUJIYWxsIEJlYXV0eSBhdCBOaWdodC4gV2hvIHN0YXkgYXQgaGFsbCB0aGV5IGFyZSByZWFsbHkgTHVja3kgR3V5cyFkAgIPZBYCAgEPDxYCHwUFHlNsaWRlckltYWdlSGFuZGxlci5hc2h4P3FzSWQ9NxYCHwZlZAIDD2QWAgIBDw8WAh8FBR9TbGlkZXJJbWFnZUhhbmRsZXIuYXNoeD9xc0lkPTEzFgIfBgVNQkFOR0FCQU5ESFUgU0hFSUtIIE1VSklCVVIgUkFITUFOIEhBTEwvS1VFVC8zMC8wMy8yMDE1IA0KQU5OVUFMIEZFQVNULzIwMTQgDQpkAgkPZBYCAgEPPCsACgEADxYEHgtfIURhdGFCb3VuZGcfBAIBZBYCZg9kFgZmDw8WAh4HVmlzaWJsZWhkZAIBD2QWAmYPZBYSAgEPDxYCHwMFAzY4NmRkAgMPDxYCHwMFBDExOTlkZAIFDw8WAh8DBQMyNzJkZAIHDw8WAh8DBQI5M2RkAgkPDxYCHwMFAjg3ZGQCCw8PFgIfAwUDMTMwZGQCDQ8PFgIfAwUDNTUwZGQCDw8PFgIfAwUCNjZkZAIRDw8WAh8DBQEwZGQCAg8PFgIfCGhkZBgCBR5fX0NvbnRyb2xzUmVxdWlyZVBvc3RCYWNrS2V5X18WAQUSY3RsMDAkTWVudVRyZWVWaWV3BSBjdGwwMCRNYWluQ29udGVudCRmdlN0dWRlbnRDb3VudA8UKwAHZGRkZGQWAAIBZKdPTMYNJmrjMiVi vfic5LrsL3cKVl1f2sZcBfrXMUtD" />
 </div>

<script type="text/javascript">
//<![CDATA[
var theForm = document.forms['ctl00'];
if (!theForm) {
    theForm = document.ctl00;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}
//]]>
</script>


<script src="jquery/WebResource5bfe.js" type="text/javascript"></script>


<script src="jquery/ScriptResource4635.js" type="text/javascript"></script>
<script src="jquery/ScriptResource5241.js" type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[

    function TreeView_PopulateNodeDoCallBack(context,param) {
        WebForm_DoCallback(context.data.treeViewID,param,TreeView_ProcessNodeData,context,TreeView_ProcessNodeData,false);
    }
var MenuTreeView_Data = null;//]]>
</script>

<script src="jquery/ScriptResource0eac.js" type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[
if (typeof(Sys) === 'undefined') throw new Error('ASP.NET Ajax client-side framework failed to load.');
//]]>
</script>

<script src="ScriptResourceb67c.js" type="text/javascript"></script>
<div class="aspNetHidden">

	<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="E1120B2C" />
	<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEdAAY5TUZxYvhftq7owwAdc6T9m3pM55eKATZ8t3A3n1eeSh4VRwJ2E1/cNbZDHIoMaY1DjL/yM5tnnhIx3IaT05GBjOBad7JJftaNmFpcYreRyhd/WLDQjQIWNaTQSvj5J5oFEGMdH9mbFkvQEp/2dtA17vPBa7y08B/KX/EHo2mODQ==" />
</div>
        <script type="text/javascript">
//<![CDATA[
Sys.WebForms.PageRequestManager._initialize('ctl00$ScriptManager1', 'ctl00', ['tctl00$MainContent$UpdatePanelMealChart','MainContent_UpdatePanelMealChart'], [], [], 90, 'ctl00');
//]]>
</script>
<div class="page boxshadow" style="background-image:url(images/bg-textura3.png)">
    <div class="header">
        <div style="height: 150px;background-image:url(images/bg-textura3.png);">
            <div style="width: 100px; float:left; height: 100px; padding-left: 4px;margin-top: 4px;"
                align="left">
                <img id="imgLogo" src="images/ruet.png" style="height:105px; margin-top:3px;margin-left:25px;" />
            </div>
            </div>
    </div>
    <div style="background: #B5C7DE;">
        <table width="100%">
            <tr>
                <td>

      <div id="MainMenu">
<ul class="level1">
<li><a class="level1" href="home.php" style="font-size:18px;
font:bold;">Home</a></li>






<li><a class="popout level3" href="#" style="font-size:18px;"onclick="__doPostBack(&#39;ctl00$MainMenu&#39;,&#39;Help&#39;)">
For Provost and hall officer</a>
<ul class="level2">

<li><a class="level4 menualign"style="font-size:15px; font:bold;" href="login.php">
Login</a></li>

<li><a class="level4 menualign"style="font-size:15px; font:bold;" href="Registration.php">
Registration</a></li>
</ul></li>


<li><a class="level1" href="student.php" style="font-size:18px;
font:bold;">Student</a></li>

<li><a class="level1" href="admin_login.php" style="font-size:18px;
font:bold;">Admin</a></li>

<li><a class="level1" href="notice_board.php" style="font-size:18px;
font:bold;">Notice</a></li>
</ul>
</div>

</div><a id="MainMenu_SkipLink"></a>
                </td>
                <td align="right">
                    <div id="datetime">
                        <span id="date"></span><span id="time"></span>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <br>
    <br>
    <br>
    <br>

<div>



</div>

    <div id="hall_slider">
        <div class="container-slider">
            <div id="slider" class="nivoSlider">
                        <a href="">
                        <img id="MainContent_Repeater_ImageUserId_0" title="RUET Main Gate Complex, the beautiful contribution, creation and dream of VC sir of this University."
						src="images/ruetgate.jpeg" style="height:218px;width:726px;" />
						</a>
                         <a href="">
                        <img id="MainContent_Repeater_ImageUserId_1"
						title="Beauty at Night. Who study here they are really Lucky Guys!"
						src="images/ruetnight.jpg" style="height:218px;width:726px;" /></a>
                        <a href=""><img id="MainContent_Repeater_ImageUserId_2"
						title="This is the Shahid President Ziaur Rahman Hall. It is biggest and more wonderful hall of RUET"
						src="images/ziafinal.png" style="height:218px;width:726px;" />
                          </a>
						  <a href="">
                        <img id="MainContent_Repeater_ImageUserId_3"
						title="This is the  Shahid Abdul Hamid Hall.It the most wonderful hall of RUET"
						src="images/Shahid_Abdul_Hamid_Hallfinal.jpg" style="height:218px;width:726px;" />
                        </a>  <a href="">
                        <img id="MainContent_Repeater_ImageUserId_4"
						title="This is the Tin Shed Hall (Extension).It the most wonderful and oldest hall of RUET"
						src="images/tinshedfinal.jpg" style="height:205px;width:720px;" />
                        </a>  <a href="">
                        <img id="MainContent_Repeater_ImageUserId_5"
						title="This is the Shahid Shahidul Islam Hall.It the most wonderful hall of RUET"
						src="images/shahidulhallfinal.jpg" style="height:218px;width:726px;" />
                        </a>  <a href="">
                        <img id="MainContent_Repeater_ImageUserId_6"
						title="This is the Shahid Lt. Selim Hall.It the most wonderful and the second biggest hall of RUET"
						src="images/selimhall.jpg" style="height:218px;width:726px;" />
                        </a>  <a href="">
                        <img id="MainContent_Repeater_ImageUserId_7"
						title="This is the Bangabandhu Sheikh Mujibur Rahman Hall.It the most wonderful and latest hall of RUET"
						src="images/bangabandhufinal.jpg" style="height:218px;width:726px;" />
                        </a>
                        <a href="">
                        <img id="MainContent_Repeater_ImageUserId_8"
						title="This is the Deshratna Sheikh Hasina Hall.It the most wonderful and only one ladies hall of RUET"
						src="images/Sheikhhasinafinal.jpg" style="height:218px;width:726px;" />
                        </a>
                        <a href="">
                        <img id="MainContent_Repeater_ImageUserId_9"
						title="This is the Shahid Minar of RUET"
						src="images/shahidminar.jpg" style="height:218px;width:726px;" />
                        </a>
            </div>
        </div>
    </div>
    <div id="Short_Notice">
        <marquee>
            <div id="MainContent_divImportantNotice" style="font-family: Verdana; font-size: 16px; text-decoration:none; color: Red; padding-left: 10px;
                    padding-right: 10px;">
            </div>
        </marquee>
    </div>

        <legend>Accommodation</legend>
      <p> The university believes that campus life is an important aspect in
      the development process of students. In addition, to provide services
      in assisting students in solving problems that affect their studies,
       the university aims to create an environment conductive to cultural
       development and promotion of interaction among staffs, students and
       intellectuals. The university has six dormitories for the accommodations
       of the students. The total capacity of the dormitories is around 1500.
       Some of the dormitories are named after the national hero who sacrificed
       their lives in the liberation war of Bangladesh in 1971.
       Name of the dormitories with their capacities are listed below:   </p>
       <div class="container">
         <table class="table table-bordered   table-hover table-striped" >
                   <tr class="success tr">
                   <th>Hall name</th>
                   <th>Capacity</th>
                   <?php
                   $query="SELECT * from hall_capacity";
                   $send=mysqli_query($connection,$query);
                   while ($result=mysqli_fetch_array($send))
                 {

                 $hall_name=$result['hall_name'];
                 $capacity=$result['capacity'];
                 echo "<tr>
                 <td>$hall_name</td>
                 <td>$capacity</td>
                 </tr>";
}
                    ?>
                    </table>
</div>
<p>The existing capacity is around 90% of the total number
of students of RUET. All dormitories are set in gardens
and frontal green plantations and lawns and are within
easy walking distance of the University. The students
live in these on community basis, while 2, 3 or 4
students share a single room, depending on its size.
 Each dormitory has a common room facility.
A provost and some assistant provosts administrate each dormitory.
</p>




<script type="text/javascript">
//<![CDATA[
var MenuTreeView_ImageArray =  new Array('', '', '', '/bbh/WebResource.axd?d=SZ7q_Y55DBqZyK434VzYNNFaXdwD-pjT17VRjGN5SZXTBjsdqkgpt37aVpZlXrOB6e7gMLjZ04RdEkJAOLuHYrGis73jgoeBp8V40ExOvaYpG1Ovk6lhe7BzbEUTuo0e0&t=636765680300000000', '/bbh/WebResource.axd?d=_CAmSoO47WJFY5baTmPtYyF0ddm-WTa7mos1BPGoKTXofA1YOTyIDIf_bsSptKe2DnpV6zKcmsad7Rw0YS22gHur44fIjGJ3lHDVaqPYz6km-63Htutg3W13MTJc_DgZ0&t=636765680300000000', '/bbh/WebResource.axd?d=gF154Z9Qxi8tBH_ab3HBlLWHMCVJIxL6s-t7Yuj9HUgqge_lBnr-d7TwjadmuwZrKH4rUxPvMR_8drF94nAwPa1MbwWfqX_skQKAiSOe5TSc1hCAAQRyM4qQ_TskVDVf0&t=636765680300000000');
//]]>
</script>

<script type='text/javascript'>new Sys.WebForms.Menu({ element: 'MainMenu', disappearAfter: 500, orientation: 'horizontal', tabIndex: 0, disabled: false });</script>
<script type="text/javascript">
//<![CDATA[

WebForm_InitCallback();var MenuTreeView_Data = new Object();
MenuTreeView_Data.images = MenuTreeView_ImageArray;
MenuTreeView_Data.collapseToolTip = "Collapse {0}";
MenuTreeView_Data.expandToolTip = "Expand {0}";
MenuTreeView_Data.expandState = theForm.elements['MenuTreeView_ExpandState'];
MenuTreeView_Data.selectedNodeID = theForm.elements['MenuTreeView_SelectedNode'];
MenuTreeView_Data.hoverClass = 'MenuTreeView_10';
MenuTreeView_Data.hoverHyperLinkClass = 'MenuTreeView_9';
(function() {
  for (var i=0;i<6;i++) {
  var preLoad = new Image();
  if (MenuTreeView_ImageArray[i].length > 0)
    preLoad.src = MenuTreeView_ImageArray[i];
  }
})();
MenuTreeView_Data.lastIndex = 0;
MenuTreeView_Data.populateLog = theForm.elements['MenuTreeView_PopulateLog'];
MenuTreeView_Data.treeViewID = 'ctl00$MenuTreeView';
MenuTreeView_Data.name = 'MenuTreeView_Data';
//]]>
</script>
</form>
    </div>
</body>


  </html>
