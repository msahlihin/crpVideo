<?php
/**
 * crpVideo
 *
 * @copyright (c) 2007, Daniele Conca
 * @link http://noc.postnuke.com/projects/crpvideo Support and documentation
 * @author Daniele Conca <jami at cremonapalloza dot org>
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package crpVideo
 */

/**
 * crpVideoUI
 */
class crpVideoUI
{

	function crpVideoUI()
	{
		// none
	}
	
	/**
	 * Draw modify configuration form
	 * 
	 * @param array $item element values
	 * @param int $mainCat module's root category
	 * @param array $modvars module's variables
	 * 
	 * @return string html
	 */
	function modifyConfig($modvars=array(), $gdArray=array())
	{
		// Create output object
    $pnRender = pnRender::getInstance('crpVideo', false);

    $pnRender->assign($modvars);
    $pnRender->assign('gd_version', $this->gd_version($gdArray['GD Version']));

    // Return the output that has been generated by this function
    return $pnRender->fetch('crpvideo_admin_modifyconfig.htm');
	}
	
	function gd_version($fullstring=null) 
	{
		$cache_gd_version = array();
		
		if (eregi('bundled \((.+)\)$', $fullstring, $matches)) {
			$cache_gd_version['string'] = $fullstring;  // e.g. "bundled (2.0.15 compatible)"
			$cache_gd_version['value'] = (float) $matches[1];     // e.g. "2.0" (not "bundled (2.0.15 compatible)")
		} else {
			$cache_gd_version['string'] = $fullstring;                       // e.g. "1.6.2 or higher"
			$cache_gd_version['value'] = (float) substr($fullstring, 0, 3); // e.g. "1.6" (not "1.6.2 or higher")
		}
	
		return $cache_gd_version;
	}

}
?>
