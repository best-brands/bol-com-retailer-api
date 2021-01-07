<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getType()
 * @method self setType(string $type)
 * @method null|string getTitle()
 * @method self setTitle(string $title)
 * @method null|int getStatus()
 * @method self setStatus(int $status)
 * @method null|string getDetail()
 * @method self setDetail(string $detail)
 * @method null|string getHost()
 * @method self setHost(string $host)
 * @method null|string getInstance()
 * @method self setInstance(string $instance)
 * @method Violation[] getViolations()
 */
final class Problem extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * Type URI for this problem. Fixed value: https://api.bol.com/problems.
	 * @var string
	 */
	protected ?string $type = null;

	/**
	 * Title describing the nature of the problem.
	 * @var string
	 */
	protected ?string $title = null;

	/**
	 * HTTP status returned from the endpoint causing the problem.
	 * @var int
	 */
	protected ?int $status = null;

	/**
	 * Detailed error message describing in additional detail what caused the service
	 * to return this problem.
	 * @var string
	 */
	protected ?string $detail = null;

	/**
	 * Host identifier describing the server instance that reported the problem.
	 * @var string
	 */
	protected ?string $host = null;

	/**
	 * Full URI path of the resource that reported the problem.
	 * @var string
	 */
	protected ?string $instance = null;

	/** @var Violation[] */
	protected array $violations = [];


    /**
     * @param Violation[] $violations
     *
     * @return $this
     */
	public function setViolations(array $violations): self
	{
		$this->_checkIfPureArray($violations, \HarmSmits\BolComClient\Models\Violation::class);
		$this->violations = $violations;
		return $this;
	}
}
