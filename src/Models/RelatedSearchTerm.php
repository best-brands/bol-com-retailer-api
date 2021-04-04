<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|int getTotal()
 * @method self setTotal(int $total)
 * @method null|string getSearchTerm()
 * @method self setSearchTerm(string $searchTerm)
 */
final class RelatedSearchTerm extends AModel
{
	/**
	 * The number of customer visits on the search page.
	 * @var int
	 */
	protected int $total;

	/**
	 * The search term for which you requested the search volume.
	 * @var string
	 */
	protected string $searchTerm;
}
