<div id="content" class="site-content">
    <div 
        class="product-header-shop"
        style="background-image:url(<?php echo public_url('site/images') ?>/shop1.jpg.webp);">
        <div class="product-header-content"> <span class="temp-breadcrump desktop_hide">
                <nav class="woocommerce-breadcrumb"><a href="<?php echo base_url() ?>">Trang Chủ</a>Cửa Hàng</nav>
            </span>
            <h1>Sản Phẩm của Morel</h1>
            <p>Hệ thống nguồn điểm hai chiều sub/sat từng đoạt giải thưởng nổi tiếng về khả năng tái tạo âm thanh chất lượng cao
                 cùng với vẻ ngoài hiện đại, riêng biệt mang đến nhiều cách lắp đặt dễ dàng</p>
            <div class="countrydropdown-wrapper">
                <div class="custom-select" style="width:330px;">
                    <form action="" method="post">
                        <div class="select-selected">United States (US)</div>
                        <style>
                        .countrydropdown-wrapper form .select-selected {
                            background-image: none;
                            padding-right: 0;
                            cursor: default;
                        }
                        </style>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <p class="top-text">Bạn có thể chọn một danh mục hoặc cuộn xuống</p>
        <header class="woocommerce-products-header">
            <div class="woocommerce-notices-wrapper"></div>
            <p class="woocommerce-result-count"></p>
            <ul class="woocommerce-categories">
                <?php foreach($catalog_list as $row): ?>
                <li class="woocommerce-product-category-page"><a href="#<?php echo $row->alias ?>" class="lifestyle"><?php echo $row->name ?></a></li>
                <?php endforeach; ?>
            </ul>
        </header>
        <?php foreach($catalog_list as $row): ?>
        <ul class="products columns-4 shop-page custom_shop">
            <h2 id="<?php echo $row->alias ?>"> <?php echo $row->name ?></h2>
            <li class="entry product type-product post-5947 status-publish first instock product_cat-lifestyle has-post-thumbnail shipping-taxable purchasable product-type-variable"
                id="pdtlifestyle5947" onmouseover="check(this.id)" onmouseout="checkout(this.id)"> <a
                    href="https://www.morelhifi.com/product/nomadic-audio-speakase-ii/"
                    title="Nomadic Audio Speakase II" class="img-anchor">
                    <div class="product-thumbnail"> <img width="170" height="170"
                            src="https://www.morelhifi.com/wp-content/webp-express/webp-images/uploads/2020/04/nomadic-1-white-background-170x170.jpg.webp"
                            class="attachment-shop_catalog size-shop_catalog wp-post-image"
                            alt="Nomadic Audio Speakase all colors" decoding="async" loading="lazy"
                            srcset="https://www.morelhifi.com/wp-content/webp-express/webp-images/uploads/2020/04/nomadic-1-white-background-170x170.jpg.webp 170w,  https://www.morelhifi.com/wp-content/webp-express/webp-images/uploads/2020/04/nomadic-1-white-background-100x100.jpg.webp 100w,  https://www.morelhifi.com/wp-content/webp-express/webp-images/uploads/2020/04/nomadic-1-white-background-400x400.jpg.webp 400w,  https://www.morelhifi.com/wp-content/webp-express/webp-images/uploads/2020/04/nomadic-1-white-background-300x300.jpg.webp 300w,  https://www.morelhifi.com/wp-content/webp-express/webp-images/uploads/2020/04/nomadic-1-white-background-150x150.jpg.webp 150w,  https://www.morelhifi.com/wp-content/webp-express/webp-images/uploads/2020/04/nomadic-1-white-background.jpg.webp 750w"
                            sizes="(max-width: 34.9rem) calc(100vw - 2rem), (max-width: 53rem) calc(8 * (100vw / 12)), (min-width: 53rem) calc(6 * (100vw / 12)), 100vw" />
                    </div> <span class="middle">
                        <h3> Nomadic Audio Speakase II</h3> <span class="price"> <span
                                class="woocommerce-Price-amount amount"><bdi><span
                                        class="woocommerce-Price-currencySymbol">&#36;</span>1,199</bdi></span>
                        </span>
                    </span> <span class="short_desc"> We decided to transform your travel experience into something
                        fun! With innovative speaker engineering and uniquely utilizing the carry </span>
                </a> <a href="https://www.morelhifi.com/product/nomadic-audio-speakase-ii/"
                    class="button product_type_simple" rel="nofollow" style="margin-bottom:20px;">Buy</a></li>
            
        </ul>
        <?php endforeach; ?>
        </main>
    </div>
</div>