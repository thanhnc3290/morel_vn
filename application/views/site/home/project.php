<?php 
    $count_project = '0';
    foreach($project_list as $row){
        $count_project++;
        if($count_project == '1'){$home_project_1 = $row;}
        if($count_project == '2'){$home_project_2 = $row;}
        if($count_project == '3'){$home_project_3 = $row;}
        if($count_project == '4'){$home_project_4 = $row;}
        if($count_project == '5'){$home_project_5 = $row;}
    }
?>

<section class="projects-section" id="projects-section">
    <div id="demo" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <?php if(isset($home_project_1)): ?>
            <div class="carousel-item active">
                <div class="container">
                    <div class="row carousel-caption">
                        <div class="col-lg-4 col-md-4 projects_contentpart" style="margin-left:0%;">
                            <div class="project_title"><span><?php echo $home_project_1->name ?></span></div>
                            <div class="project_short_description">
                                <p><?php echo mb_strimwidth($home_project_1->meta_desc,'0','80','...'); ?></p>
                            </div>
                            <div class="project_button"> 
                                <a href="<?php echo base_url('project/'.$home_project_1->alias.'-p'.$home_project_1->id); ?>">Xem Dự Án</a>
                            </div>
                            <ul class="carousel-indicators">
                                <li data-target="#demo" data-slide-to="0" class="active"></li>
                                <li data-target="#demo" data-slide-to="1"></li>
                                <li data-target="#demo" data-slide-to="2"></li>
                                <li data-target="#demo" data-slide-to="3"></li>
                                <li data-target="#demo" data-slide-to="4"></li>
                            </ul>
                        </div>
                        <div class="col-lg-8 col-md-8 mobile_hide">&nbsp;</div>
                    </div>
                </div>
                <div class="image-wrapper"> 
                    <img src="<?php if($home_project_1->image_link !== ''){echo base_url('upload/project/'.$home_project_1->image_link);}else{echo public_url('site/images/no_image.jpg');} ?>" alt="<?php echo $home_project_1->name ?>" width="1100" height="500"/>
                </div>
            </div>
            <?php endif; ?>
            <?php if(isset($home_project_2)): ?>
            <div class="carousel-item">
                <div class="container">
                    <div class="row carousel-caption">
                        <div class="col-lg-4 col-md-4 projects_contentpart" style="margin-left:23%;">
                            <div class="project_title"><span><?php echo $home_project_2->name ?></span></div>
                            <div class="project_short_description">
                                <p><?php echo mb_strimwidth($home_project_2->meta_desc,'0','80','...'); ?></p>
                            </div>
                            <div class="project_button"> <a href="<?php echo base_url('project/'.$home_project_2->alias.'-p'.$home_project_2->id); ?>">Xem Dự Án</a></div>
                            <ul class="carousel-indicators">
                                <li data-target="#demo" data-slide-to="0"></li>
                                <li data-target="#demo" data-slide-to="1" class="active"></li>
                                <li data-target="#demo" data-slide-to="2"></li>
                                <li data-target="#demo" data-slide-to="3"></li>
                                <li data-target="#demo" data-slide-to="4"></li>
                            </ul>
                        </div>
                        <div class="col-lg-8 col-md-8 mobile_hide">&nbsp;</div>
                    </div>
                </div>
                <div class="image-wrapper"> 
                    <img src="<?php if($home_project_2->image_link !== ''){echo base_url('upload/project/'.$home_project_2->image_link);}else{echo public_url('site/images/no_image.jpg');} ?>" alt="<?php echo $home_project_2->name ?>" width="1100" height="500"/>
                </div>
            </div>
            <?php endif; ?>

            <?php if(isset($home_project_3)): ?>
            <div class="carousel-item">
                <div class="container">
                    <div class="row carousel-caption">
                        <div class="col-lg-4 col-md-4 projects_contentpart" style="margin-left:46%;">
                            <div class="project_title"><span><?php echo $home_project_3->name ?></span></div>
                            <div class="project_short_description">
                                <p><?php echo mb_strimwidth($home_project_3->meta_desc,'0','80','...'); ?></p>
                            </div>
                            <div class="project_button"> <a href="<?php echo base_url('project/'.$home_project_3->alias.'-c'.$home_project_3->id) ?>">Xem Dự Án</a></div>
                            <ul class="carousel-indicators">
                                <li data-target="#demo" data-slide-to="0"></li>
                                <li data-target="#demo" data-slide-to="1"></li>
                                <li data-target="#demo" data-slide-to="2" class="active"></li>
                                <li data-target="#demo" data-slide-to="3"></li>
                                <li data-target="#demo" data-slide-to="4"></li>
                            </ul>
                        </div>
                        <div class="col-lg-8 col-md-8 mobile_hide">&nbsp;</div>
                    </div>
                </div>
                <div class="image-wrapper"> 
                    <img src="<?php if($home_project_3->image_link !== ''){echo base_url('upload/project/'.$home_project_3->image_link);}else{echo public_url('site/images/no_image.jpg');} ?>" alt="<?php echo $home_project_3->name ?>" width="1100" height="500"/>
                </div>
            </div>
            <?php endif; ?>
            
            <?php if(isset($home_project_4)): ?>
            <div class="carousel-item">
                <div class="container">
                    <div class="row carousel-caption">
                        <div class="col-lg-4 col-md-4 projects_contentpart" style="margin-left:69%;">
                            <div class="project_title"><span><?php echo $home_project_4->name ?></span></div>
                            <div class="project_short_description">
                                <p><?php echo mb_strimwidth($home_project_4->meta_desc,'0','80','...'); ?></p>
                            </div>
                            <div class="project_button"> <a href="<?php echo base_url('project/'.$home_project_4->alias.'-c'.$home_project_4->id) ?>">Xem Dự Án</a></div>
                            <ul class="carousel-indicators">
                                <li data-target="#demo" data-slide-to="0"></li>
                                <li data-target="#demo" data-slide-to="1"></li>
                                <li data-target="#demo" data-slide-to="2"></li>
                                <li data-target="#demo" data-slide-to="3" class="active"></li>
                                <li data-target="#demo" data-slide-to="4"></li>
                            </ul>
                        </div>
                        <div class="col-lg-8 col-md-8 mobile_hide">&nbsp;</div>
                    </div>
                </div>
                <div class="image-wrapper"> 
                    <img src="<?php if($home_project_4->image_link !== ''){echo base_url('upload/project/'.$home_project_4->image_link);}else{echo public_url('site/images/no_image.jpg');} ?>" alt="<?php echo $home_project_4->name ?>" width="1100" height="500"/>
                </div>
            </div>
            <?php endif; ?>

            <?php if(isset($home_project_5)): ?>
            <div class="carousel-item">
                <div class="container">
                    <div class="row carousel-caption">
                        <div class="col-lg-4 col-md-4 projects_contentpart" style="margin-left:92%;">
                            <div class="project_title"><span><?php echo $home_project_5->name ?></span></div>
                            <div class="project_short_description">
                                <p><?php echo mb_strimwidth($home_project_5->meta_desc,'0','80','...'); ?></p>
                            </div>
                            <div class="project_button"> <a href="<?php echo base_url('project/'.$home_project_5->alias.'-c'.$home_project_5->id) ?>">Xem Dự Án</a></div>
                            <ul class="carousel-indicators">
                                <li data-target="#demo" data-slide-to="0"></li>
                                <li data-target="#demo" data-slide-to="1"></li>
                                <li data-target="#demo" data-slide-to="2"></li>
                                <li data-target="#demo" data-slide-to="3"></li>
                                <li data-target="#demo" data-slide-to="4" class="active"></li>
                            </ul>
                        </div>
                        <div class="col-lg-8 col-md-8 mobile_hide">&nbsp;</div>
                    </div>
                </div>
                <div class="image-wrapper"> 
                    <img src="<?php if($home_project_5->image_link !== ''){echo base_url('upload/project/'.$home_project_5->image_link);}else{echo public_url('site/images/no_image.jpg');} ?>" alt="<?php echo $home_project_5->name ?>" width="1100" height="500"/>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>