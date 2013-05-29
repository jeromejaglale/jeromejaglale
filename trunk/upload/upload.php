<p>

<?php

$uploaddir = '/var/www/upload/docs/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo "<p>";

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
  echo "File successfully uploaded.\n";
} else {
   echo "Upload failed";
	echo '<pre>';
	echo 'Here is some more debugging info:';
	print_r($_FILES);
	print "</pre>";
}

?>
</p>

<p><a href="index.html">Send another file</a></p>
<p><a href="docs">See sent files</a></p>