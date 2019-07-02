<?php

namespace WebCapsule\Bundle\DiscordWebhooks\Client;

/**
 * Class WebhookEmbed
 * @package WebCapsule\Bundle\DiscordWebhooks\Client
 */
class WebhookEmbed
{
	/**
	 * @var string $title
	 */
	protected $title;

	/**
	 * @var mixed $color
	 */
	protected $color;

	/**
	 * @var array $author
	 */
	protected $author;

	/**
	 * @var string $url
	 */
	protected $url;

	/**
	 * @var string $type
	 */
	protected $type = "rich";

	/**
	 * @var string $description
	 */
	protected $description;

	/**
	 * @var array $thumbnail
	 */
	protected $thumbnail;

	/**
	 * @var array $image
	 */
	protected $image;

	/**
	 * @var string $timestamp
	 */
	protected $timestamp;

	/**
	 * @var array $footer
	 */
	protected $footer;

	/**
	 * @var array $fields
	 */
	protected $fields;


	/**
	 * @param string $title
	 * @return $this
	 */
	public function setTitle(string $title)
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @param $color
	 * @return $this
	 */
	public function setColor($color)
	{
		$this->color = is_int($color) ? $color : hexdec($color);
		return $this;
	}

	/**
	 * @param string $name
	 * @param string $url
	 * @param string $icon_url
	 * @return $this
	 */
	public function setAuthor(string $name, $url = '', $icon_url = '')
	{
		$this->author = [
			'name' => $name,
			'url' => $url,
			'icon_url' => $icon_url,
		];
		return $this;
	}

	/**
	 * @param string $url
	 * @return $this
	 */
	public function setUrl(string $url)
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * @param string $description
	 * @return $this
	 */
	public function setDescription(string $description)
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @param string $url
	 * @return $this
	 */
	public function setThumbnail(string $url)
	{
		$this->thumbnail = [
			'url' => $url,
		];
		return $this;
	}

	/**
	 * @param string $url
	 * @return $this
	 */
	public function setImage(string $url)
	{
		$this->image = [
			'url' => $url,
		];
		return $this;
	}

	/**
	 * @param $timestamp
	 * @return $this
	 */
	public function setTimestamp($timestamp)
	{
		$this->timestamp = $timestamp;
		return $this;
	}

	/**
	 * @param string $text
	 * @param string $icon_url
	 * @return $this
	 */
	public function setFooter(string $text, $icon_url = '')
	{
		$this->footer = [
			'text' => $text,
			'icon_url' => $icon_url,
		];
		return $this;
	}

	/**
	 * @param string $name
	 * @param string $value
	 * @param bool $inline
	 * @return $this
	 */
	public function setField(string $name, string $value, $inline = false)
	{
		$this->fields[] = [
			'name' => $name,
			'value' => $value,
			'inline' => boolval($inline),
		];
		return $this;
	}

	/**
	 * @return array
	 */
	public function toArray()
	{
		return [
			'title' => $this->title,
			'type' => $this->type,
			'description' => $this->description,
			'url' => $this->url,
			'color' => $this->color,
			'footer' => $this->footer,
			'image' => $this->image,
			'thumbnail' => $this->thumbnail,
			'timestamp' => $this->timestamp,
			'author' => $this->author,
			'fields' => $this->fields,
		];
	}
}
