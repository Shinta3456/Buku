<?php 

include "koneksi.php";

$id = $_GET['id_buku'];

if( isset($_POST["submit"])){
    $judul_buku = $_POST["judul_buku"];
    $penulis = $_POST["penulis"];
    $jenis_buku = $_POST["jenis_buku"];
    
    mysqli_query($koneksi, "update buku set judul_buku='$judul_buku', penulis='$penulis', jenis_buku='$jenis_buku' where id_buku='$id'");

    if( mysqli_affected_rows($koneksi) > 0){
        echo "<script>alert('Data berhasil di UPDATE');
        document.location.href = 'index.php';</script>";
    } else{
        echo "<script>alert('Data gagal di UPDATE')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Update Data Buku</title>
</head>
<body style="background-color: #FFFACD; font-family: fantasy;">
    <h1 align="center">Update Data Buku</h1>
<form action="" method="post">
    <table align="center">
    <?php 
    $id = $_GET['id_buku'];
    $result = mysqli_query($koneksi, "select * from buku where id_buku='$id'");
    while($row = mysqli_fetch_assoc($result)):?>
    <tr>
        <td> Judul Buku</td>
        <td>:</td>
        <td><input type = "text" name = "judul_buku"></td> 
    </tr> 
    <tr>
        <td>Penulis</td>
        <td>:</td>
        <td><input type="text" name = "penulis"></td>
    </tr>
    <tr>
        <td>Jenis Buku</td>
        <td>:</td>
        <td><input type = "text" name = "jenis_buku"></td> 
    </tr> 
    <tr>
        <td>Gambar Buku</td>
        <td>:</td>
        <td><input type = "file" name = "gambar_buku"></td> 
    </tr> 
    <tr>
         <td><button type="submit" class="btn btn-outline-warning mt-3 pr-3 pl-3" style="margin-left: 15rem;" name="submit">Simpan</button></td>
    </tr>
</table>
<?php endwhile; ?>
</form>
 <!-- Option 1: Bootstrap Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>