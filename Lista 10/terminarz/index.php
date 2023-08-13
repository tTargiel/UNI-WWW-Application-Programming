<?php include "./templates/_top.php"; ?>

<div id="content">
    <div id="tab">
        <h1>Nadchodzące Wydarzenia</h1>

        <table>
            <tr>
                <th>Nazwa Wydarzenia</th>
                <th>Rodzaj Wydarzenia</th>
                <th>Dzień</th>
                <th>Miesiąc</th>
                <th>Rok</th>
                <th>Godzina</th>
                <th>Minuta</th>
                <th>Czas Trwania</th>
                <th>Działania</th>
            </tr>

            <?php
            session_start();

            function add_zero($x)
            {
                if (strlen($x) == 1) return '0' . $x;
                else return $x;
            }

            $sql = "SELECT * FROM event;";
            $date_id = [];
            $date_previous_id = [];
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
            $result = $db->query($sql);
            $time_now = microtime(true);

            while ($r = $result->fetchArray()) {
                $time = strtotime($r['year'] . '-' . $r['month'] . '-' . $r['day'] . ' ' . $r['hour'] . ':' . $r['minutes']);
                
                if ($time > $time_now) {
                    array_push($date_id, $r['id']);
                } else if ($time <= $time_now) {
                    array_push($date_previous_id, $r['id']);
                }
            }

            for ($i = 0; $i < count($date_id); $i++) {
                $sql = "SELECT * FROM event WHERE id='$date_id[$i]'";
                $result = $db->query($sql);

                while ($r = $result->fetchArray()) {
                    $id = $r['id'];
                    $name = add_zero($r['name']);
                    $type = add_zero($r['type']);
                    $time =  add_zero($r['time']);
                    $day = add_zero($r['day']);
                    $month = add_zero($r['month']);
                    $year = add_zero($r['year']);
                    $hour = add_zero($r['hour']);
                    $minutes = add_zero($r['minutes']);
                    
                    echo "<tr><td>$name</td><td>$type</td><td>$day</td><td>$month</td><td>$year</td><td>$hour</td><td>$minutes</td><td>$time</td>";
                    
                    if ($_SESSION['admin']) {
                        echo "<td><a class='button' href='#' onclick='edit($id)';>Edytuj</a>  <a class='button' href='#' onclick='remove($id)'>Usuń</a></td>";
                    } else {
                        echo "<td> </td>";
                    }

                    echo "</tr>";
                }
            }

            echo "</table></br></br><h1>Stare Wydarzenia</h1></br>";
            echo "<table>
            <tr>
                <th>Nazwa Wydarzenia</th>
                <th>Rodzaj Wydarzenia</th>
                <th>Dzień</th>
                <th>Miesiąc</th>
                <th>Rok</th>
                <th>Godzina</th>
                <th>Minuta</th>
                <th>Czas Trwania</th>
                <th>Działania</th>
            </tr>";

            for ($i = 0; $i < count($date_previous_id); $i++) {
                $sql = "SELECT * FROM event WHERE id='$date_previous_id[$i]'";
                $result = $db->query($sql);

                while ($r = $result->fetchArray()) {
                    $id = $r['id'];
                    $name = add_zero($r['name']);
                    $type = add_zero($r['type']);
                    $time =  add_zero($r['time']);
                    $day = add_zero($r['day']);
                    $month = add_zero($r['month']);
                    $year = add_zero($r['year']);
                    $hour = add_zero($r['hour']);
                    $minutes = add_zero($r['minutes']);

                    echo "<tr><td>$name</td><td>$type</td><td>$day</td><td>$month</td><td>$year</td><td>$hour</td><td>$minutes</td><td>$time</td>";
                    
                    if ($_SESSION['admin']) {
                        echo "<td><a class='button' href='#' onclick='edit($id)';>Edytuj</a>  <a class='button' href='#' onclick='remove($id)'>Usuń</a></td>";
                    } else {
                        echo "<td> </td>";
                    }

                    echo "</tr>";
                }
            }

            $db->close();
            ?>
        </table>

        <?php
        if (isset($_SESSION['error'])) echo $_SESSION['error'];
        unset($_SESSION['error']);
        ?>

        <script>
            function edit(id) {
                answer = confirm("Jesteś pewien edycji wydarzenia?")

                if (answer != 0) window.location.replace('event_edit.php?id=' + id);
            }

            function remove(id) {
                answer = confirm("Jesteś pewien usunięcia wydarzenia?")

                if (answer != 0) window.location.replace('./scripts/remove_script.php?id=' + id);
            }
        </script>
    </div>
</div>

<?php
if ($_GET['id'] == 'login')
    include "login.php";
else
if ($_GET['id'] == 'logout')
    $_SESSION['admin'] = false;
else
?>

<?php include "./templates/_bottom.php"; ?>