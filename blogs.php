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
  .blog-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    padding: 20px;
  }
  .blog-card {
    width: 300px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    overflow: hidden;
  }
  .blog-card img {
    width: 100%;
    height: auto;
  }
  .blog-card .content {
    padding: 15px;
  }
  .blog-card h2 {
    margin-top: 0;
  }
  .blog-card p {
    margin-bottom: 10px;
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
            <li><a href='./listing.php'>Packages</a></li>
            <li><a href='./blogs.php' class='active'>Blogs</a></li>
        </ul>
        <?php include("./components/_navBtns.php") ?>
    </nav>


    <div class='blog-container'>
       <?php
        $blogs = new Blogs();
        $blogs = $blogs->getBlogs();
        foreach ($blogs as $blog) {
            echo '<a class="blog-card" href="./blog.php?id='. $blog['id'] . '">';
            echo '<img src="' . $blog['image'] . '" alt="' . $blog['title'] . '">';
            echo '<div class="content">';
            echo '<h2>' . $blog['title'] . '</h2>';
            echo '<p>' . substr($blog['content'], 0, 50) . '...</p>';
            echo '<p>Author: ' . $blog['author'] . '</p>';
            echo '</div>';
            echo '</a>';
          }
          ?>
    </div>
    <?php include "./components/_footer.php" ?>


    <?php include "./components/_js.php" ?>

</body>

</html>