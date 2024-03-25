<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once './app/_dbConnection.php' ?>
    <?php include "./components/_head.php" ?>
    <title>Triptrip</title>
</head>

<body>
    <div class="header">
        <nav id="navBar">
            <a href="./index.php" class="logo"> triptrip </a>
            <ul class="nav-links">
                <li><a href="./index.php" class="active">Popular Places</a></li>
                <li><a href="./listing.php">All packages</a></li>
            </ul>
            <?php include("./components/_navBtns.php") ?>
        </nav>
        <div class="container hero">
            <h1>Travel Nepal Like Never Before</h1>
            <div class="search-bar">
                <form method="post" id="search_form">
                    <div class="location-input">
                        <label>Location</label>
                        <input required type="text" id="location" placeholder="Where are you going?">
                    </div>
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
    </div>


    <!-- ---------exclusives------------ -->
    <div class="container">
        <?php
        $packages = new Packages();
        $res = $packages->getExclusivePackages();
        if ($res->num_rows > 0) {
            echo "<h2 class='sub-title'>Exclusive Packages</h2>
            <div class='exclusives'>";
            while ($row = mysqli_fetch_assoc($res)) {
                echo "<a href='./package.php?id=" . $row['package_id'] . "'>
                <div>
                <img src='" . $row['master_image'] . "'>
                <span>
                    <h3>" . $row['package_name'] . "</h3>
                    <p>Starts @ Rs. " . $row['package_price'] . " </p>
                </span>
            </div>
            </a>";
            }
            echo "</div>";
        }
        ?>
        <!-- -------------------Trending Places------------- -->

        <h2 class="sub-title">Trending Places in Nepal</h2>
        <div class="trending">
            <div>
                <img src="https://encrypted-tbn2.gstatic.com/licensed-image?q=tbn:ANd9GcSaD8MQXhfdj36aBRxsCJxMWurXX4ORwwrm28kg4Ub4StkycAlNle7ShRGma95M5dOgumC2iEg-f82BMpZOwtWS4nvNbCgQZx62kEL7JN4">
                <h3><a href="https://en.wikipedia.org/wiki/Mount_Everest">Mount Everest</a></h3>
            </div>
            <div>
                <img src="https://lh5.googleusercontent.com/p/AF1QipNdu5OF1YucfXVyRjuv12dExGX_RHewGeo0oeEE=w675-h390-n-k-no">
                <h3><a href="https://en.wikipedia.org/wiki/Pokhara">Pokhara</a></h3>
            </div>
            <div>
                <img src="https://upload.wikimedia.org/wikipedia/commons/1/18/BRP_Lumbini_Mayadevi_temple.jpg">
                <h3><a href="https://en.wikipedia.org/wiki/Lumbini">Lumbini</a></h3>
            </div>
            <div>
                <img src="https://www.andbeyond.com/wp-content/uploads/sites/5/indian-elephant-chitwan-nepal.jpg">
                <h3><a href="https://en.wikipedia.org/wiki/Chitwan_National_Park">Chitwan National Park</a></h3>
            </div>
        </div>



        <!-- ---------------call to action----------- -->
        <div class="cta">
            <h3>Awesome Packages <br> For you and your friends/family.</h3>
            <p>Great combo with unbeatable prices <br> transport, accomodation & food all inclusive.</p>
            <a href="#" class="cta-btn">Book your first tour now!</a>
        </div>

        <!-- ==============Travellers Stories============== -->

        <h2 class="sub-title">Travellers Stories</h2>
        <div class="stories">
            <div class="travellers-card">
                <a href="https://www.lonelyplanet.com/articles/how-to-trek-to-everest-base-camp" >
                    <img src="https://lp-cms-production.imgix.net/2023-06/GettyImages-1146333065.jpg?auto=format&w=1440&h=810&fit=crop&q=75">
                    <p><div>How to trek Mount Everest?</div>
                    </p>
                </a>
            </div>
            <div class="travellers-card">
                <a href="https://www.lonelyplanet.com/articles/magnificent-mustang-trekking-nepals">
                    <img src="https://lp-cms-production.imgix.net/features/2019/07/Mustang-landscape-Sml-11ac799ad12c.jpg?auto=format&w=1440&h=810&fit=crop&q=75">
                    <p><div>Magnificent Mustang</div></p>
                </a>
            </div>
            <div class="travellers-card">
                <a href="https://www.lonelyplanet.com/articles/best-time-to-visit-nepal">
                    <img src="https://lp-cms-production.imgix.net/2021-12/nepal%20kathmandu%20NurPhoto%20GettyImages-1091424406%20RM.jpg?auto=format&w=1440&h=810&fit=crop&q=75">
                    <p><div>Best time to visit Nepal for temples</div></p>
                </a>
            </div>
        </div>
        <a href="https://www.lonelyplanet.com/articles" class="Start-btn">Go to travel blog</a>
    </div>
    <!-- ===============footer================ -->
    <?php include "./components/_footer.php" ?>
    <?php include "./components/_js.php" ?>
    <script>
        $("#search_form").submit(e => {
            e.preventDefault();
            var loc = $("#location").val();
            window.location = `http://localhost/triptrip/listing.php?loc=${loc}`;
        })
    </script>
</body>

</html>