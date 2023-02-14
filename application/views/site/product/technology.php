<section class="section-product-tech" id="tech">
    <div class="ys-container">
        <h2 class="section-title" style="font-family:Roboto !important;"> Công Nghệ</h2>
        <?php 
            $technology_list_of_this_info = array();
            if(is_array(json_decode($info->technology_id))){
                $technology_list_of_this_info = json_decode($info->technology_id);
            }
        ?>

        <div class="tech tech-count-6">
            <?php if(count($technology_list_of_this_info) > '0'): ?>
            <div class="tech-col">
                <div class="tech-item term-1">
                    <?php if(isset($technology_list_of_this_info['0'])): ?>
                        <?php 
                            $tech_1 = $this->product_technology_model->get_info($technology_list_of_this_info['0']);
                            $image_link_of_tech = public_url('site/images/no_image.jpg');
                            if($tech_1->image_link !== ''){
                                $image_link_of_tech = base_url('upload/product_technology/'.$tech_1->image_link);
                            }
                            $name_of_tech       = $tech_1->name;
                            $content_of_tech    = $tech_1->content;
                        ?>
                    <div class="tech-item-in"
                        style="background-image:url(<?php echo $image_link_of_tech ?>);">
                        <div class="overlay"></div>
                        <footer class="entry-footer">
                            <h3 class="entry-title"><?php echo $name_of_tech ?></h3>
                            <div class="entry-text">
                                <p><?php echo $content_of_tech ?></p>
                            </div>
                        </footer>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="tech-item term-2">
                    <?php if(isset($technology_list_of_this_info['1'])): ?>
                        <?php 
                            $tech_1 = $this->product_technology_model->get_info($technology_list_of_this_info['1']);
                            $image_link_of_tech = public_url('site/images/no_image.jpg');
                            if($tech_1->image_link !== ''){
                                $image_link_of_tech = base_url('upload/product_technology/'.$tech_1->image_link);
                            }
                            $name_of_tech       = $tech_1->name;
                            $content_of_tech    = $tech_1->content;
                        ?>
                    <div class="tech-item-in"
                        style="background-image:url(<?php echo $image_link_of_tech ?>);">
                        <div class="overlay"></div>
                        <footer class="entry-footer">
                            <h3 class="entry-title"><?php echo $name_of_tech ?></h3>
                            <div class="entry-text">
                                <p><?php echo $content_of_tech ?></p>
                            </div>
                        </footer>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="tech-col">
                <div class="tech-item term-3">
                <?php if(isset($technology_list_of_this_info['2'])): ?>
                    <?php 
                        $tech_1 = $this->product_technology_model->get_info($technology_list_of_this_info['2']);
                        $image_link_of_tech = public_url('site/images/no_image.jpg');
                        if($tech_1->image_link !== ''){
                            $image_link_of_tech = base_url('upload/product_technology/'.$tech_1->image_link);
                        }
                        $name_of_tech       = $tech_1->name;
                        $content_of_tech    = $tech_1->content;
                    ?>
                    <div class="tech-item-in"
                        style="background-image:url(<?php echo $image_link_of_tech ?>);">
                        <div class="overlay"></div>
                        <footer class="entry-footer">
                            <h3 class="entry-title"><?php echo $name_of_tech ?></h3>
                            <div class="entry-text">
                                <p><?php echo $content_of_tech ?></p>
                            </div>
                        </footer>
                    </div>
                <?php endif; ?>
                </div>
            </div>
            <div class="tech-col">
                <div class="tech-row">
                    <div class="tech-col">
                        <div class="tech-item term-4">
                            <?php if(isset($technology_list_of_this_info['3'])): ?>
                                <?php 
                                    $tech_1 = $this->product_technology_model->get_info($technology_list_of_this_info['2']);
                                    $image_link_of_tech = public_url('site/images/no_image.jpg');
                                    if($tech_1->image_link !== ''){
                                        $image_link_of_tech = base_url('upload/product_technology/'.$tech_1->image_link);
                                    }
                                    $name_of_tech       = $tech_1->name;
                                    $content_of_tech    = $tech_1->content;
                                ?>
                            <div class="tech-item-in"
                                style="background-image:url(<?php echo $image_link_of_tech; ?>);">
                                <div class="overlay"></div>
                                <footer class="entry-footer">
                                    <h3 class="entry-title"><?php echo $name_of_tech; ?></h3>
                                    <div class="entry-text">
                                        <p><?php echo $content_of_tech; ?></p>
                                    </div>
                                </footer>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="tech-col">
                        <div class="tech-item term-5">
                            <?php if(isset($technology_list_of_this_info['4'])): ?>
                                <?php 
                                    $tech_1 = $this->product_technology_model->get_info($technology_list_of_this_info['2']);
                                    $image_link_of_tech = public_url('site/images/no_image.jpg');
                                    if($tech_1->image_link !== ''){
                                        $image_link_of_tech = base_url('upload/product_technology/'.$tech_1->image_link);
                                    }
                                    $name_of_tech       = $tech_1->name;
                                    $content_of_tech    = $tech_1->content;
                                ?>
                            <div class="tech-item-in"
                                style="background-image:url(<?php echo $image_link_of_tech ?>);">
                                <div class="overlay"></div>
                                <footer class="entry-footer">
                                    <h3 class="entry-title"><?php echo $name_of_tech ?></h3>
                                    <div class="entry-text">
                                        <p><?php echo $content_of_tech ?></p>
                                        <p>&nbsp;</p>
                                    </div>
                                </footer>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="tech-row">
                    <div class="tech-item term-6">
                        <?php if(isset($technology_list_of_this_info['5'])): ?>
                            <?php 
                                $tech_1 = $this->product_technology_model->get_info($technology_list_of_this_info['2']);
                                $image_link_of_tech = public_url('site/images/no_image.jpg');
                                if($tech_1->image_link !== ''){
                                    $image_link_of_tech = base_url('upload/product_technology/'.$tech_1->image_link);
                                }
                                $name_of_tech       = $tech_1->name;
                                $content_of_tech    = $tech_1->content;
                            ?>
                        <div class="tech-item-in"
                            style="background-image:url(<?php echo $image_link_of_tech ?>);">
                            <div class="overlay"></div>
                            <footer class="entry-footer">
                                <h3 class="entry-title"><?php echo $name_of_tech ?></h3>
                                <div class="entry-text">
                                    <p><?php echo $content_of_tech ?></p>
                                </div>
                            </footer>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php else: ?>
                <?php if($info->technology_html !== ''): ?>
                    <?php echo $info->technology_html; ?>
                    <style>
                        .entry-footer{color:white;}
                        .entry-title{margin:0.5rem!important;}
                        #tech > div > div > div:nth-child(4){display: none;}
                        #tech > div > div > div:nth-child(5){display: none;}
                        #tech > div > div > div:nth-child(6){display: none;}
                        #tech > div > div > div:nth-child(7){display: none;}
                        #tech > div > div > div:nth-child(8){display: none;}
                        #tech > div > div > div:nth-child(9){display: none;}
                        #tech > div > div > div:nth-child(10){display: none;}
                    </style>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</section>