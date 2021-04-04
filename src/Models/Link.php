<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getRel()
 * @method self setRel(string $rel)
 * @method null|string getHref()
 * @method self setHref(string $href)
 * @method null|string getMethod()
 * @method self setMethod(string $method)
 */
final class Link extends AModel
{
    /**
     * The link relation.
     * @var string
     */
    protected string $rel;

    /**
     * The URI for the resource linked to.
     * @var string
     */
    protected string $href;

    /**
     * The HTTP method to use when accessing the link.
     * @var string
     */
    protected string $method;
}
