<?php
defined( 'ABSPATH' ) || exit; // Exit if accessed directly

if( file_exists( WPMU_PLUGIN_DIR.'/fdp-mu-avada.php' ) ){
  unlink( WPMU_PLUGIN_DIR.'/fdp-mu-avada.php' );
}
eos_dp_ecfa_write_file( FDP_ECFA_PLUGIN_DIR.'/mu-plugins/fdp-mu-avada.php',WPMU_PLUGIN_DIR,WPMU_PLUGIN_DIR.'/fdp-mu-avada.php',true );
