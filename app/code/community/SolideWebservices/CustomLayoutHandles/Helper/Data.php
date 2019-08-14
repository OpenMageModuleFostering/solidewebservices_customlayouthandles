<?php
/**
 * @category	Solide Webservices
 * @package		CustomLayoutHandles
 */

class SolideWebservices_CustomLayoutHandles_Helper_Data extends Mage_Core_Helper_Abstract {

	/**
	 * Determine whether the extension is enabled
	 *
	 * @return bool
	 */
	public function isEnabled() {
		return Mage::getStoreConfig('customlayouthandles/settings/enabled');
	}

	/**
	 * Determine whether to add xml handle for module
	 *
	 * @return bool
	 */
	public function addModuleXml() {
		return Mage::getStoreConfig('customlayouthandles/settings/add_module_xml');
	}

	/**
	 * Determine whether to add xml handle for cms title
	 *
	 * @return bool
	 */
	public function addCmsXml() {
		return Mage::getStoreConfig('customlayouthandles/settings/add_cms_xml');
	}

	/**
	 * Determine whether to add xml handle for cms title
	 *
	 * @return bool
	 */
	public function addCatNameXml() {
		return Mage::getStoreConfig('customlayouthandles/settings/add_catname_xml');
	}

	/**
	 * Determine whether to add xml handle for cms title
	 *
	 * @return bool
	 */
	public function addCatLevelXml() {
		return Mage::getStoreConfig('customlayouthandles/settings/add_catlevel_xml');
	}
	
	/**
	 * Determine whether to add xml handle for catergory fertility
	 *
	 * @return bool
	 */
	public function addFertilityXml() {
		return Mage::getStoreConfig('customlayouthandles/settings/add_catfertility_xml');
	}

	/* return the current module as body class if enabled */
	public function getModuleClass() {
		if(Mage::getStoreConfig('customlayouthandles/settings/add_module_body')){
			return 'module-' . Mage::app()->getFrontController()->getRequest()->getModuleName();
		}
	}

}