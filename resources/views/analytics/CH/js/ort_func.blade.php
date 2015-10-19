var ort_funcdata = google.visualization.arrayToDataTable(jsonData['CHV2_ortf']);

      var ort_funcoptions = {
        width: '100%',
        height: 300,
        colors: ['green', 'red','#C6C6C6'],
        legend: { position: 'top', maxLines: 3 },
        bar: { groupWidth: 35 },
        isStacked: 'percent'
      };

      var ort_func = new google.visualization.ColumnChart(document.getElementById('ort_func'));
      ort_func.draw(ort_funcdata, ort_funcoptions);

      function resizeort_func () {
      
       
           ort_func.draw(ort_funcdata, ort_funcoptions);

    }

    if (window.addEventListener) {
        window.addEventListener('resize', resizeort_func, false);
    }
    else if (window.attachEvent) {
        window.attachEvent('onresize', resizeort_func);
    }