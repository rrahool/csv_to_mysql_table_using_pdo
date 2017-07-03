<?php 
	session_start();

	$extension= end(explode(".", basename($_FILES['file']['name'])));

	if (isset($_FILES['file']) && $extension== 'csv')
	{  

    $file = $_FILES['file']['tmp_name']; 

    $handle = fopen($file, "r"); 

    	try { 

			$dbh = new PDO("mysql:host=localhost;dbname=db_atomic_project", "root", "");
			$STMR = $dbh->prepare("TRUNCATE TABLE tbl_csv_upload");
			$STMR->execute();

			$STM = $dbh->prepare("INSERT INTO tbl_csv_upload (`name`, `email`) VALUES (?, ?)");

			if ($handle !== FALSE)
			{
				fgets($handle);

				while (($data = fgetcsv($handle, 1000, ',')) !== FALSE)
				{
				$STM->execute($data);
				}
				fclose($handle);

				$dbh = null;

				header( "location:index.php?data=112233");


			}

    	} catch(PDOException $e) {

        	die($e->getMessage());

    	}


	}
	else 
	{
	// Error mesage id File type is not CSV or File Size is greater then 10MB.
    	header( "location:index.php?data=404");
	}
?>