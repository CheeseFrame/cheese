<?php

/**
 * Created by PhpStorm.
 * User: Caleb
 * Date: 8/31/2019
 * Time: 9:15 PM
 */
class ZipEncoding
{
    public function __construct ()
    {
        $this->zip = new ZipArchive;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function createZip ($name='')
    {
        if ($this->zip->open ($name,ZipArchive::CREATE)===TRUE){
            $this->zip->addFromString ('demo.txt','Created by default by '.SITENAME);
            $this->zip->close ();
            return true;
        }
    }
}