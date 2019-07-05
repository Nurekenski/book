<form method="post" action="/">
<p>WELCOME</p>
<a class="add_data" href="/add">Добавить задачу</a>
<p>Приложение задачник</p>
<table>
<tr>
    <td><a>ID</a></td><td><a>Имя пользователя</a><a style="margin-left: 10px" href="/?sort=u_asc&back_page=<?php echo $second_data["back"] ?>&next_page=<?php echo $second_data["next"] ?>"><</a><a  style="margin-left: 10px" href="/?sort=u_desc&back_page=<?php echo $second_data["back"] ?>&next_page=<?php echo $second_data["next"] ?>">></a></td>
    <td><a>Email</a><a style="margin-left: 10px" href="/?sort=e_asc&back_page=<?php echo $second_data["back"] ?>&next_page=<?php echo $second_data["next"] ?>"><</a><a style="margin-left: 10px" href="/?sort=e_desc&back_page=<?php echo $second_data["back"] ?>&next_page=<?php echo $second_data["next"] ?>">></a></td>
    <td><a>Текст задачи</a></td>
    <td><a>Статус</a><a style="margin-left: 10px" href="/?sort=s_asc&back_page=<?php echo $second_data["back"] ?>&next_page=<?php echo $second_data["next"] ?>"><</a><a style="margin-left: 10px" href="/?sort=s_desc&back_page=<?php echo $second_data["back"] ?>&next_page=<?php echo $second_data["next"] ?>">></a></td>
</tr>
</form>

<?php 
 foreach ($data as $obj) {
    if($obj->status==0) {
        $obj->status = "Не проверенный";
    }
    else {
          $obj->status = "Проверенный";
    }
    echo "<tr><td>
    ".$obj->id."
    </td><td>
    ".$obj->username."
    </td><td>".$obj->email."</td>
    <td>".$obj->text."</td>
    
    <td>".$obj->status ."</td>
    </tr>";
 }
?>
</table>
<div class="rows" style="margin-top: 10px;">
<a href="/?back=<?php  echo $second_data["back"]?>"  class="back" style="font-size: 20px; <?php if($second_data["back"]==0) {echo "display: none";}?>"><</a><a class="next" href="/?next=<?php echo $second_data["next"] ?>" style="margin-left: 40px; font-size: 20px;  <?php if($second_data["next"]===intval($_COOKIE["alldata"])) {echo "display: none";}?>">></a>
</div>
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
        border-radius: 200px;
        color: white;
    }
    .back:hover {
        background-color: #07c;
    }
    .next {
        text-align: center;
        background-color:  #0095ff;
        padding: 10px;
        border-radius: 200px;
        color: white;
    }
    .next:hover {
        background-color: #07c;
    }
    .add_data{
        align-self: center;
        font-weight: bold;
        color: #07c;
        cursor: pointer;
        background-color:  #0095ff;
        color: white;
        padding: 10px;
        border-radius: 20px;
    }
    .add_data:hover {
        background-color: #07c;
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