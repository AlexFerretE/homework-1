<?php
declare(strict_types=1);

$workDays = [];

function genWorkDay (array &$workDays, $year = 2025, $month = 12): void {
    $months = [
        "","Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь",
    ];
    
    $workDays = [$months[$month]]; // Массив с результатом

    $num_days = cal_days_in_month(CAL_GREGORIAN, $month, $year); // Определяем количество дней в месяце
    
    $con = -1;
    
    for ($i=1; $i <= $num_days; $i++) {
        
        $date = sprintf('%04d-%02d-%02d', $year, $month, $i); // Формируем полную дату в виде 'YYYY-MM-DD'
        
        $day_of_week = date('w', strtotime($date)); // Получаем день недели (0 = воскресенье, 1 = понедельник, ..., 6 = суббота)        
        

        if ($day_of_week == 0 || $day_of_week == 6) {
            $workDays[1][] = "\033[32m $i \033[0m";
            $con++;
        } else {
            if ($i==1 || ($i==3 && $con = 2)) {
                $workDays[1][] = "\033[31m $i \033[0m";
                $con = 0;
            }
            elseif ($con > 1) {
                $workDays[1][] = "\033[31m $i \033[0m";
                $con = 0;
            } else {
                $workDays[1][] = "\033[32m $i \033[0m";
                $con++;
            }
            
        }
    }
    
}

genWorkDay($workDays,);


// Результат
echo $workDays[0] . ": " . PHP_EOL;

foreach ($workDays[1] as $day) {
    echo $day . " ";
}

?>