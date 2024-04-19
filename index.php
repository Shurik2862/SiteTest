<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="" />
    <title>Главная страница</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
</head>
<body class="d-flex justify-content-center align-items-center text-center" style="height: 150vh;">
    
<section class="" >
    <div class="container">
        
        <div  class="row">
        
            <?php
                $servername = "localhost"; 
                $username = "i286shit_admin1";
                $password = "Admin1";
                $dbname = "i286shit_admin1";
            
                
                $conn = new mysqli($servername, $username, $password, $dbname);
                
   
                $sql = "SELECT * FROM news ORDER BY id DESC LIMIT 3";
                
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    ?>
                    <section >
                    <?php
                    while($row = $result->fetch_assoc()) {
                           ?>  
                           <div class="blok" >         
                       <h1 style="color:white">Название - <?php  echo $row["title"]; '<br>'; ?> </h1>
                       <p>Текст - <?php  echo $row["text"]; '<br>'; ?></p>
                        <p>Дата - <?php echo $row["data"];'<br>'; ?></p>
                        </div>
                 <?php
                    } ?>
                    <a href="News.php"> <button style="margin:none">Все новости</button></a> <br>
                    <a href="Form.php"> <button style="margin:none">Обратная связь</button></a>
                    
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