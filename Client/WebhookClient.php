<?php

namespace WebCapsule\Bundle\DiscordWebhooks\Client;

use GuzzleHttp\Client;

/**
 * Class WebhookClient
 * @package WebCapsule\Bundle\DiscordWebhooks\Client
 */
class WebhookClient
{
	/**
	 * @var string $url
	 */
	protected $url;

	/**
	 * @var string $username
	 */
	protected $username;

	/**
	 * @var string $avatar
	 */
	protected $avatar;

	/**
	 * @var string $message
	 */
	protected $message;

	/**
	 * @var array $embeds
	 */
	protected $embeds;

	/**
	 * @var bool $tts
	 */
	protected $tts;

	/**
	 * WebhookClient constructor.
	 * @param string $url
	 * @param string $username
	 */
	public function __construct(string $url, ?string $username)
	{
		$this->url = $url;
		$this->username = $username;
	}

	/**
	 * @return string
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * @param string $url
	 * @return WebhookClient $this
	 */
	public function setUrl(string $url)
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * @param string $username
	 * @return WebhookClient
	 */
	public function setUsername(string $username)
	{
		$this->username = $username;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getAvatar()
	{
		return $this->avatar;
	}

	/**
	 * @param mixed $avatar
	 * @return WebhookClient
	 */
	public function setAvatar(string $avatar)
	{
		$this->avatar = $avatar;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMessage()
	{
		return $this->message;
	}

	/**
	 * @param string $message
	 * @return WebhookClient
	 */
	public function setMessage(string $message)
	{
		$this->message = $message;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getEmbeds()
	{
		return $this->embeds;
	}

	/**
	 * @param WebhookEmbed $embeds
	 * @return WebhookClient
	 */
	public function setEmbeds(WebhookEmbed $embed)
	{
		$this->embeds[] = $embed->toArray();
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getTts()
	{
		return $this->tts;
	}

	/**
	 * @param bool $tts
	 * @return WebhookClient
	 */
	public function setTts(bool $tts)
	{
		$this->tts = $tts;
		return $this;
	}

	public function send()
	{
		$payload =
			[
				'headers' =>
					[
						'Content-Type' => 'application/json'
					],
				'json' => [
					'content' => $this->message,
					'username' => $this->username,
					'avatar_url' => $this->avatar,
					'tts' => $this->tts,
					'embeds' => $this->embeds,
				]
			];

		$client = new Client();
		$client->request('POST', $this->url, $payload);
	}
}
