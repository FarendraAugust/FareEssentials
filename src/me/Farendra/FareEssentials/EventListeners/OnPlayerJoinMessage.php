<?php

declare(strict_types=1);

namespace me\Farendra\FareEssentials\EventListeners;

use me\Farendra\FareEssentials\Main;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\TextFormat;

class OnPlayerJoinMessage implements Listener
{
	private Main $plugin;

	public function __construct(Main $plugin)
	{
		$this->plugin = $plugin;
	}

	public function onJoin(PlayerJoinEvent $e): void
	{
		$player = $e->getPlayer();
		$name = $player->getName();

		$message = $this->plugin->getConfig()->get("join-message", "§aWelcome {player}");

		$message = str_replace("{player}", $name, $message);

		$e->setJoinMessage(TextFormat::colorize($message));
	}
}
