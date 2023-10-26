<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="112402組員">
    <meta name="description" content="虛擬世界的書架 提供使用者裡用平台了解投資工具並體驗!">
    <meta name="keywords" content="虛擬世界的書架">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>虛擬世界的書架</title>
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
    <hr>
   
    <nav>
        <iframe  width="1500px" height="500px" src="https://forms.office.com/Pages/ResponsePage.aspx?id=U41DSBo5g0CZfmPnBTOK_YfGmSO2VZZJvBZkxX3XhAxUMEM0UkxBRFBEOUswMFFaV1Y5SkdCMVpSNi4u&embed=true" frameborder="" marginwidth="0" marginheight="0" style="border:3px solid rgb(128, 128, 130); max-width:100%; max-height:100vh;border-radius: 5px;" allowfullscreen webkitallowfullscreen mozallowfullscreen msallowfullscreen> </iframe>
    </nav>
    <footer>
        <p>Copyright © 2023 NTUB IMD 112402. All rights reserved.</p>
    </footer>
</body>
</html>