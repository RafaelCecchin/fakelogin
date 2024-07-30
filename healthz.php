<?php

    exec('ps -eo pid,etime,comm | grep apache2', $output);
    
    if (!empty($output)) {
        $firstLine = $output[0];
        preg_match('/\s*\d+\s+([\d-]*[\d:]+)\s+apache2/', $firstLine, $matches);

        if (!empty($matches)) {
            $etime = $matches[1];
            
            $timeParts = array_reverse(explode(':', $etime));
            $seconds = 0;

            if (count($timeParts) > 0) {
                $seconds += (int)$timeParts[0];
            }
            if (count($timeParts) > 1) {
                $seconds += (int)$timeParts[1] * 60;
            }
            if (count($timeParts) > 2) {
                $seconds += (int)$timeParts[2] * 3600;
            }
            if (strpos($etime, '-') !== false) {
                $days = (int)explode('-', $etime)[0];
                $seconds += $days * 86400; // 86400 seconds in a day
            }

            if ($seconds < 20) {
                http_response_code(200);
                echo 'ok';
            } else {
                http_response_code(500);
                echo 'error';
            }
            
            echo "<br/> Tempo de execução do Apache em segundos: " . $seconds;
        } else {
            echo "Formato de tempo não reconhecido.";
        }
    } else {
        echo "Nenhum processo Apache encontrado.";
    }

    // $uptime = shell_exec('uptime -p');
    // $seconds = 0;

    // if (preg_match('/(\d+)\s+days?/', $uptime, $matches)) {
    //     $seconds += (int)$matches[1] * 24 * 60 * 60;
    // }
    // if (preg_match('/(\d+)\s+hours?/', $uptime, $matches)) {
    //     $seconds += (int)$matches[1] * 60 * 60;
    // }
    // if (preg_match('/(\d+)\s+minutes?/', $uptime, $matches)) {
    //     $seconds += (int)$matches[1] * 60;
    // }
    // if (preg_match('/(\d+)\s+seconds?/', $uptime, $matches)) {
    //     $seconds += (int)$matches[1];
    // }

