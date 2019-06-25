<?php

namespace WebCapsule\Bundle\DiscordWebhooks\Registry;

use WebCapsule\Bundle\DiscordWebhooks\Client\WebhookClient;

class WebhookClientRegistry
{
	private $webhookClients = [];

	public function get(string $alias): WebhookClient
	{
		if(!$this->has($alias)){
			throw new \UnexpectedValueException(sprintf('Could not load webhook client with alias'));
		}

		return $this->webhookClients[$alias];
	}

	/**
	 * @return array
	 */
	public function getAll(): array
	{
		return $this->webhookClients;
	}

	public function set(string $alias, WebhookClient $webhookClient): WebhookClientRegistry
	{
		$this->webhookClients[$alias] = $webhookClient;
		return $this;
	}

	public function has(string $alias): bool
	{
		return isset($this->webhookClients[$alias]);
	}
}
