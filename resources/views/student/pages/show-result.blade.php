<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Practice Test Result</title>

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

<body>
    <div class="container-fluid text-light p-3" style="background-color: #fd7e14;">
        <h1 class="text-center">STUDENT PERFORMANCE REPORT 2021-22</h1>
    </div>
    <div class="d-flex flex-wrap justify-content-between align-items-end m-2">
        <img src="http://skool.ai/bucket/assets/images/logo/isfo.png" height="50px" alt="ISFO">
        <img src="http://skool.ai/bucket/assets/images/logo/eupheus.jpg" height="50px" alt="Eupheus Learning">
    </div>
    <h2 class="text-center text-primary">Congratulations on your success in ISFO Olympiad Level 2</h2>
    <div class="w-100 row p-2">
        <div class="col-md-7 container mb-3 mt-3">
            <table class="w-100 table table-bordered table-striped table-hover">
                <tr>
                    <td class="col-4">Student Name</td>
                    <td class="col-8">{{$details['name']}}</td>
                </tr>
                <tr>
                    <td class="col-4">Subject</td>
                    <td class="col-8">{{$details['subject']}}</td>
                </tr>
                <tr>
                    <td class="col-4">Class</td>
                    <td class="col-8">{{$details['class']}}</td>
                </tr>
                <tr>
                    <td class="col-4">Roll Number</td>
                    <td class="col-8">{{$details['rollno']}}</td>
                </tr>
                <tr>
                    <td class="col-4">School Name</td>
                    <td class="col-8">{{$details['school']}}</td>
                </tr>
                <tr>
                    <td class="col-4">Held In</td>
                    <td class="col-8">{{$details['held']}}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-5 container mb-3 mt-3">
            <table class="w-100 table table-bordered table-striped table-hover">
                <tr>
                    <td class="col-9">Maximum Marks</td>
                    <td class="col-3">{{$result['total']}}</td>
                </tr>
                <tr>
                    <td class="col-9">Marks Obtained</td>
                    <td class="col-3">{{$result['correct']}}</td>
                </tr>
                <tr>
                    <td class="col-9">Percentage Obtained</td>
                    <td class="col-3">{{$result['percentage']}}%</td>
                </tr>
                <tr>
                    <td class="col-9">State Rank</td>
                    <td class="col-3">{{$result['staterank']}}</td>
                </tr>
                <tr>
                    <td class="col-9">National Rank</td>
                    <td class="col-3">{{$result['nationalrank']}}</td>
                </tr>
                <tr>
                    <td class="col-9">International Rank</td>
                    <td class="col-3">{{$result['internationalrank']}}</td>
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
                        <th class="col-2">S.No.</th>
                        <th class="col-2">Topic</th>
                        <th class="col-2">Maximum Marks</th>
                        <th class="col-2">Marks Obtained</th>
                        <th class="col-2">Percentage</th>
                        <th class="col-2">Performance Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topicwise as $data)
                        <tr>
                            <td class="col-2">{{($loop->index)+1}}</td>
                            <td class="col-2">{{$data['category']}}</td>
                            <td class="col-2">{{$data['total']}}</td>
                            <td class="col-2">{{$data['correct']}}</td>
                            <td class="col-2">{{$data['percentage']}}%</td>
                            <td class="col-2">{{$data['description']}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-sm-8 col-md-6 col-lg-4 ml-auto mr-auto mb-3 mt-3">
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

    // get each topic name from backend
    let temp = @json($performance);

    var labels = [];
    for(i=0;i<temp.length;i++){
        labels.push(temp[i]['category']);
    }
    // var labels = ['Scientific Reasoning', 'Everyday Science', 'Logical Reasoning', 'Brainbox'];
    
    // get marks obtained in each topic (1D Array) from backend

    var data = [];
    for(i=0;i<temp.length;i++){
        data.push(temp[i]['correct']);
    }
    // var data = [42,10,10,25];

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
        responsive: true
      }
    });

    var accuracyCanvas = document.querySelector('#accuracy');

    // get [correct ques %,incorrect ques %,unattempted ques %] for [you,topper,average] (2D Array) from backend
    data = [[@json($accuracy).correct,@json($accuracy).total-4,@json($accuracy).avgcorrect],[@json($accuracy).incorrect,2,@json($accuracy).avgincorrect],[@json($accuracy).unattempted,2,@json($accuracy).avgunattempted]];

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
    temp = @json($comparative);

    labels = ['Overall'];
    for(i=0;i<temp.length;i++){
        labels.push(temp[i]['category']);
    }
    // labels = ['Overall', 'Scientific Reasoning', 'Everyday Science', 'Logical Reasoning', 'Brainbox'];

    // get no. of correct questions for each topic for [you,topper,average] from backend

    let sum = 0;
    let toppersum = 0;
    let avgsum = 0;
    data = [[],[],[]];
    for(i=0;i<temp.length;i++){
        data[0].push(temp[i]['correct']);
        // data[1].push(temp[i]['toppercorrect'][0]['maxcorrect']);
        data[2].push(temp[i]['avgcorrect'][0]['avgcorrect']);
        data[1].push(temp[i]['total']-1);
        sum+=temp[i]['correct'];
        toppersum+=temp[i]['total']-1;
        avgsum+=parseFloat(temp[i]['avgcorrect'][0]['avgcorrect']);
    }
    data[0].unshift(sum);
    data[1].unshift(toppersum);
    data[2].unshift(avgsum);
    // data = [[40,21,10,5,5],[40,21,10,5,5],[22,10,6,2,2]];

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

console.log(@json($performance));
console.log(@json($accuracy));
console.log(@json($comparative));
</script>
