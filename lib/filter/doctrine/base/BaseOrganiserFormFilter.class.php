<?php

/**
 * Organiser filter form base class.
 *
 * @package    toaberlin
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseOrganiserFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'eventbrite_id' => new sfWidgetFormFilterInput(),
      'name'          => new sfWidgetFormFilterInput(),
      'description'   => new sfWidgetFormFilterInput(),
      'url'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'eventbrite_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'name'          => new sfValidatorPass(array('required' => false)),
      'description'   => new sfValidatorPass(array('required' => false)),
      'url'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('organiser_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Organiser';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'eventbrite_id' => 'Number',
      'name'          => 'Text',
      'description'   => 'Text',
      'url'           => 'Text',
    );
  }
}
