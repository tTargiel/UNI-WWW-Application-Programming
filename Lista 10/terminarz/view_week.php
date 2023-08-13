<?php include "./templates/_top.php"; ?>

<div id="content">
    <div id="tab">
        <h1>Widok Tydzień</h1>

        <form method="post">
            <input type="date" name="time" id="time"><br>
            <input type="submit" value="Pokaż">
        </form>

        <?php
        function add_zero($x)
        {
            if (strlen($x) == 1) return '0' . $x;
            else return $x;
        }

        function week_from_monday($date)
        {
            // Assuming $date is in format DD-MM-YYYY
            $month = $date[3] . $date[4];
            $day = $date[0] . $date[1];
            $year = $date[6] . $date[7] . $date[8] . $date[9];

            // Get the weekday of the given date
            $wkday = date('l', mktime('0', '0', '0', $month, $day, $year)); // Godzina, minuta, sekunda, miesiac, dzien, rok

            switch ($wkday) {
                case 'Monday':
                    $numDaysToMon = 0;
                    break;
                case 'Tuesday':
                    $numDaysToMon = 1;
                    break;
                case 'Wednesday':
                    $numDaysToMon = 2;
                    break;
                case 'Thursday':
                    $numDaysToMon = 3;
                    break;
                case 'Friday':
                    $numDaysToMon = 4;
                    break;
                case 'Saturday':
                    $numDaysToMon = 5;
                    break;
                case 'Sunday':
                    $numDaysToMon = 6;
                    break;
            }

            // Timestamp of the monday for that week
            $monday = mktime('0', '0', '0', $month, $day - $numDaysToMon, $year);

            $seconds_in_a_day = 86400;

            // Get date for 7 days from Monday (inclusive)
            for ($i = 0; $i < 7; $i++) {
                $dates[$i] = date('Y-m-d', $monday + ($seconds_in_a_day * $i));
            }

            return $dates;
        }

        if (isset($_POST['time']) && !empty($_POST['time'])) {
            $x = $_POST['time'];
            $date = new DateTime($x);
            $week = $date->format("W");
            $x = date($x . '.' . $week);
            // echo $x;
        } else {
            $x = date('Y-m-d.W');
        }

        $week = intval($x[11] . $x[12]);
        $year = intval($x[0] . $x[1] . $x[2] . $x[3]);
        $week_start = new DateTime();
        $week_start->setISODate($year, $week);
        $d = $week_start->format('d-m-Y');
        $days = week_from_monday($d);
        $month = $days[0][5] . $days[0][6];

        $days_ = [];
        $months_ = [];
        $years_ = [];

        for ($a = 0; $a < 7; $a++) {
            $d_ = $days[$a][8] . $days[$a][9];
            $m_ = $days[$a][5] . $days[$a][6];
            $y_ = $days[$a][0] . $days[$a][1] . $days[$a][2] . $days[$a][3];
            array_push($days_, $d_);
            array_push($months_, $m_);
            array_push($years_, $y_);
        }

        echo "<h3>" . $year . "-" . $month . ", tydzień " . $week . "</h3>";

        $string = "<table class='my-tbody'><thead class='my-thead'><tr><th style='width: 50px;'>Godzina</th><th>Poniedziałek $days[0]</th><th>Wtorek $days[1]</th><th>Środa $days[2]</th><th>Czwartek $days[3]</th><th>Piątek $days[4]</th><th>Sobota $days[5]</th><th>Niedziela $days[6]</th></tr></thead>";
        $db = new SQLite3('./src/database.db');
        $db->query("create table if not exists event 
                (id integer primary key autoincrement, 
                name char(200), 
                type char(200), 
                day int(2), 
                month int(2), 
                year int(4), 
                hour int(2), 
                minutes int(4), 
                time int(100)
                )");

        for ($i = 0; $i <= 23; $i++) {
            $string = $string . "<tr><td>" . add_zero($i) . ":00</td>";

            for ($j = 1; $j <= 7; $j++) {
                $string = $string . "<td>";
                $temp = $j - 1;
                $sql = "SELECT * FROM event WHERE day = $days_[$temp] AND month = $months_[$temp] AND year = $years_[$temp] AND hour = $i ORDER BY minutes;";
                $result = $db->query($sql);

                while ($r = $result->fetchArray()) {
                    $string = $string . "<p>" . $r['name'] . "</p>";
                }

                $string = $string . "</td>";
            }
            $string = $string . "</tr>";
        }

        $db->close();
        echo $string . "</table>";
        ?>
        </table>
    </div>
</div>

<?php include "./templates/_bottom.php"; ?>