<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('claim_status'))
{
    function claim_status($id = null)
    {
        switch ($id) {
            case '3':
                $status = 'Completed';
                break;
            case '5':
                $status = 'Claimed';
                break;
            case '10':
                $status = 'Canceled';
                break;
            case '30':
                $status = 'Refound';
                break;
            default:
                $status = null;
                break;
        }

        return $status;
    }

}

function driving($id = null) {
    $options = array(
                    "" => "select",
                    1 => "TRANSPORT",
                    20 => "SHOPPING",
                    30 => "DELIVERY",
                    40 => "FOOD",
                    50 => "DRUNKEN DRIVER"
                );
    if( !is_null($id) ){
        $options = $options[$id];
    }
    return $options;
}
