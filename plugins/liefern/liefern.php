<?php
/**
 * This file is part of Pico. It's copyrighted by the contributors recorded
 * in the version control history of the file, available from the following
 * original location:
 *
 * <https://github.com/picocms/Pico/blob/master/plugins/DummyPlugin.php>
 *
 * SPDX-License-Identifier: MIT
 * License-Filename: LICENSE
 */

/**
 * Pico dummy plugin - a template for plugins
 *
 * You're a plugin developer? This template may be helpful :-)
 * Simply remove the events you don't need and add your own logic.
 *
 * @author  Daniel Rudolf
 * @link    http://picocms.org
 * @license http://opensource.org/licenses/MIT The MIT License
 * @version 2.0
 */
 
 
class liefern extends AbstractPicoPlugin
{
	
	
    /**
     * API version used by this plugin
     *
     * @var int
     */
    const API_VERSION = 2;

    /**
     * This plugin is disabled by default[changed]
     *
     * Usually you should remove this class property (or set it to NULL) to
     * leave the decision whether this plugin should be enabled or disabled by
     * default up to Pico. If all the plugin's dependenies are fulfilled (see
     * {@see self::$dependsOn}), Pico enables the plugin by default. Otherwise
     * the plugin is silently disabled.
     *
     * If this plugin should never be disabled *silently* (e.g. when dealing
     * with security-relevant stuff like access control, or similar), set this
     * to TRUE. If Pico can't fulfill all the plugin's dependencies, it will
     * throw an RuntimeException.
     *
     * If this plugin rather does some "crazy stuff" a user should really be
     * aware of before using it, you can set this to FALSE. The user will then
     * have to enable the plugin manually. However, if another plugin depends
     * on this plugin, it might get enabled silently nevertheless.
     *
     * No matter what, the user can always explicitly enable or disable this
     * plugin in Pico's config.
     *
     * @see AbstractPicoPlugin::$enabled
     * @var bool|null
     */
    protected $enabled = true;

    /**
     * This plugin depends on ...
     *
     * If your plugin doesn't depend on any other plugin, remove this class
     * property.
     *
     * @see AbstractPicoPlugin::$dependsOn
     * @var string[]
     */
    protected $dependsOn = array();

    /**
     * Triggered after Pico has prepared the raw file contents for parsing
     *
     * @see DummyPlugin::onContentParsing()
     * @see Pico::parseFileContent()
     * @see DummyPlugin::onContentParsed()
     *
     * @param string &$markdown Markdown contents of the requested page
     *
     * @return void
     */
    public function onContentPrepared(&$markdown)
    {
//vars
include "html.php";
					
			//first: markdown transformation
			
					//find them
					preg_match_all('/\[liefern\].+\[\/liefern\]/', $markdown, $matches, PREG_OFFSET_CAPTURE);
					
					
					
					//analyse them
					foreach ($matches as $item) {
						foreach($item as $key => $item2) {
							
							//vars
							unset($code);
							unset($name);
							unset($preis);
							
							//split them up
							preg_match_all('/code.+code/', $item2[0], $code, PREG_OFFSET_CAPTURE);
							preg_match_all('/name.+name/', $item2[0], $name, PREG_OFFSET_CAPTURE);
							preg_match_all('/preis.+preis/', $item2[0], $preis, PREG_OFFSET_CAPTURE);
							
							//check if markdown is correct
							//and everything is found
							if (isset($code[0][0][0]) && isset($name[0][0][0]) && isset($preis[0][0][0])) {
									
									//remove trigger words
									$code[0][0][0] = preg_replace('/code/', '', $code[0][0][0]);
									$name[0][0][0] = preg_replace('/name/', '', $name[0][0][0]);
									$preis[0][0][0] = preg_replace('/preis/', '', $preis[0][0][0]);
									
											//special treatment for price
											$preis[0][0][0] = preg_replace('/[ ]/', '', $preis[0][0][0]);
											$preis[0][0][0] = preg_replace('/[,]/', '.', $preis[0][0][0]);
											
								//save style and button as X
								$matches[0][$key][2] = $code[0][0][0] . $name[0][0][0] . $preis[0][0][0] . "<button onclick=\"jsfunc(" . $code[0][0][0] . ",'" . $name[0][0][0] . "','" . $preis[0][0][0] . "')\">Plus</button><br>";
								
								$matches[0][$key][2] = htmlspecialchars_decode($matches[0][$key][2], ENT_COMPAT);
								
							}
							
							
							
							
						}
					}
					
					//replacement with X
					foreach ($matches as $item) {
						foreach($item as $item2) {
							if (isset($item2[2])) {
							$markdown = str_replace($item2[0], $item2[2], $markdown);
								
							}
							
						}
						
					}
	
		//second: change complete site when we move to kasse
			if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["kassensenden"]))
				{
					//transform
					$mystring = implode($_POST);
					$myjson = json_decode($mystring);
					
					//vars
					$senden = "";
					$current = 0;
					$markdown = "Warenkorb <br><br><table width='100%'><tr><td>";
					 
					 //transform items
    			foreach($myjson as $item) {
						$code = $item->code;
						$name = $item->name;
						$prize = $item->prize;
						
						//align items in warenkorb
						$markdown = $markdown . "<p style='float:left'>" . $code . $name . "</p><p style='float:right'>" . $prize . "</p><br><br>";
						$current = $current + $prize;
						
						//save for contactform
						$senden = $senden . $code . " " . $name . " " . $prize . "\n";
					}
					
					//close warenkorb with gesamtpreis
					$markdown = $markdown . "</td></tr><tr><td><br><br>";
					$markdown = $markdown . "<p style='float:left'>Gesamtpreis:</p><p style='float:right'> " . $current . "</p></td></tr></table>";

					//add contactform
					//add warenkorb as bestellung in the middle (invisible)
					//later send via email
					$markdown = $markdown . $contactformone  . $senden . $contactformtwo;
				}
	}

    /**
     * Triggered after Pico has parsed the contents of the file to serve
     *
     * @see DummyPlugin::onContentParsing()
     * @see DummyPlugin::onContentPrepared()
     * @see Pico::getFileContent()
     *
     * @param string &$content parsed contents (HTML) of the requested page
     *
     * @return void
     */
    public function onContentParsed(&$content)
    {
//vars
include "html.php";
		
		///warenkorb hinzufügen
		/// und style tag hinzufügen
        ///warenkorbscript hinzufügen
		if($_SERVER['REQUEST_METHOD'] != "POST" ){
			
					$content = htmlspecialchars_decode($css . $warenkorb, ENT_COMPAT) . $content . "</div>";
					$content = $content . htmlspecialchars_decode($warenkorbscript, ENT_COMPAT); 
			
		}		
			
    }

}
