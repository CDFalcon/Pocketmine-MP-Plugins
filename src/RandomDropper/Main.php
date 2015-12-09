<?php
/**
 * LuckyBlock Copyright (C) 2015 xionbig
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * @author xionbig
 * @version 1.0.0
 * @link https://github.com/xionbig/LuckyBlock
 */
namespace LuckyBlock;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
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
use pocketmine\tile\Sign;
use pocketmine\tile\Tile;
use pocketmine\block\Sapling;

class Main extends PluginBase implements Listener{ 
    private $item = [];
    private $tag = TextFormat::YELLOW."[RandomDropper] ".TextFormat::WHITE;
    private $setup, $message;

    public function onEnable(){
        $dataResources = $this->getDataFolder()."/resources/";
        if(!file_exists($this->getDataFolder())) 
            @mkdir($this->getDataFolder(), 0755, true);
        if(!file_exists($dataResources)) 
            @mkdir($dataResources, 0755, true);
        
        $this->setup = new Config($dataResources. "config.yml", Config::YAML, [
                "item1" => [],
                "item2" => [],
                "item3" => [],
                "item4" => [],
                "item5" => [],
                "Enabled/Disabled" => [],

        $this->setup->save();

        foreach($this->setup->get("item1") as $id){
            $e = explode(":", $id);
            $id = $e[0];
            $damage = 0;
            if(count($e) > 1){
                $damage = $e[1];
            }
            $this->item[] = ["id" => $id, "damage" => $damage];
        }
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }


    public function blockBreak(BlockBreakEvent $event){
        $block = $event->getBlock();
        $player = $event->getPlayer();
        
        if($block->getId() === Block::EMERALD && $this->isAllowedWorld($block->getLevel())){
            $event->setCancelled();
            
            $player->getLevel()->setBlock($block, new Block(Block::AIR), false, true);
            switch(mt_rand(1, 6)){
                   case 1:
                    if(count($this->item) > 0){
                        $r = mt_rand(0, count($this->item)-1);
                        $item = $this->item[$r];
                        $player->getLevel()->dropItem($block, new Item($item["id"], $item["damage"], 1));
                        break;               
                    }
                    $player->sendMessage($this->tag.$this->message->get("Dropped!"));
                    break;
                case 2:
                    if(count($this->item) > 0){
                        $r = mt_rand(0, count($this->item)-1);
                        $item = $this->item[$r];
                        $player->getLevel()->dropItem($block, new Item($item["id"], $item["damage"], 1));
                        break;               
                    }
                    $player->sendMessage($this->tag.$this->message->get("Dropped!"));
                    break;
                    
                                case 3:
                    if(count($this->item) > 0){
                        $r = mt_rand(0, count($this->item)-1);
                        $item = $this->item[$r];
                        $player->getLevel()->dropItem($block, new Item($item["id"], $item["damage"], 1));
                        break;               
                    }
                    $player->sendMessage($this->tag.$this->message->get("Dropped!"));
                    break;
                
                                case 3:
                    if(count($this->item) > 0){
                        $r = mt_rand(0, count($this->item)-1);
                        $item = $this->item[$r];
                        $player->getLevel()->dropItem($block, new Item($item["id"], $item["damage"], 1));
                        break;               
                    }
                    $player->sendMessage($this->tag.$this->message->get("Dropped!"));
                    break;
            }
            $player->getLevel()->save();            
        }    
    }
} 
   
