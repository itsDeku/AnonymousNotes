<?php
    $id = $_GET['q'];
    $uniqID = uniqid();
    $inp = file_get_contents("notes/$id.json");
    $tempArray = json_decode($inp,true);
    $imgbase = $_POST['hidden_data'];
    @$myObj->img = "images/$uniqID.png";
    @$myObj->text = $_POST['uText'];
    
   
    array_push($tempArray, $myObj);
    $jsonData = json_encode($tempArray);
    file_put_contents("notes/$id.json", $jsonData);

    
    
    
    $data = base64_decode($imgbase);
    $file = "images/$uniqID.png";
    $success = file_put_contents($file, $data);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/css.css">
    <title>Anonymous Notes</title>
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
  <div class="container">
    <div class="jumbotron notes-btn bg-light text-dark text-center my-5">
      <h1>Done!!</h1>
    </div>
    <div class="container">
      <a class="notes-btn btn btn-lg btn-block bg-dark text-light box-shadow" href="https://yourbuddyxyz.000webhostapp.com/posts.php?q=<?php echo $id?>">View Post</a>
    </div>
  </div>
  <footer class="page-footer fixed-bottom font-small bg-light" >

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