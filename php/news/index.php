<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Super Legit News</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link href="layout.css" rel="stylesheet">
    <link href="responsive.css" rel="stylesheet">
</head>
<body>
<header>
    <h1><a href="index.php">Super Legit News</a></h1>
    <h2><a href="index.php">Where fake news are born!</a></h2>
    <div id="signup">
        <a href="#">Register</a>
        <a href="#">Login</a>
    </div>
</header>
<nav id="menu">
    <!-- just for the hamburguer menu in responsive layout -->
    <input type="checkbox" id="hamburger">
    <label class="hamburger" for="hamburger"></label>

    <ul>
        <li><a href="index.php">Local</a></li>
        <li><a href="index.php">World</a></li>
        <li><a href="index.php">Politics</a></li>
        <li><a href="index.php">Sports</a></li>
        <li><a href="index.php">Science</a></li>
        <li><a href="index.php">Weather</a></li>
    </ul>
</nav>
<aside id="related">
    <article>
        <h1><a href="#">Duis arcu purus</a></h1>
        <p>Etiam mattis convallis orci eu malesuada. Donec odio ex, facilisis ac blandit vel, placerat ut lorem. Ut id
            sodales purus. Sed ut ex sit amet nisi ultricies malesuada. Phasellus magna diam, molestie nec quam a,
            suscipit finibus dui. Phasellus a.</p>
    </article>
    <article>
        <h1><a href="#">Sed efficitur interdum</a></h1>
        <p>Integer massa enim, porttitor vitae iaculis id, consequat a tellus. Aliquam sed nibh fringilla, pulvinar
            neque eu, varius erat. Nam id ornare nunc. Pellentesque varius ipsum vitae lacus ultricies, a dapibus turpis
            tristique. Sed vehicula tincidunt justo, vitae varius arcu.</p>
    </article>
    <article>
        <h1><a href="#">Vestibulum congue blandit</a></h1>
        <p>Proin lectus felis, fringilla nec magna ut, vestibulum volutpat elit. Suspendisse in quam sed tellus
            fringilla luctus quis non sem. Aenean varius molestie justo, nec tincidunt massa congue vel. Sed tincidunt
            interdum laoreet. Vivamus vel odio bibendum, tempus metus vel.</p>
    </article>
</aside>
<section id="news">
    <?php
    // Establish connection
    $db = new PDO('sqlite:sql/news.db');

    // Get articles from database
    $stmt = $db->prepare('SELECT news.*, users.*, COUNT(comments.id) AS comments
                                    FROM news JOIN
                                         users USING (username) LEFT JOIN
                                         comments ON comments.news_id = news.id
                                    GROUP BY news.id, users.username
                                    ORDER BY published DESC');
    $stmt->execute();
    $articles = $stmt->fetchAll();

    // Print the articles
    foreach ($articles as $article) {
        echo '<article><header><h1><a href="#">' . $article['title'] . '</a></h1></header>';
        // echo '<img src="http://lorempixel.com/600/300/business/" alt="">';
        echo '<p>' . $article['introduction'] . '</p>';
        echo '<p>' . $article['fulltext'] . '</p>';
        echo '<footer>
            <span class="author">' . $article['users.username'] . '</span>
            <span class="tags"><a href="index.php">#politics</a> <a href="index.php">#economy</a></span>
            <span class="date">15m</span>
            <a class="comments" href="item.html#comments">5</a>
        </footer>';
    }
    ?>
    <article>
        <header>
            <h1><a href="item.html">Quisque a dapibus magna, non scelerisque</a></h1>
        </header>
        <img src="http://lorempixel.com/600/300/business/" alt="">
        <p>Etiam massa magna, condimentum eu facilisis sit amet, dictum ac purus. Curabitur semper nisl vel libero
            pulvinar ultricies. Proin dignissim dolor nec scelerisque bibendum. Maecenas a sem euismod, iaculis erat id,
            convallis arcu. Ut mollis, justo vitae suscipit imperdiet, eros dui laoreet enim, fermentum posuere felis
            arcu vel urna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin
            blandit ex sit amet suscipit commodo. Duis molestie ligula eu urna tincidunt tincidunt. Mauris posuere
            aliquet pellentesque. Fusce molestie libero arcu, ut porta massa iaculis sit amet. Fusce varius nisl vitae
            fermentum fringilla. Pellentesque a cursus lectus.</p>
        <p>Duis condimentum metus et ex tincidunt, faucibus aliquet ligula porttitor. In vitae posuere massa. Donec
            fermentum magna sit amet suscipit pulvinar. Cras in elit sapien. Vivamus nunc sem, finibus ac suscipit
            ullamcorper, hendrerit vitae urna. Pellentesque habitant morbi tristique senectus et netus et malesuada
            fames ac turpis egestas. Quisque eget tincidunt orci. Mauris congue ipsum non purus tristique, at venenatis
            elit pellentesque. Etiam congue euismod molestie. Mauris ex orci, lobortis a faucibus sed, sagittis eget
            neque.</p>
        <p>Mauris tincidunt orci congue turpis viverra pulvinar. Vestibulum ante ipsum primis in faucibus orci luctus et
            ultrices posuere cubilia Curae; Quisque rhoncus lorem eget.</p>
        <footer>
            <span class="author">Dominic Woods</span>
            <span class="tags"><a href="index.php">#politics</a> <a href="index.php">#economy</a></span>
            <span class="date">15m</span>
            <a class="comments" href="item.html#comments">5</a>
        </footer>
    </article>
</section>
<footer>
    <p>&copy; Fake News, 2017</p>
</footer>
</body>
</html>
