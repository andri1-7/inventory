<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function calculateFares($transport = null, $distance = 0) {
    
    $multiplier = 1500;
    $upfront_distance = 1000;
    $remain_distance_tocharge = $distance - $upfront_distance;
    $upfront_charge = 0;
    $remain_charge = 0;

    if( $transport == "TUKTUK" || $transport == 2 ){
        $upfront_charge = 3000;
    }

    if( $transport == "BIKE" || $transport == 1 ){
        $upfront_charge = 2000;
    }

    if( $transport == "TAXI" || $transport == "CAR" || $transport == 3 || $transport == 4 ){
        $upfront_charge = 4000;
    }

    if( $remain_distance_tocharge > 0 ){
        $remain_charge = calculateRemainCharge($transport, $remain_distance_tocharge);
    }

    if( $upfront_charge == 0 ){
        $upfront_charge = 2000;
    }

    $resultRial = $upfront_charge + $remain_charge;

    return "KHR$ ".$resultRial;
}

function calculateRemainCharge($transport, $remain_distance_tocharge) {
    $resultRial = 0;
    $multiplier = 500;

    if( $transport == "TUKTUK" || $transport == 2){
        $resultRial = number_format( ($remain_distance_tocharge / $multiplier) * 1500, 2);
    }

    if( $transport == "BIKE" || $transport == 1){
        $resultRial = number_format( ($remain_distance_tocharge / $multiplier) * 1000, 2);
    }

    if( $transport == "TAXI" || $transport == "CAR" || $transport == 3 || $transport == 4 ){
        $resultRial = number_format( ($remain_distance_tocharge / $multiplier) * 2000, 2);
    }

    return $resultRial;
}

function transport($id = null) 
{
    $options = array(
                    0 => "select",
                    1 => "MOTOBIKE",
                    2 => "TUK-TUK",
                    3 => "CAR",
                    4 => "M.VAN",
                );
    if( !is_null($id) ){
        $options = $options[$id];
    }
    return $options;
}

function transport2($id = null) 
{
    $options = array(
                    0 => "select",
                    1 => "MOTOBIKE",
                    2 => "TUK-TUK",
                    3 => "TAXI",
                    4 => "CAR",
                );
    if( !is_null($id) ){
        $options = $options[$id];
    }
    return $options;
}

function cert($id = null)
{
    $options = array(
        0  => "select",
        5   => "BIRTH CERT",
        10  => "VEHICLE CERT",
        15  => "DIPLOMA/BACHELOR CERT",
        20  => "MARRIAGE CERT",
    );
    if( !is_null($id) ){
        $options = $options[$id];
    }
    return $options;
}