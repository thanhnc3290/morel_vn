        <!-- Desktop -->
        <section class="products-section mobile_hide">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-title"><?php echo $site_info->relate_title_1 ?></h1>
                        <h2 class="section-title"><?php echo $site_info->relate_title_2 ?></h2>
                    </div>
                </div>
                <!-- danh sách sản phẩm tiêu biểu -->
                <!-- end danh sách sản phẩm tiêu biểu -->
                <?php 
                    $home_relate_product_list = array();
                    if(is_array(json_decode($site_info->relate_product_list))){
                        $home_relate_product_list = json_decode($site_info->relate_product_list);
                    }
                ?>
                <div class="row">
                    <?php $count_home_relate_product = '0'; ?>
                    <?php foreach($home_relate_product_list as $row): ?>
                        <?php $count_home_relate_product++; ?>
                        <?php if($count_home_relate_product <= '4'): ?>
                            <?php
                                $product = $this->product_model->get_info($row);
                                $product_image = public_url('site/images/no_image.jpg');
                                if($product->image_link !== ''){
                                    $product_image = base_url('upload/product/'.$product->image_link);
                                }
                                $product_url = base_url('product/'.$product->alias.'-p'.$product->id);
                            ?>
                    <div class="col-md-3 product_column" id="homepdt2370" onmouseover="checkfront(2370)" onmouseout="checkoutfront(2370)">
                        <div class="product_image"> 
                            <a href="<?php echo $product_url ?>">
                                <img width="198" height="198"
                                    src="<?php echo $product_image ?>"
                                    class="attachment-198x207 size-198x207 wp-post-image" 
                                    alt="<?php echo $product->name ?>"
                                    decoding="async" loading="lazy"
                                    srcset="
                                        <?php echo $product_image ?> 1100w,  
                                        <?php echo $product_image ?> 170w,  
                                        <?php echo $product_image ?> 100w,  
                                        <?php echo $product_image ?> 400w,  
                                        <?php echo $product_image ?> 150w,  
                                        <?php echo $product_image ?> 300w,  
                                        <?php echo $product_image ?> 768w,  
                                        <?php echo $product_image ?> 1024w"
                                    sizes="(max-width: 198px) 100vw, 198px" /> 
                            </a>
                        </div>
                        <div class="product_title"> 
                            <span>
                                <a href="<?php echo $product_url ?>"><?php echo $product->name ?></a>
                            </span>
                        </div>
                        <div class="product_short_description">
                            <p><?php echo $product->meta_desc ?></p> 
                            <a href="<?php echo $product_url ?>" class="button product_type_simple" rel="nofollow" style="margin-top:2em;">MUA</a>
                        </div>
                    </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- END Desktop -->

        <!-- Mobile -->
        <section class="products-section desktop_hide">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="section-title"><?php echo $site_info->relate_title_2 ?></h2>
                    </div>
                </div>
                <div id="demo2" class="carousel slide" data-ride="carousel">
                    <ul class="carousel-indicators">
                        <li data-target="#demo2" data-slide-to="0" class="active"></li>
                        <li data-target="#demo2" data-slide-to="1" class=""></li>
                        <li data-target="#demo2" data-slide-to="2" class=""></li>
                        <li data-target="#demo2" data-slide-to="3" class=""></li>
                    </ul>
                    <!-- danh sách sản phẩm tiêu biểu -->
                    <!-- end danh sách sản phẩm tiêu biểu -->
                    
                    <div class="row carousel-inner">
                        <?php $count_home_relate_product = '0'; ?>
                        <?php foreach($home_relate_product_list as $row): ?>
                            <?php $count_home_relate_product++; ?>
                            <?php if($count_home_relate_product <= '4'): ?>
                                <?php
                                    $product = $this->product_model->get_info($row);
                                    $product_image = public_url('site/images/no_image.jpg');
                                    if($product->image_link !== ''){
                                        $product_image = base_url('upload/product/'.$product->image_link);
                                    }
                                    $product_url = base_url('product/'.$product->alias.'-p'.$product->id);
                                ?>
                        <div class="col-md-3 product_column carousel-item <?php if($count_home_relate_product == '1'){ echo 'active';} ?>">
                            <div class="product_image"> 
                                <a href="<?php echo $product_url ?>">
                                    <img width="198" height="198"
                                        src="<?php echo $product_image ?>"
                                        class="attachment-198x207 size-198x207 wp-post-image"
                                        alt="Octave LE FLR black and white" decoding="async" loading="lazy"
                                        srcset="
                                            <?php echo $product_image ?> 1100w,  
                                            <?php echo $product_image ?> 170w,  
                                            <?php echo $product_image ?> 100w,  
                                            <?php echo $product_image ?> 400w,  
                                            <?php echo $product_image ?> 150w,  
                                            <?php echo $product_image ?> 300w,  
                                            <?php echo $product_image ?> 768w,  
                                            <?php echo $product_image ?> 1024w"
                                        sizes="(max-width: 198px) 100vw, 198px" /> </a></div>
                            <div class="product_title"> 
                                <span><a href="<?php echo $product_url ?>"><?php echo $product->name ?></a></span>
                            </div>
                            <div class="product_short_description">
                                <p><?php echo $product->meta_desc; ?></p>
                            </div>
                        </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        
                    </div>
                </div>
        </section>
        <!-- END Mobile -->