<?php

declare(strict_types=1);

namespace me\Farendra\FareEssentials;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use me\Farendra\FareEssentials\EventListeners\OnPlayerJoinMessage;
use me\Farendra\FareEssentials\EventListeners\OnPlayerQuitMessage;

class Main extends PluginBase
{
	public function onEnable(): void
	{
		$this->saveDefaultConfig();

		$this->getLogger()->info(
			"Config file loaded: " .
				(file_exists($this->getDataFolder() . "config.yml") ? "Yes" : "No")
		);

		$this->getServer()
			->getPluginManager()
			->registerEvents(new OnPlayerJoinMessage($this), $this);
		$this->getServer()
			->getPluginManager()
			->registerEvents(new OnPlayerQuitMessage($this), $this);

		$this->getLogger()->info("&aFareEssentials are enable!");
	}

	public function onDisable(): void
	{
		$this->getLogger()->info("&cFareEssentials are disable!");
	}
}
