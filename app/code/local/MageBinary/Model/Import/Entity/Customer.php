<?php
class MageBinary_ApiImportPatch_Model_Import_Entity_Customer extends Danslo_ApiImport_Model_Import_Entity_Customer
{
    /**
     * Adds events before and after importing.
     *
     * @return boolean
     */
    public function _importData()
    {
        // If import data behavior has been set to customer append only
        // change the logic to only save new customers and skip addresses
        if (MageBinary_ApiImportPatch_Model_Import::BEHAVIOR_CUSTOMER_APPEND_ONLY == $this->getBehavior()) {
            Mage::log('123123123');die();
        }
        $result = parent::_importData();
        return $result;
    }

    /**
     * Import behavior getter.
     *
     * @return string
     */
    public function getBehavior()
    {
        if (!isset($this->_parameters['behavior'])
            || ($this->_parameters['behavior'] != Mage_ImportExport_Model_Import::BEHAVIOR_APPEND
            && $this->_parameters['behavior'] != Mage_ImportExport_Model_Import::BEHAVIOR_REPLACE
            && $this->_parameters['behavior'] != Mage_ImportExport_Model_Import::BEHAVIOR_DELETE
            && $this->_parameters['behavior'] != MageBinary_ApiImportPatch_Model_Import::BEHAVIOR_CUSTOMER_APPEND_ONLY)) {
            return Mage_ImportExport_Model_Import::getDefaultBehavior();
        }
        return $this->_parameters['behavior'];
    }
}