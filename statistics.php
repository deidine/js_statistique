<html>
    <head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="res/css/bootstrap.min.css" rel="stylesheet">
<link href="res/css/bootstrap-grid.min.css" rel="stylesheet">
<link href="res/css/bootstrap-reboot.min.css" rel="stylesheet">
<link href="res/css/mdb.min.css" rel="stylesheet">
<link href="res/css/style.min.css" rel="stylesheet">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
            .content-header-title{
                text-transform: uppercase;
                font-weight: 500;
                margin-top: 100px;
                margin-bottom: 20px;
                letter-spacing: 1px;
                color: #1B2942;
            }
            .icon-large{
                font-size: 3em;
            }
            .text-stat{
                font-family: Roboto, sans-serif;
            }
        </style>
    </head>
    <body>  
       <?php  
         $conx = mysqli_connect("localhost","root","","hospital");
 
         $res  = mysqli_query($conx, "Select  count(*) as total from users  ");
         $res2  = mysqli_query($conx, "Select  count(*) as total from 	appointments  ");
         $res3  = mysqli_query($conx, "Select  count(*) as total from 	doctors  ");
          $row = mysqli_fetch_assoc($res);
         $row2 = mysqli_fetch_assoc($res2);
         $row3 = mysqli_fetch_assoc($res3);
        
         ?>
        <!--- Contenue -->
        <a class="btn btn-primary"><i id="ref" class="fas fa-history" >reload</i></a>
   <a class="btn btn-primary" href="http://127.0.0.1:8000/main"> <i  class="fa fa-arrow-left " >retour</i></a>
    
        <main>
            <div class="container">
                <h3 class="content-header-title">Current statistics</h3>
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="fa fa-bullhorn icon-large float-left" style="color: #006db6;">
                                        </i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3 class="text-stat">54</h3>
                                        <span class="text-stat">Visits</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="fa fa-wheelchair icon-large float-left" style="color: #006db6;">
                                        </i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3 class="text-stat"><?php  echo $row2['total'];?></h3>
                                        <span class="text-stat">patient</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="fa fa-users icon-large float-left" style="color: #006db6;">
                                        </i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3 class="text-stat"><?php echo $row['total'];?></h3>
                                        <span class="text-stat">Members</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="fa fa-user-md icon-large float-left" style="color: #006db6;">
                                        </i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3 class="text-stat"><?php  echo $row3['total'];?></h3>
                                        <span class="text-stat">doctors</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="card">
                    <div class="card-header text-center" style="font-size: 24px">Current State</div>
                    <div class="card-body">
                        <div id="container1" style="margin: 0 auto"></div>
                    </div>
                </div>

            </div>
        </main>

        <!--- FOOTER -->
        <script src="res/js/highcharts.js"></script>
        <script src="res/js/exporting.js"></script>
        <script src="res/js/export-data.js"></script>
        <script src="res/js/series-label.js"></script>
        <script src="res/js/data.js"></script>
        <script src="res/js/drilldown.js"></script> 
        <?php  $res21  = mysqli_query($conx, "Select  count(symptom) as totlmald from 	appointments where symptom='essoufflement' ");
         $row21 = mysqli_fetch_assoc($res21);
         $res22  = mysqli_query($conx, "Select  count(symptom) as totlmald from 	appointments where symptom='toux-seche' ");
         $row22 = mysqli_fetch_assoc($res22);
         $res23  = mysqli_query($conx, "Select  count(symptom) as totlmald from 	appointments where symptom='troubles cardiaques' ");
         $row23 = mysqli_fetch_assoc($res23);

         $res24  = mysqli_query($conx, "Select  count(symptom) as totlmald from 	appointments where symptom='maladies du cœur' ");
         $row24 = mysqli_fetch_assoc($res24);
         $res25  = mysqli_query($conx, "Select  count(symptom) as totlmald from 	appointments where symptom='maladie héréditaire' ");
         $row25 = mysqli_fetch_assoc($res25);
         ?>

        <script>


            // Create the chart
            Highcharts.chart('container1', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Requests per Cell'
                },
                subtitle: {
                    text: 'Statistics'
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'number of requests'
                    }

                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> L<br/>'
                },

                "series": [
                    {
                        "name": "Browsers",
                        "colorByPoint": true,
                        "data": [
                            {
                                "name": "essoufflement",
                                "y": <?php echo$row21['totlmald'];?>,
                            },
                            {
                                "name": "toux-seche",
                                "y":<?php echo $row22['totlmald']?>,
                            },
                            {
                                "name": "troubles cardiaques",
                                "y": <?php echo $row23['totlmald']?>,
                            }   ,
                            {
                                "name": "maladie héréditaire",
                                "y": <?php echo $row25['totlmald']?>,
                            }   ,
                            {
                                "name": "maladies du cœur",
                                "y": <?php echo $row24['totlmald']?>,
                            }       ]
                    }
                ],
                "drilldown": {
                    "series": [
                        {
                            "name": "Chrome",
                            "id": "Chrome",
                            "data": [
                                [
                                    "v65.0",
                                    0.1
                                ],
                                [
                                    "v64.0",
                                    1.3
                                ],
                                [
                                    "v63.0",
                                    53.02
                                ],
                                [
                                    "v62.0",
                                    1.4
                                ],
                                [
                                    "v61.0",
                                    0.88
                                ],
                                [
                                    "v60.0",
                                    0.56
                                ],
                                [
                                    "v59.0",
                                    0.45
                                ],
                                [
                                    "v58.0",
                                    0.49
                                ],
                                [
                                    "v57.0",
                                    0.32
                                ],
                                [
                                    "v56.0",
                                    0.29
                                ],
                                [
                                    "v55.0",
                                    0.79
                                ],
                                [
                                    "v54.0",
                                    0.18
                                ],
                                [
                                    "v51.0",
                                    0.13
                                ],
                                [
                                    "v49.0",
                                    2.16
                                ],
                                [
                                    "v48.0",
                                    0.13
                                ],
                                [
                                    "v47.0",
                                    0.11
                                ],
                                [
                                    "v43.0",
                                    0.17
                                ],
                                [
                                    "v29.0",
                                    0.26
                                ]
                            ]
                        },
                        {
                            "name": "Firefox",
                            "id": "Firefox",
                            "data": [
                                [
                                    "v58.0",
                                    1.02
                                ],
                                [
                                    "v57.0",
                                    7.36
                                ],
                                [
                                    "v56.0",
                                    0.35
                                ],
                                [
                                    "v55.0",
                                    0.11
                                ],
                                [
                                    "v54.0",
                                    0.1
                                ],
                                [
                                    "v52.0",
                                    0.95
                                ],
                                [
                                    "v51.0",
                                    0.15
                                ],
                                [
                                    "v50.0",
                                    0.1
                                ],
                                [
                                    "v48.0",
                                    0.31
                                ],
                                [
                                    "v47.0",
                                    0.12
                                ]
                            ]
                        },
                        {
                            "name": "Internet Explorer",
                            "id": "Internet Explorer",
                            "data": [
                                [
                                    "v11.0",
                                    6.2
                                ],
                                [
                                    "v10.0",
                                    0.29
                                ],
                                [
                                    "v9.0",
                                    0.27
                                ],
                                [
                                    "v8.0",
                                    0.47
                                ]
                            ]
                        },
                        {
                            "name": "Safari",
                            "id": "Safari",
                            "data": [
                                [
                                    "v11.0",
                                    3.39
                                ],
                                [
                                    "v10.1",
                                    0.96
                                ],
                                [
                                    "v10.0",
                                    0.36
                                ],
                                [
                                    "v9.1",
                                    0.54
                                ],
                                [
                                    "v9.0",
                                    0.13
                                ],
                                [
                                    "v5.1",
                                    0.2
                                ]
                            ]
                        },
                        {
                            "name": "Edge",
                            "id": "Edge",
                            "data": [
                                [
                                    "v16",
                                    2.6
                                ],
                                [
                                    "v15",
                                    0.92
                                ],
                                [
                                    "v14",
                                    0.4
                                ],
                                [
                                    "v13",
                                    0.1
                                ]
                            ]
                        },
                        {
                            "name": "Opera",
                            "id": "Opera",
                            "data": [
                                [
                                    "v50.0",
                                    0.96
                                ],
                                [
                                    "v49.0",
                                    0.82
                                ],
                                [
                                    "v12.1",
                                    0.14
                                ]
                            ]
                        }
                    ]
                }
            });

        </script>
        <?php include "chart.html";?>
    </body>
</html>