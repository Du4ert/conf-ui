<body>
    Пользователь {{ $user->fullName() }}, email: {{ $user->email }}  подал тезисы.<br />
    Проверить по ссылке: <a href="{{ route('user.get', $user->id) }}">Перейти</a>

</body>