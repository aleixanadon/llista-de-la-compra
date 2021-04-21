<!DOCTYPE html>
<html lang="en" dir="ltr">
     <head>
          <meta charset="utf-8">
          <title>Llista de la compra</title>
          <style media="screen">
               table {
                    text-align: left;
               }
          </style>

          <script type="text/javascript" src="scripts.js"></script>
     </head>
     <body>
          <form action="index.php" method="post">
               <label for="item">Item: </label>
               <input type="text" name="item" onblur="isEmpty()" id="item">
                    <br>
               <label for="stock">Stock: </label>
               <input type="number" name="stock" onblur="isEmpty()" id="stock">
                    <br><br>
               <input type="submit" name="submit" value="Submit" id="submit">
          </form>
               <br>

          <!-- Aquí mostramos la tabla de la base de datos -->

          <?php

          $conn = new mysqli("localhost", "pruebapractica", "pruebapractica", "pruebapractica");

          if (isset($_POST["submit"])
          && !empty($_POST["item"])
          && !empty($_POST["stock"])) {

               $item = $_POST["item"];
               $stock = $_POST["stock"];

               $sql = "INSERT INTO `compra` (item, stock) VALUES ('$item', $stock)";

               $result = $conn->query($sql) or die($conn->error);
          }

          $sql2 = "SELECT * FROM `compra`";
          $result2 = $conn->query($sql2);

          echo '<table>';
               echo "<tr>";
                    echo "<th>" . "ID" . "</th>";
                    echo "<th>" . "Item" . "</th>";
                    echo "<th>" . "Stock" . "</th>";
                    echo "<th>" . "Delete" . "</th>";
               echo "</tr>";

               while ($row = $result2->fetch_assoc()) {

                    echo "<tr>";
                         echo "<td>" . $row["id"] . "</td>";
                         echo "<td>" . $row["item"] . "</td>";
                         echo "<td>" . $row["stock"] . "</td>";
                         echo '<td><a href="delete.php?id=' . $row["id"] . '">' . 'Eliminar</a></td>';
                    echo "</tr>";
               }
          echo "</table>";

          ?>

          <a href="#">Descargar</a>

          <div>
               *Para descargar la lista click derecha > Guardar enlace como
          </div>

          <?php $conn->close();?>


     </body>
</html>
