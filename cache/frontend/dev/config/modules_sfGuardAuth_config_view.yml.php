<?php
// auto-generated by sfViewConfigHandler
// date: 2014/10/04 20:35:16
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('main.css', '', array ());
  $response->addStylesheet('ui-lightness/jquery-ui-1.10.0.custom.css', '', array ());
  $response->addStylesheet('bootstrapflatty.min.css', '', array ());
  $response->addJavascript('jquery-2.1.1.js', '', array ());
  $response->addJavascript('jquery-migrate-1.2.1.js', '', array ());
  $response->addJavascript('jquery-ui-1.10.0.custom.min.js', '', array ());
  $response->addJavascript('jquery_datepicker_es.js', '', array ());
  $response->addJavascript('tiny_mce/tiny_mce.js', '', array ());
  $response->addJavascript('bootstrap.min.js', '', array ());


