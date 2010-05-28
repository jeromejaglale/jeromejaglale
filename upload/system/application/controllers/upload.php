<?php

class Upload extends Controller {

	function Upload()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->load->view('upload');
	}
	
	function upload_file()
	{
			/*
	This is an upload script for SWFUpload that attempts to properly handle uploaded files
	in a secure way.

	Notes:
	
		SWFUpload doesn't send a MIME-TYPE. In my opinion this is ok since MIME-TYPE is no better than
		 file extension and is probably worse because it can vary from OS to OS and browser to browser (for the same file).
		 The best thing to do is content sniff the file but this can be resource intensive, is difficult, and can still be fooled or inaccurate.
		 Accepting uploads can never be 100% secure.
		 
		You can't guarantee that SWFUpload is really the source of the upload.  A malicious user
		 will probably be uploading from a tool that sends invalid or false metadata about the file.
		 The script should properly handle this.
		 
		The script should not over-write existing files.
	
		The script should strip away invalid characters from the file name or reject the file.
	
		The script should not allow files to be saved that could then be executed on the webserver (such as .php files).
		 To keep things simple we will use an extension whitelist for allowed file extensions.  Which files should be allowed
		 depends on your server configuration. The extension white-list is _not_ tied your SWFUpload file_types setting
	
		For better security uploaded files should be stored outside the webserver's document root.  Downloaded files
		 should be accessed via a download script that proxies from the file system to the webserver.  This prevents
		 users from executing malicious uploaded files.  It also gives the developer control over the outgoing mime-type,
		 access restrictions, etc.  This, however, is outside the scope of this script.
	
		SWFUpload sends each file as a separate POST rather than several files in a single post. This is a better
		 method in my opinions since it better handles file size limits, e.g., if post_max_size is 100 MB and I post two 60 MB files then
		 the post would fail (2x60MB = 120MB). In SWFupload each 60 MB is posted as separate post and we stay within the limits. This
		 also simplifies the upload script since we only have to handle a single file.
	
		The script should properly handle situations where the post was too large or the posted file is larger than
		 our defined max.  These values are not tied to your SWFUpload file_size_limit setting.
	
	*/

	// Code for Session Cookie workaround
		if (isset($_POST["PHPSESSID"])) {
			session_id($_POST["PHPSESSID"]);
		} else if (isset($_GET["PHPSESSID"])) {
			session_id($_GET["PHPSESSID"]);
		}

		session_start();

	// Check post_max_size (http://us3.php.net/manual/en/features.file-upload.php#73762)
		$POST_MAX_SIZE = ini_get('post_max_size');
		$unit = strtoupper(substr($POST_MAX_SIZE, -1));
		$multiplier = ($unit == 'M' ? 1048576 : ($unit == 'K' ? 1024 : ($unit == 'G' ? 1073741824 : 1)));

		if ((int)$_SERVER['CONTENT_LENGTH'] > $multiplier*(int)$POST_MAX_SIZE && $POST_MAX_SIZE) {
			header("HTTP/1.1 500 Internal Server Error"); // This will trigger an uploadError event in SWFUpload
			echo "POST exceeded maximum allowed size.";
			exit(0);
		}

	// Settings
		$save_path = getcwd() . "/files/";				// The path were we will save the file (getcwd() may not be reliable and should be tested in your environment)
		$upload_name = "Filedata";
		$max_file_size_in_bytes = 2147483647;				// 2GB in bytes
		$extension_whitelist = array("jpg", "gif", "png", "zip");	// Allowed file extensions
		$valid_chars_regex = '.A-Z0-9_ !@#$%^&()+={}\[\]\',~`-';				// Characters allowed in the file name (in a Regular Expression format)
	
	// Other variables	
		$MAX_FILENAME_LENGTH = 260;
		$file_name = "";
		$file_extension = "";
		$uploadErrors = array(
		    0=>"There is no error, the file uploaded with success",
		    1=>"The uploaded file exceeds the upload_max_filesize directive in php.ini",
		    2=>"The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
		    3=>"The uploaded file was only partially uploaded",
		    4=>"No file was uploaded",
		    6=>"Missing a temporary folder"
		);


	// Validate the upload
		if (!isset($_FILES[$upload_name])) {
			$this->handle_error("No upload found in \$_FILES for " . $upload_name);
			exit(0);
		} else if (isset($_FILES[$upload_name]["error"]) && $_FILES[$upload_name]["error"] != 0) {
			$this->handle_error($uploadErrors[$_FILES[$upload_name]["error"]]);
			exit(0);
		} else if (!isset($_FILES[$upload_name]["tmp_name"]) || !@is_uploaded_file($_FILES[$upload_name]["tmp_name"])) {
			$this->handle_error("Upload failed is_uploaded_file test.");
			exit(0);
		} else if (!isset($_FILES[$upload_name]['name'])) {
			$this->handle_error("File has no name.");
			exit(0);
		}
	
	// Validate the file size (Warning: the largest files supported by this code is 2GB)
		$file_size = @filesize($_FILES[$upload_name]["tmp_name"]);
		if (!$file_size || $file_size > $max_file_size_in_bytes) {
			$this->handle_error("File exceeds the maximum allowed size");
			exit(0);
		}
	
		if ($file_size <= 0) {
			$this->handle_error("File size outside allowed lower bound");
			exit(0);
		}


	// Validate file name (for our purposes we'll just remove invalid characters)
		$file_name = preg_replace('/[^'.$valid_chars_regex.']|\.+$/i', "", basename($_FILES[$upload_name]['name']));
		if (strlen($file_name) == 0 || strlen($file_name) > $MAX_FILENAME_LENGTH) {
			$this->handle_error("Invalid file name");
			exit(0);
		}


	// Validate that we won't over-write an existing file
		if (file_exists($save_path . $file_name)) {
			$this->handle_error("File with this name already exists");
			exit(0);
		}

	// Process the file
		/*
			At this point we are ready to process the valid file. This sample code shows how to save the file. Other tasks
			 could be done such as creating an entry in a database or generating a thumbnail.
			 
			Depending on your server OS and needs you may need to set the Security Permissions on the file after it has
			been saved.
		*/
		if (!@move_uploaded_file($_FILES[$upload_name]["tmp_name"], $save_path.$file_name)) {
			$this->handle_error("File could not be saved.");
			exit(0);
		}

		exit(0);	}
	
		/* Handles the error output. This error message will be sent to the uploadSuccess event handler.  The event handler
	will have to check for any error messages and react as needed. */
	function handle_error($message) {
		echo $message;
	}

}

/* End of file */

