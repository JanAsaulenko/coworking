<?php
namespace App\Lib;

use App\Place;
use App\Reservation;
use App\Bookingfact;
use DateTime;
use DatePeriod;
use DateInterval;
use Mockery\CountValidator\Exception;

class Occupancy{


    public static function GetOccupancyAfterReservationBlade($place, $ArrayReservations){
        $errorMsg = Array();
        $resultArray = Array();
        $i = 0;
        //создал
        foreach ($ArrayReservations as $oneReservation){
            $startDay = DateTime::createFromFormat('d.m.Y', $oneReservation['fromdate']);
            $endDay = DateTime::createFromFormat('d.m.Y', $oneReservation['todate']);
            $periodReservation = Occupancy::GetArrayOfDates($startDay, $endDay);
            foreach ($periodReservation as $itemPer){
                $resultArray[$itemPer] = 0;
            }
        }
        //заполнил
        foreach ($ArrayReservations as $oneReservation){
            $startDay = DateTime::createFromFormat('d.m.Y', $oneReservation['fromdate']);
            $endDay = DateTime::createFromFormat('d.m.Y', $oneReservation['todate']);
            $periodReservation = Occupancy::GetArrayOfDates($startDay, $endDay);
            foreach ($periodReservation as $itemPer){
                $resultArray[$itemPer]++;
            }
        }

        //проверяю по 1 дате
        foreach ($ArrayReservations as $oneReservation) {
            $startDay = DateTime::createFromFormat('d.m.Y', $oneReservation['fromdate']);
            $endDay = DateTime::createFromFormat('d.m.Y', $oneReservation['todate']);
            $periodReservation = Occupancy::GetArrayOfDates($startDay, $endDay);
            foreach ($periodReservation as $itemPer) {
                $isValid = Occupancy::GetOccupancy($place, $itemPer, $itemPer, $resultArray[$itemPer]);
                if (!empty($isValid)) {
                    array_push($errorMsg, $isValid[0]);
                }
            }
            if (!empty($errorMsg)){
                return $errorMsg;
            }
        }
        return $errorMsg;
    }

    public static function GetOccupancy($place, $fromdate, $todate, $places){
        $startDayWanted = DateTime::createFromFormat('d.m.Y', $fromdate);
        $endDayWanted = DateTime::createFromFormat('d.m.Y', $todate);
        $periodWanted = Occupancy::GetArrayOfDates($startDayWanted, $endDayWanted);
        // создадим ассоциативный массив, который станет ретурном нашей функции
        // в ключ запишем интересующие нас даты, в значение максимальное количество мест плейса (при совпадении будет отминусововать)
        // таким образом выйдем на доступное колличество мест по датам
        foreach ($periodWanted as $itemPer){
            $resultArray[$itemPer] = Place::all()->where('id', $place)->first()['number_of_seatplace'];
        }

        $myOccupancy = Bookingfact::all()->where('id_place', $place);
        foreach ($myOccupancy as $itemB){
            $myReservation = Reservation::all()->where('bookingfacts_id', $itemB->id);
            foreach ($myReservation as $itemR){
                $startDay = DateTime::createFromFormat('Y-m-d', $itemR->date_from);
                $endDay = DateTime::createFromFormat('Y-m-d', $itemR->date_to);
                $periodReservation = Occupancy::GetArrayOfDates($startDay, $endDay);

                foreach ($periodReservation as $dayOnPeriod){
                    foreach ($periodWanted as $itemPer){
                        if ($dayOnPeriod == $itemPer && $resultArray[$itemPer]>0){
                            $resultArray[$itemPer]--;
                        }
                    }
                }
            }
        }

        $errorMessage = Array();
        foreach ($periodWanted as $itemPer){
            $myDate = DateTime::createFromFormat('d.m.Y', $itemPer);
            if($places > $resultArray[$itemPer]){
                if ($places != 1) {
                    if ($resultArray[$itemPer] == 1) {
                        array_push($errorMessage, 'На ' . $myDate->format("d.m.Y") . ' р. в данному просторі залишилось ' . $resultArray[$itemPer] . ' місце!');
                    } else if ($resultArray[$itemPer] == 2 || $resultArray[$itemPer] == 3) {
                        array_push($errorMessage, 'На ' . $myDate->format("d.m.Y") . ' р. в данному просторі залишилось ' . $resultArray[$itemPer] . ' місця!');
                    } else {
                        array_push($errorMessage, 'На ' . $myDate->format("d.m.Y") . ' р. в данному просторі залишилось ' . $resultArray[$itemPer] . ' місць!');
                    }
                } else {
                    if ($resultArray[$itemPer] == 0) {
                        array_push($errorMessage, 'На ' . $myDate->format("d.m.Y") . ' р. в данному просторі залишилось ' . $resultArray[$itemPer] . ' місць!');
                    }
                }
            }
        }
        return $errorMessage;
    }

    public static function GetArrayOfDates($startDay, $endDay){
        $endDay = $endDay->modify('+1 day');
        $period = new DatePeriod($startDay, new DateInterval('P1D'), $endDay);

        $arrayOfDates = array_map(
            function($item){return $item->format('d.m.Y');},
            iterator_to_array($period)
        );
        return $arrayOfDates;
    }

}

?>