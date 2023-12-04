<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang PHP</title>

</head>

<body>

    <div class="horizontal-container">
        <div style="margin-left:10px;margin-right:30px;">
            <h1>Tìm Kiếm</h1>
        </div>
        <button id="buttonDanhMuc">Danh mục</button>
        <div id="search-box">
            <form action="process_search.php" method="GET">
                <input type="text" id="search" name="search" placeholder="Nhập từ khóa......">
                <i id="search-icon" class="fas fa-search"></i>
                <button type="submit" style="display: none;"></button>
            </form>
        </div>
        <button id="buttonDangBai">
            <div class="Dangbai">Đăng bài</div>
        </button>
        <div class="avatar-container">
            <img src="../../img/1.jpg" alt="Avatar">
        </div>
    </div>
    <!-- Các nội dung khác của trang -->


    <div class="container">
    <div class="filter-container">
    <button class="dropbtn">Filter</button>
    <div class="dropdown-content">
      <a href="#" data-filter="all">All</a>
      <a href="#" data-filter="nature">Nature</a>
      <a href="#" data-filter="city">City</a>
      <a href="#" data-filter="food">Food</a>
    </div>
  </div>
        <div class="product-list">
            <div class="product">
                <img src="../../img/chan.png" alt="Product 1">
                <div class="product-describe">
                    <div class="product-title">Product 1</div>
                    <div class="product-price">$19.99</div>
                    <div class="product-describe-text">Danh mục : Xe máy</div>
                    <div class="product-describe-text">Thời gian sử dụng : 3 năm</div>
                </div>
            </div>
            <div class="product">
                <img src="../../img/1.jpg" alt="Product 2">
                <div class="product-describe">
                    <div class="product-title">Product 1</div>
                    <div class="product-price">$19.99</div>
                    <div class="product-describe-text">Danh mục : Xe máy</div>
                    <div class="product-describe-text">Thời gian sử dụng : 3 năm</div>
                </div>
            </div>
            <div class="product">
                <img src="../../img/1.jpg" alt="Product 2">
                <div class="product-describe">
                    <div class="product-title">Product 1</div>
                    <div class="product-price">$19.99</div>
                    <div class="product-describe-text">Danh mục : Xe máy</div>
                    <div class="product-describe-text">Thời gian sử dụng : 3 năm</div>
                </div>

            </div>
            <!-- Thêm các sản phẩm khác vào đây -->
        </div>
        <div class="product-list">
            <div class="product">
                <img src="../../img/chan.png" alt="Product 1">
                <div class="product-describe">
                    <div class="product-title">Product 1</div>
                    <div class="product-price">$19.99</div>
                    <div class="product-describe-text">Danh mục : Xe máy</div>
                    <div class="product-describe-text">Thời gian sử dụng : 3 năm</div>
                </div>
            </div>
            <div class="product">
                <img src="../../img/1.jpg" alt="Product 2">
                <div class="product-describe">
                    <div class="product-title">Product 1</div>
                    <div class="product-price">$19.99</div>
                    <div class="product-describe-text">Danh mục : Xe máy</div>
                    <div class="product-describe-text">Thời gian sử dụng : 3 năm</div>
                </div>
            </div>
            <div class="product">
                <img src="../../img/1.jpg" alt="Product 2">
                <div class="product-describe">
                    <div class="product-title">Product 1</div>
                    <div class="product-price">$19.99</div>
                    <div class="product-describe-text">Danh mục : Xe máy</div>
                    <div class="product-describe-text">Thời gian sử dụng : 3 năm</div>
                </div>
            </div>
            <!-- Thêm các sản phẩm khác vào đây -->
        </div>
        <div class="pagination">
            <a href="#" class="page-link">&laquo; </a>
            <a href="#" class="page-link">1</a>
            <a href="#" class="page-link">2</a>
            <a href="#" class="page-link">3</a>
            <a href="#" class="page-link"> &raquo;</a>
        </div>
    </div>
</body>

</html>