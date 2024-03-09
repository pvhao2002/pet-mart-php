<?php
$listProductDog = ProductDAO::getInstance()->getTop10ProductByCategory(1);
$listProductCat = ProductDAO::getInstance()->getTop10ProductByCategory(2);
$listProductOther = ProductDAO::getInstance()->getTop10ProductByCategory(3);
?>

<div class="tab-slider-product section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="section-header text-center">
                    <h2 class="h2">Sản phẩm phổ biến</h2>
                </div>
                <div class="tabs-listing">
                    <ul class="tabs clearfix">
                        <li class="active" rel="tab1">Chó</li>
                        <li rel="tab2">Mèo</li>
                        <li rel="tab3">Khác</li>
                    </ul>
                    <div class="tab_container">
                        <div id="tab1" class="tab_content grid-products">
                            <div class="productSlider">
                                <?php foreach ($listProductDog as $item) { ?>
                                    <div class="col-12 item">
                                        <!-- start product image -->
                                        <div class="product-image">
                                            <!-- start product image -->
                                            <a href="?page=product&id=<?php echo $item->getProductId(); ?>">
                                                <!-- image -->
                                                <img class="primary blur-up lazyload"
                                                    data-src="<?php echo $item->getProductImage(); ?>"
                                                    src="<?php echo $item->getProductImage(); ?>" alt="image"
                                                    title="<?php echo $item->getCategoryName(); ?>">
                                                <!-- End image -->
                                                <!-- Hover image -->
                                                <img class="hover blur-up lazyload"
                                                    data-src="<?php echo $item->getProductImage(); ?>"
                                                    src="<?php echo $item->getProductImage(); ?>" alt="image"
                                                    title="<?php echo $item->getCategoryName(); ?>">
                                                <!-- End hover image -->
                                                <!-- product label -->
                                                <div class="product-labels rectangular"><span
                                                        class="lbl pr-label1">new</span></div>
                                                <!-- End product label -->
                                            </a>
                                            <!-- end product image -->

                                            <!-- countdown start -->
                                            <div class="saleTime desktop" data-countdown="2024/04/01"></div>
                                            <!-- countdown end -->

                                            <!-- Start product button -->
                                            <form class="variants add" action="index.php?page=cart&act=add" method="post">
                                                <button class="btn btn-addto-cart" type="submit">Thêm vào giỏ hàng</button>
                                            </form>
                                            <div class="button-set">
                                                <a href="javascript:void(0)" title="Quick View"
                                                    class="quick-view-popup quick-view" data-toggle="modal"
                                                    data-target="#content_quickview">
                                                    <i class="icon anm anm-search-plus-r"></i>
                                                </a>
                                                <div class="wishlist-btn">
                                                    <a class="wishlist add-to-wishlist" href="javascript:void(0)">
                                                        <i class="icon anm anm-heart-l"></i>
                                                    </a>
                                                </div>
                                                <div class="compare-btn">
                                                    <a class="compare add-to-compare" href="javascript:void(0)"
                                                        title="Add to Compare">
                                                        <i class="icon anm anm-random-r"></i>
                                                    </a>
                                                </div>
                                            </div>
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

                                            <div class="product-review">
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star"></i>
                                            </div>
                                        </div>
                                        <!-- End product details -->
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div id="tab2" class="tab_content grid-products">
                            <div class="productSlider">
                                <?php foreach ($listProductCat as $item) { ?>
                                    <div class="col-12 item">
                                        <!-- start product image -->
                                        <div class="product-image">
                                            <!-- start product image -->
                                            <a href="?page=product&id=<?php echo $item->getProductId(); ?>">
                                                <!-- image -->
                                                <img class="primary blur-up lazyload"
                                                    data-src="<?php echo $item->getProductImage(); ?>"
                                                    src="<?php echo $item->getProductImage(); ?>" alt="image"
                                                    title="<?php echo $item->getCategoryName(); ?>">
                                                <!-- End image -->
                                                <!-- Hover image -->
                                                <img class="hover blur-up lazyload"
                                                    data-src="<?php echo $item->getProductImage(); ?>"
                                                    src="<?php echo $item->getProductImage(); ?>" alt="image"
                                                    title="<?php echo $item->getCategoryName(); ?>">
                                                <!-- End hover image -->
                                                <!-- product label -->
                                                <div class="product-labels rectangular"><span
                                                        class="lbl pr-label1">new</span></div>
                                                <!-- End product label -->
                                            </a>
                                            <!-- end product image -->

                                            <!-- countdown start -->
                                            <div class="saleTime desktop" data-countdown="2024/04/01"></div>
                                            <!-- countdown end -->

                                            <!-- Start product button -->
                                            <form class="variants add" action="index.php?page=cart&act=add" method="post">
                                                <button class="btn btn-addto-cart" type="submit">Thêm vào giỏ hàng</button>
                                            </form>
                                            <div class="button-set">
                                                <a href="javascript:void(0)" title="Quick View"
                                                    class="quick-view-popup quick-view" data-toggle="modal"
                                                    data-target="#content_quickview">
                                                    <i class="icon anm anm-search-plus-r"></i>
                                                </a>
                                                <div class="wishlist-btn">
                                                    <a class="wishlist add-to-wishlist" href="javascript:void(0)">
                                                        <i class="icon anm anm-heart-l"></i>
                                                    </a>
                                                </div>
                                                <div class="compare-btn">
                                                    <a class="compare add-to-compare" href="javascript:void(0)"
                                                        title="Add to Compare">
                                                        <i class="icon anm anm-random-r"></i>
                                                    </a>
                                                </div>
                                            </div>
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

                                            <div class="product-review">
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star"></i>
                                            </div>
                                        </div>
                                        <!-- End product details -->
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div id="tab3" class="tab_content grid-products">
                            <div class="productSlider">
                                <?php foreach ($listProductOther as $item) { ?>
                                    <div class="col-12 item">
                                        <!-- start product image -->
                                        <div class="product-image">
                                            <!-- start product image -->
                                            <a href="?page=product&id=<?php echo $item->getProductId(); ?>">
                                                <!-- image -->
                                                <img class="primary blur-up lazyload"
                                                    data-src="<?php echo $item->getProductImage(); ?>"
                                                    src="<?php echo $item->getProductImage(); ?>" alt="image"
                                                    title="<?php echo $item->getCategoryName(); ?>">
                                                <!-- End image -->
                                                <!-- Hover image -->
                                                <img class="hover blur-up lazyload"
                                                    data-src="<?php echo $item->getProductImage(); ?>"
                                                    src="<?php echo $item->getProductImage(); ?>" alt="image"
                                                    title="<?php echo $item->getCategoryName(); ?>">
                                                <!-- End hover image -->
                                                <!-- product label -->
                                                <div class="product-labels rectangular"><span
                                                        class="lbl pr-label1">new</span></div>
                                                <!-- End product label -->
                                            </a>
                                            <!-- end product image -->

                                            <!-- countdown start -->
                                            <div class="saleTime desktop" data-countdown="2024/04/01"></div>
                                            <!-- countdown end -->

                                            <!-- Start product button -->
                                            <form class="variants add" action="index.php?page=cart&act=add" method="post">
                                                <button class="btn btn-addto-cart" type="submit">Thêm vào giỏ hàng</button>
                                            </form>
                                            <div class="button-set">
                                                <a href="javascript:void(0)" title="Quick View"
                                                    class="quick-view-popup quick-view" data-toggle="modal"
                                                    data-target="#content_quickview">
                                                    <i class="icon anm anm-search-plus-r"></i>
                                                </a>
                                                <div class="wishlist-btn">
                                                    <a class="wishlist add-to-wishlist" href="javascript:void(0)">
                                                        <i class="icon anm anm-heart-l"></i>
                                                    </a>
                                                </div>
                                                <div class="compare-btn">
                                                    <a class="compare add-to-compare" href="javascript:void(0)"
                                                        title="Add to Compare">
                                                        <i class="icon anm anm-random-r"></i>
                                                    </a>
                                                </div>
                                            </div>
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

                                            <div class="product-review">
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star"></i>
                                            </div>
                                        </div>
                                        <!-- End product details -->
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>