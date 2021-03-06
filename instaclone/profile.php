<?php
    include "php/koneksi.php";
    session_start();
    $username = $_SESSION['user'];
    $result = mysqli_query($conn,"SELECT * FROM profile_feeds WHERE username LIKE '".$username."'");
        
    if (!$result) {
        echo 'Could not run query: ' . mysql_error();
        exit;
    }

    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
        $col[] = $row;
    }


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile | Vietgram</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <nav class="navigation">
        <div class="navigation__column">
            <a href="feed.php">
                <img src="images/logo.png" />
            </a>
        </div>
        <div class="navigation__column">
            <i class="fa fa-search"></i>
            <input type="text" placeholder="Search">
        </div>
        <div class="navigation__column">
            <ul class="navigations__links">
                <li class="navigation__list-item">
                    <a href="explore.html" class="navigation__link">
                        <i class="fa fa-compass fa-lg"></i>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="#" class="navigation__link">
                        <i class="fa fa-heart-o fa-lg"></i>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="profile.php" class="navigation__link">
                        <i class="fa fa-user-o fa-lg"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <main id="profile">
        <header class="profile__header">
            <div class="profile__column">
                <img style="width: 150px" <?php echo "src='images/".$_SESSION['ava']."'"; ?> />
            </div>
            <div class="profile__column">
                <div class="profile__title">
                    <h3 class="profile__username"><?php echo $_SESSION['user']; ?></h3>
                    <a href="edit-profile.php">Edit profile</a>
                    <i class="fa fa-cog fa-lg"></i>
                </div>
                <ul class="profile__stats">
                    <li class="profile__stat">
                        <span class="stat__number"><?php echo count($col); ?></span> posts
                    </li>
                    <li class="profile__stat">
                        <span class="stat__number">1234</span> followers
                    </li>
                    <li class="profile__stat">
                        <span class="stat__number">36</span> following
                    </li>
                </ul>
                <p class="profile__bio">
                    <span class="profile__full-name">
                        <?php echo $_SESSION['name']; ?>
                    </span> <br/> <br/>
                    <?php echo $_SESSION['bio']; ?>
                    <br/><br/>
                    <a href="<?php echo $_SESSION['web']; ?>"><?php echo $_SESSION['web']; ?></a>
                </p>
            </div>
        </header>

        <section class="profile__photos">

        <?php  
            for ($i=0; $i < count($col); $i++) {
        ?>

            <div class="profile__photo">
                <img  <?php echo "src='images/".$col[$i][0]."'"; ?> />
                <div class="profile__photo-overlay">
                    <span class="overlay__item">
                        <i class="fa fa-heart"></i>
                        <?php echo $col[$i][1]; ?>
                    </span>
                    <span class="overlay__item">
                        <i class="fa fa-comment"></i>
                        <?php echo $col[$i][2]; ?>
                    </span>
                </div>
            </div>

        <?php
            }
        ?>

        </section>


    </main>
    <footer class="footer">
        <div class="footer__column">
            <nav class="footer__nav">
                <ul class="footer__list">
                    <li class="footer__list-item"><a href="#" class="footer__link">About Us</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Support</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Blog</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Press</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Api</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Jobs</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Privacy</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Terms</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Directory</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Language</a></li>
                </ul>
            </nav>
        </div>
        <div class="footer__column">
            <span class="footer__copyright">© 2017 Vietgram</span>
        </div>
    </footer>
</body>

</html>