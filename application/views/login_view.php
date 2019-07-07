
<form method="post" action="/admin">
    <p>АВТОРИЗАЦИЯ</p>
    <input name="login" type="text">
    <input name="password" type="password">
    <input type="submit" value="Отправить" class="btn">
</form>

<style>
    form {
        display: flex;
        flex-direction: column;
        justify-content: center;
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