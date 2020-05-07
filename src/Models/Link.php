<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class Link extends \HarmSmits\BolComClient\Objects\AObject
{
	/** @var string */
	private ?string $rel = null;

	/** @var string */
	private ?string $href = null;

	/**
	 * HTTP method
	 * @var string
	 */
	private ?string $method = null;


	public function getRel(): ?string
	{
		return $this->rel;
	}


	public function setRel(string $rel)
	{
		$this->rel = $rel;
		return $this;
	}


	public function getHref(): ?string
	{
		return $this->href;
	}


	public function setHref(string $href)
	{
		$this->href = $href;
		return $this;
	}


	public function getMethod(): ?string
	{
		return $this->method;
	}


	public function setMethod(string $method)
	{
		$this->method = $method;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'rel' => $this->getRel(),
			'href' => $this->getHref(),
			'method' => $this->getMethod(),
		);
	}
}
