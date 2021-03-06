<?php

namespace Artexe\CacheToken;

use Nette\Caching\Cache,
    Nette\Utils\DateTime,
    Nette\Caching\IStorage;

/**
 * Description of AutoSynchro
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class CacheToken {
    
    /** @var Cache */
    private $cache;
    
    /** @var string */
    private $name;
    
    public function __construct(IStorage $storage, $name) {
        $this->cache = new Cache($storage, $name);     
		$this->name = $name;
    }
    
	/*
	* When $isDebug is TRUE, on every request we generate new timestamp token
	*/
    public function getTimeStamp($isDebug = FALSE) {
        
       $timestamp = $this->cache->load($this->name);
        if (is_null($timestamp) || $isDebug) {
            $datetime = new DateTime;
            $timestamp = $this->cache->save($this->name, $datetime->getTimestamp());
        }    
       
        return $timestamp;
    }
    
}
