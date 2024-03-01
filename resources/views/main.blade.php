<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<label>Вы авторизованы как  <?php echo Auth::user()["name"];?></label>

<?php foreach ($books as $book) :?>

<label>{{$book->name}}</label>
<label>{{$book->description}}</label>
   
<?php if($book->user_id == Auth::user()["id"]): ?>
   <label>Это ваша книга</label>
<?php endif ?>

<?php endforeach; ?>

    Главная страница после авторизации
    <form method="POST" action="logout">
        @csrf {{ csrf_field() }}
    <button type="submit">Выйти</button>
    </form>
</body>
</html>