
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>userchart</title>
</head>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<body>


<div class="w-72 bg-white rounded flex">
    <canvas id="myChart1" width="300" height="400"></canvas>
</div>
<div class="w-72 bg-white rounded ">
    <canvas id="myChart2" width="300" height="400"></canvas>
</div>

</body>

<script>
    //generate labels of every months between startdate and enddate
    function generateLabels(startDate,endDate){
        let start=new Date(startDate);
        let end=new Date(endDate);
        let labels=[];

        while(start<=end){
            labels.push(start.toLocaleString('default', { month: 'long', year: 'numeric' }));
            start.setMonth(start.getMonth() + 1);           
        }
        return labels;
    }

    function prepareChartData(userData, startDate, endDate) {
        let labels = generateLabels(startDate, endDate);
            
        let data = new Array(labels.length).fill(0);//fill in all months with 0 users
        //match every user count with month
        for (let month in userData) {
            let count = userData[month];
            let date = new Date(month + '-01'); 

            let monthLabel = date.toLocaleString('default', { month: 'long', year: 'numeric' });

            let index = labels.indexOf(monthLabel);
            if (index !== -1) {
                data[index] = count;
            }
        }

        return { labels, data };
    }

    //convert all the data from php 
let monthly_data=@json($monthly_data);
let startDate=@json($startDate);
let endDate=@json($endDate);

let {labels,data}=prepareChartData(monthly_data, startDate, endDate);


    // ================bar chart=================
        const ctx = document.getElementById('myChart1')
        const usersPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels:@json($labels_verified_user) , 
                datasets: [{
                    label: 'Users',
                    data: @json($data_verified_user), 
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });

        //=============bar chart end===================

        //=============pie chart=======================
        const ctx2=document.getElementById('myChart2')
        const usersLineChart = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: labels, 
                datasets: [{
                    label: 'Users',
                    data: data, 
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },options:{}    });

</script>
</html>