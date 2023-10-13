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
    <title>關於我們</title>
    <!-- 連結CSS外部檔案 -->
    <link rel="stylesheet" href="Newstyle.css">
    <script type="text/javascript" src="logout.js"></script>
</head>

<body>
<nav>
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
                <a href="回饋問卷.php">問卷調查</a>
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

    <form style="width:500px; height:550px; background-color:#E8E8E8; position:absolute;right:500px;border-radius:45px" action="" method="post">
        <label style="position: absolute;right:350px" for="selected_book">請選擇書籍：</label>
        <select style="position: absolute;right:120px" id="selected_book" name="selected_book" onchange="showImage()">
            <option value="B-1">開始在股市賺錢最要緊的大小事</option>
            <option value="B-2">投資中最簡單的事</option>
            <option value="B-3">持續買進</option>
            <option value="B-4">槓桿ETF投資法</option>
            <option value="B-5">華爾街的華爾滋</option>
            <option value="B-6">Excel 選股法</option>
            <option value="B-7">全息人生</option>
            <option value="B-8">3天搞懂買賣股票</option>
            <option value="B-9">Python股票xETF量化交易</option>
            <option value="B-10">漫步股市:給存股族的12個致富心法</option>
        </select>
        <button style="position: absolute;left:390px;text-decoration:none;" ><a  style="text-decoration:none" id="share_button" href="#">心得分享</a></button>
    </form>
    
    <div id="bookImageContainer" class="book-image-container">
        <!-- 这里将显示图像 -->
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
        }

        function showImage() {
            var selectedBook = document.getElementById("selected_book").value;
            var bookImageContainer = document.getElementById("bookImageContainer");

            // 在这里连接到你的数据库
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var imageFilename = xhr.responseText;
                    if (imageFilename) {
                        // 显示图像
                        var img = document.createElement("img");
                        img.src = "images/" + imageFilename;
                        img.alt = selectedBook;
                        bookImageContainer.innerHTML = ""; // 清空容器
                        bookImageContainer.appendChild(img);
                    } else {
                        bookImageContainer.innerHTML = "未找到所选书籍的图像。";
                    }
                }
            };

            xhr.open("POST", "get_image.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("selected_book=" + selectedBook);
        }

        // 在页面加载时触发一次，以显示初始的分享链接
        window.onload = updateShareLink;
    </script>
      <footer>
        <p>Copyright © 2023 NTUB IMD 112402. All rights reserved.</p>
    </footer>
</body>

</html>