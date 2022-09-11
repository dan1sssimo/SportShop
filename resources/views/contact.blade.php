@extends('layouts.app')
@section('title-block')
    Сторінка контактів
@endsection
@section('content')
    <h1>Контакти:</h1>
    <form action="" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Ім'я:</label>
            <input type="text" name="name" placeholder="Введіть ім'я" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Введіть email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="subject">Тема</label>
            <input type="text" name="subject" placeholder="Введіть тему" id="subject" class="form-control">
        </div>
        <div class="form-group">
            <label for="message">Повідомлення</label>
            <textarea name="message" placeholder="Введіть текст" id="message" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Відправити</button>
    </form>
@endsection
