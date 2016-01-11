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
namespace CrateKeys;

use pocketmine\event\Listener;
use pocketmine\level\Level;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\level\Position;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\block\Block;
use pocketmine\item\Item;
use pocketmine\inventory;
use pocketmine\inventory\PlayerInventory;
use pocketmine\inventory\BaseInventory;
use pocketmine\utils\TextFormat;
use pocketmine\nbt\tag\Compound;

class Main extends PluginBase implements Listener { 
    private $item = [];
    private $tag = TextFormat::BLUE."[RandomDropper] ".TextFormat::WHITE;
    private $setup;

    public function onEnable(){
        $dataResources = $this->getDataFolder()."/Config/";
        if(!file_exists($this->getDataFolder())) 
            @mkdir($this->getDataFolder(), 0755, true);
        if(!file_exists($dataResources)) 
            @mkdir($dataResources, 0755, true);
        
        $this->setup = new Config($dataResources. "config.yml", Config::YAML, [
                "item1" => ["1"],
                "item2" => ["1"],
                "item3" => ["1"],
                "item4" => ["1"],
                "item5" => ["1"],
				"item6" => ["1"],
                "item7" => ["1"],
                "item8" => ["1"],
                "item9" => ["1"],
                "item10" => ["1"]]);

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
        foreach($this->setup->get("item2") as $id){
            $e = explode(":", $id);
            $id = $e[0];
            $damage = 0;
            if(count($e) > 1){
                $damage = $e[1];
            }
            $this->item[] = ["id" => $id, "damage" => $damage];
        }
        foreach($this->setup->get("item3") as $id){
            $e = explode(":", $id);
            $id = $e[0];
            $damage = 0;
            if(count($e) > 1){
                $damage = $e[1];
            }
            $this->item[] = ["id" => $id, "damage" => $damage];
        }
        foreach($this->setup->get("item4") as $id){
            $e = explode(":", $id);
            $id = $e[0];
            $damage = 0;
            if(count($e) > 1){
                $damage = $e[1];
            }
            $this->item[] = ["id" => $id, "damage" => $damage];
        }
        foreach($this->setup->get("item5") as $id){
            $e = explode(":", $id);
            $id = $e[0];
            $damage = 0;
            if(count($e) > 1){
                $damage = $e[1];
            }
            $this->item[] = ["id" => $id, "damage" => $damage];
        }
		foreach($this->setup->get("item6") as $id){
            $e = explode(":", $id);
            $id = $e[0];
            $damage = 0;
            if(count($e) > 1){
                $damage = $e[1];
            }
            $this->item[] = ["id" => $id, "damage" => $damage];
        }
        foreach($this->setup->get("item7") as $id){
            $e = explode(":", $id);
            $id = $e[0];
            $damage = 0;
            if(count($e) > 1){
                $damage = $e[1];
            }
            $this->item[] = ["id" => $id, "damage" => $damage];
        }
        foreach($this->setup->get("item8") as $id){
            $e = explode(":", $id);
            $id = $e[0];
            $damage = 0;
            if(count($e) > 1){
                $damage = $e[1];
            }
            $this->item[] = ["id" => $id, "damage" => $damage];
        }
        foreach($this->setup->get("item9") as $id){
            $e = explode(":", $id);
            $id = $e[0];
            $damage = 0;
            if(count($e) > 1){
                $damage = $e[1];
            }
            $this->item[] = ["id" => $id, "damage" => $damage];
        }
        foreach($this->setup->get("item10") as $id){
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


    public function onTouch(PlayerInteractEvent $event){
        $block = $event->getBlock();
        $player = $event->getPlayer();
		$inventory = $player->getInventory();
        
        if($block->getId() === Block::CHEST){
			
		if($inventory->contains(new \pocketmine\item\Emerald(0,1))) {
			
			$event->setCancelled();
            
            switch(mt_rand(1, 10)){
                   case 1:
                    if(count($this->item) > 0){
                        $r = mt_rand(0, count($this->item)-1);
                        $item = $this->item[$r];
                        $player->getLevel()->dropItem($block, new Item($item["id"], $item["damage"], 1));
						$player->sendMessage("Used CrateKey");
						$inventory->removeItem(new \pocketmine\item\Emerald(0,1)); 
                        break;						
                    }
                    break;
                case 2:
                    if(count($this->item) > 0){
                        $r = mt_rand(0, count($this->item)-1);
                        $item = $this->item[$r];
                        $player->getLevel()->dropItem($block, new Item($item["id"], $item["damage"], 1));
						$player->sendMessage("Used CrateKey");
						$inventory->removeItem(new \pocketmine\item\Emerald(0,1)); 
						 break;
                    }
                    break;
                    
                case 3:
                    if(count($this->item) > 0){
                        $r = mt_rand(0, count($this->item)-1);
                        $item = $this->item[$r];
                        $player->getLevel()->dropItem($block, new Item($item["id"], $item["damage"], 1));
						$player->sendMessage("Used CrateKey");
						$inventory->removeItem(new \pocketmine\item\Emerald(0,1));  
						 break;
                    }
                    break;
                
                    case 4:
                    if(count($this->item) > 0){
                        $r = mt_rand(0, count($this->item)-1);
                        $item = $this->item[$r];
                        $player->getLevel()->dropItem($block, new Item($item["id"], $item["damage"], 1));         
						$player->sendMessage("Used CrateKey");
						$inventory->removeItem(new \pocketmine\item\Emerald(0,1));  		
                        break;						
                    }
                    break;

                    case 5:
                    if(count($this->item) > 0){
                        $r = mt_rand(0, count($this->item)-1);
                        $item = $this->item[$r];
                        $player->getLevel()->dropItem($block, new Item($item["id"], $item["damage"], 1));
						$player->sendMessage("Used CrateKey");
						$inventory->removeItem(new \pocketmine\item\Emerald(0,1));  	
                        break;						
                    }
                    break;
					
					case 6:
                    if(count($this->item) > 0){
                        $r = mt_rand(0, count($this->item)-1);
                        $item = $this->item[$r];
                        $player->getLevel()->dropItem($block, new Item($item["id"], $item["damage"], 1));
						$player->sendMessage("Used CrateKey");
						$inventory->removeItem(new \pocketmine\item\Emerald(0,1)); 
                        break;						
                    }
                    break;
					
                    case 7:
                    if(count($this->item) > 0){
                        $r = mt_rand(0, count($this->item)-1);
                        $item = $this->item[$r];
                        $player->getLevel()->dropItem($block, new Item($item["id"], $item["damage"], 1));
						$player->sendMessage("Used CrateKey");
						$inventory->removeItem(new \pocketmine\item\Emerald(0,1)); 
						 break;
                    }
                    break;
                    
                    case 8:
                    if(count($this->item) > 0){
                        $r = mt_rand(0, count($this->item)-1);
                        $item = $this->item[$r];
                        $player->getLevel()->dropItem($block, new Item($item["id"], $item["damage"], 1));
						$player->sendMessage("Used CrateKey");
						$inventory->removeItem(new \pocketmine\item\Emerald(0,1));  
						 break;
                    }
                    break;
                
                    case 9:
                    if(count($this->item) > 0){
                        $r = mt_rand(0, count($this->item)-1);
                        $item = $this->item[$r];
                        $player->getLevel()->dropItem($block, new Item($item["id"], $item["damage"], 1));         
						$player->sendMessage("Used CrateKey");
						$inventory->removeItem(new \pocketmine\item\Emerald(0,1));  		
                        break;						
                    }
                    break;

                    case 10:
                    if(count($this->item) > 0){
                        $r = mt_rand(0, count($this->item)-1);
                        $item = $this->item[$r];
                        $player->getLevel()->dropItem($block, new Item($item["id"], $item["damage"], 1));
						$player->sendMessage("Used CrateKey");
						$inventory->removeItem(new \pocketmine\item\Emerald(0,1));  	
                        break;						
                    }
                    break;
            }
			}
            $player->getLevel()->save();            
        }    
    }
} 


