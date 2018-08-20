<?php
namespace App\Lib;

use App\Place;
use App\Reservation;
use App\Bookingfact;
use App\Space;
use DateTime;
use DatePeriod;
use DateInterval;
use function GuzzleHttp\Psr7\mimetype_from_extension;
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











    public static function GetArrayOfWorkingDates($startDay, $endDay){
        $startDay = new DateTime($startDay);
        $endDay = new DateTime($endDay);
        $endDay = $endDay->modify('+1 day');
        $period = new DatePeriod($startDay, new DateInterval('P1D'), $endDay);
        $result = array();
        foreach (iterator_to_array($period) as $item){
            $result[$item->format('Y-m-d')] = array();
        }
        return $result;
    }


    public static function getCompletelyReservedDaysBySpace($space_id){
        $allReserve = Reservation::all()->where('status_id',1)->where('space_id',$space_id);
        $lastReserveDate = $allReserve->max('date_to');
        $dateNow = date('Y-m-d');
        $reservations = Reservation::where('status_id','1')->where('space_id',$space_id)->whereBetween('date_to', [$dateNow, $lastReserveDate])->get()->all();

        $workingDays = self::GetArrayOfWorkingDates($dateNow,$lastReserveDate);
        $compleatReservedDetes = array();
        foreach ($workingDays as $key => $item){
            $reserveFoDate  = array();
            foreach ($reservations as $res){
                if (($res->date_to >= $key)&&($key >= $res->date_from)){
                    $reserveFoDate[] = $res->id;
                }
            }
            $count = count($reserveFoDate);
            if ($count == Space::find($space_id)->number_of_seats){
                $compleatReservedDetes[] = $key;
            }
        }
        return  $compleatReservedDetes;
    }


    public static function getCompletelyReservedDaysByPlace($place_id){

        $countOfSeatPlaces = Place::find($place_id)->countOfSeatPlaces();

        $allReserve = Place::find(1)->reservations()->where('status_id',1)->get();
        $lastReserveDate = $allReserve->max('date_to');
        $dateNow = date('Y-m-d');
        $reservations =  Place::find(1)->reservations()->where('status_id',1)->whereBetween('date_to', [$dateNow, $lastReserveDate])->get()->all();
        $workingDays = self::GetArrayOfWorkingDates($dateNow,$lastReserveDate);
        $compleatReservedDetes = array();
        foreach ($workingDays as $key => &$item){
            $reserveFoDate  = array();
            foreach ($reservations as $res){
                if (($res->date_to >= $key)&&($key >= $res->date_from)){
                    $reserveFoDate[] = $res->id;
                }
            }
            $item = $reserveFoDate;
            $count = count($reserveFoDate);
            if ($count == $countOfSeatPlaces){
                $compleatReservedDetes[] = $key;
            }
        }

//        $temp = array();
//        $temp['palce_id'] = $place_id;
//        $temp['$countOfSeatPlaces'] = $countOfSeatPlaces;
//        $temp['$lastReserveDate'] = $lastReserveDate;
//        $temp['$dateNow'] = $dateNow;
//        $temp['$allReserve'] = $allReserve;
//        $temp['$reservations'] = $reservations ;
//        $temp['$workingDays'] = $workingDays;
//        $temp['$compleatReservedDetes'] = $compleatReservedDetes;
//
        return $compleatReservedDetes;
    }


    public static function getReservedSeatPlace($space_id, $date){
        $reservations = Reservation::all()->where('space_id',$space_id)->where('status_id',1)
            ->where('date_from','<=',$date)->where('date_to','>=', $date);

        foreach ($reservations as $item ){
            $reserverSeatPlaces[] = $item->seat_number;
        }
        return  $reserverSeatPlaces;
//        $temp = array();
//        $temp['$space_id']= $space_id;
//        $temp['$date'] = $date;
//        $temp['$reservations'] = $reservations;
//        $temp['$reserverSeatPlaces'] = $reserverSeatPlaces;

    }











}


?>