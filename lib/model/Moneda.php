<?php



/**
 * Skeleton subclass for representing a row from the 'moneda' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.2-dev on:
 *
 * Fri Jan  2 15:15:25 2015
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class Moneda extends BaseMoneda {
    public function __toString() {
        return $this->getNombre();
    }
} // Moneda
