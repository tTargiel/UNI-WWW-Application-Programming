<?php include "./templates/_top.php"; ?>

<div id="content">
    <div id="tab">
        <h1>Widok Miesiąc</h1>

        <form method="post">
            <input type="date" name="time"></br>
            <input type="submit" value="Pokaż">
        </form>

        <?php
        if (isset($_POST['time']) && !empty($_POST['time'])) {
            $date = DateTime::createFromFormat('Y-m-d', $_POST['time']);
            echo "<h2>" . $date->format('Y-m') . "</h2>";
        } else {
            echo "<h2>" . date('Y-m') . "</h2>";
        }
        ?>

        <table id="view_month">
            <tr>
                <th class="day">Poniedziałek</th>
                <th class="day">Wtorek</th>
                <th class="day">Środa</th>
                <th class="day">Czwartek</th>
                <th class="day">Piątek</th>
                <th class="day">Sobota</th>
                <th class="day">Niedziela</th>
            </tr>

            <?php
            function add_zero($x)
            {
                if (strlen($x) == 1) return '0' . $x;
                else return $x;
            }

            if (isset($_POST['time']) && !empty($_POST['time'])) {
                $time_ = $_POST['time'];
                $date = new DateTime($time_);
                $days = $date->format("t");
                $year = intval($time_[0] . $time_[1] . $time_[2] . $time_[3]);
                $month = intval($time_[5] . $time_[6]);
                $datetime = DateTime::createFromFormat('Y-m-d', date($year . '-' . $month . '-01'));
                $ff = strval($datetime->format('D'));
            } else {
                $time_ = date('Y-m');
                $days = date('t');
                $year = intval($time_[0] . $time_[1] . $time_[2] . $time_[3]);
                $month = intval($time_[5] . $time_[6]);
                $datetime = DateTime::createFromFormat('Y-m-d', date($time_ . '-01'));
                $ff = strval($datetime->format('D'));
            }

            $string = "<tr>";
            $moves = 0;

            if ($ff == 'Tue') {
                $string = $string . "<td> </td>";
                $moves += 1;
            } else if ($ff == 'Wed') {
                $string = $string . "<td> </td><td> </td>";
                $moves += 2;
            } else if ($ff == 'Thu') {
                $string = $string = $string . "<td> </td><td> </td><td> </td>";
                $moves += 3;
            } else if ($ff == 'Fri') {
                $string = $string . "<td> </td><td> </td><td> </td><td> </td>";
                $moves += 4;
            } else if ($ff == 'Sat') {
                $string = $string . "<td> </td><td> </td><td> </td><td> </td><td> </td>";
                $moves += 5;
            } else if ($ff == 'Sun') {
                $string = $string . "<td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>";
                $moves += 6;
            }

            $temp = $moves;
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

            for ($j = 1; $j <= $days; $j++) {
                $moves++;

                if ($moves == 8 || $moves == 15 || $moves == 22) $string = $string . "<tr>";

                $day = add_zero(strval($j));
                $sql = "SELECT * FROM event WHERE day = $j AND month = $month AND year = $year;";
                $result = $db->query($sql);
                $string = $string . "<td>" . $day . "<hr>";

                while ($r = $result->fetchArray()) {
                    $string = $string . "<p>" . add_zero($r['hour']) . ":" . add_zero($r['minutes']) . " " . add_zero($r['name']) . "</p>";
                }

                $string = $string . "</td>";

                if ($moves % 7 == 0 || $moves == $days + $temp) $string = $string . "</tr>";
            }

            $db->close();
            echo $string;
            ?>
        </table>
    </div>
</div>

<?php include "./templates/_bottom.php"; ?>