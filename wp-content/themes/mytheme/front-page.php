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
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="main">
        <div class="container">
            <div class="" style="display: flex">
                <div class="input-group mb-3">
                    <div class="me-5">
                        <label for="">年月</label><br />
                        <select class="form-select mb-3" id="selectYearMonth" aria-label="Default select example">
                        </select>
                    </div>
                    <div class="me-5">
                        <label for="">順位取得時間r</label><br />
                        <input class="form-control" type="text" value="順位取得時間r" disabled>
                    </div>
                    <div>
                        <label for="">順位取得地点</label><br />
                        <input class="form-control" type="text" value="順位取得地点" disabled>
                    </div>
                </div>
            </div>
            <div class="content-calender">
                <div id='calendar' style="width: 100%; display: inline-block;"></div>
            </div>


            <div class="table" style="margin-top: 50px; background:white">
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