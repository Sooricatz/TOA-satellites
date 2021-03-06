<?php

/**
 * ProgramTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ProgramTable extends Doctrine_Table {

	public static function getInstance() {

		return Doctrine_Core::getTable('Program');
	}

	public function getOrderedByTimeStart() {

		$q = $this->createQuery()

			->from('Program p')
			->orderBy('p.start_hour')
		;

		return $q->execute();
	}
}
