@extends('layouts.masterCRUD')
@section('title', 'Aplikasi Laravel')
@section('content')
<div class=”container”><br>
    <h1 align="center">Chart Produk</h1><br>
    <div class="card-body">
        <div id="chartProduk" class="mb-0 mt-0" style="display: block"></div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var labelProduk = {!! json_encode($dataLabel) !!};
    var stockProduk = {!! json_encode($dataStock) !!};

    var options = {
        series: [{
            name: 'Total Produk',
            data: stockProduk
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        legend: {
            show: false
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded',
                distributed: true
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            color: ['transparent']
        },
        xaxis: {
            categories: labelProduk,
        },
        yaxis: {
            title: {
                text: '(pcs)'
            }
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return val + "pcs"
                }
            }
        }
    };
    var chart = new ApexCharts(document.querySelector("#chartProduk"), options);
    chart.render();
</script>

@endsection