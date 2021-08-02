var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
type: 'pie',
data: {
    labels: charts.label,
    datasets: [{
        label: '# of Votes',
        data: charts.data,
        backgroundColor: [
            '#29cc97',
            '#0fa0b2',
            '#fec400',
            '#fe5461',
        ],
        borderColor: [
            '#29cc97',
            '#0fa0b2',
            '#fec400',
            '#fe5461',
        ],
        borderWidth: 1
    }]
    },
    options: {
    }
});