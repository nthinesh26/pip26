<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Welcome</title>
</head>

<body>
    <h2>Hello {{ $user->name }},</h2>
    <p>Kami ingin memaklumkan bahawa akaun anda di {{ env('APP_NAME') }}</p>
    <p>Anda kini boleh log masuk ke akaun anda menggunakan butiran berikut: </p>
    <p>User Name: {{ $user->email }}</p>
    <p>Password: {{ WebTool::dec($user->token, 3) }}</p>
    <p><a href="{{ env('APP_URL') }}/pip/accunt/active/{{ WebTool::encode($user->id) }}">Pautan Activate Akaun Anda</a>
    </p>
    <p>Sekiranya anda menghadapi sebarang masalah semasa log masuk atau
        mempunyai pertanyaan lanjut, sila hubungi pasukan sokongan kami melalui: </p>
    <p>Emel: [alamat emel sokongan] </p>
    <p>Telefon: [nombor telefon sokongan] </p>
    <p>Terima kasih. </p>
</body>

</html>
