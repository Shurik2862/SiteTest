<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Все новости</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
</head>
<body>

<nav>
    <div class="container">
        <div class="row text-center">
            <div class="col-4"><a href="index.php"><button> Главная</button></a></div>
            <div class="col-4"><a href="Form.php"><button> Форма</button></a></div>
            <div class="col-4"><a href="AddNews.php"><button> Добавить</button></a></div>
        </div>
    </div>
</nav>
<section>
    <div class="container new">
        <div class="row mx-auto text-center">
           <h1 style="margin:-30px 0 -50px 0"> Все новости</h1>
            <?php
                $servername = "localhost"; 
                $username = "i286shit_admin1";
                $password = "Admin1";
                $dbname = "i286shit_admin1";
                
                
                $conn = new mysqli($servername, $username, $password, $dbname);


               


                $sql = "SELECT * FROM news";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    ?>
                    <section style=" margin-top: 100px">
                    <?php
                    while($row = $result->fetch_assoc()) {
                           ?>           
                       <h1>Название - <?php  echo $row["title"]; '<br>'; ?> </h1>
                       <p>Текст - <?php  echo $row["text"]; '<br>'; ?></p>
                        <p>Дата - <?php echo $row["data"];'<br>'; ?></p>
                 <?php
                    } ?>
                    </section>
                    <?php
                } 

                $conn->close();
                ?>


            
            
        </div>
    </div>
</section>
    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" ></script>
</body>
</html>