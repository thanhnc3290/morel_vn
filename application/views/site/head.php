<?php 
    if(isset($info)){
        $site_title = $info->name;
        $meta_desc  = $info->meta_desc;
        $meta_key   = $info->meta_key;
        if(isset($info->parent_id)){
            //định danh là catalog
            $social_image_link  = public_url('site/images/no_image.jpg');
            if($info->social_image_link !== ''){
                $social_image_link = base_url('upload/catalog/'.$info->social_image_link);
            }
            $current_url = base_url('product-category/'.$info->alias.'-c'.$info->id);
        }else{
            if(isset($info->catalog_id)){
                //định danh là product
                $social_image_link  = public_url('site/images/no_image.jpg');
                if($info->social_image_link !== ''){
                    $social_image_link = base_url('upload/product/'.$info->social_image_link);
                }
                $current_url = base_url('product/'.$info->alias.'-p'.$info->id);
            }else{
                //định danh là project / 
                $social_image_link  = '';
                $current_url = '';
            }
        }
    }else{
        $site_title = $site_info->site_title;
        $meta_desc  = $site_info->meta_desc;
        $meta_key   = $site_info->meta_key;
        $social_image_link  = base_url('upload/site_info/'.$site_info->social_image_link);
        $current_url    = base_url();
    }
