<!-- 
Method to calculate difference remaining for free shipping to be displayed to customer.
Will French, Matt Mathis
10/6/2015

code for variables retrieved from http://magento.stackexchange.com/questions/19757/show-amount-to-goal-for-free-shipping
    $freeShippingSubtotal = Mage::getStoreConfig('carriers/freeshipping/free_shipping_subtotal');
    $cartSubtotal = Mage::getSingleton('checkout/session')->getQuote()->getSubtotal(); 
-->

<?php 
    
    /* 
    * string is a value in core_config_data that corressponds to the value that carrier has set for free shipping. change as needed.
    * ex: carriers/freeshipping/free_shipping_subtotal
    */
    $freeshipping_data = floatval(Mage::getStoreConfig('carriers/ups/free_shipping_subtotal')); 
    $cartSubtotal = Mage::getSingleton('checkout/session')->getQuote()->getSubtotal();
	$converted_value = Mage::helper('directory')->currencyConvert($freeshipping_data, 'USD', Mage::app()->getStore()->getCurrentCurrencyCode());
		    
    if($cartSubtotal >= $converted_value){ /* You could also use $_product->getPrice() >= $converted_value if you were in the product detail page */ 
	   echo $this->__('This Cart has Free Shipping!'); 
	}else{
          echo "Add ".Mage::helper('checkout')->formatPrice($converted_value - $cartSubtotal."and you will have Free Shipping";
    }
?>
