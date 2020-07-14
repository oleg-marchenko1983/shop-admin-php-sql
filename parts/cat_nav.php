<!--- Левый сайдбар меню --------->
<div class="nav flex-column nav-pills mr-5" id="v-pills-tab" role="tablist" aria-orientation="vertical" >
    <!-----Прописоваем услови если ссылка активна ставим ей класс active--->
<a class="nav-link <?php if(!isset($_GET['id'])) { ?> active <?php } ?>"  href="/">Все</a>
    <?php
    /*----------Выбираем категории с базы данных-----*/
    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        /*Прописываем условие если id равен id категории тогда показываем товары только этой категории*/
        if(isset($_GET['id']) && $_GET['id'] == $row['id']) {
            echo "<a class='nav-link active' href='/cat.php?id=" . $row["id"] . "'>" . $row["title"] . "</a>";    
        } else {
            echo "<a class='nav-link' href='/cat.php?id=" . $row["id"] . "'>" . $row["title"] . "</a>";
        }
        
    }
    ?>
</div>