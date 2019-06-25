<?php

class WebhookClient
{
	private $url;

	public function __construct(string $url)
	{
		$this->url = $url;
	}

	/**
	 * @return mixed
	 */
	public function getUrl()
	{
		return $this->url;
	}
}
