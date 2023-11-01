<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meo center</title>
    <?php wp_head() ?>

</head>

<body class="antialiased">
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" style="color: orange">Meo center</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" id="ranking_nav" aria-current="page" href="javascript:void(0)">ランキング</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="overview_nav" href="javascript:void(0)">概況</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="main">
        <div class="container">
            <div class="" style="display: flex; margin-top: 30px;">
                <div class="input-group mb-3">
                    <div class="me-5">
                        <label for="">年月</label><br />
                        <select class="form-select mb-3" id="selectYearMonth" aria-label="Default select example">
                        </select>
                    </div>
                    <div class="me-5">
                        <label for="">順位取得時間</label><br />
                        <input class="form-control" type="text" value="順位取得時間r" disabled>
                    </div>
                    <div>
                        <label for="">順位取得地点</label><br />
                        <input class="form-control" type="text" value="順位取得地点" disabled>
                    </div>
                </div>
            </div>
            <div class="content-calender" id="calendar-block">
                <div>
                    <h3>ランキング</h3>
                </div>
                <div id='calendar' style="width: 100%; display: inline-block;"></div>
            </div>
            <div class="content-calender" id="image-list-block">
                <div>
                    <h3>概況</h3>
                </div>
                <div id='image-list' style="width: 100%; display: inline-block;"></div>
            </div>

            <div class="table" id="table-ranking" style="margin-top: 50px; background:white">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Ranking</th>
                            <th scope="col">Keyword</th>
                        </tr>
                    </thead>
                    <tbody id="content-table">
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    </div>
    </div>

</body>

<?php wp_footer() ?>

</html>