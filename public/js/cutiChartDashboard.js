document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById("pieChartCuti").getContext("2d");

    const pieChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: cutiLabels,
            datasets: [
                {
                    label: "Jenis Cuti",
                    data: cutiData,
                    backgroundColor: [
                        "#FF6384",
                        "#36A2EB",
                        "#FFCE56",
                        "#8AFFC1",
                        "#A28CFF",
                    ],
                    borderWidth: 1,
                },
            ],
        },
    });
});
