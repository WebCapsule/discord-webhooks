<?php

namespace WebCapsule\Bundle\DiscordWebhooks;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use WebCapsule\DiscordWebhooks\DependencyInjection\DiscordWebhookExtension;

class DiscordWebhookBundle extends Bundle
{
	public function build(ContainerBuilder $container)
	{
		parent::build($container);
	}

	public function getContainerExtension()
	{
		return new DiscordWebhookExtension();
	}
}
