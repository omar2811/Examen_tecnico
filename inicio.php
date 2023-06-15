<?php
include 'db_conexion.php';
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Default</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style_inicio.css">
</head>

<body>
  <style>

  </style>

  <ul class="nav justify-content-center">
    <li class="nav-item dropdown">
      <a class=" dropdown-toggle btn btn-outline-primary no-outline " data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">All Users</a>
      <ul class="dropdown-menu">
        <?php

        if ($conn->connect_error) {
          die("Conexión fallida: " . $conn->connect_error);
        }
        $sql = "SELECT `Descripcion` FROM `vinculos` WHERE `MenuPadreID`=1;";
        $res = $conn->query($sql);
        if ($res->num_rows > 0) {
          while ($row1 = $res->fetch_assoc()) {
            echo "<li><a class='dropdown-item'>" . $row1["Descripcion"] . "</a></li>";
            echo "<li>
    <hr class='dropdown-divider'>
  </li>";
          }
        } else {
          echo "<tr><td colspan='3'>No se encontraron registros</td></tr>";
        }

        ?>

      </ul>
    </li>
    <?php

    if ($conn->connect_error) {
      die("Conexión fallida: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM `vinculos` WHERE `MenuPadreID`=0 and `Posicion`>1 and `Posicion`<4 ";
    $res = $conn->query($sql);
    if ($res->num_rows > 0) {
      while ($row1 = $res->fetch_assoc()) {
        echo " <li class='nav-item'>
    <a class='btn btn-outline-primary no-outline' >" . $row1["Descripcion"] . "</a>
  </li>";
        echo "<li>
    <hr class='dropdown-divider'>
  </li>";
      }
    } else {
      echo "<tr><td colspan='3'>No se encontraron registros</td></tr>";
    }

    ?>

    <li class="nav-item">
      <span class="fa-stack">
        <i class="fas fa-bell fa-stack-1x"></i>
        <?php
        $sql = "SELECT COUNT(*) AS total FROM usuarios";
        $resultado = $conn->query($sql);

        if ($resultado) {
          $row = $resultado->fetch_assoc();
          $totalCount = $row['total'];
        } else {
          $totalCount = 0;
        }
        ?>
        <span class="notification-counter"><?php echo $totalCount; ?></span>
      </span>
    </li>
    <?php

    if ($conn->connect_error) {
      die("Conexión fallida: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM `vinculos` WHERE `MenuPadreID`=0 and `Posicion`=4 ";
    $res = $conn->query($sql);
    if ($res->num_rows > 0) {
      while ($row1 = $res->fetch_assoc()) {
        echo " <li class='nav-item dropdown'>
    <a class='dropdown-toggle btn btn-outline-primary no-outline'data-bs-toggle='dropdown' role='button' aria-expanded='false' >" . $row1["Descripcion"] . "</a>
  </li>";
      }
    } else {
      echo "<tr><td colspan='3'>No se encontraron registros</td></tr>";
    }

    ?>

  </ul>
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>email</th>
          <th>registration date</th>
        </tr>
      </thead>
      <tbody id="tabla-datos">
        <?php

        if ($conn->connect_error) {
          die("Conexión fallida: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM usuarios";
        $resultado = $conn->query($sql);
        if ($resultado->num_rows > 0) {
          while ($row = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["date"] . "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='3'>No se encontraron registros</td></tr>";
        }

        $conn->close();
        ?>
      </tbody>
    </table>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>