<!-- Include amCharts 5 -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<!-- Card Style -->
<div style="
    max-width: 1000px;
    margin: 0 auto;
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    padding: 2rem;
    font-family: 'Inter', sans-serif;
">
    <h4 style="text-align:center; margin-bottom:20px;">Statistik Permohonan Informasi per Tahun dan Status</h4>
    <div id="barChart" style="width: 100%; height: 500px;"></div>
</div>
<br>
<div style="
    max-width: 1000px;
    margin: 0 auto;
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(5, 5, 5, 0.1);
    padding: 2rem;
    font-family: 'Inter', sans-serif;
">
    <h4 style="text-align:center; margin-bottom:20px;">Kategori Bidang Permohonan Informasi</h4>

    <div id="chartdiv" style="width: 100%; height: 500px;"></div>
</div>
</br>
<script>
    // Clustered Column Chart
    am5.ready(function() {
        var root = am5.Root.new("barChart");

        root.setThemes([
            am5themes_Animated.new(root)
        ]);

        var chart = root.container.children.push(am5xy.XYChart.new(root, {
            panX: false,
            panY: false,
            paddingLeft: 0,
            layout: root.verticalLayout
        }));

        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
            categoryField: "year",
            renderer: am5xy.AxisRendererX.new(root, {
                minGridDistance: 30,
                labels: {
                    rotation: 0
                }
            })
        }));

        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            renderer: am5xy.AxisRendererY.new(root, {})
        }));

        var statusList = ["Total", "Diterima", "Disetujui", "Ditolak", "Keberatan"];
        var colors = am5.ColorSet.new(root, {
            step: 2
        });

        var seriesList = {};

        statusList.forEach(function(status, index) {
            var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                name: status,
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: status,
                categoryXField: "year",
                clustered: true,
                fill: colors.getIndex(index),
                stroke: colors.getIndex(index)
            }));

            series.columns.template.setAll({
                tooltipText: "{name}, {categoryX}: {valueY}",
                width: am5.percent(90),
                tooltipY: 0,
                strokeOpacity: 0,
                fill: colors.getIndex(index),
                stroke: colors.getIndex(index)
            });

            // Tambahkan label angka di atas batang
            series.bullets.push(function() {
                return am5.Bullet.new(root, {
                    locationY: 0,
                    sprite: am5.Label.new(root, {
                        text: "{valueY}",
                        fill: root.interfaceColors.get("alternativeText"),
                        centerY: 0,
                        centerX: am5.p50,
                        populateText: true,
                        fontSize: 13
                    })
                });
            });

            seriesList[status] = series;
        });

        // Cursor dan legend
        chart.set("cursor", am5xy.XYCursor.new(root, {
            behavior: "zoomX"
        }));

        // Legend bawah
        var legend = chart.children.push(am5.Legend.new(root, {
            centerX: am5.p50,
            x: am5.p50,
            layout: root.horizontalLayout,
            marginTop: 15
        }));
        legend.data.setAll(chart.series.values);

        // Fetch dari backend
        fetch("<?= site_url('chart/chart_status_year') ?>")
            .then(res => res.json())
            .then(res => {
                let raw = res.data;

                let data = raw.map(item => ({
                    year: item.year,
                    Total: +item.Total,
                    Diterima: +item.Diterima,
                    Disetujui: +item.Disetujui,
                    Ditolak: +item.Ditolak,
                    Keberatan: +item.Keberatan
                }));

                xAxis.data.setAll(data);
                statusList.forEach(status => {
                    seriesList[status].data.setAll(data);
                });
            });
    });


    // Pie Chart ============================================
    am5.ready(function() {
        var root = am5.Root.new("chartdiv");

        root.setThemes([am5themes_Animated.new(root)]);

        var chart = root.container.children.push(
            am5percent.PieChart.new(root, {
                layout: root.verticalLayout
            })
        );

        var series = chart.series.push(
            am5percent.PieSeries.new(root, {
                valueField: "value",
                categoryField: "category",
                legendLabelText: "{category} ({value})",
                legendValueText: ""
            })
        );

        var legend = chart.children.push(
            am5.Legend.new(root, {
                centerX: am5.percent(50),
                x: am5.percent(50),
                marginTop: 15,
                marginBottom: 15
            })
        );

        legend.data.setAll(series.dataItems);

        // Ambil data dari controller
        fetch("<?= site_url('chart/chart_kategori_bidang') ?>")
            .then(res => res.json())
            .then(res => {
                if (res.status) {
                    series.data.setAll(res.data);
                } else {
                    alert('Gagal memuat data grafik');
                }
            });
    });
</script>