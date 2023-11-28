<?php
	$file = 'lawnright.pdf';
	$filename = 'lawnright.pdf';
	header('Content-type: application/pdf');
	header('Content-Deposition: inline; filename="' . $filename . '"');
	header('Content-Transfer-Encoding: binary');
	header('Accept-Ranges: bytes');
	@readfile($file);
?>