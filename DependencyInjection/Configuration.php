<?php

namespace WebCapsule\Bundle\DiscordWebhooks\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
	public function getConfigTreeBuilder()
	{

		$treeBuilder = new TreeBuilder();
		$rootNode = $treeBuilder->root('web_capsule_discord_webhooks');

		$treeBuilder->getRootNode()
			->children()
				->arrayNode('webhooks')
					->arrayPrototype()
						->children()
							->scalarNode('username')->defaultNull()->end()
							->scalarNode('url')->isRequired()->end()
						->end()
					->end()
				->end()
			->end();

		return $treeBuilder;
	}
}
