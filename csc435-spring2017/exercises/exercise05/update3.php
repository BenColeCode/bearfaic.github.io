<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>New User Added</title>
  </head>
  <body>
    <p>
    <?php
      $host = "localhost";
      $user = "root";
      $password = "";

      $mysqli = new mysqli($host, $user, $password, "exercise05");
      if ($mysqli->connect_errno) {
        die("Error: " . $mysqli->connect_errno);
      }

      $username = $_POST["username"];
      $password = $_POST["password"];
      $band3 = $_POST["band3"];
      
      $sql = "UPDATE users SET band3 = \"$band3\" WHERE username = \"$username\" AND password = \"$password\"";
      $mysqli->query($sql);

      $sql = "SELECT band1, band2 FROM users WHERE username = \"$username\" AND password = \"$password\"";
      $result = $mysqli->query($sql);

      if($result->num_rows >= 1) {
          while($row = $result->fetch_assoc()) {
            $band1 = $row['band1'];
            $band2 = $row['band2'];
            echo "<p>Here is your current information. Change what you'd like!</p>";
            
            echo "<form action=\"update1.php\" method=\"post\">";
            echo "$band1 <input name=\"band1\" type=\"text\" placeholder=\"Favorite band\">";
            echo "<input type=\"hidden\" name=\"username\" value=\"$username\">";
            echo "<input type=\"hidden\" name=\"password\" value=\"$password\">";
            echo "<input type=\"submit\" value=\"Change\"></input>";
            echo "</form>";

            echo "<form action=\"update2.php\" method=\"post\">";
            echo "$band2 <input name=\"band2\" type=\"text\" placeholder=\"A Great Band\">";
            echo "<input type=\"hidden\" name=\"username\" value=\"$username\">";
            echo "<input type=\"hidden\" name=\"password\" value=\"$password\">";
            echo "<input type=\"submit\" value=\"Change\"></input>";
            echo "</form>";

            echo "<form action=\"update3.php\" method=\"post\">";
            echo "$band3 <input name=\"band3\" type=\"text\" placeholder=\"An Okay Band\">";
            echo "<input type=\"hidden\" name=\"username\" value=\"$username\">";
            echo "<input type=\"hidden\" name=\"password\" value=\"$password\">";
            echo "<input type=\"submit\" value=\"Change\"></input>";
            echo "</form>";
          }
        }
      else{
        echo "<p>You really shouldn't be seeing this.</p>";
      }
    ?>

  <a href="index.html">Return to log in.</a>
  </body>
</html>
