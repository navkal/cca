<style>


  .bar-graph
  {
    width: 95%;
    height: 430px;
    margin-left: auto;
    margin-right: auto;
    cursor: pointer;
  }



</style>

    <script type="text/javascript">
        //******* 2012 Average Temperature - BAR CHART
        var data = [[0, 11],[1, 15],[2, 25],[3, 24],[4, 13],[5, 18]];
        var dataset = [{ label: "2012 Average Temperature", data: data, color: "#5482FF" }];
        var ticks = [[0, "London"], [1, "New York"], [2, "New Delhi"], [3, "Taipei"],[4, "Beijing"], [5, "Sydney"]];

        var options = {
            series: {
                bars: {
                    show: true
                }
            },
            bars: {
                align: "center",
                barWidth: 0.5
            },
            xaxis: {
                axisLabel: "World Cities",
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 12,
                axisLabelFontFamily: 'Verdana, Arial',
                axisLabelPadding: 10,
                ticks: ticks
            },
            yaxis: {
                axisLabel: "Average Temperature",
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 12,
                axisLabelFontFamily: 'Verdana, Arial',
                axisLabelPadding: 3,
                tickFormatter: function (v, axis) {
                    return v + "°C";
                }
            },
            legend: {
                noColumns: 0,
                labelBoxBorderColor: "#000000",
                position: "nw"
            },
            grid: {
                hoverable: true,
                borderWidth: 2,
                backgroundColor: { colors: ["#ffffff", "#EDF5FF"] }
            }
        };

        $(document).ready(function () {
          var aBg = $( '.bar-graph' );
          for ( i in aBg )
          {
            var tBg = $( aBg[i] );

            $.plot(tBg, dataset, options);
            tBg.UseTooltip();
          }
        });

        function gd(year, month, day) {
            return new Date(year, month, day).getTime();
        }

        var previousPoint = null, previousLabel = null;

        $.fn.UseTooltip = function () {
            $(this).bind("plothover", function (event, pos, item) {
                if (item) {
                    if ((previousLabel != item.series.label) || (previousPoint != item.dataIndex)) {
                        previousPoint = item.dataIndex;
                        previousLabel = item.series.label;
                        $("#tooltip").remove();

                        var x = item.datapoint[0];
                        var y = item.datapoint[1];

                        var color = item.series.color;

                        //console.log(item.series.xaxis.ticks[x].label);

                        showTooltip(item.pageX,
                        item.pageY,
                        color,
                        "<strong>" + item.series.label + "</strong><br>" + item.series.xaxis.ticks[x].label + " : <strong>" + y + "</strong> °C");
                    }
                } else {
                    $("#tooltip").remove();
                    previousPoint = null;
                }
            });
        };

        function showTooltip(x, y, color, contents) {
            $('<div id="tooltip">' + contents + '</div>').css({
                position: 'absolute',
                display: 'none',
                top: y - 40,
                left: x - 120,
                border: '2px solid ' + color,
                padding: '3px',
                'font-size': '9px',
                'border-radius': '5px',
                'background-color': '#fff',
                'font-family': 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
                opacity: 0.9
            }).appendTo("body").fadeIn(200);
        }
    </script>

    <div class="bar-graph"></div>
