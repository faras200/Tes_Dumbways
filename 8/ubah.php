<?php 
	
	require 'functions.php';

	//ambil data di url

	$id_course = $_GET["id_course"];
	//query berdasarkan id
	$course = query("SELECT * FROM course WHERE id_course = $id_course")[0];
	// var_dump($course); die;

	if (isset($_POST["submit"]) ) {
        //  var_dump($_POST); die;
        
        if (empty($_POST["author"])){
			echo "
				<script>
					alert('Nama Author harus dipilih!');
					document.location.href = 'ubah.php';
				</script>
			";
		}
		if(ubah($_POST) > 0){

			echo "
				<script>
					alert('Data berhasil diubah!');
					document.location.href = 'index.php';
				</script>
			";
		}else{

			echo "
				<script>
					alert('Data gagal diubah!');
					document.location.href = ubah.php;
				</script>
			";
		}
	}

 ?>
<!DOECTYPE html>
<html>
    <head>
        <title>
            Ubah
        </title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <header class="header">
            <h1 class="h1 text-center mt-4 mb-5">UBAH COURSE</h1>
        </header>
        <div class="container text-center">
            <div class="col-md-8 offset-md-2">
                <a class="btn btn-secondary mb-5" href="index.php"><< Ke Home</a>
				<form class="form pt-3 mb-3" action="" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?= $course["id_course"] ?>">
                <input type="hidden" name="thumbLama" value="<?= $course["thumbnail"] ?>">
		
                    <div class="form-group mb-4">
                        <label for="name">Nama :</label>
                        <input type="text" id="name" name="name" required value="<?= $course["nama"]?>" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label for="thumb">Thumnail :</label>
                        <img src="gambar/<?= $course["thumbnail"]?>" width="500px">
                        <input type="file" id="thumb" name="thumbnail"  class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label>Author :</label>
                        <select name="author" required class="form-contro custom-select" >
				            <option disabled selected> Pilih </option>
				            <?php 
				                $author = query("SELECT * FROM author");
				                foreach($author as $row) :
				            ?>
				            <option  value="<?=$row['id_author']?>"><?=$row['name']?></option> 
				            <?php endforeach ?>
			            </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="durasi">Durasi :</label>
                        <input type="text" id="durasi" name="durasi" required value="<?= $course["duration"]?>"  class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label for="deskripsi">Deskripsi :</label>
                        <input type="text" id="deskripsi" name="deskripsi" required value="<?= $course["deskripsi"]?>"  class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <button type="submit" name="submit" class="btn btn-primary">Ubah !!</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

