<?php echo $data ?>
<form method="post" action="/add">
<div class="row">
    <div class="back"><a href="/">Назад</a></div>
    <p>ДОБАВИТЬ ЗАДАЧУ</p>
</div>
<input type="text" placeholder="имени пользователя" name="username">
<input type="email" placeholder="email" name="email"/>
<input type="text" placeholder="текста задачи"  name="text"/>
<input type="submit" class="btn">
</form>

<style>
    form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items:  center;
    }
    .back {
        
        background-color:  #0095ff;
        padding: 10px;
        width: 50px;
        border-radius: 40px;
        text-align: center;
    }
    .back:hover {
        background-color: #07c;
    }
    .back a {
        font-weight: bold;
        color: white !important;
    }
    .row {
        display: flex;
        flex-direction: row;
        align-items: center;
    }
    p {
        align-self: center;
        font-weight: bold;
        color: #07c;
    }
    form input {
        width: 30%;
        padding: 5px;
        margin: 5px;
        border: 2px solid #96a4a8;
        border-radius: 20px;
        padding: 10px;
        outline: none;
    }
    .btn {
        color: white;
        width: 400px;
        padding: 10px;
        background-color: #0095ff;
        border-radius: 20px;
        border: none;
        
    }
    .btn:hover {
        background-color: #07c;
    }
</style>