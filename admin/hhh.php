<!DOCTYPE html>
<html>
<head>
  <title>Chart Example</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    canvas {
      max-width: 600px;
      margin: 0 auto;
    }
  </style>
</head>
<body>
  <canvas id="myChart"></canvas>

  <script>
    // Data for the chart
    const data = {
      labels: ['Data 1', 'Data 2'],
      datasets: [
        {
          label: 'Dataset 1',
          data: [20, 35], // Replace with your data
          backgroundColor: 'rgba(54, 162, 235, 0.5)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        },
        {
          label: 'Dataset 2',
          data: [40, 15], // Replace with your data
          backgroundColor: 'rgba(255, 99, 132, 0.5)',
          borderColor: 'rgba(255, 99, 132, 1)',
          borderWidth: 1
        }
      ]
    };

    // Configuration options
    const options = {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    };

    // Get the canvas element
    const ctx = document.getElementById('myChart').getContext('2d');

    // Create the chart
    const myChart = new Chart(ctx, {
      type: 'bar',
      data: data,
      options: options
    });
  </script>
</body>
</html>
    