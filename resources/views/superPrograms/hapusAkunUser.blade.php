<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <form action="{{ route('hapusAkunUser') }}" method="POST">
        @csrf
        <input type="number" id="id" name="id" placeholder="where id = ">
        <button type="submit">hapus</button>
    </form>
</body>
</html>