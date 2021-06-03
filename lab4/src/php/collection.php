<?php
require_once ("./config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>collection page</title>
    <link rel="stylesheet" type="text/css" href="../css/myStyle.css">
    <link rel="stylesheet" type="text/css" href="../css/collection.css">
    <script type="text/javascript" src="../js/collection.js"></script>
    <script type="text/javascript" src="../js/myJavascript.js"></script>
</head>
<body onload="goCollection();trackShow()">

<?php
try{
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    die($e->getMessage());
}
?>

<div id="container">
    <div class="header">
        <a href="collection.php">
            <img src="../image/user.png" id="myAccount">
        </a>
        <h1 class="title">
            Art World
        </h1>
        <p class="slogan">
            This is your art world.
        </p>
    </div>
    <div>                                              <!--logo与标语-->
        <ul>
            <li><a href="../html/signup.html" class="navigation">
                    SignUp
                </a></li>
            <li><a href="../html/signin.html" class="navigation">
                    SignLn
                </a></li>
            <li><a href="../html/search.html" class="navigation">
                    Search
                </a></li>
            <li><a class="navigation" href="../html/index.html">
                    Home
                </a></li>
        </ul>
    </div>
    <!--    <div id="track" class="track"></div>-->
    <input type="text" name="username" placeholder="search...">
    <hr>
    <!------------------------------------------------------------------------------------------>
    <div class="row">

        <?php
        echo '<div class="leftColumn">';
        $sql = "SELECT * FROM wishlist";
        $result = $pdo->query($sql);
        $index = 1;
        while($row = $result->fetch()) {
            $artworkID = $row['artworkID'];
            $sql = "SELECT * FROM artworks WHERE artworkID = " . $artworkID;
            $artwork = $pdo->query($sql);
            if($work = $artwork->fetch()) {
                echo '<div class="card" id="card' . $index . '">';
                echo '<a href="exhibition.php?artworkID=' . $work['artworkID'] . '&&added=0" class="more"><h1 class="picTitle">' . $work['title'] . '</h1></a>';
                echo '<h2 class="picAuthor">' . $work['artist'] . '</h2>';
                echo '<h2 style="font-size: 15px">' . $work['timeReleased'] . '</h2>';
                echo '<img src="resources/img/' . $work['imageFileName'] . '" class="Image">';
                echo '<p class="picDis">' . $work['description'] . '</p>';

                echo '<a href="./php/deleteWishList.php?artworkID=' . $work['artworkID'] . '">';
                echo '<button class="deleteButton" id="delete1" type="button" onclick="deleteCollection(this)">DELETE IT</button></div></a>';
                $index++;
            }
        }
        echo '</div>';
        ?>

        <div class="rightColumn">
            <div class="card">
                <?php
                $sql = "SELECT * FROM users WHERE userID = 1";
                $result = $pdo->query($sql);
                $user = $result->fetch();

                $name = '<h1>' . $user['name'] . '</h1>';
                $pic = '<div class="fakeImage" style="height: 200px">Picture</div>';
                $email = '<p>' . $user['email'] . '</p>';
                $tel = '<p>' . $user['tel'] . '</p>';
                $address = '<p>' . $user['address'] . '</p>';

                echo $name . $pic . $email . $tel . $address;
                ?>

            </div>
        </div>
    </div>
</div>

<div id="footer">
    @ArtStore.Copyright © SOFT130002 lab2. All Rights Reserved. 备案号：19302010027@fudan.edu.cn
</div>
</body>
</html>