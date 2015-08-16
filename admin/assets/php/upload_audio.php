<?php
$target_dir = "../../../assets/audio/";

if (($_FILES["audio-file"]["type"] == "audio/mp3") //File type
&& ($_FILES["audio-file"]["size"] < 10000000))  //10MB File Size
  {
  if ($_FILES["audio-file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["audio-file"]["error"] . "<br />";
    }
  else
    {
    echo "Upload complete.&nbsp;";
 
    if (file_exists($target_dir . $_FILES["audio-file"]["name"]))
      {
      echo $_FILES["audio-file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["audio-file"]["tmp_name"],
      $target_dir . $_FILES["audio-file"]["name"]);
      //Confirmation message
      echo "The file ". basename( $_FILES["audio-file"]["name"]). " has been uploaded.";
      }
    }
  }
else
  {
  echo "Only mp3 files under 10MB allowed"; //Error message here if it's to big or wrong extension
  }