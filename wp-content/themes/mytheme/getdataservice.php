<?php
include("database.php");

if (isset($_POST["get_all"])) {
   
}

function getAllData() {
    include("database.php");
    $list = [];
    $query = "SELECT T01_Ranking.KeywordNo, T01_Ranking.Ranking, M02_Keyword.Keyword, DATE(T01_Ranking.UpdateTime) AS UpdateTime, DATE(T01_Ranking.AddTime) AS AddTime
            FROM T01_Ranking 
            JOIN M02_Keyword 
            ON T01_Ranking.KeywordNo = M02_Keyword.KeywordNo
            ORDER BY T01_Ranking.Ranking ASC";

    $sth = $pdo->query($query);

    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        $list[] = $row;
    }

    // var_dump($list);
// exit;

    echo json_encode(
        array(
            "result" => $list
        )
    );
}


// Disconnect db
$pdo = null;

?>