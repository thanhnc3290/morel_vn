        <section 
            id="home_banner_1" class="new-grid-section p-3 p-md-0" 
            style="background-image:url(<?php echo base_url('upload/site_info/'.$site_info->relate_banner_image); ?>)">
            <div class="container-fluid">
                <div class="row height-new-grid">
                    <div class="col-6 d-none d-md-block"></div>
                    <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                        <div class="text-center">
                            <a class="text-white new-grid-button" href="<?php echo $site_info->relate_banner_link ?>" style="background: #000!important; color: #fff !important;">Xem Thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section 
            id="home_banner_2" class="new-grid-section p-3 p-md-0"
            style="background-image:url(<?php echo base_url('upload/site_info/'.$site_info->relate_banner_image_2); ?>)">
            <div class="container-fluid">
                <div class="row height-new-grid">
                    <div class="col-6 d-none d-md-block"></div>
                    <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                        <div class="text-center">
                            <a class="text-white new-grid-button" href="<?php echo $site_info->relate_banner_link_2 ?>" style="background: #000!important; color: #fff !important;">Xem Thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


<script>
    //detect thiết bị di động để css
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        //css theo thiết bị từ đầu
        if(window.innerHeight < window.innerWidth){
            document.getElementById('home_banner_1').setAttribute('style','background-image:url(<?php echo base_url('upload/site_info/'.$site_info->relate_banner_image); ?>');
            document.getElementById('home_banner_2').setAttribute('style','background-image:url(<?php echo base_url('upload/site_info/'.$site_info->relate_banner_image_2); ?>');
        }else{
            document.getElementById('home_banner_1').setAttribute('style','background-image:url(<?php echo base_url('upload/site_info/'.$site_info->relate_banner_image_mobile); ?>');
            document.getElementById('home_banner_2').setAttribute('style','background-image:url(<?php echo base_url('upload/site_info/'.$site_info->relate_banner_image_2_mobile); ?>');
        }
        // Bắt event xoay ngang dọc để css
        window.addEventListener("orientationchange", function() {
            if((window.orientation > 0)){
                document.getElementById('home_banner_1').setAttribute('style','background-image:url(<?php echo base_url('upload/site_info/'.$site_info->relate_banner_image); ?>');
                document.getElementById('home_banner_2').setAttribute('style','background-image:url(<?php echo base_url('upload/site_info/'.$site_info->relate_banner_image_2); ?>');
            }else{
                document.getElementById('home_banner_1').setAttribute('style','background-image:url(<?php echo base_url('upload/site_info/'.$site_info->relate_banner_image_mobile); ?>');
                document.getElementById('home_banner_2').setAttribute('style','background-image:url(<?php echo base_url('upload/site_info/'.$site_info->relate_banner_image_2_mobile); ?>');
            }
        }, false);
    }
</script>