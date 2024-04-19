<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить новость</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
</head>
<body >

<nav>
    
        <div class="row text-center">
            <div class="col-4"><a href="index.php"><button> Главная</button></a></div>
            <div class="col-4"><a href="Form.php"><button> Форма</button></a></div>
            <div class="col-4"><a href="News.php"><button> Все новости</button></a></div>
        </div>
  
</nav>

<section class="d-flex justify-content-center align-items-center text-center" style="height: 100%; margin-top:100px">



<div class="container">
<h1 style="margin-bottom: 50px; color: white; margin-top:-70px">Добавить новость</h1>
    <div class="row">
        <div class="col-12">
    <form action="AddNews.php" method="post">
    <input type="text" id="title" name="title" placeholder="Название"><br><br>
    <textarea type="text" id="text" name="text" placeholder="Текст новостей" style="width:100%"></textarea><br><br>
    <input type="date" id="data" name="data"><br><br>
    
  

<?php
$servername = "localhost"; 
$username = "i286shit_admin1";
$password = "Admin1";
$dbname = "i286shit_admin1";


$conn = new mysqli($servername, $username, $password, $dbname);


if(isset($_POST['title']) && isset($_POST['text']) && isset($_POST['data'])) {
    $title = $_POST['title'];
    $text = $_POST['text'];
    $data = $_POST['data'];

    if (!empty($title)&& !empty($data) && !empty($text)) {
        $sql = "INSERT INTO news (title, data,text) VALUES ('$title','$data', '$text')";

        if ($conn->query($sql) === TRUE) {
            echo "Данные успешно добавлены";
        } else {
            echo "Ошибка: " . $sql . "<br>" . $conn->error;
        }
    } else { 
        echo "Пожалуйста, заполните все поля формы";
    }
}

$conn->close();
?><br>
<button type="submit">Отправить</button><br>
 </form>

 <table class="mx-auto">
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Текст</th>
        <th>Дата</th>
    </tr>
<?php
$servername = "localhost"; 
$username = "i286shit_admin1";
$password = "Admin1";
$dbname = "i286shit_admin1"; 

$conn = new mysqli($servername, $username, $password, $dbname);


$sql = "SELECT * FROM news";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
?>
    <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["title"]; ?></td>
        <td><?php echo $row["text"]; ?></td>
        <td><?php echo $row["data"]; ?></td>
    </tr>
<?php
    }
} 

$conn->close();
?>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" ></script>

</div>
</div>
</div>
</section>
</body>
</html>
