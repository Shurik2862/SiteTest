<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
</head>
<body class="d-flex justify-content-center align-items-center text-center" style="height: 100vh;">



<div class="container">
    <div class="row">
        <div class="col-12">
        <form action="Form.php" method="post">
    <input type="text" id="name" name="name" placeholder="Имя"><br><br>
    <input type="text" id="adres" name="adres" placeholder="Адрес"><br><br>
    <input type="tel" id="tel" name="tel" placeholder="+7(XXX)-XXX-XX-XX"><br><br>
    <input type="email" id="email" name="email" placeholder="Email"><br><br>
    
  

<?php
$servername = "localhost"; 
$username = "i286shit_admin1";
$password = "Admin1";
$dbname = "i286shit_admin1";


$conn = new mysqli($servername, $username, $password, $dbname);


if(isset($_POST['name']) && isset($_POST['adres']) && isset($_POST['tel']) && isset($_POST['email'])) {
    $name = $_POST['name'];
    $adres = $_POST['adres'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];

    if (!empty($name)&& !empty($adres) && !empty($tel) && !empty($email)) {
        $sql = "INSERT INTO info (name, adres,tel, email) VALUES ('$name','$adres', '$tel', '$email')";

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
        <th>Имя</th>
        <th>Адрес</th>
        <th>Телефон</th>
        <th>Email</th>
    </tr>
<?php
$servername = "localhost"; 
$username = "i286shit_admin1";
$password = "Admin1";
$dbname = "i286shit_admin1"; 

$conn = new mysqli($servername, $username, $password, $dbname);


$sql = "SELECT * FROM info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
?>
    <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["adres"]; ?></td>
        <td><?php echo $row["tel"]; ?></td>
        <td><?php echo $row["Email"]; ?></td>
    </tr>
<?php
    }
} 

$conn->close();
?>


<nav>
    <div class="container">
        <div class="row text-center">
            <div class="col-4"><a href="index.php"><button> Главная</button></a></div>
            <div class="col-4"><a href="News.php"><button> Все новости</button></a></div>
            <div class="col-4"><a href="AddNews.php"><button> Добавить</button></a></div>
        </div>
    </div>
</nav>


<script src="https://cdn.jsdelivr.net/npm/imask"></script>
<script>
  var phoneMask = IMask(
    document.getElementById('tel'), {
      mask: '+{7} (000) 000-00-00' 
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" ></script>

</div>
</div>
</div>

</body>
</html>
