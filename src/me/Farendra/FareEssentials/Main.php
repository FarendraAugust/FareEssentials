<?php

declare(strict_types=1);

namespace me\Farendra\FareEssentials\Main;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{
	private Config $configFile;

	public function onEnable(): void
	{
		$this->saveDefaultConfig();
		$this->configFile = new Config(
			$this->getDataFolder() . "config.yml",
			Config::YAML
		);

		$this->getLogger()->info("&aFareEssentials are enable!");
	}

	public function onDisable(): void
	{
		$this->getLogger()->info("&cFareEssentials are disable!");
	}
}
