<?php

/**
 *classe para gerar express�es SQL 
 * 
*/
abstract class TExpression{
    
    const AND_OPERATOR = 'AND';
    const OR_OPERATOR = 'OR';
    
    abstract function toString();

    
}






