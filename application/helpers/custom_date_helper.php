<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('to_date'))
{
    function to_date($str_date)
    {
        $split  = explode(' ', $str_date);
        if(count($split) > 1):
            $buffer = explode("-",$split[0]);
            if(count($buffer) > 2):
                $buffer = $buffer[2].'-'.$buffer[1].'-'.$buffer[0].' '.$split[1];
            else:
                $buffer = $str_date;
            endif;
        else:
            $buffer = explode("-",$str_date);
            if(count($buffer) > 2):
                $buffer = $buffer[2].'-'.$buffer[1].'-'.$buffer[0];
            else:
                $buffer = $str_date;
            endif;
        endif;
        return $buffer;
    }
}