<?php

namespace WebCapsule\Bundle\DiscordWebhooks\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ChildDefinition;
use Symfony\Component\DependencyInjection\Reference;
use WebCapsule\Bundle\DiscordWebhooks\Client\WebhookClient;
use WebCapsule\Bundle\DiscordWebhooks\Registry\WebhookClientRegistry;

class WebhookClientCompilerPass implements CompilerPassInterface
{
	public function process(ContainerBuilder $container)
	{
		$registryDefinition = $container->getDefinition(WebhookClientRegistry::class);
		$wehookClients = $container->getParameter('web_capsule_discord_webhooks.webhooks');
		foreach ($wehookClients as $alias => $configuration){

			$serviceDefinition = new ChildDefinition(WebhookClient::class);
			$serviceDefinition->setAbstract(false);

			$serviceDefinition->replaceArgument(0, $configuration['url']);
			$serviceDefinition->replaceArgument(1, $configuration['username']);

			$serviceName = sprintf('%s.%s', 'web_capsule_discord_webhooks.webhooks', $alias);
			$container->setDefinition($serviceName, $serviceDefinition);

			$registryDefinition->addMethodCall('set', [$alias, new Reference($serviceName)]);
		}
	}
}
