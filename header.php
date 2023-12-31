<?php

require_once 'inc/db.inc.php';

$sql = "SELECT * FROM EVENT ORDER BY StartDate DESC LIMIT 1;";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<?php
if ($data) {
    $title = $data["Title"];
    $start = $data["StartDate"];
    $end = $data["EndDate"];
    $description = $data["Description"];
    $image = $data["Image"];
    echo '
        <header>
        <div class="eventcontainer">
        <div class="imagecontainer">
        <img src="data:image/jpeg;base64,' . base64_encode($image) . '" alt="event image">
        </div>
        <div class="content">
            <div class="title">
                <h1>' . $title . '</h1>
            </div>
            <div class="title">
                <h1>' . $start . ' to ' . $end . '</h1>
            </div>
            <div class="description">
                <p>' . $description . '</p>
            </div>
        </div>
    </div>';
}
?>

</header>