?>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <script data-cfasync="false" data-pagespeed-no-defer>
        var gtm4wp_datalayer_name = "dataLayer";
        var dataLayer = dataLayer || [];
    </script>
    <title><?php echo $site_title ?></title>
    <meta name="description" content="<?php echo $meta_desc ?>" />
    <link rel="canonical" href="https://www.morelhifi.com/" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $site_title ?>" />
    <meta property="og:description" content="<?php echo $meta_desc ?>" />
    <meta property="og:url" content="<?php echo $current_url ?>" />
    <meta property="og:site_name" content="<?php echo $site_title ?>" />
    <meta property="article:modified_time" content="2021-11-22T08:21:20+00:00" />
    <meta property="og:image" content="<?php echo $social_image_link ?>" />
    <meta property="og:image:width" content="1977" />
    <meta property="og:image:height" content="1988" />
    <meta property="og:image:type" content="image/png" />
    <meta name="twitter:card" content="summary_large_image" />
    <script type="application/ld+json" class="yoast-schema-graph">
        {
            "@context": "https://schema.org",
            "@graph": [{
                "@type": "WebPage",
                "@id": "<?php echo base_url() ?>",
                "url": "<?php echo base_url() ?>",
                "name": "Morel - Unleash The Music",
                "isPartOf": {
                    "@id": "<?php echo base_url() ?>#website"
                },
                "about": {
                    "@id": "<?php echo base_url() ?>#organization"
                },
                "datePublished": "2019-02-18T12:25:28+00:00",
                "dateModified": "2021-11-22T08:21:20+00:00",
                "description": "Founded in 1975, Morel is a high-end speaker manufacturer handcrafting award-winning speakers and raw drivers in-house for home and car audio markets, UNLEASH THE MUSIC with us.",
                "breadcrumb": {
                    "@id": "<?php echo base_url() ?>#breadcrumb"
                },
                "inLanguage": "en-US",
                "potentialAction": [{
                    "@type": "ReadAction",
                    "target": ["<?php echo base_url() ?>"]
                }]
            }, {
                "@type": "BreadcrumbList",
                "@id": "<?php echo base_url() ?>#breadcrumb",
                "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "name": "Home"
                }]
            }, {
                "@type": "WebSite",
                "@id": "<?php echo base_url() ?>#website",
                "url": "<?php echo base_url() ?>",
                "name": "Morel",
                "description": "",
                "publisher": {
                    "@id": "<?php echo base_url() ?>#organization"
                },
                "potentialAction": [{
                    "@type": "SearchAction",
                    "target": {
                        "@type": "EntryPoint",
                        "urlTemplate": "<?php echo base_url() ?>/search?key_search={search_term_string}"
                    },
                    "query-input": "required name=search_term_string"
                }],
                "inLanguage": "en-US"
            }, {
                "@type": "Organization",
                "@id": "<?php echo base_url() ?>#organization",
                "name": "MOREL",
                "url": "<?php echo base_url() ?>",
                "logo": {
                    "@type": "ImageObject",
                    "inLanguage": "en-US",
                    "@id": "<?php echo base_url() ?>#/schema/logo/image/",
                    "url": "<?php echo public_url('site/images') ?>/Morel-Logo-with-frame-55x55-for-footer.png",
                    "contentUrl": "<?php echo public_url('site/images') ?>/Morel-Logo-with-frame-55x55-for-footer.png",
                    "width": 55,
                    "height": 55,
                    "caption": "MOREL"
                },
                "image": {
                    "@id": "<?php echo base_url() ?>#/schema/logo/image/"
                }
            }]
        }
    </script>
    <link rel='dns-prefetch' href='//maxcdn.bootstrapcdn.com' />
    <link rel='dns-prefetch' href='//www.google.com' />
    <link rel="alternate" type="application/rss+xml" title="Morel &raquo; Feed" href="<?php echo base_url() ?>feed/" />
    <link rel="alternate" type="application/rss+xml" title="Morel &raquo; Comments Feed" href="<?php echo base_url() ?>comments/feed/" />
    <script type="text/javascript">
        window._wpemojiSettings = {
            "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/72x72\/",
            "ext": ".png",
            "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/svg\/",
            "svgExt": ".svg",
            "source": {
                "concatemoji": "<?php echo str_replace('/','\/',base_url()) ?>public\/site\/js\/wp-emoji-release.min.js?ver=6.1.1"
            }
        };
        /*! This file is auto-generated */
        ! function(e, a, t) {
            var n, r, o, i = a.createElement("canvas"),
                p = i.getContext && i.getContext("2d");

            function s(e, t) {
                var a = String.fromCharCode,
                    e = (p.clearRect(0, 0, i.width, i.height), p.fillText(a.apply(this, e), 0, 0), i.toDataURL());
                return p.clearRect(0, 0, i.width, i.height), p.fillText(a.apply(this, t), 0, 0), e === i.toDataURL()
            }

            function c(e) {
                var t = a.createElement("script");
                t.src = e, t.defer = t.type = "text/javascript", a.getElementsByTagName("head")[0].appendChild(t)
            }
            for (o = Array("flag", "emoji"), t.supports = {
                    everything: !0,
                    everythingExceptFlag: !0
                }, r = 0; r < o.length; r++) t.supports[o[r]] = function(e) {
                if (p && p.fillText) switch (p.textBaseline = "top", p.font = "600 32px Arial", e) {
                    case "flag":
                        return s([127987, 65039, 8205, 9895, 65039], [127987, 65039, 8203, 9895, 65039]) ? !1 : !s([
                            55356, 56826, 55356, 56819
                        ], [55356, 56826, 8203, 55356, 56819]) && !s([55356, 57332, 56128, 56423, 56128, 56418,
                            56128, 56421, 56128, 56430, 56128, 56423, 56128, 56447
                        ], [55356, 57332, 8203, 56128, 56423, 8203, 56128, 56418, 8203, 56128, 56421, 8203,
                            56128, 56430, 8203, 56128, 56423, 8203, 56128, 56447
                        ]);
                    case "emoji":
                        return !s([129777, 127995, 8205, 129778, 127999], [129777, 127995, 8203, 129778, 127999])
                }
                return !1
            }(o[r]), t.supports.everything = t.supports.everything && t.supports[o[r]], "flag" !== o[r] && (t.supports
                .everythingExceptFlag = t.supports.everythingExceptFlag && t.supports[o[r]]);
            t.supports.everythingExceptFlag = t.supports.everythingExceptFlag && !t.supports.flag, t.DOMReady = !1, t
                .readyCallback = function() {
                    t.DOMReady = !0
                }, t.supports.everything || (n = function() {
                    t.readyCallback()
                }, a.addEventListener ? (a.addEventListener("DOMContentLoaded", n, !1), e.addEventListener("load", n, !
                    1)) : (e.attachEvent("onload", n), a.attachEvent("onreadystatechange", function() {
                    "complete" === a.readyState && t.readyCallback()
                })), (e = t.source || {}).concatemoji ? c(e.concatemoji) : e.wpemoji && e.twemoji && (c(e.twemoji), c(e
                    .wpemoji)))
        }(window, document, window._wpemojiSettings);
    </script>
    <style type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <link rel='stylesheet' id='wp-block-library-css' href='<?php echo public_url('site/css') ?>/style.min.css?ver=6.1.1' type='text/css' media='all' />
    <style id='wp-block-library-theme-inline-css' type='text/css'>
        .wp-block-audio figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-audio figcaption {
            color: hsla(0, 0%, 100%, .65)
        }

        .wp-block-audio {
            margin: 0 0 1em
        }

        .wp-block-code {
            border: 1px solid #ccc;
            border-radius: 4px;
            font-family: Menlo, Consolas, monaco, monospace;
            padding: .8em 1em
        }

        .wp-block-embed figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-embed figcaption {
            color: hsla(0, 0%, 100%, .65)
        }

        .wp-block-embed {
            margin: 0 0 1em
        }

        .blocks-gallery-caption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .blocks-gallery-caption {
            color: hsla(0, 0%, 100%, .65)
        }

        .wp-block-image figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-image figcaption {
            color: hsla(0, 0%, 100%, .65)
        }

        .wp-block-image {
            margin: 0 0 1em
        }

        .wp-block-pullquote {
            border-top: 4px solid;
            border-bottom: 4px solid;
            margin-bottom: 1.75em;
            color: currentColor
        }

        .wp-block-pullquote__citation,
        .wp-block-pullquote cite,
        .wp-block-pullquote footer {
            color: currentColor;
            text-transform: uppercase;
            font-size: .8125em;
            font-style: normal
        }

        .wp-block-quote {
            border-left: .25em solid;
            margin: 0 0 1.75em;
            padding-left: 1em
        }

        .wp-block-quote cite,
        .wp-block-quote footer {
            color: currentColor;
            font-size: .8125em;
            position: relative;
            font-style: normal
        }

        .wp-block-quote.has-text-align-right {
            border-left: none;
            border-right: .25em solid;
            padding-left: 0;
            padding-right: 1em
        }

        .wp-block-quote.has-text-align-center {
            border: none;
            padding-left: 0
        }

        .wp-block-quote.is-large,
        .wp-block-quote.is-style-large,
        .wp-block-quote.is-style-plain {
            border: none
        }

        .wp-block-search .wp-block-search__label {
            font-weight: 700
        }

        .wp-block-search__button {
            border: 1px solid #ccc;
            padding: .375em .625em
        }

        :where(.wp-block-group.has-background) {
            padding: 1.25em 2.375em
        }

        .wp-block-separator.has-css-opacity {
            opacity: .4
        }

        .wp-block-separator {
            border: none;
            border-bottom: 2px solid;
            margin-left: auto;
            margin-right: auto
        }

        .wp-block-separator.has-alpha-channel-opacity {
            opacity: 1
        }

        .wp-block-separator:not(.is-style-wide):not(.is-style-dots) {
            width: 100px
        }

        .wp-block-separator.has-background:not(.is-style-dots) {
            border-bottom: none;
            height: 1px
        }

        .wp-block-separator.has-background:not(.is-style-wide):not(.is-style-dots) {
            height: 2px
        }

        .wp-block-table {
            margin: "0 0 1em 0"
        }

        .wp-block-table thead {
            border-bottom: 3px solid
        }

        .wp-block-table tfoot {
            border-top: 3px solid
        }

        .wp-block-table td,
        .wp-block-table th {
            word-break: normal
        }

        .wp-block-table figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-table figcaption {
            color: hsla(0, 0%, 100%, .65)
        }

        .wp-block-video figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-video figcaption {
            color: hsla(0, 0%, 100%, .65)
        }

        .wp-block-video {
            margin: 0 0 1em
        }

        .wp-block-template-part.has-background {
            padding: 1.25em 2.375em;
            margin-top: 0;
            margin-bottom: 0
        }
    </style>
    <link rel='stylesheet' id='wc-block-vendors-style-css'
        href='<?php echo public_url('site/css') ?>/autoptimize_single_1acc6d05dce5567e977de5bb00610c80.css?ver=5.3.3'
        type='text/css' media='all' />
    <link rel='stylesheet' id='wc-block-style-css'
        href='<?php echo public_url('site/css') ?>/autoptimize_single_d3d2c71d7e8cc53428aa836542ccb646.css?ver=5.3.3'
        type='text/css' media='all' />
    <link rel='stylesheet' id='classic-theme-styles-css'
        href='<?php echo public_url('site/css') ?>/classic-themes.min.css?ver=1' type='text/css' media='all' />
    <style id='global-styles-inline-css' type='text/css'>
        body {
            --wp--preset--color--black: #000000;
            --wp--preset--color--cyan-bluish-gray: #abb8c3;
            --wp--preset--color--white: #FFF;
            --wp--preset--color--pale-pink: #f78da7;
            --wp--preset--color--vivid-red: #cf2e2e;
            --wp--preset--color--luminous-vivid-orange: #ff6900;
            --wp--preset--color--luminous-vivid-amber: #fcb900;
            --wp--preset--color--light-green-cyan: #7bdcb5;
            --wp--preset--color--vivid-green-cyan: #00d084;
            --wp--preset--color--pale-cyan-blue: #8ed1fc;
            --wp--preset--color--vivid-cyan-blue: #0693e3;
            --wp--preset--color--vivid-purple: #9b51e0;
            --wp--preset--color--dark-gray: #111;
            --wp--preset--color--light-gray: #767676;
            --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
            --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
            --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
            --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
            --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
            --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
            --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
            --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
            --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
            --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
            --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
            --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
            --wp--preset--duotone--dark-grayscale: url('#wp-duotone-dark-grayscale');
            --wp--preset--duotone--grayscale: url('#wp-duotone-grayscale');
            --wp--preset--duotone--purple-yellow: url('#wp-duotone-purple-yellow');
            --wp--preset--duotone--blue-red: url('#wp-duotone-blue-red');
            --wp--preset--duotone--midnight: url('#wp-duotone-midnight');
            --wp--preset--duotone--magenta-yellow: url('#wp-duotone-magenta-yellow');
            --wp--preset--duotone--purple-green: url('#wp-duotone-purple-green');
            --wp--preset--duotone--blue-orange: url('#wp-duotone-blue-orange');
            --wp--preset--font-size--small: 19.5px;
            --wp--preset--font-size--medium: 20px;
            --wp--preset--font-size--large: 36.5px;
            --wp--preset--font-size--x-large: 42px;
            --wp--preset--font-size--normal: 22px;
            --wp--preset--font-size--huge: 49.5px;
            --wp--preset--spacing--20: 0.44rem;
            --wp--preset--spacing--30: 0.67rem;
            --wp--preset--spacing--40: 1rem;
            --wp--preset--spacing--50: 1.5rem;
            --wp--preset--spacing--60: 2.25rem;
            --wp--preset--spacing--70: 3.38rem;
            --wp--preset--spacing--80: 5.06rem;
        }

        :where(.is-layout-flex) {
            gap: 0.5em;
        }

        body .is-layout-flow>.alignleft {
            float: left;
            margin-inline-start: 0;
            margin-inline-end: 2em;
        }

        body .is-layout-flow>.alignright {
            float: right;
            margin-inline-start: 2em;
            margin-inline-end: 0;
        }

        body .is-layout-flow>.aligncenter {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body .is-layout-constrained>.alignleft {
            float: left;
            margin-inline-start: 0;
            margin-inline-end: 2em;
        }

        body .is-layout-constrained>.alignright {
            float: right;
            margin-inline-start: 2em;
            margin-inline-end: 0;
        }

        body .is-layout-constrained>.aligncenter {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body .is-layout-constrained> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            max-width: var(--wp--style--global--content-size);
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body .is-layout-constrained>.alignwide {
            max-width: var(--wp--style--global--wide-size);
        }

        body .is-layout-flex {
            display: flex;
        }

        body .is-layout-flex {
            flex-wrap: wrap;
            align-items: center;
        }

        body .is-layout-flex>* {
            margin: 0;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        .has-black-color {
            color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-color {
            color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-color {
            color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-color {
            color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-color {
            color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-color {
            color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-color {
            color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-color {
            color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-color {
            color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-color {
            color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-color {
            color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-color {
            color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-background-color {
            background-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-background-color {
            background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-background-color {
            background-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-background-color {
            background-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-background-color {
            background-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-background-color {
            background-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-background-color {
            background-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-background-color {
            background-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-background-color {
            background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-background-color {
            background-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-border-color {
            border-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-border-color {
            border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-border-color {
            border-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-border-color {
            border-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-border-color {
            border-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-border-color {
            border-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-border-color {
            border-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-border-color {
            border-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-border-color {
            border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-border-color {
            border-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
            background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
        }

        .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
            background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
        }

        .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-orange-to-vivid-red-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
        }

        .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
            background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
        }

        .has-cool-to-warm-spectrum-gradient-background {
            background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
        }

        .has-blush-light-purple-gradient-background {
            background: var(--wp--preset--gradient--blush-light-purple) !important;
        }

        .has-blush-bordeaux-gradient-background {
            background: var(--wp--preset--gradient--blush-bordeaux) !important;
        }

        .has-luminous-dusk-gradient-background {
            background: var(--wp--preset--gradient--luminous-dusk) !important;
        }

        .has-pale-ocean-gradient-background {
            background: var(--wp--preset--gradient--pale-ocean) !important;
        }

        .has-electric-grass-gradient-background {
            background: var(--wp--preset--gradient--electric-grass) !important;
        }

        .has-midnight-gradient-background {
            background: var(--wp--preset--gradient--midnight) !important;
        }

        .has-small-font-size {
            font-size: var(--wp--preset--font-size--small) !important;
        }

        .has-medium-font-size {
            font-size: var(--wp--preset--font-size--medium) !important;
        }

        .has-large-font-size {
            font-size: var(--wp--preset--font-size--large) !important;
        }

        .has-x-large-font-size {
            font-size: var(--wp--preset--font-size--x-large) !important;
        }

        .wp-block-navigation a:where(:not(.wp-element-button)) {
            color: inherit;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        .wp-block-pullquote {
            font-size: 1.5em;
            line-height: 1.6;
        }
    </style>
    <link rel='stylesheet' id='agile-store-locator-init-css'
        href='<?php echo public_url('site/css') ?>/autoptimize_single_494b1c0160bb778e077992ab5c9b929e.css?ver=4.7.9'
        type='text/css' media='all' />
    <link rel='stylesheet' id='contact-form-7-css'
        href='<?php echo public_url('site/css') ?>/autoptimize_single_e6fae855021a88a0067fcc58121c594f.css?ver=5.6.4'
        type='text/css' media='all' />
    <link rel='stylesheet' id='cookie-law-info-css'
        href='<?php echo public_url('site/css') ?>/autoptimize_single_20e8490fab0dcf7557a5c8b54494db6f.css?ver=3.0.5'
        type='text/css' media='all' />
    <link rel='stylesheet' id='cookie-law-info-gdpr-css'
        href='<?php echo public_url('site/css') ?>/autoptimize_single_359aca8a88b2331aa34ac505acad9911.css?ver=3.0.5'
        type='text/css' media='all' />
    <link rel='stylesheet' id='wr360overrides-css'
        href='<?php echo public_url('site/css') ?>/autoptimize_single_0feb3a4eb4e714dd5deca7d3a7107583.css?ver=3.2.0'
        type='text/css' media='all' />
    <link rel='stylesheet' id='wr360style-css'
        href='<?php echo public_url('site/css') ?>/autoptimize_single_c562172b5edd66d14da06a5ec5da50e4.css?ver=3.2.0'
        type='text/css' media='all' />
    <link rel='stylesheet' id='woocommerce-layout-css'
        href='<?php echo public_url('site/css') ?>/autoptimize_single_1cbcc9e85ba99c007f519bf1a67feb58.css?ver=5.5.2'
        type='text/css' media='all' />
    <link rel='stylesheet' id='woocommerce-smallscreen-css'
        href='<?php echo public_url('site/css') ?>/autoptimize_single_456663a286a204386735fd775542a59e.css?ver=5.5.2'
        type='text/css' media='only screen and (max-width: 768px)' />
    <link rel='stylesheet' id='woocommerce-general-css'
        href='<?php echo public_url('site/css') ?>/autoptimize_single_7892d7349e74e7dd7fae386eda2dded7.css?ver=5.5.2'
        type='text/css' media='all' />
    <style id='woocommerce-inline-inline-css' type='text/css'>
        .woocommerce form .form-row .required {
            visibility: visible;
        }
    </style>
    <link rel='stylesheet' id='wpcf7-redirect-script-frontend-css'
        href='<?php echo public_url('site/css') ?>/wpcf7-redirect-frontend.min.css?ver=6.1.1'
        type='text/css' media='all' />
    <link rel='stylesheet' id='megamenu-css'
        href='<?php echo public_url('site/css') ?>/style.css?ver=a8d749' type='text/css'
        media='all' />
    <link rel='stylesheet' id='dashicons-css'
        href='<?php echo public_url('site/css') ?>/dashicons.min.css?ver=6.1.1' type='text/css' media='all' />
    <link rel='stylesheet' id='megamenu-genericons-css'
        href='<?php echo public_url('site/css') ?>/autoptimize_single_ac25fb529183c5fef5887d02594d1828.css?ver=2.2.7'
        type='text/css' media='all' />
    <link rel='stylesheet' id='megamenu-fontawesome-css'
        href='<?php echo public_url('site/css') ?>/font-awesome.min.css?ver=2.2.7'
        type='text/css' media='all' />
    <link rel='stylesheet' id='megamenu-fontawesome5-css'
        href='<?php echo public_url('site/css') ?>/all.min.css?ver=2.2.7'
        type='text/css' media='all' />
    <link rel='stylesheet' id='swatches-and-photos-css'
        href='<?php echo public_url('site/css') ?>/autoptimize_single_67a644342839a634bb26aa83e0213aa2.css?ver=3.0.6'
        type='text/css' media='all' />
    <link rel='stylesheet' id='fonts-css'
        href='<?php echo public_url('site/css') ?>/autoptimize_single_9782e9bfd5338c3e1d13ed1ac39b26ad.css?ver=6.1.1'
        type='text/css' media='all' />
    <link rel='stylesheet' id='select2-css'
        href='<?php echo public_url('site/css') ?>/autoptimize_single_6ba0d8f64fdf9dbea96c136aaa1557e4.css?ver=5.5.2'
        type='text/css' media='all' />
    <link rel='stylesheet' id='twentynineteen-print-style-css'
        href='<?php echo public_url('site/css') ?>/autoptimize_single_aaa59a2522320aa1969d3dbd5b355bde.css?ver=6.1.1'
        type='text/css' media='print' />
    <link rel='stylesheet' id='assets-css'
        href='<?php echo public_url('site/css') ?>/autoptimize_single_9c3cea14861484d58ad134004fde8d3a.css?ver=1.9.4'
        type='text/css' media='all' />
    <link rel='stylesheet' id='bootstrap-css-css'
        href='<?php echo public_url('site/css') ?>/bootstrap.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='twentynineteen-style-css'
        href='<?php echo public_url('site/css') ?>/autoptimize_single_98c7227799fa9f9538cd9d621002a4bb.css?ver=6.1.1'
        type='text/css' media='all' />
    <link rel='stylesheet' id='ys-style-css'
        href='<?php echo public_url('site/css') ?>/autoptimize_single_50b121890b151d592651ceb8ea29cc0c.css?ver=1.9.4'
        type='text/css' media='all' />
    <script type='text/javascript' src='<?php echo public_url('site/js') ?>/jquery.min.js?ver=3.6.1' id='jquery-core-js'></script>
    <script defer type='text/javascript' src='<?php echo public_url('site/js') ?>/jquery-migrate.min.js?ver=3.3.2' id='jquery-migrate-js'></script>
    <script type='text/javascript' id='cookie-law-info-js-extra'>
        var Cli_Data = {
            "nn_cookie_ids": [],
            "cookielist": [],
            "non_necessary_cookies": [],
            "ccpaEnabled": "",
            "ccpaRegionBased": "",
            "ccpaBarEnabled": "",
            "strictlyEnabled": ["necessary", "obligatoire"],
            "ccpaType": "gdpr",
            "js_blocking": "",
            "custom_integration": "",
            "triggerDomRefresh": "",
            "secure_cookies": ""
        };
        var cli_cookiebar_settings = {
            "animate_speed_hide": "500",
            "animate_speed_show": "500",
            "background": "#FFF",
            "border": "#b1a6a6c2",
            "border_on": "",
            "button_1_button_colour": "#000",
            "button_1_button_hover": "#000000",
            "button_1_link_colour": "#fff",
            "button_1_as_button": "1",
            "button_1_new_win": "",
            "button_2_button_colour": "#333",
            "button_2_button_hover": "#292929",
            "button_2_link_colour": "#444",
            "button_2_as_button": "",
            "button_2_hidebar": "",
            "button_3_button_colour": "#000",
            "button_3_button_hover": "#000000",
            "button_3_link_colour": "#fff",
            "button_3_as_button": "1",
            "button_3_new_win": "",
            "button_4_button_colour": "#000",
            "button_4_button_hover": "#000000",
            "button_4_link_colour": "#62a329",
            "button_4_as_button": "",
            "button_7_button_colour": "#61a229",
            "button_7_button_hover": "#4e8221",
            "button_7_link_colour": "#fff",
            "button_7_as_button": "1",
            "button_7_new_win": "",
            "font_family": "inherit",
            "header_fix": "",
            "notify_animate_hide": "1",
            "notify_animate_show": "",
            "notify_div_id": "#cookie-law-info-bar",
            "notify_position_horizontal": "right",
            "notify_position_vertical": "bottom",
            "scroll_close": "",
            "scroll_close_reload": "",
            "accept_close_reload": "",
            "reject_close_reload": "",
            "showagain_tab": "1",
            "showagain_background": "#fff",
            "showagain_border": "#000",
            "showagain_div_id": "#cookie-law-info-again",
            "showagain_x_position": "100px",
            "text": "#000",
            "show_once_yn": "",
            "show_once": "10000",
            "logging_on": "",
            "as_popup": "",
            "popup_overlay": "1",
            "bar_heading_text": "",
            "cookie_bar_as": "banner",
            "popup_showagain_position": "bottom-right",
            "widget_position": "left"
        };
        var log_object = {
            "ajax_url": "<?php echo str_replace('/','\/',base_url()) ?>admin-ajax.php"
        };
    </script>
    <script defer type='text/javascript' src='<?php echo public_url('site/js') ?>/autoptimize_single_dffa195b546cf1dfd52f2206955eb892.js?ver=3.0.5' id='cookie-law-info-js'></script>
    <script defer type='text/javascript' src='<?php echo public_url('site/js') ?>/lity.min.js' id='lity-js-js'></script>
    <style type="text/css" id="cst_font_data">
        @font-face {
            font-family: "HelveticaNeue";
            font-display: auto;
            font-weight: 400;
            src: url(<?php echo public_url('site/fonts') ?>/helveticaneue-webfont.woff2) format('woff2'), url(<?php echo public_url('site/fonts') ?>/helveticaneue-webfont.woff) format('woff'), url(<?php echo public_url('site/fonts') ?>/helveticaneuemed-webfont.ttf) format('TrueType');
        }

        @font-face {
            font-family: "HelveticaNeue-Light";
            font-display: auto;
            font-weight: 400;
            src: url(<?php echo public_url('site/fonts') ?>/helveticaneue_light-webfont.woff2) format('woff2'), url(<?php echo public_url('site/fonts') ?>/helveticaneue_light-webfont.woff) format('woff'), url(<?php echo public_url('site/fonts') ?>/helveticaneue_light-webfont.ttf) format('TrueType');
        }
    </style>
    <script>
        (function(c, l, a, r, i, t, y) {
            c[a] = c[a] || function() {
                (c[a].q = c[a].q || []).push(arguments)
            };
            t = l.createElement(r);
            t.async = 1;
            t.src = "https://www.clarity.ms/tag/" + i;
            y = l.getElementsByTagName(r)[0];
            y.parentNode.insertBefore(t, y);
        })
        (window, document, "clarity", "script", "8etf8s6jwe");
    </script>
    <script data-cfasync="false" data-pagespeed-no-defer type="text/javascript">
        var dataLayer_content = {
            "pagePostType": "frontpage",
            "pagePostType2": "single-page",
            "pagePostAuthor": "Hanan Dayan"
        };
        dataLayer.push(dataLayer_content);
    </script>
    
    <style type="text/css">
        .header-image {
            background-image: url();
        }
    </style><noscript>
        <style>
        .woocommerce-product-gallery {
            opacity: 1 !important;
        }
        </style>
    </noscript>
    <style type="text/css">
        .recentcomments a {
            display: inline !important;
            padding: 0 !important;
            margin: 0 !important;
        }
    </style>
    <script>
        (window.gaDevIds = window.gaDevIds || []).push('5CDcaG');
    </script>
    <link rel="icon" href="<?php echo public_url('site/images') ?>/cropped-Favicon-32x32.png" sizes="32x32" />
    <link rel="icon" href="<?php echo public_url('site/images') ?>/cropped-Favicon-192x192.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="<?php echo public_url('site/images') ?>/cropped-Favicon-180x180.png" />
    <meta name="msapplication-TileImage" content="<?php echo public_url('site/images') ?>/cropped-Favicon-270x270.png" />
    <style type="text/css" id="wp-custom-css">
        /*header*/

        #mega-menu-wrap-menu-1 #mega-menu-menu-1>li.mega-menu-item.mega-current-menu-ancestor>a.mega-menu-link {
            font-weight: 400;
        }

        #mega-menu-wrap-menu-1 #mega-menu-menu-1>li.mega-menu-megamenu>ul.mega-sub-menu>li.mega-menu-item>a.mega-menu-link:hover,
        #mega-menu-wrap-menu-1 #mega-menu-menu-1>li.mega-menu-megamenu>ul.mega-sub-menu li.mega-menu-column>ul.mega-sub-menu>li.mega-menu-item>a.mega-menu-link:hover,
        #mega-menu-wrap-menu-1 #mega-menu-menu-1>li.mega-menu-megamenu>ul.mega-sub-menu>li.mega-menu-item>a.mega-menu-link:focus,
        #mega-menu-wrap-menu-1 #mega-menu-menu-1>li.mega-menu-megamenu>ul.mega-sub-menu li.mega-menu-column>ul.mega-sub-menu>li.mega-menu-item>a.mega-menu-link:focus {
            color: #ffffff;
            font-family: "Helvetica Neue";
            font-weight: 300;
        }

        section.top_navigation {
            height: 64px;
        }

        #mega-menu-wrap-menu-1 #mega-menu-menu-1>li.mega-menu-item>a.mega-menu-link:hover {
            font-weight: initial;
        }

        #mega-menu-wrap-menu-1 #mega-menu-menu-1 li.mega-menu-item>ul.mega-sub-menu {
            background: rgba(0, 0, 0, 0.80);
            margin-top: 13px;
            padding: 15px 0;
        }

        section.top_navigation {
            background: rgba(0, 0, 0, 0.8);
        }

        /*end header*/
        /*dealer-locator*/
        #wpsl-wrap {
            margin-bottom: 0;
        }

        button.gm-control-active {
            border-radius: 50px !important;
        }

        .gmnoprint div {
            background: #0000ff00 !important;
            box-shadow: none !important;
        }

        #wpsl-gmap #wpsl-map-controls {
            border-radius: 50px;
        }

        button.gm-control-active {
            background: white !important;
        }

        #wpsl-gmap img,
        .wpsl-gmap-canvas img {
            object-fit: scale-down;
        }

        .locater-bg,
        .cart-bg {
            background-size: cover;
            background-position: top center;
            padding-bottom: 100px;
        }

        #wpsl-search-wrap #wpsl-category-customwrapper {
            justify-content: center;
        }

        #wpsl-search-wrap #wpsl-category-customwrapper #wpsl-checkbox-filter {
            width: 49%;
        }

        #wpsl-search-wrap #wpsl-category-customwrapper .cate-label {
            display: flex;
            justify-content: center;
            margin-right: 2%;
            margin-left: 82px;
        }

        #wpsl-search-wrap #wpsl-category-customwrapper #wpsl-checkbox-filter li {
            width: 31%;
        }

        .pac-container {
            width: 350px !important;
            margin: 0 auto !important;
            display: block;
            top: 320px !important;
            border-radius: 0 0 25px 25px;
            box-shadow: none;
            border: 1px solid #d2d2d2;
            border-top: 0;

            padding: 12px 26px 0 26px;
            background: white;
        }

        span.pac-icon.pac-icon-marker {
            display: none;
        }

        .wpsl-input input#wpsl-search-input {
            font-size: 16px;
            line-height: 40px;
            font-weight: 500;
            padding-left: 30px;
        }

        #wpsl-stores .custom-message {
            background: #F2F2F2;
            padding: 15px 10px;
            margin-top: 25px;
        }

        #wpsl-gmap {
            width: 61.5%;
        }

        #wpsl-result-list {
            width: 33%;
            margin-right: .5%;
            box-shadow: 1px 0 15px rgba(45, 41, 33, 0.1);
            margin: 12px 7px;
        }

        #wpsl-direction-details,
        #wpsl-stores {
            height: 350px;
            overflow-y: hidden;
        }

        #wpsl-result-list ul {
            overflow-y: auto;
            height: 559px;
            background: white !important;
            padding-bottom: 3px;
        }

        #wpsl-wrap #wpsl-result-list li {
            border-bottom: 1px solid #000;
            padding: 20px 0;
        }

        #wpsl-wrap #wpsl-result-list ul li {
            direction: ltr;
        }

        #wpsl-result-list ul {
            direction: rtl;
            margin-left: 5px
        }

       
        .slider-content .active .project-details-wrapper {
            z-index: 2;
        }

        .projects-detail-wrapper .container {
            position: relative;
            top: 99px;
            left: 0;
            width: 1320px;
            max-width: 1320px;
            height: calc(100% - 99px);
        }

        .projects-detail-wrapper .project_content {
            background: rgba(0, 0, 0, 0.5);
            height: 100%;
            display: block;
            float: left;
            color: #fff;
            width: 67%;
            padding: 50px 15px 15px 15px;
            height: 94vh;
            padding-bottom: 126px;
            max-width: 312px;
        }

        .projects-detail-wrapper .images_list {
            background: rgba(0, 0, 0, 0.5);
            height: 94vh;
            display: block;
            width: 73px;
            padding: 67px 5px 5px 5px;
            float: left;
            color: #fff;
            margin-right: 15px;
        }

        .projects-detail-wrapper .images_list img {
            height: 50px;
            object-fit: cover;
        }

        .slider-left,
        .slider-right {
            border-radius: 50px !important
        }

        .slider-left:hover,
        .slider-right:hover {
            border: 2px solid #000;
            border-radius: 50px !important
        }


        /*blog*/
        .blog_detail_page .container h1 {
            margin-top: 80px;
        }

        .singleblog_backbutton.mobile_hide {
            margin-top: 139px;
            margin-bottom: 100px;
        }

        /*end blog*/

        /*contact*/
        textarea {
            resize: none;
        }

        .wpcf7-response-output.wpcf7-display-none.wpcf7-validation-errors,
        .wpcf7-response-output.wpcf7-display-none.wpcf7-mail-sent-ok {
            display: none !important;
        }

        /*end contact*/

        /*Checkout*/

        /*end Checkout*/

        /*prodact*/
        .side-icons svg,
        h3.ui-accordion-header {
            cursor: pointer;
        }

        /*end prodact*/

        /*scroller*/
        /* width */
        ::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #fff;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #e4e4e4;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #000;
        }

        /*end scroller*/

        @media (max-width: 675px) {
            .woocommerce ul.products li.product .button {
                display: block !important;
            }

            #wpsl-gmap,
            #wpsl-result-list {
                float: none;
                width: 100%;
            }

            .locater-bg,
            .cart-bg {
                background: none;
            }

            #wpsl-search-wrap #wpsl-category-customwrapper #wpsl-checkbox-filter li {
                width: 100%;
            }

            .wpsl-input input#wpsl-search-input {
                font-size: 16px;
                line-height: 26px;
                font-weight: 500;
                padding-left: 30px;
                width: 65% !important;
            }

            #wpsl-search-wrap #wpsl-category-customwrapper .cate-label {
                margin-left: 0;
            }

            .image-item-mobile img {
                float: left;
                padding: 0 8px;
                height: 46px;
                object-fit: cover;
            }

            .image-item-mobile {
                float: left;
                margin: 0px;
            }
        }

        .page-id-10682 .cart-title h1 {
            font-size: 34px;
            font-weight: 700;
            color: #fff;
        }

        .page-id-10682 .cart-bg {
            background: #000;
            padding-bottom: 50px !important;
        }

        article.post-10682 {
            text-align: center;
        }
    </style>
    <style type="text/css">
        /** Mega Menu CSS: fs **/
    </style>
    <?php echo $site_info->scripts_total_site ?>
    <?php if(isset($success_script)){echo $success_script;} ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>