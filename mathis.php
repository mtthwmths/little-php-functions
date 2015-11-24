    <?php 
    
    require_once 'abstract.php';
    
    class Mage_Shell extends Mage_Shell_Abstract {

        public function run() {
            $configurableProducts = Mage::getModel('catalog/product')->getCollection()
            ->addAttributeToSelect('*')
            ->addFieldToFilter('type_id', 'configurable')
            ->load();
    
            $storeID = Mage_Core_Model_App::ADMIN_STORE_ID;

            foreach ($configurableProducts as $configurableProduct) {
                $childIDs = getChildrenIds($configurableProduct, $required = true);    

                $action = Mage::getModel('catalog/resource_product_action');
                $action->updateAttributes($childIDs, array('visibility' => '1'), $storeID);
            }
        }
    }

    $shell = new Mage_Shell();
    $shell->run();
    ?>
