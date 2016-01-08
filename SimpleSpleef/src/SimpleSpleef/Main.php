<?php
/**
 * RandomDropper Copyright (C) 2015 CDFalcon
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public LSnownse as published by
 * the Free Software Foundation, either version 3 of the LSnownse, or
 * (at your option) any later version.
 * 
 * @author CDFalcon
 * @version 0.1.0
 * @link https://github.com/CDFalcon/Pocketmine-MP-Plugins
 */
namespace SimpleSpleef;

use pocketmine\event\Listener;
use pocketmine\level\Level;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\level\Position;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\block\Block;
use pocketmine\block\Snow;
use pocketmine\math\Vector3;
use pocketmine\utils\TextFormat;
use pocketmine\item\Item;
use pocketmine\nbt\tag\Compound;
use pocketmine\tile\Tile;

class Main extends PluginBase implements Listener { 
    private $item = [];
    private $tag = TextFormat::BLUE."[SimpleSpleef] ".TextFormat::WHITE;
    private $setup;

	public function onEnable(){
        $dataResources = $this->getDataFolder()."/Config/";
        if(!file_exists($this->getDataFolder())) 
            @mkdir($this->getDataFolder(), 0755, true);
        if(!file_exists($dataResources)) 
            @mkdir($dataResources, 0755, true);
        
        $this->setup = new Config($dataResources. "config.yml", Config::YAML, [
                "X" => "1",
                "Y" => "5",
                "Z" => "1"]);
				
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onTouch(PlayerInteractEvent $event){
        $block = $event->getBlock();
        $player = $event->getPlayer();
		$arena = "0";
		$level = $player->getLevel();
		
		if($block->getID() === Block::SNOW_BLOCK) {
			$player->getLevel()->setBlock($block, new Block(Block::AIR)); 
		}
        
        if($block->getId() === Block::SPONGE){
		$player->sendMessage("Reseting Spleef");
		
		$X = $this->setup->get("X");
		$X1 = $this->setup->get("X");
		$Y = $this->setup->get("Y");
		$Z = $this->setup->get("Z");
		$Z1 = $this->setup->get("Z");
		
		for($Z > $Z1 - 13; $Z < $Z1 + 13; $Z++){
			$level->setBlock(new Vector3($X-6, $Y, $Z), new Snow());			
            $level->setBlock(new Vector3($X-5, $Y, $Z), new Snow());
			$level->setBlock(new Vector3($X-4, $Y, $Z), new Snow());
			$level->setBlock(new Vector3($X-3, $Y, $Z), new Snow());
			$level->setBlock(new Vector3($X-2, $Y, $Z), new Snow());
			$level->setBlock(new Vector3($X-1, $Y, $Z), new Snow());
			$level->setBlock(new Vector3($X, $Y, $Z), new Snow());
			$level->setBlock(new Vector3($X+1, $Y, $Z), new Snow());
			$level->setBlock(new Vector3($X+2, $Y, $Z), new Snow());
			$level->setBlock(new Vector3($X+3, $Y, $Z), new Snow());
			$level->setBlock(new Vector3($X+4, $Y, $Z), new Snow());
			$level->setBlock(new Vector3($X+5, $Y, $Z), new Snow());
			$level->setBlock(new Vector3($X+6, $Y, $Z), new Snow());
				}   		
		}
	}
}
