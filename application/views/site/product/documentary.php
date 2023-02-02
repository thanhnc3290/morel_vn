<section class="section-product-docs" id="docs">
    <div class="ys-container">
        <h2 class="section-title" style="font-family: Roboto !important;">Thông Tin & Tài Liệu</h2>
        <ul class="downloads">
            <?php 
                $documentary_list_of_this_info = array();
                if(is_array(json_decode($info->documentary))){
                    $documentary_list_of_this_info = json_decode($info->documentary);
                }
            ?>
            <?php foreach($documentary_list_of_this_info as $row): ?>
            <li> <a href="<?php echo base_url('upload/product/'.$row) ?>" target="_blank"><?php echo str_replace(array('_','-'),' ',$row) ?><span class="icomoon icomoon-download" aria-hidden="true"></span> </a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>