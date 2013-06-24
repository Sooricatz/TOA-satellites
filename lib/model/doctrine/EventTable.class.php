<?php

/**
 * EventTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class EventTable extends Doctrine_Table {

	public static function getInstance() { return Doctrine_Core::getTable('Event'); }

	public function getEventsForPageAndCategory($page = 0, $category = null) {

		// base query
		$q = $this->createQuery()

			->from('Event e')
			->where('moderated = ?', true)
		;

		// defaults
		$start_hour = sfConfig::get('app_pagination_start_hour');
		$end_hour = sfConfig::get('app_pagination_end_hour');

		// higher pages
		if(is_numeric($page) and $page > 0) {

			$start_hour = date('G:i:s', strtotime($start_hour) + ($page * intval(sfConfig::get('app_pagination_hours_per_page')) * 3600));
			$end_hour = date('G:i:s', strtotime($end_hour) + ($page * intval(sfConfig::get('app_pagination_hours_per_page')) * 3600));
		}

		// add hourly pagination
		$q->addWhere('e.start_hour >= ?', $start_hour);
		$q->addWhere('e.start_hour <= ?', $end_hour);
		//$q->addWhere('e.end_hour <= ?', $end_hour);

		// add category
		if(!is_null($category)) $q->addWhere('e.category_id = ?', $category->getId());

		// sort and execute
		$q->orderBy('start_date');
		return $q->execute();
	}

	// user-to-event getters
	public function getForUser(sfUser $user) {

		// fallback fix for users not having Organiser profiles
		return $user->getGuardUser()->getOrganiser() ? $user->getGuardUser()->getOrganiser()->getEvents() : array();
	}
	public function getAPIForUser(sfUser $user) {

		return $user->getMelody('eventbrite')->getEventsForUser($user->getGuardUser()->getEmailAddress());
	}
	public function getAPIUnhostedForUser(sfUser $user) {

		// fetch stuff from API
		$eventsAPI = $this->getAPIForUser($user);

		// 1a. check if user has anything in the API
		if($eventsAPI and is_array($eventsAPI) and isset($eventsAPI['events']) and count($eventsAPI['events'])) {

			$output = $eventsAPI['events'];

			// 2. rule out events that don't match our date
			$goodDate = strtotime(sfConfig::get('app_satellites_date'));
			foreach($output as $keyAPI => $eventAPI) {

				$eventDate = strtotime($eventAPI['event']['start_date']);

				// allow -24h and +24h tolerance; rule out everything else
				if($eventDate < $goodDate - (24 * 3600) or $eventDate > $goodDate + (24 * 3600)) unset($output[$keyAPI]);
			}

			// 3. fetch check if the user has any events hosted in our database
			if($eventsDB = $this->getForUser($user) and count($eventsDB)) {

				// 4. rule out duplicates
				// LATER: adjust it as probably massive-iterating the API response would be faster than iterating the Doctrine_Collection
				foreach($output as $keyAPI => $eventAPI) {

					// LATER: think if a better way for searching in Doctrine_Collection
					// http://www.tig12.net/downloads/apidocs/symfony/lib/plugins/sfDoctrinePlugin/lib/vendor/doctrine/Doctrine/Doctrine_Collection.class.html
					foreach($eventsDB as $eventDB) {

						if($eventAPI['event']['id'] == $eventDB->getEventbriteId()) unset($output[$keyAPI]);
					}
				}
			}

			// 5. return formatted output
			return $output;
		}

		// 1b. return false
		else return false;
	}
	public function getUnsynchronized() {

		// base query
		$q = $this->createQuery()

			->from('Event e')
			->where('e.moderated = ?', true)
			->addWhere('e.test = ?', false)
			->addWhere('e.synchronized = ?', false)
		;

		return $q->execute();
	}
}
