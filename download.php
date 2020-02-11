<?php include 'check.php'; ?>
<?php include 'connection.php'; ?>
<?php
	
	// if (!empty($_GET['file'])) {
	// 	$fileName = basename($_GET['file']);
	// 	$filePath = 'files/'.$fileName ;

	// 	if (!empty($fileName) && file_exists($filePath)) {
			
	// 		header("Cache-Control: public");
	// 		header("Content-Description: File Transfer");
	// 		header("Content-Disposition: attachment; filename=$fileName");
	// 		header("Content-Type: application/html,xls");
	// 		header("Content-Transfer-Encoadind: binary");

	// 		readfile($filePath);
	// 		exit;
	// 	}else{
	// 		echo "The file does not exist.";
	// 	}
	// }
	

	$name = $_GET['name'];

		header('Content-Description: File Transfer');
		header('Content-Type: application/force-download');
		header("Content-Disposition: attachment; filename=\"" . basename($name) . "\";");
		header('Content-Transfer-Encoadind: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: '. filesize($name));
		ob_clean();
		flush();
		readfile("your_file_path/".$name);
		exit;
?>


