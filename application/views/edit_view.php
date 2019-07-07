
<form method="post" action="/admin">
<p>
Редактирование данных
</p>
<input name="username" value='<?php echo  $data["username"]?>'>
<input name="email" value='<?php echo $data["email"]?>'>
<input name="text" value='<?php echo $data["text"]?>'>
<input name="id" type="hidden" value='<?php echo $data["id"]?>'>
<input name="back_page" type="hidden" value='<?php echo $_GET["back_page"]?>'>
<input name="next_page" type="hidden" value='<?php echo $_GET["next_page"]?>'>
<?php if($data["status"]==1){ ?>
<p>Проверено</p>
    <input name="status"  type="checkbox" checked>
<?php
}
else {
    echo " <input   name='status' type='checkbox'>";
}
?>
<input  class="btn" type="submit" value="Отправить">
</form>

<style>
    form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items:  center;
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