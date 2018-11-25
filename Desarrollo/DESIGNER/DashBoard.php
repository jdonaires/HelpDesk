<html>
   
    <head>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/Chart.min.js"></script>
    </head>
    <body>
        <div><canvas  id="Grafico"  class="chart" width="1000px" height="200"></canvas></div>
        <div><canvas  id="Grafico2"  class="chart" width="1000px" height="200"></canvas></div>
    </body>
</html>
<script>
    $(document).ready(function(){
        var contexto = $("#Grafico").get(0).getContext("2d"); 
        new Chart(contexto, {
        type: 'line',
        fillOpacity : 100,  
        data: {
                labels : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                datasets : [{
                                label: "demo",
                                fill: true,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                ], //COLOR DE LAS BARRAS
                                borderColor: 'rgba(255, 99, 132, 0.2)', //COLOR DEL BORDE DE LAS BARRAS
                                data : [3,4,5,6,7,7,7,8,7,8,7,7],
                                borderWidth: 1,
                                opacity:0,
                        },
                            {
                                    label: "demo1",
                                    backgroundColor: [
                                        'rgba(0, 99, 145, 0.2)',
                                    ], //COLOR DE LAS BARRAS
                                    borderColor: 'rgba(0, 99, 145, 0.2)', //COLOR DEL BORDE DE LAS BARRAS
                                    data : [3,2,4,5,71,8,9,0,2,3,4],
                                    borderWidth: 1,
                                    opacity:0,
                            }]
        },
        options: {
            display :false,
                reponsive:true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: false,
                    text: 'Demo Help Desk'
                },
                scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
                }
        }
});
    });


$(document).ready(function(){
        var contexto = $("#Grafico").get(0).getContext("2d"); 
        new Chart(contexto, {
        type: 'bar',
        fillOpacity : 100,  
        data: {
                labels : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                datasets : [{
                                label: "demo1",
                                fill: true,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                ], //COLOR DE LAS BARRAS
                                borderColor: 'rgba(255, 99, 132, 0.2)', //COLOR DEL BORDE DE LAS BARRAS
                                data : [3,4,5,6,7,7,7,8,7,8,7,7],
                                borderWidth: 1,
                                opacity:0,
                        },
                            {
                                    label: "demo16778",
                                    backgroundColor: [
                                        'rgba(0, 99, 145, 0.2)',
                                    ], //COLOR DE LAS BARRAS
                                    borderColor: 'rgba(0, 99, 145, 0.2)', //COLOR DEL BORDE DE LAS BARRAS
                                    data : [3,2,4,5,71,8,9,0,2,3,4],
                                    borderWidth: 1,
                                    opacity:0,
                            }]
        },
        options: {
            display :false,
                reponsive:true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: false,
                    text: 'Demo Help Desk'
                },
                scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
                }
        }
	});
    });

</script>