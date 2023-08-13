<?php include "./templates/_top.php"; ?>

<div id="content">
    <div id="tab">
        <h1>Dodaj Wydarzenie</h1>

        <form action="./scripts/add_script.php" method="post">
            Nazwa: <br>
            <input type="text" name="name" id="name"><br><br>
            Rodzaj: <br>
            <input type="text" name="type" id="type"><br><br>
            Data: <br>
            <input type="datetime-local" name="date" id="date"><br><br>
            Czas (minuty): <br>
            <input type="number" name="time" id="time"><br><br>
            <input type="submit" value="Dodaj">
        </form>
        <br><br>

        <?php
        session_start();

        if (isset($_SESSION['error'])) echo $_SESSION['error'];
        unset($_SESSION['error']);
        ?>
    </div>
</div>

<?php include "./templates/_bottom.php"; ?>