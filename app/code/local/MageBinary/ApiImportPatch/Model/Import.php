<?php

class MageBinary_ApiImportPatch_Model_Import  extends Danslo_ApiImport_Model_Import
{
    /**
     * Import behavior.
     * Append customers with passing less attributes
     */
    const BEHAVIOR_CUSTOMER_APPEND_ONLY  = 'customer_append';
}