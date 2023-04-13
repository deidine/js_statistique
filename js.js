 
    $("#ref").on("click", function () {
    location.reload();
     });
$(document).on('change', '#cat1', function (e) {
    // location.reload();
    console.log(this.options[e.target.selectedIndex].text);
    document.getElementById("symptom").value = this.options[e.target.selectedIndex].text

    console.log($('#cat1 option').length);
});
let count = 0;
const select = document.getElementById('cat1');
select.addEventListener('click', () => {
    count++;
    //   console.log(`Number of clicks: ${count}`);
});
if (count == 1) { 
    $("#cat1").on("click", function () {
    console.log('count')
    alert('ff')
    $.ajax({
        type: "post",
        dataType: "json",
        url: "select.php", 
        // data:datad , 
        async: false,
        success: function (data) {
            // alert('ss')

            options = '';
            a = '';
console.log(data)
            $.each(data, function (index, item) {
                options += '<option id=option"' + index + '"  value="' + item.symptom + '">' + item.symptom + '</option>';
             });
            $('#cat1').append(options);
        }

    });
    // return nbre_chaise;
});
}
// }

// select_maladie()
    var datajson = [];
    var labeljson = [];
    console.log(datajson)
    $.ajax({
               url: "select.php",
               method: "post",
               dataType: "json",

               success: function (data) {
                // console.log(data)
                   $.each(data, function (index, item) {
                     labeljson.push( item.email);
                    // nbre_chaise = item.nombre_chaise;
                    datajson.push(item.symptom);
                // console.log(item.cnm)

                });
                   

                   var chartdata = {
                       labels: labeljson,
                       datasets: [
                           {
                               label: 'Total Accounts',
                               fill: false,
                              lineTension: 0,
                              backgroundColor: "rgba(0,0,255,1.0)",
                              borderColor: "rgba(0,0,255,0.1)",
                               data: datajson
                           }

                       ]
                   };

                   var ctx = $("#mycanvas");
                   var barGraph = new Chart(ctx, {
                    
                       type: 'line',fill:false,
                       data: chartdata
                   });

                   function barGraph() {
                       subholding.push("" + data[i].subholding);
                       TotalAccounts.push(data[i].TotalAccounts);
                       
                       data.update();
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        // });
