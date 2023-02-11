<div class="footer-widgets">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer-widget footer-widget-content">
                    <p>
                        <img decoding="async" loading="lazy" class="alignnone wp-image-6762"
                            src="<?php echo public_url('site/images') ?>/Morel-Logo-with-frame-55x55-for-footer.png.webp"
                            alt="" width="47" height="47" />
                    </p>
                    <p>Nhà sản xuất hàng đầu về loa thủ công từng đoạt giải thưởng và trình điều khiển thô cho âm trung
                        đến
                        OEM cao cấp, thị trường âm thanh gia đình và xe hơi, Morel kỷ niệm 45 năm nội bộ
                        kỹ thuật, sản xuất và đổi mới. Morel là sự lựa chọn của nhiều người lớn nhất
                        tên trong ngành công nghiệp âm nhạc.</p>
                </div>
                <div id="fb-modal-login" style="display:none"></div>
            </div>
            <div class="col-lg-3">
                <div class="footer-widget footer-widget-nav footer-widget-nav-1">
                    <h5 class="footer-widget-title"> Sản Phẩm</h5>
                    <nav class="nav">
                        <div class="menu-footer-menu-4-container">
                            <ul id="menu-footer-menu-4" class="menu">
                                <?php foreach($catalog_list as $row): ?>
                                <li id="menu-item-6756"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-6756">
                                    <a
                                        href="<?php echo base_url('product-category/'.$row->alias.'-c'.$row->id) ?>"><?php echo $row->name ?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-widget footer-widget-nav footer-widget-nav-2">
                    <h5 class="footer-widget-title"> MOREL</h5>
                    <nav class="nav">
                        <div class="menu-footer-menu-2-container">
                            <ul id="menu-footer-menu-2" class="menu">
                                <li id="menu-item-6763"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6763">
                                    <a href="#">Liên Hệ</a>
                                </li>
                                <li id="menu-item-775"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-775">
                                    <a href="<?php echo base_url('shop') ?>">Của Hàng</a>
                                </li>
                                <li id="menu-item-258"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-258">
                                    <a href="<?php echo base_url('about-us') ?>">Về Chúng Tôi</a>
                                </li>
                                <li id="menu-item-776"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-776">
                                    <a href="<?php echo base_url('technology') ?>">Công Nghệ</a>
                                </li>
                                <li id="menu-item-1307"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1307">
                                    <a href="#">Reviews</a>
                                </li>
                                <li id="menu-item-772"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-772">
                                    <a href="<?php echo base_url('blog') ?>">Blog</a>
                                </li>
                                <li id="menu-item-1313"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1313">
                                    <a href="#">Archive</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-widget footer-widget-nav footer-widget-nav-3">
                    <h5 class="footer-widget-title"> Điều Khoản</h5>
                    <nav class="nav">
                        <div class="menu-footer-menu-3-container">
                            <ul id="menu-footer-menu-3" class="menu">
                                <li id="menu-item-659"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-659">
                                    <a href="#">Chính sách bán hàng</a>
                                </li>
                                <li id="menu-item-667"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-667">
                                    <a href="#">Điều lệ sử dụng</a>
                                </li>
                                <li id="menu-item-668"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-privacy-policy menu-item-668">
                                    <a href="#">Chính sách quyền Riêng Tư</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>