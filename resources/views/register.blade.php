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

    <form method="POST" action="register">
      @csrf {{ csrf_field() }}
    <div class="login">
      <div class="login-header">
        <h1>Регистрация</h1>
      </div>
      <div class="login-form">
        <h3>Имя пользователя</h3>
        <input type="text" name="name">
        <h3>Email:</h3>
        <input type="email" placeholder="Email" name="email" /><br>
        <h3>Пароль:</h3>
        <input type="password" placeholder="Пароль" name="password"/>
        <br>
        <label>Аккаунт админа </label>
        <input type="checkbox" name="isAdmin">
      <button type="submit">Зарегистрироваться</button>
      <label>Уже есть аккаунт?</label>
      <a  href="login">Авторизоваться</a> 
       
    </form>
</body>
</html>
