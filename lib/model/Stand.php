<?php



/**
 * Skeleton subclass for representing a row from the 'stand' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.2-dev on:
 *
 * Sat Dec 13 11:29:14 2014
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class Stand extends BaseStand {
    public function __toString() {
        return $this->getMetros();
    }
} // Stand