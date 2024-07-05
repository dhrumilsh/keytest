<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

class Recent_Posts_Elementor_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'recent_posts';
    }

    public function get_title() {
        return __( 'Recent Posts', 'recent-posts-elementor-widget' );
    }

    public function get_icon() {
        return 'eicon-post-list';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'recent-posts-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => __( 'Style', 'recent-posts-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => __( 'Text Color', 'recent-posts-elementor-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .recent-posts li' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
                'label' => __( 'Typography', 'recent-posts-elementor-widget' ),
                'selector' => '{{WRAPPER}} .recent-posts li',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        echo do_shortcode( '[recent_posts]' );
    }

    protected function _content_template() {
        ?>
        <#
        var shortcode = '[recent_posts]';
        view.addRenderAttribute( 'shortcode', 'class', 'recent-posts' );
        #>
        <div {{{ view.getRenderAttributeString( 'shortcode' ) }}}>
            {{{ shortcode }}}
        </div>
        <?php
    }
}
