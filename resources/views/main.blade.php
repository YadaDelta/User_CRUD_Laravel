<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User CRUD</title>
</head>
<body>
    <div>
        <h2>Создать пользователя</h2>
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="Имя">
            <input name="email" type="text" placeholder="Email">
            <input name="password" type="password" placeholder="Пароль">
            <button>Создать</button>
        </form>
    </div>
    <div>
        <h2>Все пользователи</h2>
        @foreach($users as $user)
        <div style="background-color: lightgray; padding: 10px; margin: 10px; border: 3px solid black;">
            <h3>{{$user['name']}}</h3>
            <h4>{{$user['email']}}</h4>
            <h5>{{$user['password']}}</h5>
            <button onclick="location.href='/edit-user/{{$user->id}}'" type="button">Изменить данные пользователя</button>
            <form action="/delete-user/{{$user->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button>Удалить пользователя</button>
            </form>
        </div>
        @endforeach
    </div>
</body>
</html>