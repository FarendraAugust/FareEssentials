<?php

declare(strict_types=1);

namespace me\Farendra\FareEssentials\EventListeners;

use me\Farendra\FareEssentials\Main;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\utils\TextFormat;

class OnPlayerQuitMessage implements Listener
{
	private Main $plugin;

	public function __construct(Main $plugin)
	{
		$this->plugin = $plugin;
	}

	public function onQuit(PlayerQuitEvent $e): void
	{
		$player = $e->getPlayer();
		$name = $player->getName();

		$message = $this->plugin
			->getConfig()
			->get("leave-message", "§aBye {player}");

		$message = str_replace("{player}", $name, $message);

		$e->setQuitMessage(TextFormat::colorize($message));
	}
}
