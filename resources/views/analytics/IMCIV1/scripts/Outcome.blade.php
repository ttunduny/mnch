var Outcomedata = google.visualization.arrayToDataTable(jsonData['Outcome']);

       var Outcomeoptions = {
       colors: ['green', 'red','#C6C6C6'],
        width: '100%',
        height: 300,
        legend: { position: 'top', maxLines: 3 },
        bar: { groupWidth: '50%' },
        isStacked: 'percent',
        chartArea:{left:250,top:25,width:'50%',height:'75%'}
      };

      var Outcome = new google.visualization.BarChart(document.getElementById('Outcome'));
      Outcome.draw(Outcomedata, Outcomeoptions);

       function resizeOutcome () {
      
       
           Outcome.draw(Outcomedata, Outcomeoptions);

    }

    if (window.addEventListener) {
        window.addEventListener('resize', resizeOutcome, false);
    }
    else if (window.attachEvent) {
        window.attachEvent('onresize', resizeOutcome);
    }
