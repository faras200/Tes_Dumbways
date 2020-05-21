<?php 
	
	require 'functions.php';

	//ambil data di url

	$id_course = $_GET["id_course"];
	//query berdasarkan id
    $course = query("SELECT * FROM course, author WHERE course.id_author = author.id_author  AND id_course = $id_course")[0] ;
    
    $content = query("SELECT * FROM content WHERE id_course = $id_course")[0];
    // var_dump($content); die;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Corse</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container mt-5">
        <div class="row">
                <div class="col-md-10 offset-md-1 text-center">
                    <h1><?= $course["nama"]; ?></h1>
                    <img src="gambar/<?= $course["thumbnail"]; ?>" width="60%">
                    <p>Author : <?= $course["name"]; ?></p>
                    <h2>Description</h2>
                    <p><?= $course["deskripsi"]; ?></p>
                    <h2>Type</h2>
                    <p><?= $content["type"]; ?></p>
                    <h2>Video</h2>
                    <p>Link : <a href="https://youtube.com"><?= $content["video_link"]; ?></a></p>
                    <h2>Duration</h2>
                    <p><?= $course["duration"]; ?></p>

                    <a class="btn btn-secondary mb-5" href="index.php"><< Ke Home</a>
                </div>
        </div>
    </div>

</body>
</html>