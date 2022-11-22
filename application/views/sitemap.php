<?php echo '<?xml version="1.0" encoding="UTF-8"?>'?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">

<url>
        <loc><?php echo base_url(); ?></loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
</url>

<?php foreach($catalog_list as $row): ?>
        <?php if($row->url_status == '0'): ?>
                <?php 
                        $url_of_row = base_url($row->alias.'-cat'.$row->id.'.html');
                        if($row->layout_type == '999'){
                                $url_of_row = $row->landingpage_url;
                        }
                ?>
<url>
        <loc><?php echo $url_of_row ?></loc>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
</url>
        <?php endif; ?>
        <?php foreach($row->subs as $subs): ?>
                <?php if($subs->url_status == '0'): ?>
                        <?php 
                                $url_of_subs = base_url($subs->alias.'-cat'.$subs->id.'.html');
                                if($subs->layout_type == '999'){
                                        $url_of_subs = $subs->landingpage_url;
                                }
                        ?>
        <url>
                <loc><?php echo $url_of_subs ?></loc>
                <changefreq>daily</changefreq>
                <priority>0.8</priority>
        </url>
                <?php endif; ?>
                <?php foreach($subs->subss as $subss): ?>
                        <?php if($subss->url_status == '0'): ?>
                                <?php 
                                        $url_of_subss = base_url($subss->alias.'-cat'.$subss->id.'.html');
                                        if($subss->layout_type == '999'){
                                                $url_of_subss = $subs->landingpage_url;
                                        }
                                ?>
                <url>
                        <loc><?php echo $url_of_subss ?></loc>
                        <changefreq>daily</changefreq>
                        <priority>0.7</priority>
                </url>
                        <?php endif; ?>
                <?php endforeach; ?>

        <?php endforeach; ?>
<?php endforeach; ?>

<?php foreach($news_list as $row): ?>
<url>
        <loc><?php echo base_url($row->alias.'-news'.$row->id.'.html') ?></loc>
        <changefreq>daily</changefreq>
        <priority>0.6</priority>
</url>
<?php endforeach; ?>


</urlset>