<?php

/**
 * SfGuardUserPermission filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSfGuardUserPermissionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_permission_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SfGuardUserPermission';
  }

  public function getFields()
  {
    return array(
      'user_id'       => 'ForeignKey',
      'permission_id' => 'ForeignKey',
    );
  }
}
