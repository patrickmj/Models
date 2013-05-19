<?php

class ModelsPlugin extends Omeka_Plugin_AbstractPlugin
{
    public $_hooks = array('install', 'uninstall');
    
    public function hookInstall($args)
    {
        $db = get_db();
        $sql = "

CREATE TABLE IF NOT EXISTS `$db->Tweet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tweet_id` int(10) unsigned NOT NULL,
  `tweet_user_id` int(10) unsigned NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;        
        
        ";
        
        $db->query($sql);
        
        //create some fake data
        $tweet1 = new Tweet;
        $tweet1->tweet_id = 1;
        $tweet1->tweet_user_id = 1;
        $tweet1->text = "Mark Sample's cat ate breakfast";
        
        $tweet1->save();
        
        //create some fake data
        $tweet2 = new Tweet;
        $tweet2->tweet_id = 13;
        $tweet2->tweet_user_id = 2;
        $tweet2->text = "Alien Weed Man likes cats more than ALF.";
        
        $tweet2->save();        
        
        
    }
    
    public function hookUninstall($args)
    {
        $db = get_db();
        $sql = "DROP TABLE IF EXISTS `$db->Tweet`";
        $db->query($sql);
    }
    
}