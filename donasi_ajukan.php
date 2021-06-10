<?php
    include 'config/koneksi.php';
    $profil = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM user WHERE id_user = '$_SESSION[id_user]'"));
    $tgl = date('Y-m-d');
    if(isset($_POST['ajukan'])){
        $ekstensi_diperbolehkan	= array('png','jpg');
        $nama = $_FILES['bukti']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower(end($x));
        $ukuran	= $_FILES['bukti']['size'];
        $file_tmp = $_FILES['bukti']['tmp_name'];
        move_uploaded_file($file_tmp, 'assets/'.$nama);
        $sql = mysqli_query($con, "INSERT INTO donasi VALUES('', '$_POST[namaP]', '$_POST[ktp]', '$_POST[kota]'
        , '$_POST[jKanker]', '$_POST[dKanker]', '$_POST[jKanker]', '$tgl', '$_POST[target]', 'TUTUP', '$nama')");

        if($sql){
            echo "<script>alert('Berhasil Dikirim');document.location.href='donasi_berhasil_diajukan.php'</script>";
        }else{
            echo "<script>alert('Maaf, Gagal Dikirim');document.location.href='donasi_ajukan.php'</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tailwind.css">
    <title>Daftar</title>
</head>
<body>
    <div class="grid justify-items-center w-full min-h-screen">
        <div class="grid self-center">
            <center><img src="assets/37ee585734f72e6bd2d3102f6994813b.png" width="75px" style="transform: translateY(35px);"></center>
            <div class="bg-red-100 shadow-lg overflow-hidden max-w-lg rounded-2xl self-center p-10">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 gap-4">
                        <b class="text-center mt-3 font-bold text-xl">Ajukan donasi dan bantu sesama!</b>
                        <input type="text" name="namaP" class="py-2 px-5 rounded-3xl placeholder-red-500 w-96" placeholder="Nama Penderita Kanker">
                        <input type="text" name="ktp" class="py-2 px-5 rounded-3xl placeholder-red-500 w-96" placeholder="No KTP Pengaju">
                        <input type="text" name="kota" class="py-2 px-5 rounded-3xl placeholder-red-500 w-96" placeholder="Kota Asal Penderita">
                        <input type="text" name="jKanker" class="py-2 px-5 rounded-3xl placeholder-red-500 w-96" placeholder="Judul Donasi">
                        <textarea name="dKanker" class="py-2 px-5 rounded-3xl placeholder-red-500 w-96" placeholder="Deksripsi Donasi"></textarea>
                        <input type="text" name="target" class="py-2 px-5 rounded-3xl placeholder-red-500 w-96" placeholder="Target Donasi">
                        Upload Foto<input type="file" name="bukti" class="py-2 px-5 rounded-3xl placeholder-red-500 w-96" placeholder="Target Donasi">
                        <input type="submit" name="ajukan" value="AJUKAN" class="py-2 px-5 rounded-3xl bg-red-400 text-white font-bold">
                    </div>
                </form>
            </div>
            <div class="flex flex-row justify-center gap-6 mt-14 text-gray-500">
                <a href="">About</a>
                <a href="">Terms and Condition</a>
                <a href="">Canshare 2020</a>
            </div>
        </div>
    </div>
</body>
</html>