<style>
    #myChart {
        margin: auto;
    }
</style>
<div class="header">Overview</div>
<div class="overview">
    <div class="expected" id="alert-total"></div>
    <div>
        <div class="income" id="alert-income"></div>
        <div class="outcome" id="alert-outcome"></div>
    </div>
    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
    var hostName = window.location;
    var data_res;
    hostName = hostName.protocol + "//" + hostName.host + "/quanly/jsonPosessing/export_all_data";
    $(document).ready(function() {
        $.ajax({
            url: hostName,
            dataType: "json",
            success: function(response) {
                data_res = response;
                draw(data_res);
            }
        });
    });

    function draw(data_res) {
        var xValues = ["Thu", "Chi"];
        var yValues = [data_res["revenue"], data_res["expense"]];
        var expectedIncome = parseInt(data_res["revenue"]) - parseInt(data_res["expense"]);
        document.getElementById("alert-total").innerHTML = `
        <div>
            Expected Income
        </div>
        <div>
            `+expectedIncome.toLocaleString('vi', {style : 'currency', currency : 'VND'})+`
        </div>
        `;
        document.getElementById("alert-income").innerHTML = `
        <div>
            Income
        </div>
        <div>
            +`+parseInt(data_res["revenue"]).toLocaleString('vi', {style : 'currency', currency : 'VND'})+`
        </div>
        `;
        document.getElementById("alert-outcome").innerHTML = `
        <div>
            Outcome
        </div>
        <div>
            -`+parseInt(data_res["expense"]).toLocaleString('vi', {style : 'currency', currency : 'VND'})+`
        </div>
        `;
        
        
        var barColors = [
            "#00aba9",
            "#b91d47",
        ];

        new Chart("myChart", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: ""
                }
            }
        });
    }
</script>