<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tailwind.css">
    <title>Login</title>
</head>
<body>
    <div class="grid justify-items-center w-full min-h-screen">
        <div class="grid self-center">
            <center><img src="assets/37ee585734f72e6bd2d3102f6994813b.png" width="75px" style="transform: translateY(35px);"></center>
            <div class="bg-red-100 shadow-lg overflow-hidden max-w-lg rounded-2xl self-center p-10">
                <form action="" method="post">
                <div class="grid grid-cols-1 gap-4">
                    <b class="text-center mt-3 font-bold text-xl">Masuk Ke Akun Canshare</b>
                    <input type="text" name="username" class="py-2 px-5 rounded-3xl placeholder-red-500" placeholder="Masukan email atau nama pengguna">
                    <input type="password" name="password" class="py-2 px-5 rounded-3xl placeholder-red-500" placeholder="Masukan kata sandi">
                    <input type="submit" value="MASUK" class="py-2 px-5 rounded-3xl bg-red-400 text-white font-bold">
                    <a href="" class="underline text-blue-500 text-center">Lupa kata sandi?</a>
                    <p class="text-red-500 text-center">Sayang sekali, nama pengguna dan kata sandi tidak ditemukan!</p>
                    <div class="bg-red-200" style="height: 2px;"></div>
                    <p class="text-center">Belum punya akun? <a href="" class="underline text-blue-500 text-center">Daftar Disini</a></p>
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