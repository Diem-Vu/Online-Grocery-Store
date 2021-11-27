
<html>
  <head>
    <!-- <title>Login</title> -->
  </head>
  <body>
    <!-- <h1>Login</h1> -->
<?php
$logged_in = false;

if (isset($_POST["username"]) && isset($_POST["password"]))
{
  if ($_POST["username"] && $_POST["password"])
    {
      $username = $_POST["username"];
      $password = $_POST["password"];
      // create connection
      $conn = mysqli_connect("localhost", "root", "", "groceryStore");
      // check connection
      if (!$conn)
      {
      die("Connection failed: " . mysqli_connect_error());
      }
    // select user
    $sql = "SELECT Password FROM Customer WHERE userName = '$username'";

    $results = mysqli_query($conn, $sql);

    if ($results)
    {
      $row = mysqli_fetch_assoc($results);
      if ($row["Password"] === $password)
      {
        $logged_in = true;
        $sql = "SELECT * FROM Customer";
        $results = mysqli_query($conn, $sql);
      }
      else
      {
        echo "user name or password invalid";
      }
    }
    else
    {
      echo mysqli_error($conn);
    }
    mysqli_close($conn); // close connection
    }
     else
    {
    echo "Nothing was submitted.";
    }
}

if ($logged_in && $results)
{

    // echo "Success";
    header ("location: index.html");
}

?>

</body>
</html>
