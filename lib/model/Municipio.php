<?php


/**
 * Skeleton subclass for representing a row from the 'municipio' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * Sat Sep 27 13:53:29 2014
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Municipio extends BaseMunicipio {
    public function __toString() {
        return $this->getNombre();
    }
} // Municipio
