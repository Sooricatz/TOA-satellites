<?php

/**
 * SpeakerTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class SpeakerTable extends Doctrine_Table {

	public static function getInstance() { return Doctrine_Core::getTable('Speaker'); }

	public function getByLastName() {

		$q = $this->createQuery()

			->from('Speaker s')
			->orderBy('s.last_name')
		;

		return $q->execute();
	}

	public function getByLastNameForAdmin(Doctrine_Query $q) {

		$r = $q->getRootAlias();
		$q->orderBy($r . '.last_name');
		return $q;
	}

	public function getWithPosition(Doctrine_Query $q) {

		$r = $q->getRootAlias();
		$q->orderBy($r . '.position');
		return $q;
	}
}
