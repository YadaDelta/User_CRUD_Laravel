<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменение пользователя</title>
</head>
<body>
    <h1>Изменить данные пользователя</h1>
    <form action="/edit-user/{{$user->id}}" method="POST">
        @csrf
        @method('PUT')
        <input name="name" type="text" value="{{$user->name}}">
        <input name="email" type="text" value="{{$user->email}}">
        <input name="password" type="password" value="" placeholder="Password">
        <button>Сохранить изменения</button>
    </form>
</body>
</html>