                <div class="col-nav">
                    <div class="menu-car-audio-car-audio-menu-container">
                        <ul id="menu-car-audio-car-audio-menu" class="product-side-nav">
                            <?php foreach($catalog_list as $row): ?>
                                <?php 
                                    $url_of_row = ''; 
                                    if($row->redirect_link == ''){
                                        $url_of_row = base_url('product-category/'.$row->alias.'-c'.$row->id);
                                    }else{
                                        $url_of_row = $row->redirect_link;
                                    }
                                ?>
                            <li id="menu-item-8241" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children menu-item-8241">
                                <a href="#" aria-haspopup="true" aria-expanded="false"><?php echo $row->name; ?></a>
                                <?php if(count($row->subs) > '0'): ?>
                                    <ul class="sub-menu">
                                    <?php foreach($row->subs as $subs): ?>
                                        <?php 
                                            $url_of_subs = ''; 
                                            if($subs->redirect_link == ''){
                                                $url_of_subs = base_url('product-category/'.$subs->alias.'-c'.$subs->id);
                                            }else{
                                                $url_of_subs = $subs->redirect_link;
                                            }
                                        ?>
                                        <?php if(count($subs->subss) > '0'): ?>
                                    <li id="menu-item-8256"
                                        class="menu-item menu-item-type-post_type menu-item-object-product current-menu-item current-menu-ancestor current-menu-parent menu-item-has-children menu-item-8256">
                                        <a href="<?php echo $url_of_subs ?>" aria-current="page" aria-haspopup="true" aria-expanded="false"><?php echo $subs->name ?></a>
                                        <ul class="sub-menu">
                                            <?php foreach($subs->subss as $subss): ?>
                                                <?php 
                                                    $url_of_subss = ''; 
                                                    if($subss->redirect_link == ''){
                                                        $url_of_subss = base_url('product-category/'.$subss->alias.'-c'.$subss->id);
                                                    }else{
                                                        $url_of_subss = $subss->redirect_link;
                                                    }
                                                ?>
                                            <li id="menu-item-8294" class="menu-item menu-item-type-post_type menu-item-object-product current-menu-item menu-item-8294">
                                                <a href="<?php echo $url_of_subss ?>" aria-current="page"><?php echo $subss->name ?></a>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                        <?php else: ?>
                                    <li id="menu-item-8259" class="menu-item menu-item-type-post_type menu-item-object-product menu-item-8259">
                                        <a href="<?php echo $url_of_subs ?>"><?php echo $subs->name ?></a>
                                    </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                                <?php endif; ?>
                            </li>

                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>