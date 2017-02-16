<html>
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
		<style>
			.container {
				width: 80%;
				margin: 15px auto;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<h2>Chart.js — Line Chart Demo</h2>
			<div>
				<canvas height="130px" width="800px" id="myChart"></canvas>
			</div>
		</div>

		<script>


			var ctx = document.getElementById('myChart').getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'line',
				options: {
					scales: {
						xAxes: [{
							gridLines: {
								color: "rgba(0, 0, 0, 0)",
							}
						}],
						yAxes: [{
							gridLines: {
								color: "rgba(0, 0, 0, 0)",
							}   
						}]
					},
					responsive: false
				},
				data: {
					labels: ['12:00', '15:00', '18:00', 'T', 'F', 'S', 'S'],
					datasets: [{
						label: 'temperatur',
						data: [-3, -2, -2, 0, 2, 3, 3],
						backgroundColor: "rgba(255, 204, 0, 0.2)",
						borderColor: "rgb(255, 204, 0)",
						hoverBackgroundColor: "rgb(255, 204, 0)"
					}]
				}
			});
		</script>
	</body>
</html>