<?php
/**
 * @category	Solide Webservices
 * @package		CustomLayoutHandles
 *
*/

class SolideWebservices_CustomLayoutHandles_Model_Observer {

	public function customLayoutHandles(Varien_Event_Observer $observer) {

		if (Mage::helper('customlayouthandles')->isEnabled() == 1) {
		
			$layout = $observer->getEvent()->getLayout();

			/* add xml handle module */
			if (Mage::helper('customlayouthandles')->addModuleXml() == 1) {
				$handle_module = Mage::app()->getFrontController()->getRequest()->getModuleName();
				if($handle_module) {
					$custom_handle_module = str_replace('/', '-', $handle_module);
					$layout->getUpdate()->addHandle('module_'.$custom_handle_module);
				}
			}

			/* add xml handle cms page title */
			if (Mage::helper('customlayouthandles')->addCmsXml() == 1) {
				$handle_cms = Mage::getSingleton('cms/page')->getIdentifier();
				if($handle_cms) {
					$custom_handle_cms = str_replace('/', '-', $handle_cms);
					$layout->getUpdate()->addHandle('cms_'.$custom_handle_cms);
				}
			}

			/* category handles */
			$category = Mage::registry('current_category');
			$product = Mage::registry('current_product');

			/* add category name */
			if (Mage::helper('customlayouthandles')->addCatNameXml() == 1) {
				if ($category){
					$slug = $category->getUrlKey();
					$layout->getUpdate()->addHandle('catalog-category-'. $slug);
				}
			}

			/* add category level */
			if (Mage::helper('customlayouthandles')->addCatLevelXml() == 1) {
				if ($category && !$product) {
					$layout->getUpdate()->addHandle('catalog_category_level_'.$category->getLevel());
				}
			}
			
			/* has childeren or not */
			if (Mage::helper('customlayouthandles')->addFertilityXml() == 1) {
				if ($category instanceof Mage_Catalog_Model_Category) {
					$fertility = (count($category->getChildrenCategories())) ? 'parent' : 'nochildren';
					$layout->getUpdate()->addHandle('catalog_category_' . $fertility);				
				}
			}
			

		}
	}

}