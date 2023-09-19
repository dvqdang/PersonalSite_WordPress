<?php

function project_lists() {
    
    $query = new WP_Query(
        array(
            'post_type' => 'project-lists',
            'post_status' => 'publish',
            'post_per_page' => -1,
            'order' => 'ASC',
            'orderby' => 'menu_order'
        )
    );

    $i = 1;
    $str = '<div class="elementor-row">';
    while ($query->have_posts()):
        $query->the_post();
        $str .= '
        <div class="elementor-element elementor-element-1b52080 e-flex e-con-boxed e-con e-child" data-id="1b52080" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}">
            <div class="e-con-inner">
                <div class="elementor-element elementor-element-7f8cf84 e-flex e-con-boxed e-con e-child" data-id="7f8cf84" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}">
                    <div class="e-con-inner">
                        <div class="elementor-element elementor-element-9b3c711 elementor-widget elementor-widget-image" data-id="9b3c711" data-element_type="widget" data-widget_type="image.default">
                            <div class="elementor-widget-container">
                                <img decoding="async" fetchpriority="high" width="300" height="300" src="'.do_shortcode('[acf field="project-image"]').'" class="attachment-medium size-medium wp-image-86" alt="" sizes="(max-width: 300px) 100vw, 300px">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-cc84c02 e-con-full e-flex e-con e-child" data-id="cc84c02" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-800b80b elementor-widget elementor-widget-heading" data-id="800b80b" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h2 class="elementor-heading-title elementor-size-default">'.get_the_title().'</h2>		
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-b952da1 e-con-full e-flex e-con e-child" data-id="b952da1" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-b3fc3a4 elementor-widget elementor-widget-text-editor" data-id="b3fc3a4" data-element_type="widget" data-widget_type="text-editor.default">
                        <div class="elementor-widget-container">
                             <p>'.do_shortcode('[acf field="project-description"]').'</p>						
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-9ba337d e-con-full e-flex e-con e-child" data-id="9ba337d" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                    <div class="elementor-element elementor-element-69e0612 elementor-align-center elementor-widget elementor-widget-button" data-id="69e0612" data-element_type="widget" data-widget_type="button.default">
                        <div class="elementor-widget-container">
                            <div class="elementor-button-wrapper">
                                <a class="elementor-button elementor-button-link elementor-size-sm" href="'.do_shortcode('[acf field="project-url"]').'">
                                    <span class="elementor-button-content-wrapper">
                                        <span class="elementor-button-text">Link</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';

        /* Three projects per row */
        if ($i % 3 == 0):
            $str .='</div>';
            $str .= '<div class="elementor-row">';
        endif;
        $i++;
    endwhile;

    wp_reset_postdata();
    return $str;
}




function project_lists_link() {
    $query = new WP_Query(
        array(
            'post_type' => 'project-lists',
            'post_status' => 'publish',
            'post_per_page' => -1,
            'order' => 'ASC',
            'orderby' => 'menu_order'
        )
    );
    $links = '';
    while ($query->have_posts()):
        $query->the_post();
        $links .='<a href="'.get_the_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a><br>';
    endwhile;
    wp_reset_postdata();
    return $links;
}


add_shortcode('project_lists', 'project_lists');
add_shortcode('project_lists_link', 'project_lists_link');

