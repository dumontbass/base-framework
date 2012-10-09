<?php

/**
 * 
 * 
 * 
 * Mensagens de diálogo 
 * @author base
 *
 */
class Message extends TElement{
	
	
	public function __construct( $name){
        $this->name = $name;
    }
    
    
	public function __toString(){
		return    parent::__toString();
	}
	
}