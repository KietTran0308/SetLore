<?php

namespace WoolChannel3295\Lore;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\Player;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;

use pocketmine\item\Item;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\EnchantInstance;
use pocketmine\item\ItemBlock;

class Main extends PluginBase implements Listener{
    
    public $tag = "[§a§lＳＥＴ ＬＯＲＥ§r]";
    
    public function onEnable(): void{
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args):bool{
        switch(strtolower($cmd->getName())){
            case "setlore":
                if(!($sender instanceof Player)){
                    $sender->sendMessage("$this->tag §cVui Lòng Sử Dụng Trong Game");
                }else{
                    $name = $sender->getName();
                    $l = implode(" ", $args);
                         
                    $it = $sender->getInventory()->getItemInHand();
                    $itId = $it->getId();
                    if($it->getId() == 0){
                        $sender->sendMessage("$this->tag §cTrên Tay Bạn Không Có Item");
                        return true;
                    }
                    $it->setLore(explode("\n\n", $l));
                    $sender->getInventory()->setItemInHand($it);
                    $sender->sendMessage("$this->tag §aBạn Đã Tạo Tên Thành Công.");
                }
            break;
        }
        return true;
    }
}

