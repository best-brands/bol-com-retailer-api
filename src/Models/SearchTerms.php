<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|SearchTerm getSearchTerms()
 * @method self setSearchTerms(SearchTerm $searchTerms)
 */
final class SearchTerms extends AModel
{
    // TODO verify this questionable api naming in swagger.
    protected ?SearchTerm $searchTerms = null;
}
