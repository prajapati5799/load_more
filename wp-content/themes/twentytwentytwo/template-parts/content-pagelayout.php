<?php

	if ( get_row_layout() == 'image_and_text_side_by_side' ) :

        get_template_part( 'partials/flexible-layouts/flexible', 'image_and_text_side_by_side' );

    elseif ( get_row_layout() == '4_column_icon_box' ) :

        get_template_part( 'partials/flexible-layouts/flexible', '4_column_icon_box' );

    elseif ( get_row_layout() == '3_column_title_box' ) :

        get_template_part( 'partials/flexible-layouts/flexible', '3_column_title_box' );

    elseif ( get_row_layout() == '6_logo_side_by_side' ) :

        get_template_part( 'partials/flexible-layouts/flexible', '6_logo_side_by_side' );

    elseif ( get_row_layout() == 'side_by_side_list_content' ) :

        get_template_part( 'partials/flexible-layouts/flexible', 'side_by_side_list_content' );

    elseif ( get_row_layout() == 'bottom_cross_image_text_side_by_side' ) :

        get_template_part( 'partials/flexible-layouts/flexible', 'bottom_cross_image_text_side_by_side' );

    elseif ( get_row_layout() == 'side_by_side_content' ) :

        get_template_part( 'partials/flexible-layouts/flexible', 'side_by_side_content' );

    elseif ( get_row_layout() == 'section_full_image' ) :

        get_template_part( 'partials/flexible-layouts/flexible', 'section_full_image' );
     
     elseif ( get_row_layout() == 'orange_box_and_list_content' ) :

        get_template_part( 'partials/flexible-layouts/flexible', 'orange_box_and_list_content' );

    elseif ( get_row_layout() == '3_column_list_content' ) :

        get_template_part( 'partials/flexible-layouts/flexible', '3_column_list_content' );

     elseif ( get_row_layout() == 'bottom_cross_title' ) :

        get_template_part( 'partials/flexible-layouts/flexible', 'bottom_cross_title' );

    elseif ( get_row_layout() == 'full_width_content' ) :

        get_template_part( 'partials/flexible-layouts/flexible', 'full_width_content' );

    elseif ( get_row_layout() == 'left_title_and_image_and_right_content' ) :

        get_template_part( 'partials/flexible-layouts/flexible', 'left_title_and_image_and_right_content' );

    elseif ( get_row_layout() == 'job_openings' ) :

        get_template_part( 'partials/flexible-layouts/flexible', 'job_openings' );

    elseif ( get_row_layout() == 'apply_now' ) :

        get_template_part( 'partials/flexible-layouts/flexible', 'apply_now' );
        
    endif;