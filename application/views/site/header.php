<section class="top_navigation">
        <nav>
            <div id="mega-menu-wrap-menu-1" class="mega-menu-wrap">
                <div class="mega-menu-toggle">
                    <div class="mega-toggle-blocks-left"></div>
                    <div class="mega-toggle-blocks-center"></div>
                    <div class="mega-toggle-blocks-right">
                        <div 
                            class='mega-toggle-block mega-menu-toggle-block mega-toggle-block-1'
                            id='mega-toggle-block-1' tabindex='0'>
                            <span class='mega-toggle-label' role='button' aria-expanded='false'>
                                <span class='mega-toggle-label-closed'>MENU</span>
                                <span class='mega-toggle-label-open'>MENU</span>
                            </span>
                        </div>
                    </div>
                </div>
                <ul 
                    id="mega-menu-menu-1" 
                    class="mega-menu max-mega-menu mega-menu-horizontal mega-no-js"
                    data-event="click" 
                    data-effect="fade_up" 
                    data-effect-speed="200" 
                    data-effect-mobile="disabled"
                    data-effect-speed-mobile="0" 
                    data-mobile-force-width="false" 
                    data-second-click="close"
                    data-document-click="collapse" 
                    data-vertical-behaviour="standard" 
                    data-breakpoint="1025"
                    data-unbind="true" 
                    data-mobile-state="collapse_all" 
                    data-hover-intent-timeout="300"
                    data-hover-intent-interval="100">
                    <li 
                        class='mega-menu-item mega-menu-item-type-post_type mega-menu-item-object-page mega-current-menu-ancestor mega-current_page_ancestor mega-menu-item-has-children mega-menu-megamenu mega-align-bottom-left mega-menu-grid mega-hide-arrow mega-menu-item-34'
                        id='mega-menu-item-34'>
                        <a class="mega-menu-link" href="#" aria-haspopup="true" aria-expanded="false" tabindex="0">Sản Phẩm<span class="mega-indicator" tabindex="0" role="button" aria-label="Products submenu"></span></a>
                        <ul class="mega-sub-menu">
                            <li class='mega-mobile-parent-nav-menu-item mega-menu-item--1' id='mega-menu-item--1'>
                                <a class="mega-menu-link" href="#">Sản Phẩm</a>
                            </li>
                            <?php foreach($catalog_list as $row): ?>
                                <?php 
                                    $url_of_row = ''; 
                                    if($row->redirect_link == ''){
                                        $url_of_row = base_url('product-category/'.$row->alias.'-c'.$row->id);
                                    }else{
                                        $url_of_row = $row->redirect_link;
                                    }
                                ?>
                            <li class='mega-menu-row' id='mega-menu-34-0'>
                                <ul class="mega-sub-menu">
                                    <li class='mega-menu-column mega-more-items mega-menu-columns-2-of-12' id='mega-menu-34-0-0'>
                                        <ul class="mega-sub-menu">
                                            <li 
                                                class='mega-mega-sub mega-menu-item mega-menu-item-type-taxonomy mega-menu-item-object-product_cat mega-menu-item-317'
                                                id='mega-menu-item-317'>
                                                <a class="mega-menu-link" href="<?php echo $url_of_row ?>"><?php echo $row->name ?></a>
                                            </li>
                                            <?php if(count($row->subs) > '0'): ?>
                                                <?php foreach($row->subs as $subs): ?>
                                                    <?php 
                                                        $url_of_subs = ''; 
                                                        if($subs->redirect_link == ''){
                                                            $url_of_subs = base_url('product-category/'.$subs->alias.'-c'.$subs->id);
                                                        }else{
                                                            $url_of_subs = $subs->redirect_link;
                                                        }
                                                    ?>
                                            <li 
                                                class='mega-menu-item mega-menu-item-type-taxonomy mega-menu-item-object-product_cat mega-menu-item-has-children mega-collapse-children mega-has-description mega-menu-item-2789'
                                                id='mega-menu-item-321'>
                                                <a  class="mega-menu-link" href="<?php echo $url_of_subs ?>">
                                                    <span class="mega-description-group">
                                                        <span class="mega-menu-title"><?php echo $subs->name  ?></span>
                                                        <span class="mega-menu-description"><?php echo $subs->meta_desc ?></span>
                                                    </span>
                                                    <?php if(count($subs->subss) > '0'): ?>
                                                    <span class="mega-indicator" tabindex="0" role="button" aria-label="Resolution submenu"></span>
                                                    <?php endif; ?>
                                                </a>
                                                <?php if(count($subs->subss) > '0'): ?>
                                                <ul class="mega-sub-menu">
                                                    <?php foreach($subs->subss as $subss): ?>
                                                        <?php 
                                                            $url_of_subss = ''; 
                                                            if($subss->redirect_link == ''){
                                                                $url_of_subss = base_url('product-category/'.$subss->alias.'-c'.$subss->id);
                                                            }else{
                                                                $url_of_subss = $subss->redirect_link;
                                                            }
                                                        ?>
                                                    <li 
                                                        class='mega-menu-item mega-menu-item-type-post_type mega-menu-item-object-product mega-menu-item-8013'
                                                        id='mega-menu-item-8013'>
                                                        <a class="mega-menu-link" href="<?php echo $url_of_subss ?>"><?php echo $subss->name ?></a>
                                                    </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                                <?php endif; ?>
                                            </li>
                                                <?php endforeach; ?>
                                            
                                            <?php endif; ?>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class='mega-menu-item mega-menu-item-type-post_type mega-menu-item-object-page mega-align-bottom-left mega-menu-flyout mega-menu-item-33'
                        id='mega-menu-item-33'><a class="mega-menu-link" href="<?php echo base_url('technology') ?>"
                            tabindex="0">Công Nghệ</a></li>
                    <li class='mega-menu-item mega-menu-item-type-post_type mega-menu-item-object-page mega-align-bottom-left mega-menu-flyout mega-menu-item-32'
                        id='mega-menu-item-32'><a class="mega-menu-link" href="<?php echo base_url('project') ?>"
                            tabindex="0">Dự Án</a></li>
                    <li class='mega-menu-item mega-menu-item-type-post_type mega-menu-item-object-page mega-align-bottom-left mega-menu-flyout mega-menu-item-11'
                        id='mega-menu-item-11'><a class="mega-menu-link" href="<?php echo base_url('blog') ?>"
                            tabindex="0">Blog</a></li>
                    <li class='mega-menu-item mega-menu-item-type-post_type mega-menu-item-object-page mega-align-bottom-left mega-menu-flyout mega-menu-item-31'
                        id='mega-menu-item-31'><a class="mega-menu-link" href="<?php echo base_url('about-us') ?>"
                            tabindex="0">Về Chúng Tôi</a></li>
                    <li class='mega-menu-item mega-menu-item-type-post_type mega-menu-item-object-page mega-align-bottom-left mega-menu-flyout mega-menu-item-30'
                        id='mega-menu-item-30'><a class="mega-menu-link" href="#"
                            tabindex="0">Liên Hệ</a></li>
                    <li class='mega-menu-item mega-menu-item-type-custom mega-menu-item-object-custom mega-align-bottom-left mega-menu-flyout mega-menu-item-358'
                        id='mega-menu-item-358'><a class="mega-menu-link"
                            href="#" tabindex="0">Đại Lý</a></li>
                    <li class='mega-always-selected mega-menu-item mega-menu-item-type-custom mega-menu-item-object-custom mega-align-bottom-left mega-menu-flyout mega-menu-item-210'
                        id='mega-menu-item-210'><a class="mega-menu-link" href="<?php echo base_url('shop') ?>"
                            tabindex="0">Cửa Hàng</a></li>
                </ul>
            </div>
            <div class="main-menu-more">
                <ul class="main-menu">
                    <li class="menu-item menu-item-has-children"><button
                            class="submenu-expand main-menu-more-toggle is-empty" tabindex="-1" aria-label="More"
                            aria-haspopup="true" aria-expanded="false"><span class="screen-reader-text">Xem Thêm</span><svg
                                class="svg-icon" width="24" height="24" aria-hidden="true" role="img" focusable="false"
                                xmlns="http://www.w3.org/2000/svg">
                                <g fill="none" fill-rule="evenodd">
                                    <path d="M0 0h24v24H0z" />
                                    <path fill="currentColor" fill-rule="nonzero"
                                        d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zM6 14a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm6 0a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm6 0a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                </g>
                            </svg></button>
                        <ul class="sub-menu hidden-links">
                            <li id="menu-item--1" class="mobile-parent-nav-menu-item menu-item--1"><button
                                    class="menu-item-link-return"><svg class="svg-icon" width="24" height="24"
                                        aria-hidden="true" role="img" focusable="false" viewBox="0 0 24 24"
                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"></path>
                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                    </svg>Quay Lại</button></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="header-logo">
                <a class="navbar-brand" href="<?php echo base_url(); ?>">
                    <img src="<?php echo public_url('site/images/morel-logo.png.webp') ?>" alt="logo">
                </a>
            </div>
            <div class="side-icons" style="float:right">
                <form 
                    role="search" 
                    method="get" 
                    id="searchform" 
                    class="searchform" 
                    action="#"
                    autocomplete="off"> 
                    <input 
                        value="" name="s" id="s" type="text" placeholder="Nhập từ khóa" class=""
                        onkeyup="fetch()"> <svg width="31px" height="30px" viewBox="0 0 31 30" version="1.1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>B4EE9002-F454-422F-B3CF-389ABAD8C8FFSVG</title>
                        <desc>Created with sketchtool.</desc>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="gdpr-success" transform="translate(-217.000000, -15.000000)">
                                <g id="Header">
                                    <g id="search" transform="translate(218.000000, 15.842562)">
                                        <path
                                            d="M3.75391147,15.7306766 C0.417101274,12.3938664 0.417101274,7.03113576 3.75391147,3.69432557 C5.42231656,2.02592047 7.56740883,1.19171793 9.77208699,1.19171793 C11.9767652,1.19171793 14.1218574,2.02592047 15.7902625,3.69432557 C19.1270727,7.03113576 19.1270727,12.3938664 15.7902625,15.7306766 C12.4534523,19.0674868 7.09072166,19.0674868 3.75391147,15.7306766 M28.720402,27.8266136 L17.0415663,16.1477779 C20.4379624,12.3342805 20.2592047,6.4948627 16.6244651,2.86012302 C12.8109677,-0.953374341 6.67362039,-0.953374341 2.86012302,2.86012302 C-0.953374341,6.67362039 -0.953374341,12.8109677 2.86012302,16.6244651 C4.7668717,18.5312137 7.26947935,19.4845881 9.7125011,19.4845881 C12.0363511,19.4845881 14.3006151,18.6503855 16.1477779,17.0415663 L27.8266136,28.720402 C27.9457854,28.8395738 28.1245431,28.8991597 28.2437148,28.8991597 C28.3628866,28.8991597 28.5416443,28.8395738 28.6608161,28.720402 C28.9587456,28.4224725 28.9587456,28.0649572 28.720402,27.8266136"
                                            id="Fill-1" fill="#FFFFFF"></path>
                                        <path
                                            d="M3.75391147,15.7306766 C0.417101274,12.3938664 0.417101274,7.03113576 3.75391147,3.69432557 C5.42231656,2.02592047 7.56740883,1.19171793 9.77208699,1.19171793 C11.9767652,1.19171793 14.1218574,2.02592047 15.7902625,3.69432557 C19.1270727,7.03113576 19.1270727,12.3938664 15.7902625,15.7306766 C12.4534523,19.0674868 7.09072166,19.0674868 3.75391147,15.7306766 Z M28.720402,27.8266136 L17.0415663,16.1477779 C20.4379624,12.3342805 20.2592047,6.4948627 16.6244651,2.86012302 C12.8109677,-0.953374341 6.67362039,-0.953374341 2.86012302,2.86012302 C-0.953374341,6.67362039 -0.953374341,12.8109677 2.86012302,16.6244651 C4.7668717,18.5312137 7.26947935,19.4845881 9.7125011,19.4845881 C12.0363511,19.4845881 14.3006151,18.6503855 16.1477779,17.0415663 L27.8266136,28.720402 C27.9457854,28.8395738 28.1245431,28.8991597 28.2437148,28.8991597 C28.3628866,28.8991597 28.5416443,28.8395738 28.6608161,28.720402 C28.9587456,28.4224725 28.9587456,28.0649572 28.720402,27.8266136 Z"
                                            id="Stroke-3" stroke="#FFFFFF" stroke-width="0.5"></path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg></form> 
                    <a href="#/cart/" class="cart-anchor">
                        <span class="cart-icon"></span>
                    </a> 
                    <span class="lang-icon">VN</span>
                <div id="datafetch">Kết Quả Tìm Kiếm</div>
            </div>
        </div>
    </section>
    <div class="mobilesearch-wrapper">
        <div class="mobilesearch-close"> <span>&times;</span></div>
        <div class="mobilesearch-icon"> <svg width="74px" height="74px" viewBox="0 0 31 30" version="1.1"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>B4EE9002-F454-422F-B3CF-389ABAD8C8FFSVG</title>
                <desc>Created with sketchtool.</desc>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="gdpr-success" transform="translate(-217.000000, -15.000000)">
                        <g id="Header">
                            <g id="search" transform="translate(218.000000, 15.842562)">
                                <path
                                    d="M3.75391147,15.7306766 C0.417101274,12.3938664 0.417101274,7.03113576 3.75391147,3.69432557 C5.42231656,2.02592047 7.56740883,1.19171793 9.77208699,1.19171793 C11.9767652,1.19171793 14.1218574,2.02592047 15.7902625,3.69432557 C19.1270727,7.03113576 19.1270727,12.3938664 15.7902625,15.7306766 C12.4534523,19.0674868 7.09072166,19.0674868 3.75391147,15.7306766 M28.720402,27.8266136 L17.0415663,16.1477779 C20.4379624,12.3342805 20.2592047,6.4948627 16.6244651,2.86012302 C12.8109677,-0.953374341 6.67362039,-0.953374341 2.86012302,2.86012302 C-0.953374341,6.67362039 -0.953374341,12.8109677 2.86012302,16.6244651 C4.7668717,18.5312137 7.26947935,19.4845881 9.7125011,19.4845881 C12.0363511,19.4845881 14.3006151,18.6503855 16.1477779,17.0415663 L27.8266136,28.720402 C27.9457854,28.8395738 28.1245431,28.8991597 28.2437148,28.8991597 C28.3628866,28.8991597 28.5416443,28.8395738 28.6608161,28.720402 C28.9587456,28.4224725 28.9587456,28.0649572 28.720402,27.8266136"
                                    id="Fill-1" fill="#FFFFFF"></path>
                                <path
                                    d="M3.75391147,15.7306766 C0.417101274,12.3938664 0.417101274,7.03113576 3.75391147,3.69432557 C5.42231656,2.02592047 7.56740883,1.19171793 9.77208699,1.19171793 C11.9767652,1.19171793 14.1218574,2.02592047 15.7902625,3.69432557 C19.1270727,7.03113576 19.1270727,12.3938664 15.7902625,15.7306766 C12.4534523,19.0674868 7.09072166,19.0674868 3.75391147,15.7306766 Z M28.720402,27.8266136 L17.0415663,16.1477779 C20.4379624,12.3342805 20.2592047,6.4948627 16.6244651,2.86012302 C12.8109677,-0.953374341 6.67362039,-0.953374341 2.86012302,2.86012302 C-0.953374341,6.67362039 -0.953374341,12.8109677 2.86012302,16.6244651 C4.7668717,18.5312137 7.26947935,19.4845881 9.7125011,19.4845881 C12.0363511,19.4845881 14.3006151,18.6503855 16.1477779,17.0415663 L27.8266136,28.720402 C27.9457854,28.8395738 28.1245431,28.8991597 28.2437148,28.8991597 C28.3628866,28.8991597 28.5416443,28.8395738 28.6608161,28.720402 C28.9587456,28.4224725 28.9587456,28.0649572 28.720402,27.8266136 Z"
                                    id="Stroke-3" stroke="#FFFFFF" stroke-width="0.5"></path>
                            </g>
                        </g>
                    </g>
                </g>
            </svg></div>
        <form 
            role="search" method="get" id="mobilesearch" class="mobile-searchform" action="#"
            autocomplete="off"> 
            <input value="" name="s" id="si" type="text" placeholder="Nhập từ khóa" class="mobilesearch-input" onkeyup="fetchmobile()">
            <div id="datafetchmobile">Kết Quả Tìm Kiêm</div>
        </form>
    </div>