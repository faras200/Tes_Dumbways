<?php

    $koneksi = mysqli_connect("localhost", "root", "","web_course");

    function query($query){
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while ($row = mysqli_fetch_array($result))
        {
            $rows[] = $row;
        }
        return $rows;
    }

    function addCourse($data){

      global $koneksi;
      $nama = $data["name"];
      $author = $data["author"];
      $durasi = $data["durasi"];
      $deskripsi = $data["deskripsi"];
      $thumb = upload();
      if( !$thumb){
          return false ;
      }

      $query = "INSERT INTO course VALUES ('', '$nama', '$thumb', '$author', '$durasi', '$deskripsi')";

      mysqli_query($koneksi, $query);

      return mysqli_affected_rows($koneksi);
  }

  function upload(){
    $namaFile = $_FILES['thumbnail']['name'];
    $ukuranFile = $_FILES['thumbnail']['size'];
    $error = $_FILES['thumbnail']['error'];
    $tmpName = $_FILES['thumbnail']['tmp_name'];

    //cek apakah tidak ada thumbnail yang diupload
    if($error === 4){
        echo "<script>
        alert('Pilih thumbnail terlebih dahulu');
    </script>";
    return false;
    }

    // cek apakah yg di upload adalah thumbnail
    $ekstesithumbnailValid = ['jpg', 'jpeg', 'png'];
    $ekstensithumbnail = explode('.',$namaFile);
    $ekstensithumbnail = strtolower(end($ekstensithumbnail));
    if(!in_array($ekstensithumbnail, $ekstesithumbnailValid)){
        echo "<script>
        alert('Yang anda upload bukan thumbnail!');
    </script>";
    return false ;
    }

    //cek jika ukurannya terlalu besar
    if($ukuranFile > 5000000){
        echo "<script>
        alert('thumbnail terlalu besar!');
    </script>";
    return false ;
    }

    //lolos pengecekan thumbnail siap diupload
    //generate nama baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensithumbnail;

    move_uploaded_file($tmpName,'gambar/'. $namaFileBaru);
    return $namaFileBaru;
}


    function addAuthor($data){

      global $koneksi;
      $nama = $data["name"];

      $query = "INSERT INTO author VALUES ('', '$nama')";

      mysqli_query($koneksi, $query);

      return mysqli_affected_rows($koneksi);
  }

    function addContent($data){

        global $koneksi;
        $nama = $data["name"];
        $link = $data["vlink"];
        $tipe = $data["tipe"];
        $course = $data["course"];

        $query = "INSERT INTO content VALUES ('', '$nama', '$link', '$tipe', '$course')";

        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }

    function hapus($id_course){

      global $koneksi;
      mysqli_query($koneksi, "DELETE FROM course WHERE id_course = $id_course");
      return mysqli_affected_rows($koneksi);

  }

  function ubah($data){

    global $koneksi;
    $id = $data["id"];
    $nama = $data["name"];
    $author = $data["author"];
    $durasi = $data["durasi"];
    $deskripsi = $data["deskripsi"];
    $thumbLama = $data["thumbLama"];
    //cek apakah user pilih gambar baru atau tidak
    if ($_FILES['thumbnail']['error'] === 4) {
      $thumb = $thumbLama;
    }else{
      $thumb = upload();
    }
  
    $query = "UPDATE course SET  
          nama = '$nama',
          thumbnail = '$thumb',
          id_author = '$author',
          duration = '$durasi',
          deskripsi = '$deskripsi'
          WHERE id_course = $id
          ";
  
      mysqli_query($koneksi, $query);
  
      return mysqli_affected_rows($koneksi);
  } 
  

    

?>