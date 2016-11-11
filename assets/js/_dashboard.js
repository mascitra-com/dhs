var data = {
    labels: ["Peralatan & Mesin", "Gedung & Bangunan", "Jalan, Irigasi & Jaringan", "Asset Tetap & Lainnya"],
    datasets: [
        {
            label: "Jumlah barang",
            backgroundColor: ['rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)'],
            borderColor: ['rgba(255,99,132,1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)'],
            borderWidth: 1,
            data: datajson1,
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