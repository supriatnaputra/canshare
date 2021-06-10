<?php
    include 'config/koneksi.php';
    $profil = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM user WHERE id_user = '$_SESSION[id_user]'"));
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
                <div class="grid grid-cols-1 gap-4">
                    <b class="text-center mt-3 font-bold text-3xl text-xl">Donasi berhasil diajukan!</b>
                    <p class="text-center mt-3 font-medium text-xl">Donasi yang diajukan akan dikonfirmasi. Tunggu email atau pesan teks untuk tahap pembuatan ulasan serta informasi transaksi. Terimakasih!</p>
                    <a href="donasi_ajukan.php">
                        <div class="py-2 px-5 rounded-3xl bg-red-400 text-white font-bold text-center my-2">AJUKAN LAGI</div>
                    </a>
                    <a href="beranda.php">
                        <div class="py-2 px-5 rounded-3xl bg-red-400 text-white font-bold text-center my-2">HALAMAN UTAMA</div>
                    </a>
                </div>
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