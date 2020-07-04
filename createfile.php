<?php 

if(isset($_POST['Download'])){
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "misc";
    $timestamp = time();
    //Get form values
    $firstname = htmlentities($_POST['firstname']);
    $lastname = htmlentities($_POST['lastname']);
    $addr = htmlentities($_POST['address']);
    $village = htmlentities($_POST['village']);
    $city = htmlentities($_POST['city']);
    $taluka = htmlentities($_POST['taluka']);
    $district = htmlentities($_POST['district']);
    $rstate = htmlentities($_POST['state']);
    $jurisdiction = htmlentities($_POST['jurisdiction']);
    $email = htmlentities($_POST['email']);
    $contact = htmlentities($_POST['contact']);
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    

    $sql = "INSERT INTO STUsers (firstname, lastname, addr, village, city, taluka, district, rstate, jurisdiction, email, contact)
    VALUES ('$firstname', '$lastname', '$addr', '$village', '$city', '$taluka', '$district', '$rstate', '$jurisdiction', '$email', '$contact')";
    if ($conn->query($sql) === TRUE) {
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();


    //File handling
    $myfile = fopen("./secret_key.txt", "w") or die("Unable to open file!");
    fwrite($myfile, $timestamp."\n\n");
    fwrite($myfile, $firstname." ");
    fwrite($myfile, $lastname."\n\n");
    fwrite($myfile, $addr."\n\n");
    fwrite($myfile, $village."\n");
    fwrite($myfile, $city."\n");
    fwrite($myfile, $taluka."\n");
    fwrite($myfile, $district."\n");
    fwrite($myfile, $rstate."\n");
    fwrite($myfile, $jurisdiction."\n");
    fwrite($myfile, $email."\n");
    fwrite($myfile, $contact."\n");
    fclose($myfile);

    //Zip file
   /* create a compressed zip file */
function createZip($files = array(), $destination = '', $overwrite = false) {
    if(file_exists($destination) && !$overwrite) { return false; }
      $validFiles = [];
     if(is_array($files)) {
        foreach($files as $file) {
           if(file_exists($file)) {
              $validFiles[] = $file;
           }
        }
     }
      if(count($validFiles)) {
       $zip = new ZipArchive();
        if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
           return false;
        }
         foreach($validFiles as $file) {
           $zip->addFile($file,$file);
        }
         $zip->close();
       return file_exists($destination);
    }else{
       return false;
    }
 }
 
 
 $fileName = 'my-archive-'.$timestamp.'.zip';
 $files_to_zip = ['secret_key.txt','app-debug.apk'];
 $result = createZip($files_to_zip, $fileName);
 //Download and delete created file on server
 header("Content-Disposition: attachment; filename=\"".$fileName."\"");
 header("Content-Length: ".filesize($fileName));
 readfile($fileName);

  if (file_exists($filename)) {
     header('Content-Type: application/zip');
     header('Content-Disposition: attachment; filename="'.basename($filename).'"');
     header('Content-Length: ' . filesize($filename));

     flush();
     readfile($filename);
     // delete file
     unlink($filename);
     unlink($myfile);
  }
  else{
      echo "Does not exist";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Ready</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script>

</head>
<body>
    <form action="createfile.php" method="post">
    <?php foreach( $_POST as $key => $val ): ?>
                <input type="hidden" name="<?= htmlspecialchars($key, ENT_COMPAT, 'UTF-8') ?>" value="<?= htmlspecialchars($val, ENT_COMPAT, 'UTF-8') ?>">
            <?php endforeach; ?>
            <input type="hidden" name="Download" value="ready" />
            <button class="btn btn-primary">Download</button>
            </form>
</body>
</html>