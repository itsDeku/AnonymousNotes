<?php
  $id = $_GET['q'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/loadani.css">
    <link rel="stylesheet" href="css/css.css">
    <title>Anonymous Notes</title>
  <script>
  //ajex for those maderchod loading event bohout hi karab lag raha hai wo maderchod
    
    
  //
  function f_submit() {
    var input = document.getElementById("text");
		var sText = document.getElementById("uText");
    var temp = sText.value.replace(/&#13;&#10;/g,' ');
		alert(temp);
		var templen = temp.length;
		alert(templen);
    alert(input.value);
		var newtemp = input.value.slice(templen);
		alert(newtemp);
		sText.value += newtemp;
		alert(sText.value);
  }
	function GetChar (event){
		var input = document.getElementById("text");
		var sText = document.getElementById("uText");
			
    if(event.keyCode==13){
			if(sText.value.length==0){
				var temp = sText.value;
			}else{
				var temp = sText.value.replace(/&#13;&#10;/g,' ');
			}
			var templen = temp.length;
			var newtemp = input.value.slice(templen);
			sText.value += newtemp+"&#13;&#10;";
		}
  }
  //
  function chanDrawSize(){
    var texts = document.getElementById("text");
    var drawBoard = document.getElementById("drawCanvas");
    
    document.getElementById("loading").style = "display:none";
    document.getElementById("main").style = "display: block/inline";
    drawBoard.style = "width:"+texts.clientWidth+"px";
    console.log(texts.clientWidth);
    reloadPage();
  }
  function reloadPage() {
    var currentDocumentTimestamp = new Date(performance.timing.domLoading).getTime();
    // Current Time //
    var now = Date.now();
    // Total Process Lenght as Minutes //
    var tenSec = 10 * 1000;
    // End Time of Process //
    var plusTenSec = currentDocumentTimestamp + tenSec;
    if (now > plusTenSec) {
        location.reload();
        }
    }

  function holdBoard(btn) {
    htBody = document.getElementsByTagName("BODY")[0];
    nav = document.getElementsByTagName("nav")[0];
    if(btn.dataset.pressed=="false"){
      btn.dataset.pressed="true";
      btn.className = "btn bg-danger btn-sm text-dark";
      htBody.style="position:fixed;";
      nav.style="display:none;";
    } else {
      btn.dataset.pressed="false";
      btn.className = "btn bg-dark btn-sm text-light box-shadow";
      htBody.style="";
      nav.style="";
    } 
  }
  function clearDraw() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
  }
  function downloadCanvas(){
    var img    = canvas.toDataURL("image/png");
    document.write('<img src="'+img+'"/>');
  }
  function download() {
  var download = document.getElementById("download");
  var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream")
  console.log(image);
  download.download = "jdi.png";
  download.setAttribute("href","");
  //download.setAttribute("download","archive.png");
  }  
  function newfun(){
    var image = canvas.toDataURL("image/png").replace("data:image/png;base64,", "");
    document.getElementById('uText').value = document.getElementById('text').value;
    document.getElementById('hidden_data').value = image;
  }
  </script>
</head>
<body onload="chanDrawSize();" style="">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><b>AnonymousNotes</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

      <!-- Links -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="https://yourbuddyxyz.000webhostapp.com/index.php">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
      </ul>
    </div>
   </nav>
   <div id="loading" class="loading">
    <div class="box loadingio-spinner-double-ring-4x3bmhfhz0s">
      <div class="ldio-detv305mu">
        <div></div>
        <div></div>
        <div><div></div></div>
        <div><div></div></div>
      </div>
    </div>
  </div>
  <div id="main" class="container" img="gieonkXkT.png" style="display:none" >
    <div class="parent"><img id="notepng" src="gieonkXkT.png" style="width:100%;height:100%" alt=""></div>
    <div class="container2" >
      <div class="textarea" style="padding-bottom: 0px;">
      <textarea class="uText" id="text" name="" maxlength="512" wrap rows="6" cols="32" style="width:100%" placeholder="write something here&#13;&#10;and draw something at bottom" ></textarea>
      </div>
      <div class="draw" style="padding-top: 0px;padding-bottom:20px">
        <canvas id="drawCanvas" width="250" height="240" style="border: 1px solid red;"></canvas>
      </div>
    </div>
    <form method="POST" action="upload.php?q=<?php echo $id ?>" accept-charset="utf-8" name="form1">
      <input id="uText" type="text" name="uText" hidden>
			<input name="hidden_data" id='hidden_data' type="hidden"/>
      <div class="row mt-2 mb-5">
        <div class="notes-btn notes-btn-fixed col-4"><span class="btn btn-sm bg-dark text-light box-shadow" data-pressed="false"  onclick="holdBoard(this);"><span>bg-fixed</span></span></div>
        <div class="notes-btn notes-btn-clear col-4"><span class="btn btn-sm btn-outline-light box-shadow bg-light text-dark" onclick="clearDraw();">clear</span></div>
        <div class="notes-btn notes-btn-post col-4"><button class="btn btn-md btn-outline-light box-shadow bg-light text-dark" type="submit" onclick="newfun();">Post</button></div>
      </div>
		</form>
  </div>
  
  <footer id="bottom-footer" class="page-footer font-small bg-light" >

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
      <a href="https://yourbuddyxyz.000webhostapp.com/index.php">Anonymous Notes</a>
    </div>
    <!-- Copyright -->

  </footer>
  <script src="draw.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
</body>
</html>