<?php

/**
 *classe para gerar expressões SQL 
 * 
*/
abstract class TExpression{
    
    const AND_OPERATOR = 'AND';
    const OR_OPERATOR = 'OR';
    
    abstract function toString();

    
}






