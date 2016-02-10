<?php
if (isset($_POST['upload']) && $_POST['upload'] == 'Upload') {
  // Get the temporary filename and path
  $tmp = $_FILES['file_up']['tmp_name'];
  // Get the original filename
  $filename = basename($_FILES['file_up']['name']);
  
  // Get image metadata
  if ($img = getimagesize($tmp)) { 
    // Move the file from the temporary location to the current directory with
    // the original name intact
    if (!move_uploaded_file($tmp, $filename)) {
      throw Exception('Unable to save file.');
    }
  }
}

// Confirm that our new file exists
if (isset($filename) && file_exists($filename)) {
  // Set the content type header, using the MIME type from getimagesize
  header('Content-type:' . $img['mime']);
  
  // The poorly named readfile() reads the contents of the file and immediately
  // writes them to a screen. This is equivalent to reading the file to a 
  // variable and simply echoing the contents.
  readfile($filename);
  
  // Stop execution here.
  exit();
}
else {
?>
<!doctype html>
<html>
<head>
  <title>Lecture #19 Example - Uploads</title>
</head>
<body>
<form enctype="multipart/form-data" action="upload.php" method="post">
<input name="file_up" type="file"/>
<input name="upload" type="submit" value="Upload"/>
</form>

</body>
</html>
<?php } ?>
