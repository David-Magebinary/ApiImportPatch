<?php
class MageBinary_ApiImportPatch_Model_Resource_Import_Data extends Danslo_ApiImport_Model_Resource_Import_Data
{
    /**
     * Validates and sets the import behavior.
     *
     * @param string $behavior
     * @return MageBinary_ApiImportPatch_Model_Resource_Import_Data
     */
    public function setBehavior($behavior)
    {
        $allowedBehaviors = array(
            Mage_ImportExport_Model_Import::BEHAVIOR_APPEND,
            Mage_ImportExport_Model_Import::BEHAVIOR_REPLACE,
            Mage_ImportExport_Model_Import::BEHAVIOR_DELETE,
            Danslo_ApiImport_Model_Import::BEHAVIOR_STOCK,
            MageBinary_ApiImportPatch_Model_Import::BEHAVIOR_CUSTOMER_APPEND_ONLY
        );
        if (!in_array($behavior, $allowedBehaviors)) {
            Mage::throwException('Specified import behavior (%s) is not in allowed behaviors: %s', $behavior, implode(', ', $allowedBehaviors));
        }
        $this->_behavior = $behavior;
        return $this;
    }
}