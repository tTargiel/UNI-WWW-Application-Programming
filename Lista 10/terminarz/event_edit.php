<?php include "./templates/_top.php"; ?>

<div id="content">
    <div id="tab">
        <h1>Edycja Wydarzenia</h1>

        <form action='./scripts/edit_script.php' method='post'>
            <?php
            session_start();

            function add_zero($x)
            {
                if (strlen($x) == 1) return '0' . $x;
                else return $x;
            }

            $id = $_GET['id'];
            $_SESSION['id'] = $id;
            $db = new SQLite3('./src/database.db');
            $sql = "SELECT * FROM event WHERE id='$id'";
            $result = $db->query($sql);
            $r = $result->fetchArray();
            $date = $r['year'] . '-' . add_zero($r['month']) . '-' . add_zero($r['day']) . 'T' . add_zero($r['hour']) . ':' . add_zero($r['minutes']);

            echo "Nazwa: <br>";
            echo "<input name='name' type='text' value='$r[name]'><br><br>";
            echo "Rodzaj: <br>";
            echo "<input name='type' type='text' value='$r[type]'><br><br>";
            echo "Data: <br>";
            echo "<input name='date' type='datetime-local' value='$date'><br><br>";
            echo "Czas: (minuty)<br>";
            echo "<input name='time' type='numer' value='$r[time]'><br><br>";

            $db->close();
            ?>
            <input type="submit" value="Potwierdź">
        </form>

        <?php
        if (isset($_SESSION['error'])) echo $_SESSION['error'];
        unset($_SESSION['error']);
        ?>
    </div>
</div>

<?php include "./templates/_bottom.php"; ?>