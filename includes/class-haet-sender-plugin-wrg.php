<?php
/**
*   detect the origin of an email
*
**/

class Haet_Sender_Plugin_EDD extends Haet_Sender_Plugin {
    public function __construct($mail) {
        if( !strpos($mail['message'], 'wp-html-mail-edd') )
            throw new Haet_Different_Plugin_Exception();
    }

    /**
    *   request_preview_instance()
    *   force creating an instance to apply all modifications to live preview
    **/
    public static function request_preview_instance(){
        $fake_mail = array('message'=>' <!--wp-html-mail-edd-->');
        return new self($fake_mail);
    }

    public static function plugin_actions_and_filters(){
        add_filter( 'edd_template_paths', 'Haet_Sender_Plugin_EDD::register_edd_template_path');
        add_action( 'edd_email_send_before', 'Haet_Sender_Plugin_EDD::change_edd_email_template' );

        add_filter( 'edd_settings_emails', 'Haet_Sender_Plugin_EDD::remove_edd_email_settings',10 );
        remove_action( 'edd_email_settings', 'edd_email_template_preview', 10 );
        add_action( 'edd_email_settings', 'Haet_Sender_Plugin_EDD::edd_email_template_preview', 10 );

        // preview edd mails
        add_filter( 'haet_mail_demo_content','Haet_Sender_Plugin_EDD::demo_content',10,4);
    }

    /**
    *   register_edd_template_path()
    *   register the path to the template for EDD
    **/
    public static function register_edd_template_path($file_paths){
        $file_paths[] = HAET_MAIL_EDD_PATH.'views/edd/edd_templates/';
        return $file_paths;
    }

    /**
    *   change_edd_email_template()
    *   If WP HTML mail is enabled for EDD hook to change the template
    **/
    public static function change_edd_email_template() {
        $plugin_options = self::get_plugin_options();
        if( isset($plugin_options['easy-digital-downloads']) && isset($plugin_options['easy-digital-downloads']['template']) && $plugin_options['easy-digital-downloads']['template'] )
            add_filter( 'edd_email_template', 'Haet_Sender_Plugin_EDD::set_edd_email_template' );
    }


    /**
    *   set_edd_email_template()
    *   force edd to use our email template
    **/
    public static function set_edd_email_template( $template_name ) {
        return 'wphtmlmail';
    }


    /**
    *   remove_edd_email_settings()
    *   remove some settings from EDD email tab
    **/
    public static function remove_edd_email_settings($settings){
        unset($settings['email_template']);
        unset($settings['email_logo']);
        return $settings;
    }


    /**
    *   modify_content()
    *   mofify the email content before applying the template
    **/
    public function modify_content($content){

        return $content;
    }

    /**
    *   modify_template()
    *   mofify the email template before the content is added
    **/
    public function modify_template($template){
        $css = file_get_contents( HAET_MAIL_EDD_PATH.'views/edd/template/style.css' );
        $template = str_replace('</style>', $css.'</style>', $template);

        $plugin_options = self::get_plugin_options();
        $options = $plugin_options['easy-digital-downloads'];
        foreach ($options as $option => $value) {
            if(strpos($option, 'bold'))
                $value=($value==1?'bold':'normal');
            if(strpos($option, 'italic'))
                $value=($value==1?'italic':'normal');
            if(strpos($option, 'underline'))
                $value=($value==1?'underline':'none');
            if(strpos($option, 'border_'))
                $value=($value==1?'solid 1px':'none 0');
            $template = str_replace('###edd_'.$option.'###', $value, $template);
        }
        $template = preg_replace("/###edd\_.*\_border\_.*###/", "none 0", $template);
        
        return $template;
    }   

    /**
    *   modify_styled_mail()
    *   mofify the email body after the content has been added to the template
    **/
    public function modify_styled_mail($message){
        return $message;
    }  


