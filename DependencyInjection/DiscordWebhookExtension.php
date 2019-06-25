<?php

namespace WebCapsule\Bundle\DiscordWebhooks\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader;

class DiscordWebhookExtension extends Extension
{

	public function getAlias()
	{
		return 'web_capsule_discord_webhooks';
	}

	public function load(array $configs, ContainerBuilder $container)
	{
		$configuration = new Configuration($container->getParameter('kernel.debug'));

		$config = $this->processConfiguration($configuration, $configs);

		$loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
		$loader->load('services.yaml');

		$container->setParameter('web_capsule_discord_webhooks.webhooks', $config['webhooks']);
	}
}
