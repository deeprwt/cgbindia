<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPR | Eupheus Learning</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style type="text/css">
.row{
    margin: 0 !important;
}
td{
    white-space: normal !important;
}
</style>

<body style="max-width: 2480;min-width: 2480;width: 2480; ">
    <button id="btnbtn">donwload</button>
    <div class="container-fluid text-light p-3" style="background-color: #fd7e14;">
        <h1 class="text-center">STUDENT PERFORMANCE REPORT 2021-22</h1>
    </div>
    <div class="d-flex flex-wrap justify-content-between align-items-end m-2">
        <img src="http://skool.ai/bucket/assets/images/logo/isfo.png" height="50px" alt="ISFO">
        <img src="http://skool.ai/bucket/assets/images/logo/eupheus.jpg" height="50px" alt="Eupheus Learning">
    </div>
    <h2 class="text-center text-primary">Congratulations on your success in ISFO Olympiad Level 2</h2>
    <div class="w-100 row p-2">
        <div class="col-md-7 container mb-3 mt-3" >
            <table class="w-100 table table-bordered table-striped table-hover">
                <tr>
                    <td class="col-4 py-3">Student Name</td>
                    <td class="col-8 py-3">Atul</td>
                </tr>
                <tr>
                    <td class="col-4 py-3">Subject</td>
                    <td class="col-8 py-3">Science</td>
                </tr>
                <tr>
                    <td class="col-4 py-3">Class</td>
                    <td class="col-8 py-3">1</td>
                </tr>
               
                <tr>
                    <td class="col-4 py-3">School Name</td>
                    <td class="col-8 py-3">demo Eupheus</td>
                </tr>
                <tr>
                    <td class="col-4 py-3">Held In</td>
                    <td class="col-8 py-3">jan 2022</td>
                </tr>
            </table>
        </div>
        <div class="col-md-5 container mb-3 mt-3" >
            <table class="w-100 table table-bordered table-striped table-hover">
                <tr>
                    <td class="col-9 py-4" >Maximum Marks</td>
                    <td class="col-3 py-4">50</td>
                </tr>
                <tr>
                    <td class="col-9 py-4">Marks Obtained</td>
                    <td class="col-3 py-4">20</td>
                </tr>
                <tr>
                    <td class="col-9 py-4">Percentage Obtained</td>
                    <td class="col-3 py-4" >40%</td>
                </tr>
             
                <tr>
                    <td class="col-9 py-4">International Rank</td>
                    <td class="col-3 py-4">1998</td>
                </tr>
            </table>
        </div>
    </div>
    <hr>
    <div class="w-100 row p-2">
        <div class="col-lg-8 mb-3 mt-3">
            <div class="container-fluid text-center bg-primary text-light p-1">
                <h4>TOPIC WISE ANALYSIS</h4>
            </div>
            <table class="w-100 table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="col-2 py-3">S.No.</th>
                        <th class="col-2 py-3">Topic</th>
                        <th class="col-2 py-3">Maximum Marks</th>
                        <th class="col-2 py-3">Marks Obtained</th>
                        <th class="col-2 py-3">Percentage</th>
                        <th class="col-2 py-3">Performance Description</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($topicwise as $data) --}}
                        <tr>
                            <td class="col-2 py-3">1</td>
                            <td class="col-2 py-3">Scientific
                                Reasoning</td>
                            <td class="col-2 py-3">20</td>
                            <td class="col-2 py-3">15</td>
                            <td class="col-2 py-3">85%</td>
                            <td class="col-2 py-3">Excellent</td>
                        </tr>
                        <tr>
                            <td class="col-2 py-3">2</td>
                            <td class="col-2 py-3">Everyday
                                Science</td>
                            <td class="col-2 py-3">10</td>
                            <td class="col-2 py-3">5</td>
                            <td class="col-2 py-3">50%</td>
                            <td class="col-2 py-3">Excellent</td>
                        </tr>
                        <tr>
                            <td class="col-2 py-3">3</td>
                            <td class="col-2 py-3">Logical
                                Reasoning</td>
                            <td class="col-2 py-3">20</td>
                            <td class="col-2 py-3">15</td>
                            <td class="col-2 py-3">85%</td>
                            <td class="col-2 py-3">Excellent</td>
                        </tr>
                        <tr>
                            <td class="col-2 py-3">4</td>
                            <td class="col-2 py-3">Brainbox</td>
                            <td class="col-2 py-3">20</td>
                            <td class="col-2 py-3">15</td>
                            <td class="col-2 py-3">85%</td>
                            <td class="col-2 py-3">Excellent</td>
                        </tr>
                    {{-- @endforeach --}}
                </tbody>
            </table>
        </div>
        <div class="col-sm-8 col-md-6 col-lg-4 ml-auto mr-auto mb-3 mt-3" style="height: 300px">
            <div class="container text-center bg-primary text-light p-1">
                <h4>PERFORMANCE CHART</h4>
            </div>
            <canvas id="performance" class="w-100 container border p-2"></canvas>
        </div>
    </div>

    <div class="w-100 row p-2">
        <div class="col-lg-6 mb-3 mt-3">
            <div class="container text-center bg-primary text-light p-1">
                <h4>ACCURACY ANALYSIS</h4>
            </div>
            <canvas id="accuracy" class="w-100 container border p-2"></canvas>
        </div>
        <div class="col-lg-6 mb-3 mt-3">
            <div class="container text-center bg-primary text-light p-1">
                <h4>COMPARATIVE ANALYSIS</h4>
            </div>
            <canvas id="comparative" class="w-100 container border p-2"></canvas>
        </div>
    </div>
    <hr>
    <div class="container-fluid mb-3 mt-3">
        <div class="container-fluid text-center bg-primary text-light p-1">
            <h4>PERFORMANCE DESCRIPTION INDICATORS</h4>
        </div>
        <div class="row p-2 border">
            <div class="col-md-4 text-center">
                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <td class="col-6">Outstanding</td>
                        <td class="col-6">90% - 100%</td>
                    </tr>
                    <tr>
                        <td class="col-6">Excellent</td>
                        <td class="col-6">80% - 89%</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4 text-center">
                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <td class="col-6">Very Good</td>
                        <td class="col-6">70% - 79%</td>
                    </tr>
                    <tr>
                        <td class="col-6">Good</td>
                        <td class="col-6">60% - 69%</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4 text-center">
                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <td class="col-6">Average</td>
                        <td class="col-6">50% - 59%</td>
                    </tr>
                    <tr>
                        <td class="col-6">Scope for Improvement</td>
                        <td class="col-6">Less than 50%</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <footer class="w-100 row justify-content-between bg-dark text-light p-3">
        <div class="col-sm-5">
            <p>193, Ganpati Enclave, Jharsa Road, Gurugram, Haryana - 122001A-12, 2nd Floor, Mohan Cooperative Industrial Estate, Main Mathura Road, New Delhi -110044</p>
        </div>
        <div class="col-sm-5">
            <a href="tel:01161400200" class="text-nowrap text-light m-2"><i class="fa fa-phone"></i>&nbsp;011-61400200</a>
            <a href="mailto:info@isfo.in" class="text-nowrap text-light m-2"><i class="fa fa-envelope"></i>&nbsp;info@isfo.in</a>
            <a href="www.isfo.in" class="text-nowrap text-light m-2"><i class="fa fa-globe"></i>&nbsp;www.isfo.in</a>
        </div>
    </footer>
