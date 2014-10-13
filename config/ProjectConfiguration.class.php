<?php

require_once '/var/www/sfprojects/lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
	    $this->enablePlugins('sfPropel15Plugin');
    	    $this->enablePlugins('sfGuardPlugin');
            $this->enablePlugins('sfFormExtraPlugin');
            $this->enablePlugins('sfTCPDFPlugin');
  }
}
