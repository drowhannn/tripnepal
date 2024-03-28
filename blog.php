<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <?php include_once './app/_dbConnection.php' ?>
    <title>TripNepal - Blogs</title>
    <style>
.container {
    display: flex;
    flex-direction: column;
    max-width: 1200px;
    margin: 8px auto;
    padding: 0 8px;
  }
  h1 {
    margin-top: 0;
  }
  p {
    margin-bottom: 10px;
  }
  img {
    max-width: 100%;
    height: auto;
  }
</style>
</head>
<?php include './components/_head.php' ?>
<body>
    <nav id='navBar' class='navbar-white'>
        <a href='./index.php' class='logo'>
        <img src="./assets/logo.png" alt="tripnepal" style="width: 10rem;"/>
        </a>
        <ul class='nav-links'>
            <li><a href='./packages.php'>Packages</a></li>
            <li><a href='./blogs.php'>Blogs</a></li>
        </ul>
        <?php include("./components/_navBtns.php") ?>
    </nav>
<?php
    if (isset($_GET['id'])) {
    $blogId = $_GET['id'];

    $blogs = new Blogs();
    $res = $blogs->getBlog($blogId);

    $blog = mysqli_fetch_assoc($res);
    echo '<div class="container">';

        echo '<h1>' . $blog['title'] . '</h1>';
        echo '<img src="' . $blog['image'] . '" alt="Blog Image">';
        echo '<p>' . $blog['content'] . '</p>';
        echo '<p>Author: ' . $blog['author'] . '</p>';
        echo '</div>';

        include "./components/_footer.php";


        include "./components/_js.php" ;
  
} else {
header('Location: ./blogs.php');
}
   
?>
</body>

</html>