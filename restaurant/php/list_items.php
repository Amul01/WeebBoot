<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8" />

    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />



    <title>Library Management</title>



    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <meta name="viewport" content="width=device-width" />





    <!-- Bootstrap core CSS     -->

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />



    <!-- Animation library for notifications   -->

    <link href="../assets/css/animate.min.css" rel="stylesheet" />



    <!--  Light Bootstrap Table core CSS    -->

    <link href="../assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet" />





    <!--  CSS for Demo Purpose, don't include it in your project     -->

    <link href="../assets/css/demo.css" rel="stylesheet" />

    <script src="https://www.gstatic.com/firebasejs/5.5.3/firebase-app.js"></script>

    <script src="https://www.gstatic.com/firebasejs/5.5.3/firebase-database.js"></script>

    <script src="https://www.gstatic.com/firebasejs/5.5.3/firebase-functions.js"></script>





    <!--     Fonts and icons     -->

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>

        .form-group.required .control-label:after {
            content: "*";
            color: red;
        }



        img {
            height: 50px;
        }
    </style>

</head>

<body>

    <div class="wrapper">



        <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-5.jpg">

            <div class="sidebar-wrapper">

                <div class="logo">

                    <a href="#" class="simple-text">

                        Food Delivery

                    </a>

                </div>



                <ul class="nav">

                    <li>
                        <a href="dashboard.html">
                            <i class="pe-7s-graph"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li >
                        <a href="../add_items.html">
                            <i class="pe-7s-news-paper"></i>
                            <p>Add New Items</p>
                        </a>
                    </li>

                    <li class="active">
                        <a href="list_items.php">
                            <i class="pe-7s-notebook"></i>
                            <p>List Items </p>
                        </a>
                    </li>
                    <li>
                        <a href="../order_list.html">
                            <i class="pe-7s-notebook"></i>
                            <p>Order List </p>
                        </a>
                    </li>

                   

                    

                </ul>

            </div>

        </div>



        <div class="main-panel">

            <nav class="navbar navbar-default navbar-fixed">

                <div class="container-fluid">

                    <div class="navbar-header">

                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">

                            <span class="sr-only">Toggle navigation</span>

                            <span class="icon-bar"></span>

                            <span class="icon-bar"></span>

                            <span class="icon-bar"></span>

                        </button>

                        <a class="navbar-brand" href="#">Available Items</a>

                    </div>

                    <div class="collapse navbar-collapse">

                        <ul class="nav navbar-nav navbar-left">

                            <li>

                                <a>

                                    <p class="hidden-lg hidden-md">Search</p>

                                    <input style="width:250px;" type="text" class="form-control issue-Food-search" id="Food-issue-search" placeholder="Search">

                                </a>

                            </li>

                        </ul>

                    </div>

                </div>

            </nav>



            <div class="content">

                <div class="container-fluid">

                    <div class="card">
						
                        <table class="table table-hover table-striped " id="table-int">
                            <thead>
                                <tr>
                                    <td>Image</td>
                                    <td>Food Id</td>
                                    <td>Food Name</td>
                                    <td>Category</td>
                                    <td>Description</td>
                                    <td>Price</td>
                                    <td>Update/Delete</td>
                                </tr>
                            </thead>
                            <tbody id="int-tbody">
                                <?php
                                    require 'connection.php';
                                    $stmt = "select * from food";
		                            $result = mysqli_query($conn, $stmt);
		                            while($row = mysqli_fetch_row($result)){
                                    $rid=$row[0];
                                    $fid=$row[1];
                                    $name=$row[2];
                                    $ingredients=$row[3];
                                    $category=$row[4];
                                    $cost=$row[5];
                                    $url=$row[6];
									
                                    echo '
                                    <tr>
                                        <td><img src="../assets/img'.$url.'"/></td>
                                        <td>'.$fid.'</td>
                                        <td>'.$name.'</td>
                                        <td>'.$category.'</td>
                                        <td>'.$ingredients.'</td>
                                        <td>'.$cost.'</td>
                                        <td><input type="button" value="Update" onclick=update1('.$fid.') /><input type="button" value="Delete" onclick=delete1('.$fid.') /></td>
                                    </tr>';
									}
                                ?>
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>

        </div>



    </div>


</body>
<script>
	function update1(fid)
	{
	
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("get", "update.php/?fid="+fid, true);
        xmlhttp.send();
	}
	function delete1(fid)
	{
	
		var xmlhttp = new XMLHttpRequest();
		
        xmlhttp.open("Get", "delete.php/?fid="+fid, true);
        xmlhttp.send();
	}
</script>
<script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>

<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

<script src="../assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<script src="../assets/js/demo.js"></script>

</html>

