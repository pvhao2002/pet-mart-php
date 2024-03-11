<?php
$id = $_GET['id'];
if (!isset($id) || empty($id)) {
    header('location: index.php?page=shop');
    die();
}
$product = ProductDAO::getInstance()->getById($id);
?>

<div id="MainContent" class="main-content" role="main">
    <!--Breadcrumb-->
    <div class="bredcrumbWrap">
        <div class="container breadcrumbs">
            <a href="index.php" title="Back to the home page">Trang chủ</a><span aria-hidden="true"></span><span> Sản
                phẩm</span>
        </div>
    </div>
    <!--End Breadcrumb-->

    <div id="ProductSection-product-template" class="product-template__container prstyle1 container">
        <!--product-single-->
        <div class="product-single">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="product-details-img">
                        <div class="product-thumb">
                            <div id="gallery" class="product-dec-slider-2 product-tab-left">
                                <a data-image="<?php echo $product->getProductImage(); ?>"
                                    data-zoom-image="<?php echo $product->getProductImage(); ?>"
                                    class="slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true"
                                    tabindex="-1">
                                    <img class="blur-up lazyload" data-src="<?php echo $product->getProductImage(); ?>"
                                        src="<?php echo $product->getProductImage(); ?>" alt="" />
                                </a>
                            </div>
                        </div>
                        <div class="zoompro-wrap product-zoom-right pl-20">
                            <div class="zoompro-span">
                                <img class="blur-up lazyload zoompro"
                                    data-zoom-image="<?php echo $product->getProductImage(); ?>" alt=""
                                    src="<?php echo $product->getProductImage(); ?>" />
                            </div>
                            <div class="product-labels"><span class="lbl on-sale">Sale</span><span
                                    class="lbl pr-label1">new</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="product-single__meta">
                        <h1 class="product-single__title">
                            <?php echo $product->getProductName(); ?>
                        </h1>
                        <div class="prInfoRow">
                            <div class="product-stock">
                                <?php if ((int) $product->getStock() > 0) { ?>
                                    <span class="instock ">Còn hàng</span>
                                <?php } else { ?>
                                    <span class="outstock">Hết hàng</span>
                                <?php } ?>
                            </div>
                            <div class="product-stock">Số lượng:
                                <span class="instock ">
                                    <?php echo $product->getStock(); ?> sản phẩm
                                </span>
                            </div>
                            <div class="product-sku">Mã sản phẩm: <span class="variant-sku">PETMART-
                                    <?php echo $product->getProductId(); ?>
                                </span></div>
                            <div class="product-review">
                                <a class="reviewLink" href="#tab4">
                                    <i class="font-13 fa fa-star"></i>
                                    <i class="font-13 fa fa-star"></i>
                                    <i class="font-13 fa fa-star"></i>
                                    <i class="font-13 fa fa-star"></i>
                                    <i class="font-13 fa fa-star"></i>
                                    <span class="txtReview">0 đánh giá</span>
                                </a>
                            </div>
                        </div>
                        <p class="product-single__price product-single__price-product-template">
                            <span
                                class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                <span id="ProductPrice-product-template"><span class="money">
                                        <?php echo (number_format($product->getProductPrice(), 0, '', ',') . ' đ'); ?>
                                    </span></span>
                            </span>
                        </p>
                    </div>
                    <div id="quantity_message">Chỉ còn <span class="items">
                            <?php echo $product->getStock(); ?>
                        </span> sản phẩm trong kho!</div>
                    <form method="post" action="?page=cart&act=add" id="product_form_10508262282" accept-charset="UTF-8"
                        class="product-form product-form-product-template hidedropdown" enctype="multipart/form-data">
                        <!-- Product Action -->
                        <input type="hidden" id="p-id" name="pid" value="<?php echo $product->getProductId(); ?>">
                        <input type="hidden" name="price" value="<?php echo $product->getProductPrice(); ?>">
                        <div class="product-action clearfix">
                            <div class="product-form__item--quantity">
                                <div class="wrapQtyBtn">
                                    <div class="qtyField">
                                        <a data-pid="<?php echo $product->getProductId(); ?>" class="qtyBtn minus"
                                            href="javascript:void(0);"><i class="fa anm anm-minus-r"
                                                aria-hidden="true"></i></a>
                                        <input type="text" id="Quantity" name="quantity" value="1" min="1"
                                            pattern="[0-9]*" class="product-form__input qty">
                                        <a data-pid="<?php echo $product->getProductId(); ?>" class="qtyBtn plus"
                                            href="javascript:void(0);"><i class="fa anm anm-plus-r"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-form__item--submit">
                                <button type="submit" name="cart-add" class="btn product-form__cart-submit">
                                    <span>Thêm vào giỏ hàng</span>
                                </button>
                            </div>
                        </div>
                        <!-- End Product Action -->
                    </form>
                    <div class="display-table shareRow">
                        <div class="display-table-cell text-right">
                            <div class="social-sharing">
                                <a href="javascript:;" class="btn btn--small btn--secondary btn--share share-facebook"
                                    title="Share on Facebook">
                                    <i class="fa fa-facebook-square" aria-hidden="true"></i> <span class="share-title"
                                        aria-hidden="true">Share</span>
                                </a>
                                <a href="javascript:;" class="btn btn--small btn--secondary btn--share share-twitter"
                                    title="Tweet on Twitter">
                                    <i class="fa fa-twitter" aria-hidden="true"></i> <span class="share-title"
                                        aria-hidden="true">Tweet</span>
                                </a>
                                <a href="javascript:;" title="Share on google+"
                                    class="btn btn--small btn--secondary btn--share">
                                    <i class="fa fa-google-plus" aria-hidden="true"></i> <span class="share-title"
                                        aria-hidden="true">Google+</span>
                                </a>
                                <a href="javascript:;" class="btn btn--small btn--secondary btn--share share-pinterest"
                                    title="Pin on Pinterest">
                                    <i class="fa fa-pinterest" aria-hidden="true"></i> <span class="share-title"
                                        aria-hidden="true">Pin it</span>
                                </a>
                                <a href="javascript:;" class="btn btn--small btn--secondary btn--share share-pinterest"
                                    title="Share by Email">
                                    <i class="fa fa-envelope" aria-hidden="true"></i> <span class="share-title"
                                        aria-hidden="true">Email</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <p class="shippingMsg"><i class="fa fa-clock-o" aria-hidden="true"></i> Cửa hàng mở cửa từ <b
                            id="fromDate">Thứ 2</b> đến <b id="toDate">Thứ 7</b>.
                    </p>
                    <div class="userViewMsg" data-user="200" data-time="10000"><i class="fa fa-users"
                            aria-hidden="true"></i> <strong class="uersView">0</strong> người đã tìm kiếm sản phẩm</div>
                </div>
            </div>
        </div>
        <!--End-product-single-->
        <!--Product Fearure-->
        <div class="prFeatures">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 feature">
                    <img src="/assets/client/images/credit-card.png" alt="Safe Payment" title="Safe Payment" />
                    <div class="details">
                        <h3>THANH TOÁN AN TOÀN</h3>Thanh toán bằng nhiều phương thức thanh toán.
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 feature">
                    <img src="/assets/client/images/shield.png" alt="Confidence" title="Confidence" />
                    <div class="details">
                        <h3>SỰ TỰ TIN</h3>Bảo vệ bao gồm việc mua hàng và dữ liệu cá nhân của bạn.
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 feature">
                    <img src="/assets/client/images/worldwide.png" alt="Worldwide Delivery"
                        title="Worldwide Delivery" />
                    <div class="details">
                        <h3>LÀ NHÀ CUNG CẤP TRÊN TOÀN THẾ GIỚI</h3>Hơn 200 quốc gia và khu vực.
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 feature">
                    <img src="/assets/client/images/phone-call.png" alt="Hotline" title="Hotline" />
                    <div class="details">
                        <h3>Hotline</h3>Liên hệ qua +1900 1000.
                    </div>
                </div>
            </div>
        </div>
        <!--End Product Fearure-->
        <!--Product Tabs-->
        <div class="tabs-listing">
            <ul class="product-tabs">
                <li rel="tab1"><a class="tablink">Chi tiết sản phẩm</a></li>
                <li rel="tab2"><a class="tablink">Chính sách mua hàng</a></li>
            </ul>
            <div class="tab-container">
                <div id="tab1" class="tab-content">
                    <div class="product-description rte">
                        <h4>Mô tả:</h4>
                        <p>
                            <?php echo $product->getProductDescription(); ?>
                        </p>
                    </div>
                </div>

                <div id="tab2" class="tab-content">
                    <h4>Chính sách:</h4>
                    <p>Sau khi quý khách thanh toán đơn hàng sẽ nhận được mã QR code gửi về qua email đăng ký. Quý khách
                        mang mã QR code đến cửa hàng và đưa cho nhân viên để nhận hàng.</p>
                </div>
            </div>
        </div>
        <!--End Product Tabs-->
    </div>
    <!--#ProductSection-product-template-->
</div>