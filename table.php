<?php
session_start();
if( !isset($_SESSION["login"]) ){
  header("Location: login.php");
  exit;
}

echo "Welcome " . $_COOKIE['user'];

$host="localhost";
$user="root";
$password="";
$db="demo";

$connect = mysqli_connect($host,$user,$password);
mysqli_select_db($connect,$db);

$sql="select * from pengunjung_masjid";
$result=mysqli_query($connect,$sql);

// if(mysqli_num_rows($result) == 1) {
//     return mysqli_fetch_assoc($result);
// }

// $rows = [];
// while( $row = mysqli_fetch_assoc($result)) {
//     $rows[] = $row;
// }
// echo "<pre>";
// echo var_dump($rows);
// echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Table</title>
</head>
<body>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">TTL</th>
      <th scope="col">Kedatangan</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $counter = 1;
      while($row = mysqli_fetch_array($result)) {
          $nama = $row["Nama"];
          $tempat_lahir = $row["TTL"];
          $kedatangan = $row["Kedatangan"];
          echo "<tr>";
          echo "    <th scope=\"row\">".$counter."</th>";
          echo "    <td>".$nama."</td>";
          echo "    <td>".$tempat_lahir."</td>";
          echo "    <td>".$kedatangan."</td>";
          echo "</tr>";
          $counter++;
      }
    ?>
    <!-- <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr> -->
  </tbody>
</table>

    <div id="myButton" class="container">
        <div class="row">
            <div class="col text-center">
                <button onclick="window.location.href='./chart.php'" type="button"
                    class="btn btn-success">Chart</button>
            </div>
            <div class="col text-center">
                <button onclick="window.location.href='./logout.php'" type="button"
                    class="btn btn-danger">Logout</button>
            </div>
        </div>
    </div>




<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>
</html>