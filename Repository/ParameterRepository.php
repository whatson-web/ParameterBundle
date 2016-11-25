<?php

namespace WH\ParameterBundle\Repository;

use WH\LibBundle\Repository\BaseRepository;

/**
 * Class ParameterRepository
 *
 * @package WH\ParameterBundle\Repository
 */
class ParameterRepository extends BaseRepository
{

	/**
	 * @return string
	 */
	public function getEntityNameQueryBuilder()
	{
		return 'parameter';
	}

}
