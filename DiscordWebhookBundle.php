<?php

namespace WebCapsule\Bundle\DiscordWebhooks;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use WebCapsule\Bundle\DiscordWebhooks\DependencyInjection\Compiler\WebhookClientCompilerPass;
use WebCapsule\Bundle\DiscordWebhooks\DependencyInjection\DiscordWebhookExtension;

class DiscordWebhookBundle extends Bundle
{
	public function build(ContainerBuilder $container)
	{
		parent::build($container);
		$container->addCompilerPass(new WebhookClientCompilerPass());
	}

	public function getContainerExtension()
	{
		return new DiscordWebhookExtension();
	}
}
