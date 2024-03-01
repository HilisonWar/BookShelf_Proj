<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Document</title>
</head>
<body>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>

    <form method="POST" action="login">
      @csrf {{ csrf_field() }}
    <div class="login">
      <div class="login-header">
        <h1>Аутентификация</h1>
      </div>
      <div class="login-form">
        <h3>Email:</h3>
        <input type="email" placeholder="Email" name="email" /><br>
        <h3>Пароль:</h3>
        <input type="password" placeholder="Пароль" name="password"/>
        <br>
      <button type="submit">Войти</button>
        <br>
        <br>
        <label>Нет аккаунта?</label>
        <a  href="register">Зарегистрироваться</a> 
      </div>

    </form>
</body>
</html>