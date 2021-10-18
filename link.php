<?php
  $sNotes = $_GET['sNote'];
  $id = uniqid();
  @$myObj->id = $id;
  $myObj->sNote = $sNotes;
  $myJSON = json_encode($myObj);
  $myfile = fopen("notes/".$id.'.json','w') or die("file cannot be open");
  fwrite($myfile,$myJSON);
  fclose($myfile);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/fornt.css">
    <link rel="stylesheet" href="css/pop.css">
    <title>Anonymous Notes</title>
  <script>
  function copyText() {
      var popup = document.getElementById("myPopup");
      popup.classList.toggle("show");
      /* Get the text field */
      var copyText = document.getElementById("link");

      /* Select the text field */
      copyText.select();
      copyText.setSelectionRange(0, 99999); /*For mobile devices*/

      /* Copy the text inside the text field */
      document.execCommand("copy");
    } 
  </script>
</head>
<body>
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
    <div class="container my-5">
        <div class="jumbotron bg-light">
            <textarea name="" id="link" readonly cols="30" rows="3" style="border:none;resize:none;">https://yourbuddyxyz.000webhostapp.com/front.php?q=<?php echo $id ?></textarea>
        </div>
        <div id="link" class="notes-btn btn box-shadow popup btn-lg btn-block btn-dark text-light mt-3" onclick="copyText();">Click me!
        <span class="popuptext" id="myPopup">Copied!</span>
        </div>
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