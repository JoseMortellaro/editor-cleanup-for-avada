<?php
/*
  Plugin Name: Editor Cleanup For Avada [ecfa]
  Description: mu-plugin automatically installed by Editor CLeanup For Avada
  Version: 0.0.3
  Plugin URI: https://freesoul-deactivate-plugins.com/
  Author: Jose Mortellaro
  Author URI: https://josemortellaro.com/
  License: GPLv2
*/

defined( 'ABSPATH' ) || exit; // Exit if accessed directly
define( 'FDP_ECFA_MU_VERSION','0.0.3' );

if( isset( $_GET['fb-edit'] ) && absint( $_GET['fb-edit'] ) > 0 ){
  add_filter( 'fdp_frontend_plugins',function( $plugins ){
    return eos_dp_ecfa_plugins( $plugins,'outer' );
  } );
}
elseif( isset( $_GET['builder'] ) && 'true' === $_GET['builder']  ){
  add_filter( 'fdp_frontend_plugins',function( $plugins ){
    return eos_dp_ecfa_plugins( $plugins,'inner' );
  } );
}

add_filter( 'fdp_ajax_plugins',function( $plugins ){
  $avada_actions = array(
    'fusion_get_widget_form'
  );
  if( isset( $_REQUEST['action'] ) && in_array( sanitize_text_field( $_REQUEST['action'] ),$avada_actions ) ){
    return eos_dp_ecfa_plugins( $plugins,'loading' );
  }
  return $plugins;
} );

add_filter( 'fdp_ajax_plugins',function( $plugins ){
  if( isset( $_REQUEST['action'] ) && in_array( sanitize_text_field( $_REQUEST['action'] ),array( 'eos_dp_save_avada_outer_settings','eos_dp_save_avada_inner_settings','eos_dp_save_avada_loading_settings' ) ) ){
    return array_merge( array( 'fusion-builder/fusion-builder.php','fusion-core/fusion-core.php' ),fdp_ecfa_plugins( $plugins ) );
  }
  return $plugins;
} );

function eos_dp_ecfa_plugins( $plugins,$page ){
  $opts = eos_dp_get_option( 'fdp_avada' );
  $avada_plugins = isset( $opts[$page] ) ? $opts[$page] : array();
  $fdp_plugins = fdp_ecfa_plugins( $plugins );
  $avada_plugins = $avada_plugins && is_array( $avada_plugins ) ? array_merge( $avada_plugins,$fdp_plugins ) : $fdp_plugins;
  foreach( $avada_plugins as $plugin ){
    if( in_array( $plugin,$plugins ) || in_array( $plugin,$fdp_plugins ) ){
      unset( $plugins[array_search( $plugin,$plugins )] );
    }
  }
  return array_values( $plugins );
}

function fdp_ecfa_plugins( $plugins ){
  $arr = array(
    'freesoul-deactivate-plugins/freesoul-deactivate-plugins.php',
    'editor-cleanup-for-avada/editor-cleanup-for-avada.php'
  );
  if( in_array( 'freesoul-deactivate-plugins-pro/freesoul-deactivate-plugins-pro.php',$plugins ) ){
    $arr[] = 'freesoul-deactivate-plugins-pro/freesoul-deactivate-plugins-pro.php';
  }
  return $arr;
}
