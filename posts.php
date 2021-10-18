<?php
  $id = $_GET['q'];
  $jsonfile = file_get_contents("notes/$id.json") or die('cannot open the file');
  $json = json_decode($jsonfile, true);
   if(isset($json[0]['text'])){
    $utext = $json[0]['text'];
  }else{
    $utext = "be the first one to write something";
  }
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
    var imgLoc = [];
    var text = [];
  <?php
    $maxCount = count($json)-3;
    echo "var maxCount = ".$maxCount."\n";
  for($i=0; $i < count($json) - 2; $i++){
    echo "imgLoc[$i]='".$json[$i]['img']."';\n";
    echo "text[$i]  ='".$json[$i]['text']."';\n"; 
  }
  ?>  
  function chanDrawSize(){
    var texts = document.getElementById("text");
    var drawBoard = document.getElementById("imagePos");
    document.getElementById("loading").style = "display:none";
    document.getElementById("main").style = "display:block/inline";
    drawBoard.style = "width:"+texts.clientWidth+"px;height:100%";
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
  var count = 0 ;
  function next() {
    if(count < maxCount){
      count++;
      document.getElementById("imagePos").src = imgLoc[count];
      document.getElementById("text").value = text[count];
    }
  }
  function prev() {
    if(count > 0){
      count--;
      document.getElementById("imagePos").src = imgLoc[count];
      document.getElementById("text").value = text[count];
    }
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
  <div id="main" class="container" img="gieonkXkT.png" style="display:none">
    <div class="parent"><img src="gieonkXkT.png" style="width:100%;height:100%" alt=""></div>
    <div class="container2" >
      <div class="textarea" style="padding-bottom: 0px;">
      <textarea class="uText" readonly id="text"  name="" maxlength="512" wrap rows="6" cols="32" style="width:100%"  ><?php echo $utext;?></textarea>
      </div>
      <div class="draw" style="padding-top: 0px;padding-bottom:20px">
        <img id="imagePos" src="<?php echo $json[0]['img']?>" width="250" height="250" style="border: 0px">
      </div>
    </div>
    <div class="container">
      <input id="uText" type="text" name="uText" hidden>
			<input name="hidden_data" id='hidden_data' type="hidden"/>
      <div class="row mt-2 mb-5">
        <div class="notes-btn btn-prev col-4"><a class="btn btn-lg btn-block bg-dark text-light box-shadow" onclick="prev();">prev</a></div>
        <div class="col-4"></div>
        <div class="notes-btn btn-next col-4"><a class="btn btn-lg btn-block bg-dark text-light box-shadow" onclick="next();">next</a></div>
      </div>
    </div>
  </div>
  
  <footer id="bottom-footer" class="page-footer font-small bg-light" >

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
      <a href="https://yourbuddyxyz.000webhostapp.com/index.php">Anonymous Notes</a>
    </div>
    <!-- Copyright -->

  </footer>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
</body>
</html>