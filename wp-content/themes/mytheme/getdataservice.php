<?php
include("database.php");



if (isset($_POST["cmd"]) && $_POST["cmd"] == "get_all") {
    getAllData();
}

if (isset($_POST["cmd"]) && $_POST["cmd"] == "getDataByMonthAndYear") {
    getDataByMonthAndYear();
}

function getAllData()
{
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
    $result = [];
    foreach ($list as $key => $value) {
        $title = $value['Keyword'] . ' ' . $value['Ranking'];
        $result[] = [
            "title" => $title,
            "start" => $value['AddTime'],
            "end" => $value['UpdateTime'],
            "ranking" => $value['Ranking']
        ];
    }

    header('Content-Type: application/json');
    echo json_encode(
        $result
    );
}

function getDataByMonthAndYear()
{
    include('database.php');
    $monthAndYear = $_POST['monthAndYear'];
    $arrayMonthAndYear = explode('-', $monthAndYear);

    $list = [];
    $query = "  SELECT T01_Ranking.KeywordNo, T01_Ranking.Ranking, M02_Keyword.Keyword, DATE(T01_Ranking.UpdateTime) AS UpdateTime, DATE(T01_Ranking.AddTime) AS AddTime
                FROM T01_Ranking 
                JOIN M02_Keyword 
                ON T01_Ranking.KeywordNo = M02_Keyword.KeywordNo
                WHERE MONTH(T01_Ranking.UpdateTime) = " . $arrayMonthAndYear[1] . " AND YEAR(T01_Ranking.UpdateTime) = " . $arrayMonthAndYear[0] . " ORDER BY T01_Ranking.Ranking ASC";

    $sth = $pdo->query($query);
    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        $list[] = $row;
    }

    $result = [];
    foreach ($list as $key => $value) {
        $title = $value['Keyword'] . ' ' . $value['Ranking'];
        $result[] = [
            "title" => $title,
            "start" => $value['AddTime'],
            "end" => $value['UpdateTime'],
            "ranking" => $value['Ranking']
        ];
    }
    // var_dump($monthAndYear);
    // var_dump($list);
    echo json_encode($result);

}


// Disconnect db
$pdo = null;

?>