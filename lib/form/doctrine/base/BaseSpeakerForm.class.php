<?php

/**
 * Speaker form base class.
 *
 * @method Speaker getObject() Returns the current form's model object
 *
 * @package    toaberlin
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSpeakerForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'face'                    => new sfWidgetFormInputText(),
      'first_name'              => new sfWidgetFormInputText(),
      'last_name'               => new sfWidgetFormInputText(),
      'company_position'        => new sfWidgetFormInputText(),
      'company'                 => new sfWidgetFormInputText(),
      'description'             => new sfWidgetFormTextarea(),
      'url'                     => new sfWidgetFormInputText(),
      'facebook'                => new sfWidgetFormInputText(),
      'twitter'                 => new sfWidgetFormInputText(),
      'created_at'              => new sfWidgetFormDateTime(),
      'updated_at'              => new sfWidgetFormDateTime(),
      'position'                => new sfWidgetFormInputText(),
      'programs_list'           => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Program')),
      'moderated_programs_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Program')),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'face'                    => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'first_name'              => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'last_name'               => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'company_position'        => new sfValidatorString(array('max_length' => 96, 'required' => false)),
      'company'                 => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'description'             => new sfValidatorString(array('max_length' => 4096, 'required' => false)),
      'url'                     => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'facebook'                => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'twitter'                 => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'created_at'              => new sfValidatorDateTime(),
      'updated_at'              => new sfValidatorDateTime(),
      'position'                => new sfValidatorInteger(array('required' => false)),
      'programs_list'           => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Program', 'required' => false)),
      'moderated_programs_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Program', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Speaker', 'column' => array('position')))
    );

    $this->widgetSchema->setNameFormat('speaker[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Speaker';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['programs_list']))
    {
      $this->setDefault('programs_list', $this->object->Programs->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['moderated_programs_list']))
    {
      $this->setDefault('moderated_programs_list', $this->object->ModeratedPrograms->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveProgramsList($con);
    $this->saveModeratedProgramsList($con);

    parent::doSave($con);
  }

  public function saveProgramsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['programs_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Programs->getPrimaryKeys();
    $values = $this->getValue('programs_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Programs', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Programs', array_values($link));
    }
  }

  public function saveModeratedProgramsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['moderated_programs_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->ModeratedPrograms->getPrimaryKeys();
    $values = $this->getValue('moderated_programs_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('ModeratedPrograms', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('ModeratedPrograms', array_values($link));
    }
  }

}
