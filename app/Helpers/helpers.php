<?php 

function checkMobileModelViewField($value)
{
    return $value != null ? $value : "Empty Field";
}

function checkMobileModelViewClass($value)
{
    return $value == null ? 'text-red text-bold' : '';
}

function modelPrice($values)
{
    if(!$values->isEmpty())
    {
        return 'BDT '. moneyFormat($values->min('price'));
    }else{
        return 'Not Found';
    }
}


function moneyFormat($number){
    $decimal = (string)($number - floor($number));
    $money = floor($number);
    $length = strlen($money);
    $delimiter = '';
    $money = strrev($money);

    for($i=0;$i<$length;$i++){
        if(( $i==3 || ($i>3 && ($i-1)%2==0) )&& $i!=$length){
            $delimiter .=',';
        }
        $delimiter .=$money[$i];
    }

    $result = strrev($delimiter);
    $decimal = preg_replace("/0\./i", ".", $decimal);
    $decimal = substr($decimal, 0, 3);

    if( $decimal != '0'){
        $result = $result.$decimal;
    }

    return $result;
}