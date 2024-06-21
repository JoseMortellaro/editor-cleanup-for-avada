<?php
defined( 'FDP_ECFA_PLUGIN_DIR' ) || exit;

if( !current_user_can( 'activate_plugins' ) ){
?>
  <h2><?php _e( 'Sorry, you have not the right for this page','editor-cleanup-for-avada' ); ?></h2>
  <?php
  return;
}
$active_plugins = eos_dp_active_plugins();
if( !is_array( $active_plugins ) || empty( $active_plugins ) ){
  ?>
  <h2><?php _e( 'You have no plugins.','editor-cleanup-for-avada' ); ?></h2>
  <?php
  return;
}
$plugins = eos_dp_get_plugins();
$opts = eos_dp_get_option( 'fdp_avada' );
$avada = isset( $opts[$page] ) ? $opts[$page] : array();
$column_count = max( 1,min( 3,absint( count( $active_plugins )/11 ) ) );
wp_nonce_field( 'eos_dp_avada_'.$page.'_setts','eos_dp_avada_'.$page.'_setts' );
wp_enqueue_script( 'fdp_avada',FDP_ECFA_PLUGIN_URL.'/admin/assets/js/fdp-avada.js',array( 'eos-dp-backend' ) );
wp_localize_script( 'fdp_avada','fdp_avada',array( 'page'=> $page ) );
if( in_array( FDP_AVADA_PLUGIN_FILE,$active_plugins ) ){
  unset( $active_plugins[array_search( FDP_AVADA_PLUGIN_FILE,$active_plugins )] );
}
if( in_array( FDP_ECFA_PLUGIN_FILE,$active_plugins ) ){
  unset( $active_plugins[array_search( FDP_ECFA_PLUGIN_FILE,$active_plugins )] );
}
if( in_array( FDP_AVADA_CORE_PLUGIN_FILE,$active_plugins ) ){
  unset( $active_plugins[array_search( FDP_AVADA_CORE_PLUGIN_FILE,$active_plugins )] );
}

?>
<?php eos_dp_ecfa_inline_style( $column_count );
eos_dp_ecfa_navigation();
?>
<section id="eos-dp-avada-section">
  <h2><?php echo esc_html( $title ); ?></h2>
  <div style="margin-bottom:12px;margin-top:32px">
    <span class="eos-dp-active-wrp eos-dp-icon-wrp"><input style="width:20px;height:20px;margin:0" type="checkbox"></span>
    <span class="eos-dp-legend-txt"><?php _e( 'Plugin active','editor-cleanup-for-avada' ); ?></span>
    <span class="eos-dp-not-active-wrp eos-dp-icon-wrp"><input style="width:20px;height:20px;margin:0" type="checkbox" checked=""></span>
    <span class="eos-dp-legend-txt"><?php _e( 'Plugin not active','editor-cleanup-for-avada' ); ?></span>
  </div>
  <div style="margin:32px 0 16px 0">
    <span id="fdp-select-all-single-post" class="button"><?php _e( 'Enable All','editor-cleanup-for-avada' ); ?></span>
    <span id="fdp-unselect-all-single-post" class="button"><?php _e( 'Disable All','editor-cleanup-for-avada' ); ?></span>
  </div>
  <div id="eos-dp-wrp" style="margin-top:32px">
    <table id="eos-dp-setts" style="display:block;border-spacing:2px !important;border-collapse:separate !important">
      <?php
      $n = 0;
      foreach( $active_plugins as $p ){
        if( isset( $plugins[$p] ) ){
          $plugin_name = strtoupper( str_replace( '-',' ',dirname( $p ) ) );
          $checked = $avada && in_array( $p,$avada ) ? '' : ' checked';
          ?>
          <tr>
            <td class="eos-dp-avada-chk-col <?php echo '' !== $checked ? 'eos-dp-active' : ''; ?>">
              <div class="eos-dp-td-chk-wrp">
                <input id="eos-dp-avada-<?php echo esc_attr( $n + 1 ); ?>" class="eos-dp-avada" title="<?php printf( esc_attr__( 'Activate/deactivate %s','editor-cleanup-for-avada' ),esc_attr( $plugin_name ) ); ?>" data-path="<?php echo esc_attr( $p ); ?>" type="checkbox"<?php echo esc_attr( $checked ); ?> />
              </div>
            </td>
            <td class="eos-dp-name-td"><?php echo esc_html( $plugin_name ); ?></td>
          </tr>
          <?php
          ++$n;
        }
      }
      ?>
    </table>
  </div>
  <?php
  require_once EOS_DP_PLUGIN_DIR.'/admin/templates/partials/eos-dp-footer.php';
  eos_dp_save_button();
  ?>
</section>
<?php
