<?php

/**
 * Speaker form.
 *
 * @package    toaberlin
 * @subpackage form
 * @author     maciej@canadel.ee
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SpeakerForm extends BaseSpeakerForm {

	public function configure() {

		// all-around-the-clock logic, unset some stuff
		unset(

			$this['created_at'],
			$this['updated_at'],
			$this['position']
		);

		// widgets and validators
		$this->setWidget('face', new sfWidgetFormInputFileEditable(array(

			'file_src'	=> '/images/content/speakers-cms/' . $this->getObject()->face,
			'edit_mode'     => !$this->isNew(),
			'is_image'      => true,
			'with_delete'   => false
		)));
		$this->setValidator('face', new sfValidatorFile(array(

			'mime_types'	=> 'web_images',
			'path'		=> sfConfig::get('sf_web_dir') . '/images/content/speakers-cms/',
			'required'	=> false
		)));
		$this->validatorSchema['face_delete'] = new sfValidatorBoolean();
	}
}
