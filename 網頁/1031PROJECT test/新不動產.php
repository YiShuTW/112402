<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="112402組員">
    <meta name="description" content="虛擬世界的書架 提供使用者裡用平台了解投資工具並體驗!">
    <meta name="keywords" content="虛擬世界的書架">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新不動產</title>
    <!-- 連結CSS外部檔案 -->
    <link rel="stylesheet" href="Newstyle.css">
    <script type="text/javascript" src="logout.js"></script>
</head>

<body>
<nav>
<div class="logo"> <img src="images/Logo1025.png" style="width: 400px;height:140px"></div>
        <ul class="drop-down-menu">
            <li>
                <a href="首頁.php">　首頁　</a>
            </li>
            <li>
                <a href="關於我們.php">關於我們</a>
            </li>
            <li>
                <a href="園區展示.php">展館園區</a>
            </li>
            <li>
                <a href="回饋問卷.php">回饋問卷</a>
            </li>
            <li style="float: right; font-family: Andale Mono, monospace;">
                <?php
                if (isset($_SESSION['username'])) {
                    echo '<div class="dropdown2" onmouseover="showDropdown()" onmouseout="hideDropdown()" id="usernameDropdown">';
                    echo '<a href="#" id="usernameLink">' . $_SESSION['username'] . '</a>';
                    echo '<ul class="dropdown-content2" id="dropdownContent">';
                    echo '<li class="ggli4"><a href="logout.php">Log Out</a></li>';
                    // 可以加入其他下拉選單項目
                    echo '</ul>';
                    echo '</div>';
                } else {
                    echo '<a href="index.php">Log In</a>';
                }
                ?>
            </li>
            <li><a href="#">書籍類別</a>
                <ul class="ggli">
                    <li class="ggli1">
                        <a href="新股票.php">股票書籍</a>
                    </li>
                    <li class="ggli2">
                        <a href="新不動產.php">不動產書籍</a>
                    </li>
                    <li class="ggli3">
                        <a href="新虛擬貨幣.php">虛擬貨幣書籍</a>
                    </li>
                </ul>
                
            </li>
        </ul>
    </nav>

    <hr class="hr1">

    
    <form class="bookshow" action="" method="post">
        <div style="position: absolute;left:600px; top:200px">本書特色:</div>
        <label style="position: absolute;left:150px; top:200px" for="selected_book">請選擇書籍：</label>
        <select style="position: absolute;left:250px; top:200px" id="selected_book" name="selected_book" onchange="showImage()">
            <option value="B2-1">▲買房勝經:高房價時代不被坑</option>
            <option value="B2-2">▲贏在換為思考超級房仲</option>
            <option value="B2-3">▲不買房當房東</option>
            <option value="B2-4">▲富過三代的不動產傳承課</option>
            <option value="B2-5">▲小資族的不動產煉金術</option>
            <option value="B2-6">▲這個房仲太狠了!</option>
            <option value="B2-7">▲一看就懂 圖解不動產買賣</option>
            <option value="B2-8">▲是誰在決定房價</option>
            <option value="B2-9">▲房地產是一輩子的事</option>
            <option value="B2-10">▲樓市逆轉勝</option>
        </select>
        <button style="position: absolute;left:500px;text-decoration:none; top:200px" ><a  style="text-decoration:none" id="share_button" href="#">心得分享</a></button>
    </form>
    
    <div id="bookImageContainer" class="book-image-container">
        <!-- 这里将显示图像 -->
    </div>
    <div id="introductionContainer" class="introduction-container">
        <!-- 这里将显示introduction -->
</div>

    <script>
    // 添加事件监听器，选择不同书籍时更新分享链接
    document.getElementById("selected_book").addEventListener("change", updateShareLink);

    function updateShareLink() {
        var selectedBook = document.getElementById("selected_book").value;
        var shareButton = document.getElementById("share_button");

        // 构建心得评价页面链接
        var reviewPageLink = "post" + encodeURIComponent(selectedBook) + ".php";

        // 更新按钮链接
        shareButton.setAttribute("href", reviewPageLink);

        // 显示图像和介绍
        showImageAndIntroduction();
    }

    function showImageAndIntroduction() {
        var selectedBook = document.getElementById("selected_book").value;
        var bookImageContainer = document.getElementById("bookImageContainer");
        var introductionContainer = document.getElementById("introductionContainer");

        // 在这里连接到你的数据库
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);

                if (response.filename) {
                    // 显示图像
                    var img = document.createElement("img");
                    img.src = "images/" + response.filename;
                    img.alt = selectedBook;
                    bookImageContainer.innerHTML = ""; // 清空容器
                    bookImageContainer.appendChild(img);
                } else {
                    bookImageContainer.innerHTML = "未找到所选书籍的图像。";
                }

                if (response.introduction) {
                    // 显示介绍
                    introductionContainer.innerHTML = nl2br(response.introduction);
                } else {
                    introductionContainer.innerHTML = "未找到所选书籍的介绍。";
                }
            }
        };

        xhr.open("POST", "get_image.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("selected_book=" + selectedBook);
         // 自定义PHP函数将换行符(\n)转换为HTML的<br>标签
         function nl2br(text) {
                return text.replace(/\n/g, "<br>");
            }
    }

    // 在页面加载时触发一次，以显示初始的分享链接
    window.onload = updateShareLink;
</script>
      <footer>
        <p>Copyright © 2023 NTUB IMD 112402. All rights reserved.</p>
    </footer>
</body>

</html>