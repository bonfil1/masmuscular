<?php
// don't load directly
if ( ! defined( 'ABSPATH' ) ) die( '-1' );

define( 'UNLIMITED_VC_PLUGIN_FILE_PATH', __FILE__ );

class VCExtendAddonClass {

    /**
     * List of paths.
     *
     * @var array
     */
    private $paths = array();

    function __construct() {

        $dir = dirname( __FILE__ );

        $this->setPaths( Array(
            'APP_ROOT'          => $dir,
            'WP_ROOT'           => preg_replace( '/$\//', '', ABSPATH ),
            'APP_DIR'           => basename( $dir ),
            'CONFIG_DIR'        => $dir . '/config',
            'ASSETS_DIR'        => $dir . '/assets',
            'ASSETS_DIR_NAME'   => 'assets',
            'SHORTCODES_DIR'    => $dir . '/include/shortcodes',
        ) );

        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateWithVC' ) );
    }

    public function integrateWithVC() {

        // Check if Visual Composer is installed
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            // Display notice that Visual Compser is required
            //add_action('admin_notices', array( $this, 'showVcVersionNotice' ));
            return;
        }

        require_once  $this->path( 'CONFIG_DIR', 'map.php');
        $this->loadShortCodes();
    }

    public function loadShortCodes() {

        $shortcodes = array(
            'shortcode_sportexx_banner.php',
            'shortcode_sportexx_brands_carousel.php',
            'shortcode_sportexx_product_tabs.php',
            'shortcode_sportexx_product_image_card.php',
            'shortcode_sportexx_product_card.php',
            'shortcode_sportexx_image_card.php',
            'shortcode_sportexx_recent_posts.php',
            'shortcode_sportexx_title.php',
            'shortcode_sportexx_team_member.php'
        );

        foreach ( $shortcodes as $shortcode ) {
            require_once $this->path( 'SHORTCODES_DIR', $shortcode );
        }
    }

    /**
     * Setter for paths
     *
     * @since  4.2
     * @access protected
     * @param $paths
     */
    protected function setPaths( $paths ) {
        $this->paths = $paths;
    }

    /**
     * Gets absolute path for file/directory in filesystem.
     *
     * @since  4.2
     * @access public
     * @param $name        - name of path dir
     * @param string $file - file name or directory inside path
     * @return string
     */
    public function path( $name, $file = '' ) {
        return $this->paths[$name] . ( strlen( $file ) > 0 ? '/' . preg_replace( '/^\//', '', $file ) : '' );
    }

    /*
    Show notice if your plugin is activated but Visual Composer is not
    */
    public function showVcVersionNotice() {
        $plugin_data = get_plugin_data(__FILE__);
        echo '
        <div class="updated">
        <p>'.sprintf(__('<strong>%s</strong> requires <strong><a href="http://bit.ly/vcomposer" target="_blank">Visual Composer</a></strong> plugin to be installed and activated on your site.', 'sportexx-extensions'), $plugin_data['Name']).'</p>
        </div>';
    }
}

// Finally initialize code
new VCExtendAddonClass();