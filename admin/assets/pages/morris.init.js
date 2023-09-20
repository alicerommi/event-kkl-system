!function($) {
    "use strict";
    var MorrisCharts = function() {};
    //creates line chart
    MorrisCharts.prototype.createLineChart = function(element, data, xkey, ykeys, labels, lineColors) {
        Morris.Line({
          element: element,
          data: data,
          xkey: xkey,
          ykeys: ykeys,
          labels: labels,
          gridLineColor: '#eef0f2',
          resize: true, //defaulted to true
          lineColors: lineColors
        });
    },
 
       

    MorrisCharts.prototype.init = function(data) {

   //     create line chart
   // console.log(data);
                             var $data  = data;
        // var $data  = [
        //     { y: '2009',  a: 10 },
        //     { y: '2010',  a: 75 },
        //     { y: '2011', a: 50},
        //     { y: '2012', a: 75},
        //     { y: '2013',  a: 50},
        //     { y: '2014',  a: 75},
        //     { y: '2015', a: 10}
        //   ];
         this.createLineChart('morris-line-example', $data, 'y', ['a'], ['Client Amount'], ['#33b86c']);
    },



    //init
    $.MorrisCharts = new MorrisCharts, $.MorrisCharts.Constructor = MorrisCharts
}(window.jQuery),

//initializing 
function($) {
    "use strict";

     /////////ajax call here 
        $.ajax({
            url:'actions/fetch.php',
            data:{
                chartLineData:1,
            },
            method:'post',
            dataType:'JSON',
            success:function(data){
                //console.log(data);
                //  var $data=data;
                  $.MorrisCharts.init(data);
            }
        })

                      
}(window.jQuery);