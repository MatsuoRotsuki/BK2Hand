<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="witdth=device-width, initial-sacle=1.0">
        <script src="https://kit.fontawesome.com/3e14c3f754.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style.css">
        <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
        <!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->

        <title>BK 2Hand</title>

    </head>
    <body>
      <header>
        <div class="logo" >
            <img src="image/logo.PNG" alt="" style="width: 40px;">
        </div>
        <div class="menu">
            <li id="submenu-open"><a href="#"><button>Danh mục</button></a></li>
            <div class="submenu">
                <div class="submenu-content">
                    <span id="submenu-close"><i class="fa-solid fa-xmark"></i></span>
                    <div class="tab">
                        <button class="tablinks" onclick="openMenu(event, '1')">Xe cộ</button>
                        <button class="tablinks" onclick="openMenu(event, '2')">Đồ điện lạnh</button>
                        <button class="tablinks" onclick="openMenu(event, '3')">Đồ nội thất</button>
                        <button class="tablinks" onclick="openMenu(event, '4')">Thú cưng</button>
                        <button class="tablinks" onclick="openMenu(event, '5')">Thời trang</button>
                        <button class="tablinks" onclick="openMenu(event, '6')">Đồ Điện tử</button>
                        <button class="tablinks" onclick="openMenu(event, '7')">Đồ dùng học tập</button>
                        <button class="tablinks" onclick="openMenu(event, '8')">Khác</button>
                    </div>
                    <div id="1" class="tabcontent">
                        <button class="tablinks" onclick="openMenu(event, '11')">Xe đạp</button>
                        <button class="tablinks" onclick="openMenu(event, '12')">Xe máy</button>
                        <button class="tablinks" onclick="openMenu(event, '13')">Xe điện</button>
                        <button class="tablinks" onclick="openMenu(event, '14')">Phụ tùng</button>
                    </div>
                    <div id="2" class="tabcontent">
                        <button class="tablinks" onclick="openMenu(event, '21')">Tivi</button>
                        <button class="tablinks" onclick="openMenu(event, '22')">Tủ lạnh</button>
                        <button class="tablinks" onclick="openMenu(event, '23')">Máy giặt</button>
                        <button class="tablinks" onclick="openMenu(event, '24')">Nóng lạnh</button>
                        <button class="tablinks" onclick="openMenu(event, '25')">Điều hòa</button>
                        <button class="tablinks" onclick="openMenu(event, '26')">Quạt</button>
                        <button class="tablinks" onclick="openMenu(event, '27')">Nồi cơm</button>
                        <button class="tablinks" onclick="openMenu(event, '28')">Máy sấy</button>
                    </div>
                    <div id="3" class="tabcontent">
                        <button class="tablinks" onclick="openMenu(event, '31')">Tủ</button>
                        <button class="tablinks" onclick="openMenu(event, '32')">Giường</button>
                        <button class="tablinks" onclick="openMenu(event, '33')">Ghế</button>
                        <button class="tablinks" onclick="openMenu(event, '34')">Bàn</button>
                        <button class="tablinks" onclick="openMenu(event, '35')">Bát, đĩa</button>
                        <button class="tablinks" onclick="openMenu(event, '36')">Giá treo</button>
                        <button class="tablinks" onclick="openMenu(event, '37')">Móc</button>
                        <button class="tablinks" onclick="openMenu(event, '38')">Khác</button>
                    </div>
                    <div id="4" class="tabcontent">
                        <h4>Thú cưng</h4>
                        
                    </div>
                    <div id="5" class="tabcontent">
                        <h4>Thời trang</h4>
                        
                    </div>
                    <div id="6" class="tabcontent">
                        <button class="tablinks" onclick="openMenu(event, '61')">Điện thoại</button>
                        <button class="tablinks" onclick="openMenu(event, '62')">Máy tính</button>
                        <button class="tablinks" onclick="openMenu(event, '63')">Máy tính bảng</button>
                        <button class="tablinks" onclick="openMenu(event, '64')">Khác</button>
                    </div>
                    <div id="7" class="tabcontent">
                        <h4>Đồ dùng học tập</h4>
                        
                    </div>
                    <div id="8" class="tabcontent">
                        <h4>None</h4>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="search-bar">
            <li><input type="text" placeholder=""><i class="fas fa-search"></i></li>
        </div>
        <div class="other">
            <li><a href=""><button><i class="fas fa-plus"></i>Đăng bài</button></a></li>
        </div>
        <div class="avatar" >
            <img src="image/avt.PNG" alt="" style="width: 40px;">
        </div>
      </header>