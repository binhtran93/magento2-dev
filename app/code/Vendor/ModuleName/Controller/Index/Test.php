<?php


namespace Vendor\ModuleName\Controller\Index;


use Magento\Framework\App\Action\Action;

class Test extends Action
{
    public function execute()
    {
        $textDisplay = new \Magento\Framework\DataObject(array('text' => 'Mageplaza'));
        $this->_eventManager->dispatch('mageplaza_helloworld_display_text', ['mp_text' => $textDisplay]);
        echo $textDisplay->getText();
        exit;
    }
}
