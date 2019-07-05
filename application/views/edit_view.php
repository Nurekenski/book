<p>
Редактирование данных
</p>
<form method="post" action="/admin">
<input name="username" value='<?php echo  $data["username"]?>'>
<input name="email" value='<?php echo $data["email"]?>'>
<input name="text" value='<?php echo $data["text"]?>'>
<input name="id" type="hidden" value='<?php echo $data["id"]?>'>
<input name="back_page" type="hidden" value='<?php echo $_GET["back_page"]?>'>
<input name="next_page" type="hidden" value='<?php echo $_GET["next_page"]?>'>
<?php if($data["status"]==1){ ?>
    <input name="status"  type="checkbox" checked>
<?php
}
else {
    echo " <input   name='status' type='checkbox'>";
}
?>
<input  type="submit" value="Отправить">
</form>