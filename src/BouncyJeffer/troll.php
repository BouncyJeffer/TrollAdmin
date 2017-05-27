<?php
namespace BouncyJeffer;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;
class troll extends PluginBase {
  public $prefix = TextFormat::RED."[".TextFormat::YELLOW."TrollAdmin".TextFormat::RED."] ".TextFormat::GRAY;
  public function onEnable(){
    $this->getServer()->getLogger()->notice($this->prefix."is now live.");
  }
  public function onDisable(){
    $this->getServer()->getLogger()->notice($this->prefix."was disabled.");
  }
  public function onCommand(CommandSender $sender, Command $command, $label, array $args){
    if($command->getName() == "troll"){
      if(!isset($args[0])){
      $sender->sendMessage($this->prefix."Use ".TextFormat::WHITE."/troll ?".TextFormat::GRAY." for help.");
      } else {
        switch($args[0]){
          case "op":
          if(!isset($args[1])){
            $sender->sendMessage($this->prefix."Usage: /troll op [player name]");
          } else {
            $player = $this->getServer()->getPlayer($args[1]);
            if($player instanceof Player){
              $player->sendMessage(TextFormat::GRAY."You are now op!");
            }
          }
          break;
          case "deop":
          if(!isset($args[1])){
            $sender->sendMessage($this->prefix."Usage: /troll deop [player name]");
          } else {
            $player = $this->getServer()->getPlayer($args[1]);
            if($player instanceof Player){
              $player->sendMessage(TextFormat::GRAY."You are no longer op!");
            }
          }
          break;
          case "spam":
          foreach($this->getServer()->getOnlinePlayers() as $p){
            $starter = 1;
            while($starter < 100){
              $starter++;
              $p->sendMessage("Spam! Spam! Spam! Spam! Spam! Spam! Spam! Spam! Spam! Spam! Spam Spam!")
            }
          }
          break;
          case "help":
          case "?":
          $sender->sendMessage($this->prefix."Commands: ");
          $sender->sendMessage(TextFormat::WHITE."- ".TextFormat::RED."/troll op [player name]");
          $sender->sendMessage(TextFormat::WHITE."- ".TextFormat::RED."/troll deop [player name]");
          $sender->sendMessage(TextFormat::WHITE."- ".TextFormat::RED."/troll spam [player name]");
          break;
        }
      }
    }
    return true;
  }
}
?>
