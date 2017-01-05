<?php

/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 04/01/2017
 * Time: 14:46
 */
class Log
{

    public static function writeCSV($e)
    {
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone('Europe/Paris'));
        $log = array(
            "date" => $date->format("y:m:d - h:i:s : "),
            "Message" => $e
        );

        $log_file = fopen("./log/logs_" . $date->format('d-m-y') . ".csv", "a+");
        fputcsv($log_file, $log, ",");
        fclose($log_file);
    }
}


