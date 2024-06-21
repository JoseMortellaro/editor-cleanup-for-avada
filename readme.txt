=== Editor Cleanup For Avada: FDP add-on to cleanup the Avada frontend editor ===
Contributors: giuse
Tags:  cleanup, avada, performance, debugging, conflicts
Requires at least: 4.6
Tested up to: 6.5
Stable tag: 0.0.5
Requires PHP: 7.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


FDP add-on to cleanup the frontend editor of Avada. Your Avada frontend editor will be faster and without conflicts with other plugins.


== Description ==

Editor Cleanup For Avada is an add-on of <a href="https://wordpress.org/plugins/freesoul-deactivate-plugins/" target="_blank">Freesoul Deactivate Plugins</a> to cleanup <a href="https://avada.theme-fusion.com/" target="_blank">Avada</a> in the backend.

It will not only clean up the assets of other plugins, but their PHP code will not run either.

Your Avada frontend editor will be faster and without conflicts with other plugins.

Freesoul Deactivate Plugins, Avada, Fusion Builder, and Fusion Core must be installed and active, in another case this plugin will not run.

If you need to clean up the backend editor of Avada, you need only Freesoul Deactivate Plugins. You can do the cleanup by going to Freesoul Deactivate Plugins => Backend Singles => Pages => Edit Single Page.


== How to clean up the Avada editor ==
* Install and activate Freesoul Deactivate Plugins if not active yet
* Install and activate Avada, Fusion Builder and Fusion Core if not active yet
* Install and activate Editor Cleanup For Avada
* Go to Avada => Frontend Editor Cleanup
* Click on "Outer editor cleanup" to disable plugins that the outer editor does't need (usually no plugin needed)
* Click on "Inner editor cleanup" to disable plugins that the inner editor does't need (the inner editor is like the page on frontend, but loaded inside the Avada editor)
* Click on "Editor loading cleanup" to disable the plugins that are called during the loading of the editor (usually no plugin needed, disabling plugins here can solve conflicts with other plugins)


== Similar add-ons for cleanup ==
* <a href="https://wordpress.org/plugins/editor-cleanup-for-oxygen/">Editor Cleanup For Oxygen</a>
* <a href="https://wordpress.org/plugins/editor-cleanup-for-elementor/">Editor Cleanup For Elementor</a>
* <a href="https://wordpress.org/plugins/editor-cleanup-for-wpbakery/">Editor Cleanup For WPBakery</a>
* <a href="https://wordpress.org/plugins/editor-cleanup-for-divi-builder/">Editor Cleanup For Divi Builder</a>
* <a href="https://wordpress.org/plugins/editor-cleanup-for-flatsome/">Editor Cleanup For Flatsome</a>

== Help ==
For any question or if something doesn't work, don't hesitate to open a thread on the <a href="https://wordpress.org/support/plugin/editor-cleanup-for-avada/">support forum</a>.



== Changelog ==


= 0.0.5 =
*Fix: settings not saving (need FDP >= v. 2.1.7)

= 0.0.4 =
*Fix: fatal error in the plugin settings page

= 0.0.3 =
*Fix: settings not saving with the new FDP versions

= 0.0.2 =
*Fix: mu-plugin not created on activation

= 0.0.1 =
*Initial release


== Screenshots ==

1. How disable plugins in the frontend editor of Avada
