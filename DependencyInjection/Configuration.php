<?php

namespace WebCapsule\DiscordWebhooks\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
	public function getConfigTreeBuilder()
	{
		$treeBuilder = new TreeBuilder('web_capsule_discord_webhooks');

		$treeBuilder->getRootNode()
			->children()
				->arrayNode('webhook')
					->children()
						->scalarNode('url')->end()
					->end()
				->end()// twitter
			->end();

		return $treeBuilder;
	}
}
