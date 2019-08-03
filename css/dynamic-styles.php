<?php
    function revolve_dynamic_colors(){
        $custom_css = '';
        
        $tpl_color = get_theme_mod( 'revolve_tpl_color', '#E11B30' );
        $tbl_rgb = revolve_lite_hex2rgb($tpl_color);
        
        /** Color **/
        $custom_css .= "
            .menu .mCSB_container li.active > a,
            .menu .mCSB_container li > a:hover,
            .menu .mCSB_container .current_page_item > a,
            .menu .mCSB_container .current-menu-item > a,
            .social-toggle-wrap a:hover,
            .social-toggle-wrap a:hover,
            .social-toggle-wrap a:focus,
            .social-toggle-wrap a:active,
            .social-icons a:hover,
            #team-control .team-lays a:hover,
            #team-control .team-lays .icon-active,
            #team-control .team-search .fa-search,
            .team-tile-layout .team-image-wrap .team-member-name,
            .team-tile-layout .team-image-wrap.active .team-member-name,
            .team-list-layout .team-list-block .team-image-wrap .team-member-name:hover,
            form p input[type=\"submit\"]:hover,
            .single-portfolio-post .comments-area form p input[type=\"submit\"]:hover,
            .single-post .comments-area form p input[type=\"submit\"]:hover,
            .woocommerce input[type=\"submit\"]:hover,
            .woocommerce .button.wc-backward:hover,
            .woocommerce ul.products li.product .button:hover,
            .woocommerce ul.products li.product .added_to_cart:hover,
            .nav-links .nav-previous a:hover, .nav-links .nav-next a:hover,
            .prev-next-posts .prev-posts-link a:hover, .prev-next-posts .next-posts-link a:hover{
                color: {$tpl_color};
            }";
            
        /** Background Color **/
        $custom_css .= "
            .wd-feat-post-title:before,
            .revolve-page-header-left span:before,
            .blog-page-header .title_section h2:before,
            .page-blog-container .blog-post-wrap,
            .team-list-block .team-image-wrap .team-image,
            .team-inner-info h2:before,
            .team-info-block .close-team-info,
            .port-link-wrap a:hover,
            .page-template-default .entry-header h1:before,
            .single-portfolio-post .entry-header h1:before,
            .single-post .entry-header h1:before,
            .single-product .entry-header h1:before,
            form p input[type=\"submit\"],
            .single-portfolio-post .comments-area form p input[type=\"submit\"],
            .single-post .comments-area form p input[type=\"submit\"],
            .archive .page-title:before,
            .woocommerce ul.products li.product .product-top .onsale, .woocommerce #content .onsale,
            .woocommerce .button.wc-backward,
            .woocommerce ul.products li.product .button,
            .woocommerce ul.products li.product .added_to_cart,
            .woocommerce input[type=\"submit\"],
            .woocommerce .place-order input.button.alt,
            .woocommerce .wc-proceed-to-checkout a.button.alt,
            .nav-links .nav-previous a, .nav-links .nav-next a,
            .prev-next-posts .prev-posts-link a,
            .prev-next-posts .next-posts-link a,
            .blog-post-wrap .entry-summary .blog-post-title:before{
                background-color: {$tpl_color};
            }";
            
        /** Background Color (Transparent 0.4) **/
        $custom_css .= "
            .portfolio-post-wrap:after{
                background: rgba({$tbl_rgb[0]}, {$tbl_rgb[1]}, {$tbl_rgb[2]}, 0.4);
            }";
        
        /** Border Color **/
        $custom_css .= "
            .revolve-sliders-captions .revolve-caption-title,
            .sub-block-header,
            #team-control .team-search .team-search-box,
            .team-list-layout .team-list-block .team-image-wrap .team-member-name,
            form p input, form p textarea,
            .single-portfolio-post .comments-area form p input,
            .single-portfolio-post .comments-area form p textarea,
            .single-post .comments-area form p input,
            .single-post .comments-area form p textarea,
            form p input[type=\"submit\"]:hover,
            .single-portfolio-post .comments-area form p input[type=\"submit\"]:hover,
            .single-post .comments-area form p input[type=\"submit\"]:hover,
            form p input[type=\"submit\"],
            .single-portfolio-post .comments-area form p input[type=\"submit\"],
            .single-post .comments-area form p input[type=\"submit\"],
            .woocommerce .button.wc-backward,
            .woocommerce ul.products li.product .button,
            .woocommerce ul.products li.product .added_to_cart,
            .woocommerce input[type=\"submit\"],
            .woocommerce .place-order input.button.alt,
            .woocommerce form .form-row.woocommerce-invalid .select2-container,
            .woocommerce form .form-row.woocommerce-invalid input.input-text,
            .woocommerce form .form-row.woocommerce-invalid select,
            .woocommerce input[type=\"text\"],
            .woocommerce input[type=\"email\"],
            .woocommerce input[type=\"url\"],
            .woocommerce input[type=\"password\"],
            .woocommerce input[type=\"search\"],
            .nav-links .nav-previous a, .nav-links .nav-next a,
            .prev-next-posts .prev-posts-link a,
            .prev-next-posts .next-posts-link a,
            .nav-links .nav-previous a:hover, .nav-links .nav-next a:hover,
            .prev-next-posts .prev-posts-link a:hover, .prev-next-posts .next-posts-link a:hover{
                border-color: {$tpl_color}
            }";
            
        /** Box Shadow **/
        $custom_css .= "
            .menu .mCSB_container li.active > a,
            .menu .mCSB_container li > a:hover,
            .menu .mCSB_container .current_page_item > a,
            .menu .mCSB_container .current-menu-item > a{
                box-shadow: -8px 0px 0 {$tpl_color} inset; 
            }";

        wp_add_inline_style( 'revolve-style', $custom_css );

    }
    add_action( 'wp_enqueue_scripts', 'revolve_dynamic_colors' );

    function revolve_lite_hex2rgb($hex) {
        $hex = str_replace("#", "", $hex);

        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        $rgb = array($r, $g, $b);
        //return implode(",", $rgb); // returns the rgb values separated by commas
        return $rgb; // returns an array with the rgb values
    }

    function revolve_colourBrightness($hex, $percent) {
        // Work out if hash given
        $hash = '';
        if (stristr($hex, '#')) {
            $hex = str_replace('#', '', $hex);
            $hash = '#';
        }
        /// HEX TO RGB
        $rgb = array(hexdec(substr($hex, 0, 2)), hexdec(substr($hex, 2, 2)), hexdec(substr($hex, 4, 2)));
        //// CALCULATE 
        for ($i = 0; $i < 3; $i++) {
            // See if brighter or darker
            if ($percent > 0) {
                // Lighter
                $rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1 - $percent));
            } else {
                // Darker
                $positivePercent = $percent - ($percent * 2);
                $rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1 - $positivePercent));
            }
            // In case rounding up causes us to go to 256
            if ($rgb[$i] > 255) {
                $rgb[$i] = 255;
            }
        }
        //// RBG to Hex
        $hex = '';
        for ($i = 0; $i < 3; $i++) {
            // Convert the decimal digit to hex
            $hexDigit = dechex($rgb[$i]);
            // Add a leading zero if necessary
            if (strlen($hexDigit) == 1) {
                $hexDigit = "0" . $hexDigit;
            }
            // Append to the hex string
            $hex .= $hexDigit;
        }
        return $hash . $hex;
    }