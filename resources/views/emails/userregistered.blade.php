<!-- resources/views/emails/user_registered.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Akun</title>
</head>
<body>
    <h2>Halo {{ $name }},</h2>
    <p>Selamat, Anda telah berhasil terdaftar di Aplikasi Kami. Berikut informasi akun Anda:</p>
    <ul>
        <li>Nama: {{ $name }}</li>
        <li>Email: {{ $email }}</li>
    </ul>
    <p>Terima kasih telah bergabung dengan kami!</p>
</body>
</html>