</body>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">
    var performanceCanvas = document.querySelector('#performance');

    
     var labels = ['Scientific Reasoning', 'Everyday Science', 'Logical Reasoning', 'Brainbox'];
    
  
     var data = [42,10,10,25];

    var performanceData = {
        labels: labels,
        datasets: [
            {
                data: data,
                backgroundColor: [
                    "#FF6384",
                    "#63FF84",
                    "#FD7E14",
                    "#8463FF"
                ]
            }]
    };

    new Chart(performanceCanvas, {
      type: 'pie',
      data: performanceData,
      options: {
        responsive: true,
        maintainAspectRatio: false,
      }
    });

    var accuracyCanvas = document.querySelector('#accuracy');

      data = [34,34,34,34];
    var accuracyData = {
        labels: ['You','Topper','Average'],
        datasets: [
            {
                label: 'Correct',
                data: data[0],
                backgroundColor: '#00D100'
            },
            {
                label: 'Incorrect',
                data: data[1],
                backgroundColor: '#E50000'
            },
            {
                label: 'Unattempted',
                data: data[2],
                backgroundColor: '#8463FF'
            }
        ]
    };

    new Chart(accuracyCanvas, {
      type: 'bar',
      data: accuracyData,
      options: {
        responsive: true,
        scales: {
          x: {
            stacked: true,
          },
          y: {
            stacked: true,
            display: true,
            title: {
              display: true,
              text: 'Percentage(%)'
            }
          }
        }
      }
    });

    var comparativeCanvas = document.querySelector('#comparative');

    // get each topic name from backend


     labels = ['Overall', 'Scientific Reasoning', 'Everyday Science', 'Logical Reasoning', 'Brainbox'];

    // get no. of correct questions for each topic for [you,topper,average] from backend

    let sum = 0;
    let toppersum = 0;
    let avgsum = 0;
   
     data = [[40,21,10,5,5],[40,21,10,5,5],[22,10,6,2,2]];

    var comparativeData = {
      labels: labels,
      datasets: [{
        label: 'You',
        backgroundColor: '#ff6384',
        data: data[0]
      }, {
        label: "Topper",
        backgroundColor: '#8463ff',
        data: data[1]
      }, {
        label: "Average",
        backgroundColor: '#fd7e14',
        data: data[2]
      }]
    };

    new Chart(comparativeCanvas, {
      type: 'bar',
      data: comparativeData,
      options: {
        responsive: true,
        barValueSpacing: 20,
        scales: {
          y: {
            display: true,
            title: {
              display: true,
              text: 'Questions'
            }
          },
          yAxes: [{
            ticks: {
              min: 0,
            }
          }]
        }
      }
    });

</script>
