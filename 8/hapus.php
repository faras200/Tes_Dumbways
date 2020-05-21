<?php 

require 'functions.php';

$id_course = $_GET["id_course"];

if (hapus($id_course) > 0)  {
	echo "
				<script>
					alert('Data berhasil dihapus!');
					document.location.href = 'index.php';
				</script>
			";
}else{
	echo "
				<script>
					alert('Data gagal dihapus!');
					
				</script>
			";
}



 ?>