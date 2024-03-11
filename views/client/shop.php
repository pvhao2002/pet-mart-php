<?php
$pageSize = $_GET['pageSize'] ?? 9;
$page = $_GET['pageNumber'] ?? 1;
$category = $_GET['cate'] ?? '';
$sort = $_GET['sort'] ?? '';
$list = ProductDAO::getInstance()->getProducPaginate($page, $pageSize, $category, $sort);
$numberPage = ceil($list['total'] / $pageSize);
?>

<?php require_once('hero.php') ?>
<div class="container mt-3">
    <div class="row">
        <!--Sidebar-->
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar filterbar">
            <div class="closeFilter d-block d-md-none d-lg-none"><i class="icon icon anm anm-times-l"></i></div>
            <div class="sidebar_tags">
                <!--Categories-->
                <div class="sidebar_widget categories filter-widget">
                    <div class="widget-title">
                        <h2>Loại sản phẩm</h2>
                    </div>
                    <div class="widget-content">
                        <ul class="sidebar_categories">
                            <li class="lvl-1"><a href="?page=shop" class="site-nav">Tất
                                    cả</a></li>
                            <li class="lvl-1"><a href="?page=shop&cate=Dog" class="site-nav">Sản
                                    phẩm cho chó</a></li>
                            <li class="lvl-1"><a href="?page=shop&cate=Cat" class="site-nav">Sản phẩm cho mèo</a></li>
                            <li class="lvl-1"><a href="?page=shop&cate=Other" class="site-nav">Sản phẩm khác</a></li>
                        </ul>
                    </div>
                </div>
                <!--Categories-->
                <div class="sidebar_widget">
                    <div class="widget-title">
                        <h2>Khuyến mãi</h2>
                    </div>
                </div>
                <div class="sidebar_widget static-banner">
                    <img src="/assets/client/images/slideshow-banners/banner3.png" alt="Pông pet" width="250"
                        height="400" />
                </div>
                <div class="sidebar_widget">
                    <div class="widget-title">
                        <h2>Tags</h2>
                    </div>
                    <div class="widget-content">
                        <ul class="product-tags">
                            <li><a href="javascript:;" title="Show products matching tag $100 - $400">100k - 400k</a>
                            </li>
                            <li><a href="javascript:;" title="Show products matching tag $400 - $600">400k - 600k</a>
                            </li>
                            <li><a href="javascript:;" title="Show products matching tag $600 - $800">600k - 800k</a>
                            </li>
                            <li><a href="javascript:;" title="Show products matching tag Above $800">Dưới 800k</a></li>
                            <li><a href="javascript:;" title="Show products matching tag Allen Vela">Mèo lông ngắn</a>
                            </li>
                            <li><a href="javascript:;" title="Show products matching tag Black">Mèo ta</a></li>
                            <li><a href="javascript:;" title="Show products matching tag Blue">Mèo anh quốc</a></li>
                            <li><a href="javascript:;" title="Show products matching tag Cantitate">Chó poodle</a></li>
                            <li><a href="javascript:;" title="Show products matching tag Famiza">Sản phẩm phổ biến</a>
                            </li>
                            <li><a href="javascript:;" title="Show products matching tag Gray">Top sản phẩm</a></li>
                            <li><a href="javascript:;" title="Show products matching tag Green">Hạt cho chó</a></li>
                            <li><a href="javascript:;" title="Show products matching tag Hot">Pate cho chó</a></li>
                            <li><a href="javascript:;" title="Show products matching tag jean shop">Dinh dưỡng cho
                                    chó</a></li>
                            <li><a href="javascript:;" title="Show products matching tag jesse kamm">Phụ kiện cho
                                    chó</a></li>
                            <li><a href="javascript:;" title="Show products matching tag L">Thuốc cho chó</a></li>
                            <li><a href="javascript:;" title="Show products matching tag Lardini">Vệ sinh chăm sóc
                                    mèo</a></li>
                            <li><a href="javascript:;" title="Show products matching tag lareida">Sữa cho mèo</a></li>
                            <li><a href="javascript:;" title="Show products matching tag Lirisla">Vi ta min cho mèo</a>
                            </li>
                            <li><a href="javascript:;" title="Show products matching tag M">Balo đựng mèo</a></li>
                            <li><a href="javascript:;" title="Show products matching tag mini-dress">Nhà cho chó</a>
                            </li>
                            <li><a href="javascript:;" title="Show products matching tag Monark">Đồ chơi - Huấn
                                    luyện</a></li>
                            <li><a href="javascript:;" title="Show products matching tag Navy">Rọ mõm</a></li>
                            <li><a href="javascript:;" title="Show products matching tag new">Tông đơ cạo lông</a></li>
                            <li><a href="javascript:;" title="Show products matching tag new arrivals">Lược chải
                                    lông</a></li>
                            <li><a href="javascript:;" title="Show products matching tag Orange">Thuốc trị ve chó</a>
                            </li>
                            <li><a href="javascript:;" title="Show products matching tag oxford">Quần áo cho mèo -
                                    chó</a></li>
                            <li><a href="javascript:;" title="Show products matching tag Oxymat">Kìm cắt móng chân thú
                                    cưng</a></li>
                        </ul>
                        <span class="btn btn--small btnview">View all</span>
                    </div>
                </div>
            </div>
        </div>
        <!--End Sidebar-->
        <!--Main Content-->
        <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">
            <div class="category-description">
                <h3>Danh sách sản phẩm</h3>
            </div>
            <hr>
            <div class="productList">
                <!--Toolbar-->
                <button type="button" class="btn btn-filter d-block d-md-none d-lg-none"> Product Filters</button>
                <div class="toolbar">
                    <div class="filters-toolbar-wrapper">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12 text-right">
                                <div class="filters-toolbar__item">
                                    <label for="SortBy" class="hidden">Sắp xếp</label>
                                    <select name="SortBy" id="SortBy" onchange="changeSort(this)"
                                        class="filters-toolbar__input filters-toolbar__input--sort">
                                        <option value="" selected="selected">Chọn sắp xếp</option>
                                        <option value="A-Z">Theo thứ tự, A-Z</option>
                                        <option value="Z-A">Theo thứ tự, Z-A</option>
                                        <option value="price-asc">Giá, thấp tới cao</option>
                                        <option value="price-desc">Giá, cao tới thấp</option>
                                    </select>
                                    <input class="collection-header__default-sort" type="hidden" value="manual">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--End Toolbar-->
                <div class="grid-products grid--view-items">
                    <div class="row">
                        <?php
                        foreach ($list['data'] as $item) {
                            ?>
                            <div class="col-6 col-sm-6 col-md-4 col-lg-4 item">
                                <!-- start product image -->
                                <div class="product-image">
                                    <!-- start product image -->
                                    <a href="?page=product&id=<?php echo $item->getProductId(); ?>">
                                        <!-- image -->
                                        <img class="primary blur-up lazyload"
                                            data-src="<?php echo $item->getProductImage() ?>"
                                            src="<?php echo $item->getProductImage() ?>" alt="image" title="product">
                                        <!-- End image -->
                                        <!-- Hover image -->
                                        <img class="hover blur-up lazyload"
                                            data-src="<?php echo $item->getProductImage() ?>"
                                            src="<?php echo $item->getProductImage() ?>" alt="image" title="product">
                                        <!-- End hover image -->
                                    </a>
                                    <!-- end product image -->

                                    <!-- Start product button -->
                                    <form class="variants add" action="index.php?page=cart&act=add" method="post">
                                        <input type="hidden" name="pid" value="<?php echo $item->getProductId(); ?>">
                                        <input type="hidden" name="price" value="<?php echo $item->getProductPrice(); ?>">
                                        <button class="btn btn-addto-cart" type="submit">Thêm vào giỏ hàng</button>
                                    </form>
                                    <!-- end product button -->
                                </div>
                                <!-- end product image -->

                                <!--start product details -->
                                <div class="product-details text-center">
                                    <!-- product name -->
                                    <div class="product-name">
                                        <a href="?page=product&id=<?php echo $item->getProductId(); ?>">
                                            <?php echo $item->getProductName(); ?>
                                        </a>
                                    </div>
                                    <!-- End product name -->
                                    <!-- product price -->
                                    <div class="product-price">
                                        <span class="price">
                                            <?php echo (number_format($item->getProductPrice(), 0, '', ',') . ' đ'); ?>
                                        </span>
                                    </div>
                                    <!-- End product price -->
                                </div>
                                <!-- End product details -->
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <hr class="clear">
            <div class="pagination">
                <ul>
                    <?php
                    for ($i = 1; $i <= $numberPage; $i++) {
                        ?>
                        <li class="<?php echo $page == $i ? 'active' : ''; ?>">
                            <a
                                href="?pageNumber=<?php echo $i; ?>&page=shop&cate=<?php echo $category; ?>&sort=<?php echo $sort; ?>">
                                <?php echo $i; ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <!--End Main Content-->
    </div>
</div>

<script>
    function changeSort(e) {
        let url = `?page=shop&sort=${e.value}&pageNumber=<?php echo $page;
        if (isset($category) && $category)
            echo '&cate=' . $category; ?>`;
        window.location.href = url;
    }
</script>