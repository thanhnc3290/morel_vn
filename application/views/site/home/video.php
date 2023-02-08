        <section class="video-section">
            <div id="hero-video"></div>
            <div id="customElement" class="player"
                data-property="{videoURL:'<?php echo str_replace('https://www.youtube.com/watch?v=','',$site_info->video_id); ?>',containment:'#hero-video', showControls:false, autoPlay:true, loop:true, mute:true, startAt:0, opacity:1, quality:'default'}">
            </div>
            <div class="video_details">
                <div class="video_headline"><span></span></div>
                <div class="video_button"><a onclick="fullscreen();" style="font-family: Roboto;"><?php echo $site_info->video_title; ?></a></div>
            </div>
            <div class="mbr-arrow hidden-sm-down" aria-hidden="true"> <a href="#products-section"><span></span></a>
            </div>
        </section>