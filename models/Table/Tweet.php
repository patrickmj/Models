<?php

class Table_Tweet extends Omeka_Db_Table
{
    
    public function findTweetId($id)
    {
        $select = $this->getSelect();
        $select->where("tweet_id = ?", $id);
        return $this->fetchObject($select);
    }
}