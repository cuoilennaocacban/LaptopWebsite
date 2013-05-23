<?php
/*------------------------------------------------------------------------
# mod_sp_tweet - Twitter Module by JoomShaper.com
# ------------------------------------------------------------------------
# author    JoomShaper http://www.joomshaper.com
# Copyright (C) 2010 - 2012 JoomShaper.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.joomshaper.com
-------------------------------------------------------------------------*/

class GetJSON {
	protected $cache;
	protected $cache_time;
	
	public function __construct($cache, $cache_time) {
		$this->cache 		= $cache;
		$this->cache_time 	= $cache_time;
	}
	
	public function receiveJSON($url){
		if ($this->cache) {
			if(!$this->cacheExists()) {
				$this->verifyCacheExistance();
				$this->createCache(file_get_contents($url));
				
				echo file_get_contents($url);
			} else {
				$this->getCacheData();
			}
			
			if ( ( $this->getCacheFile() == time() ) || ( $this->getCacheFile() < time() ) ) {
				$this->clearCache();
			}
		} else {
			echo file_get_contents($url);
		}
	}
	
	protected function getCacheData() {
		if(is_dir('cache')) {
			if($openDir = opendir('cache')) {
				$files = array();
				
				while (($file = readdir($openDir)) !== false) {
					array_push($files, str_replace(array('.', 'json'), '', $file));
				}
				closedir($openDir);

				$cacheFile = 'cache/' . $files[2] . '.json'; // first two values are null
				$return = file_get_contents($cacheFile, true);
				
				echo $return;
			}
		}		
	}
	
	protected function getCacheFile() {
		if(is_dir('cache')) {
			if($openDir = opendir('cache')) {
				$files = array();
				
				while (($file = readdir($openDir)) !== false) {
					array_push($files, str_replace(array('.', 'json'), '', $file));
				}
				closedir($openDir);

				return $files[2]; // first two values are null
			}
		}		
	}
	
	protected function cacheExists() {
		if(is_dir('cache')) {
			if($openDir = opendir('cache')) {
				while (($file = readdir($openDir)) !== false) {
					$cache_name = str_ireplace(array('.', 'json'), '', basename($file));
					if (!empty($cache_name))
						return true;
				}
				closedir($openDir);
			}
		}
		
		return false;
	}
	
	protected function createCache($file_content) {
		$filename = 'cache/' . ( time() + $this->cache_time ) . '.json';
		
		$handler = fopen($filename, 'w'); // open operation
		fwrite($handler, $file_content); // 
		fclose($handler); // close operation
	}
	
	protected function clearCache() {
		if(is_dir('cache')) {
			if($openDir = opendir('cache')) {
				while (($file = readdir($openDir)) !== false) {
					if($file !== '.' && $file !== '..') {
						$path = 'cache/'.$file;
						chmod($path, 0755);
						unlink($path);
					}
				}
				closedir($openDir);
			}
		}
	}
	
	protected function verifyCacheExistance() {
		if(!is_dir('cache'))
			if(mkdir('cache', 0755))
				return false;
		return true;
	}
}

$obj = new GetJSON($_GET['cache'], $_GET['cache_time']);
$obj->receiveJSON("http://twitter.com/statuses/user_timeline/".$_GET['username'].".json?count=".$_GET['tweets']);
?>
