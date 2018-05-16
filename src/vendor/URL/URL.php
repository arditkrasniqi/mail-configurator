<?php
	class URL{
		private $url;
        public function __construct($char = false){
            $this->url = $_SERVER['REQUEST_URI'];
            if($char !== false){
                $this->split($char);
            }
        }
		// spliting the url 
		public function split($c){
			$u = explode(trim($c),$this->url);
			$this->url = array();
			foreach($u as $part){
				if(!empty($part)){
					array_push($this->url,$part);
				}
			}
			return $this->url;
		}
		// getting the parts of array after splitting 
		public function get($index = -1){
			if($index !== -1){
				if(isset($this->url[$index])){
					return $this->url[$index];
				}else{
					return false;
				}
			}else{
				return $this->url;
			}
		}
		public function equals($u){
			if($u === $this->url){
				return true;
			}
			return false;
		}
	}
?>