    /**
    *   get_plugin_default_options()
    *   define plugin specific default options
    **/
    public static function get_plugin_default_options(){
        return array(
            'template' => '1',
            'sender' => '1',
            'contentfont' => 'Arial, Helvetica, sans-serif',
            'contentfontsize' => '14',
            'contentcolor' => '#020202',
            'contentbold' => '0',
            'contentitalic' => '0',
            'variationfont' => 'Arial, Helvetica, sans-serif',
            'variationfontsize' => '12',
            'variationcolor' => '#939393',
            'variationbold' => '0',
            'variationitalic' => '1',
            'products_bordercolor' => '#adadad',
            'products_border_outer_v' => '0',
            'products_border_inner_v' => '0',
            'products_border_top' => '1',
            'products_border_inner_h' => '1',
            'products_border_bottom' => '1',
            'preview_order' => '703',
            'linkfont' => 'Arial, Helvetica, sans-serif',
            'linkfontsize' => '12',
            'linkcolor' => '#087bad',
            'linkbold' => '1',
            'linkitalic' => '0',
            'linkunderline' => '0',
            'item_paddingtop' => '10',
            'item_paddingright' => '10',
            'item_paddingbottom' => '10',
            'item_paddingleft' => '0',
            'content_align' => 'left',
        );
    }

    /**
     * Email Template Preview
     */
    public static function edd_email_template_preview() {
        if( ! current_user_can( 'manage_shop_settings' ) ) {
            return;
        }

        ob_start();
        ?>
        <a href="<?php echo wp_nonce_url( add_query_arg( array( 'edd_action' => 'send_test_email' ) ), 'edd-test-email' ); ?>" title="<?php _e( 'This will send a demo purchase receipt to the emails listed below.', 'edd' ); ?>" class="button-secondary"><?php _e( 'Send Test Email', 'edd' ); ?></a>
        <?php
        echo ob_get_clean();
    }


    /**
    *   settings_tab()
    *   output specific settings for this plugin
    **/
    public static function settings_tab(){
        $plugin_options = self::get_plugin_options();

        $order_ids = array();
        $args = array (
            'post_type'              => 'edd_payment',
            'posts_per_page'         => '10',
            'post_status'            => 'any'
        );

        // The Query
        $query = new WP_Query( $args );
        // The Loop
        if ( $query->have_posts() ) {
            $query->the_post();
            $order_ids[] = get_the_id();
        }
        wp_reset_postdata();

        $haet_mail = new haet_mail();
        $fonts = $haet_mail->get_fonts();
        include( HAET_MAIL_EDD_PATH.'views/edd/admin/settings-edd.php' );
    }


    /**
    *   demo_content( )
    **/
    public static function demo_content( $demo_content, $options, $plugin_options, $tab ){
        if( $tab == 'easy-digital-downloads' && isset( $plugin_options['easy-digital-downloads'] ) ){
            if( isset( $plugin_options['easy-digital-downloads']['preview_order'] ) )
                $payment_id = $plugin_options['easy-digital-downloads']['preview_order'];
            else{
                // get latest order id
                $args = array (
                    'post_type'              => 'edd_payment',
                    'pagination'             => true,
                    'posts_per_page'         => '1',
                    'order'                  => 'DESC',
                    'orderby'                => 'id',
                    'post_status'            => 'any'
                );

                // The Query
                $query = new WP_Query( $args );
                // The Loop
                if ( $query->have_posts() ) {
                    $query->the_post();
                    $payment_id = get_the_id();
                }
                wp_reset_postdata();
            }

            if($payment_id){
                $heading     = edd_get_option( 'purchase_heading', __( 'Purchase Receipt', 'edd' ) );
                $heading     = apply_filters( 'edd_purchase_heading', $heading, $payment_id, $payment_data );

                $payment_data = edd_get_payment_meta( $payment_id );
                $message     = edd_do_email_tags( edd_get_email_body_content( $payment_id, $payment_data ), $payment_id );

                $emails = EDD()->emails;
                $emails->__set( 'from_name', $from_name );
                $emails->__set( 'from_email', $from_email );
                $emails->__set( 'heading', $heading );
                do_action( 'edd_email_send_before', $this );
                $message = $emails->build_email($message);
                do_action( 'edd_email_send_after', $this );
                return $message;
            }
        }
        return $demo_content;
    }

}