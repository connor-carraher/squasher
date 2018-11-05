<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/home.css">

    <title>Squasher - Home</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-light">
            <div class="navbar-brand black-text">Squasher - My Bugs</div>
            <ul class="nav navbar-nav navbar-right pull-right">
                <li><a class="darker-gray-text" href="../php/login.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
            </ul>
        </nav>
        <div class="header">
            <div class="left">
                <input class="form-control" type="text" placeholder="Filter Issues" aria-label="Search">
            </div>
            <div class="right">
                <a type="button" class="btn btn-primary btn-lg blue" href="../html/new-bug.html">Report New Bug</a>
            </div>
        </div>
        <div class="bug-table rounded light-gray">
				<?php

				$conn=oci_connect( 'psanchez','a47k7S4QOi', '//dbserver.engr.scu.edu/db11g' );
				if(!$conn) {
						print "<br> connection failed:";
						exit;
				}
				$query = oci_parse($conn, "select PRODUCT, TITLE, BUG_ID, STATE, REPORT_DATE from squasher_reports");
				//oci_bind_by_name($query, ':title', $title);
				oci_execute($query);

				while (($row = oci_fetch_array($query, OCI_BOTH)) != false) {
					//echo "<font color='green'> $row[0] </font></br>";
					echo '<div class="bug-report rounded white">
							<div class="report-left">
									<p class="service dark-gray-text">',$row[0],'</p>
									<p class="title">',$row[2],': ',$row[1],'</p>
									<p class="id dark-gray-text">Submitted on ',$row[4],'</p>
							</div>
							<div class="report-right">
									<p class="status dark-gray-text">Current status: ',$row[3],'</p>
							</div>
					</div>';
				}
				OCILogoff($conn);

				?>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>