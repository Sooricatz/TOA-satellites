<?php

/**
 * unconference actions.
 *
 * @package    toaberlin
 * @subpackage unconference
 * @author     maciej@canadel.ee
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class unconferenceActions extends sfActions {

	public function executeIndex(sfWebRequest $request) {
	}

	public function executeSpeakers(sfWebRequest $request) {

		$this->speakers = Doctrine_Core::getTable('Speaker')->findAllSorted('asc');
	}

	public function executeSchedule(sfWebRequest $request) {
	}
}
