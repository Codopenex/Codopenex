<?php
// src/Codopenex/RssAggregatorBundle/Repository/FeedRepository.php

namespace Codopenex\RssAggregatorBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * FeedRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom !ACTUALLY IT WASN'T - NEED TO LOOK INTO WHY DOCTRINE NOT GENERATING!
 * repository methods below.
 */
class FeedRepository extends EntityRepository
{
	public function getFeeds()
	{
		$feeds = $this->createQueryBuilder('f')
						 ->select('f')
						 ->getQuery()
						 ->getResult();
	
		return $feeds;
	}
	
}