
function loadChart1(data) {
    var p1 = document.getElementById("p1");
    var myChart1 = new Chart(p1, {
        type: 'horizontalBar',
        data: {
            labels: data.produtos,
            datasets: [{
                    label: 'qtd Vendida',
                    data: data.quantidades,
                    backgroundColor: 'rgba(51,122,183, 0.5)',
                    borderWidth: 1
                }]
        },
        options: {
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
            },
            title: {
                display: true,
                text: 'Produtos Mais Vendidos (top 8)',
            },
            legend: {
                display: false,
            }
        }
    });
}



function loadChart2(data) {
    var p2 = document.getElementById("p2");

    var myChart2 = new Chart(p2, {
        type: 'horizontalBar',
        data: {
            labels: data.produtos,
            datasets: [{
                    label: 'Lucro Total Obtido',
                    data: data.lucros,
                    backgroundColor: 'rgba(51,122,183, 0.5)',
                    borderWidth: 1
                }]
        },
        options: {
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
            },
            title: {
                display: true,
                text: 'Produtos que Renderam Mais Lucro(top 8)',
            },
            legend: {
                display: false,
            }
        }
    });
}





$.ajax({
    method: "GET",
    url: base_url + "produtosMaisVendidos",
    dataType: "Json",
    success: function (data) {
        console.log(data.quantidades);
        loadChart1(data);
    }
});

$.ajax({
    method: "GET",
    url: base_url + "produtosMaiorLucro",
    dataType: "Json",
    success: function (data) {
        console.log(data.quantidades);
        loadChart2(data);
    }
});






