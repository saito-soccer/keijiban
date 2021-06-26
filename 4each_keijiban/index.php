<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>掲示板</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<?php
mb_internal_encoding("utf8");
$pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
$stmt = $pdo->query("select * from 4each_keijiban");

?>

    <header>
        <img src="4eachblog_logo.jpg">
        <ul>
            <li>トップ</li>
            <li>プロフィール</li>
            <li>4eachについて</li>
            <li>登録フォーム</li>
            <li>問い合わせ</li>
            <li>その他</li>
        </ul>
    </header>

    <main>
        <!-- 左側を記述 -->
        <div class="left">
            <!-- タイトル -->
            <h1>プログラミングに役立つ掲示板</h1>
            <!-- 登録フォーム -->
            <div class="form">
                <h2>入力フォーム</h2>
                <form action="insert.php" method="post">
                    <div class="box">
                        <label>ハンドルネーム</label><br>
                        <input type="text" size="50" name="handlename">
                    </div>

                    <div class="box">
                        <label>タイトル</label><br>
                        <input type="text" size="50" name="title">
                    </div>

                    <div box="box">
                        <label>コメント</label><br>
                        <textarea name="comments"  cols="90" rows="10"></textarea>
                    </div>

                    <input type="submit" value="投稿する" class="submit">
                </form>
            </div>

            <?php

            while($row = $stmt->fetch()){

            echo "<div class='box2'>";
                echo "<h2>".$row['title']."</h2>";
                echo "<div class='contents'>";
                echo $row['comments'];
                echo "<div class='handlename'>posted by".$row['handlename']."</div>";
                echo"</div>";
            echo "</div>";
            }

            ?>

        </div>

        <div class="right">
            <p>人気の記事</p>
            <ul>
                <li>PHPオススメ本</li>
                <li>PHP MyAdminの使い方</li>
                <li>いま人気のエディタTop5</li>
                <li>HTMLの基礎</li>
            </ul>

            <p>オススメリンク</p>
            <ul>
                <li>インターノウス株式会社</li>
                <li>XAMPPのダウンロード</li>
                <li>Eclipsのダウンロード</li>
                <li>Braketsのダウンロード</li>
            </ul>

            <p>カテゴリ</p>
            <ul>
                <li>HTML</li>
                <li>PHP</li>
                <li>MySQL</li>
                <li>JavaScript</li>
            </ul>
        </div>
    </main>

<footer>
    copyright © internous | 4each blog the which provides 
        AtoZabout programming.
</footer>
</body>