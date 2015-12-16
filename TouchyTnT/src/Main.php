<?php
/**
 * RandomDropper Copyright (C) 2015 CDFalcon
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * @author CDFalcon
 * @version 0.1.0
 * @link https://github.com/CDFalcon/Pocketmine-MP-Plugins
 */
namespace TouchyTnT;

use pocketmine\event\Listener;
use pocketmine\level\Level;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\level\Position;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\block\Block;
use pocketmine\level\Explosion;
use pocketmine\utils\TextFormat;
use pocketmine\item\Item;
use pocketmine\nbt\tag\Compound;
use pocketmine\nbt\tag\Int;
use pocketmine\nbt\tag\String;
use pocketmine\tile\Tile;

class Main extends PluginBase implements Listener{ 
    private $item = [];
    private $tag = TextFormat::RED."[TouchyTnT] ".TextFormat::WHITE;
    private $setup;

    public function onEnable(){
        $dataResources = $this->getDataFolder()."/Config/";
        if(!file_exists($this->getDataFolder())) 
            @mkdir($this->getDataFolder(), 0755, true);
        if(!file_exists($dataResources)) 
            @mkdir($dataResources, 0755, true);
        
        $this->setup = new Config($dataResources. "config.yml", Config::YAML, [
                "radius" => []]);
                
         if(!is_numeric($this->setup->get("explosion")) || $this->setup->get("radius") <= 0){
            $this->getServer()->getLogger()->error("The field 'radius' is invalid. TouchyTnT disabled!");
            $this->getServer()->getPluginManager()->disablePlugin($this->getServer()->getPluginManager()->getPlugin("TouchyTnT"));
            return;
        }

        $this->setup->save();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function blockBreak(BlockBreakEvent $event){
        $block = $event->getBlock();
        $player = $event->getPlayer();
        
        if($block->getId() === Block::TNT){
            $player->getLevel()->setBlock($block, new Block(Block::AIR), false, true);
            switch(mt_rand(1, 2)){
                   case 1:
                   break;
                   case 2:
                    $explosion = new Explosion($block, mt_rand(1, $this->config["radius"])); 
                    if($explosion->explodeA()) 
                       $explosion->explodeB(); 
                    break; 
               } 
            }
            $player->getLevel()->save();            
        }    
    }
} 
   
