<form method="post" action="/">
    <button type="submit" name="action" value="logout" class="btn">Logout</button>

<table>
    <tr>
    <td><a>№&nbsp&nbsp&nbsp&nbsp</a></td><td><a>Имя пользователя</a></td>
    <td><a>Email</a></td>
    <td><a>Текст задачи</a></td>
    <td><a>Статус</a></td>
    </tr>
    <?php 
    
    foreach ($data as $obj) {
    if($obj->status==0) {
        $obj->status ="Не проверенный";
    }
    else {
        $obj->status = "Проверенный";
    }

    echo "<tr>
    <td><a href='/edit?id=".$obj->id."&back_page=".$second_data["back"]."&next_page=".$second_data["next"]."'>
    ".$obj->id."
    </a>
    </td>
    <td><a href='/edit?id=".$obj->id."&back_page=".$second_data["back"]."&next_page=".$second_data["next"]."'>
    ".$obj->username."</a>
    </td><td><a href='/edit?id=".$obj->id."&back_page=".$second_data["back"]."&next_page=".$second_data["next"]."'>".$obj->email."</a></td>
    <td><a href='/edit?id=".$obj->id."&back_page=".$second_data["back"]."&next_page=".$second_data["next"]."'>".$obj->text."</a></td>

    <td><a href='/edit?id=".$obj->id."&back_page=".$second_data["back"]."&next_page=".$second_data["next"]."'>".$obj->status ."</a></td>
    </tr>";
    }
    ?>
</table>
<div class="rows">
<a href="/admin?back=<?php echo $second_data["back"]?>" class="back" style="font-size: 20px; <?php if($second_data["back"]==0) { echo "display: none";}?>"><</a><a  class="next" href="/admin?next=<?php echo $second_data["next"] ?>" style="margin-left: 40px; font-size: 20px;  <?php if($second_data["next"]===intval($_COOKIE["alldata"])) {echo "display: none";}?>">></a>
</div>
</form>
<style>
   form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items:  center;
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
    .rows {
        display: flex;
        flex-direction: row;
    }
</style>
