<!<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>list news</title>
</head>
<body>
<?php
// Establish connection
$db = new PDO('sqlite:sql/news.db');

// Get articles from database
$stmt = $db->prepare('SELECT * FROM news');
$stmt->execute();
$articles = $stmt->fetchAll();

// Print the articles
foreach( $articles as $article) {
    echo '<h1>' . $article['title'] . '</h1>';
    echo '<p>' . $article['introduction'] . '</p>';
}
?>
</body>
</html>