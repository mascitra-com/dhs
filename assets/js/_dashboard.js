var data = {
    labels: datajson1.nama,
    datasets: [
        {
            label: "Jumlah barang",
            borderWidth: 1,
            data: datajson1.jumlah,
        }
    ]
};

var data2 = {
    labels: ["kat1","kat2","kat3","kat4","kat5","kat6"],
    datasets: [
        {
            data: [300, 50, 100, 75, 60, 12],
            backgroundColor: [
                "#FF6384",
                "#36A2EB",
                "#FFCE56",
                "#34495e",
                "#f1c40f",
                "#e74c3c"
            ],
            hoverBackgroundColor: [
                "#FF6384",
	            "#36A2EB",
	            "#FFCE56",
	            "#34495e",
	            "#f1c40f",
	            "#e74c3c"
            ]
        }]
};

var myBarChart = new Chart($("#chart1"), {
    type: 'bar',
    data: data,
    options: {}
});

var myPieChart = new Chart($("#chart2"),{
    type: 'pie',
    data: data2,
    options: {}
});