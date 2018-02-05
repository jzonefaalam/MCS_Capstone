@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
        <br>
        <ol class="breadcrumb">
          <li><a href="/Reports"><i class="fa fa-edit"></i> Reports</a></li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="box box-danger">
          <!-- box header -->
          <div class="box-header with-border">
            <div class="row">
              <div class="col-md-6">
                <h2>Reports List</h2>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <div class="row">

              <div class="col-md-6">
                <hr>
                <h4> Transactions </h4>
                <a class="btn btn-app" style="width: 100px; height: 70px;" onclick="printMonthlyTransactions();">
                  <i class="fa fa-print" ></i>  Monthly 
                </a>
                <a class="btn btn-app" style="width: 100px; height: 70px;" onclick="printYearlyTransactions();">
                      <i class="fa fa-print" ></i> Yearly 
                </a>
                <a class="btn btn-app" style="width: 100px; height: 70px;" onclick="printAllTransactions();">
                      <i class="fa fa-print" ></i>  All 
                </a>
                <hr>
                <h4> Purchase Order Report </h4>
                <a class="btn btn-app" style="width: 100px; height: 70px;" onclick="printMonthlyPO();">
                  <i class="fa fa-print" ></i>  Monthly 
                </a>
                <a class="btn btn-app" style="width: 100px; height: 70px;" onclick="printYearlyPO();">
                      <i class="fa fa-print" ></i> Yearly 
                </a>
                <a class="btn btn-app" style="width: 100px; height: 70px;" onclick="printAllPO();">
                      <i class="fa fa-print" ></i>  All 
                </a>
                <hr>
                <h4> Collection Report </h4>
                <a class="btn btn-app" style="width: 100px; height: 70px;" onclick="printMonthlyCollection();">
                  <i class="fa fa-print" ></i>  Monthly 
                </a>
                <a class="btn btn-app" style="width: 100px; height: 70px;" onclick="printYearlyCollection();">
                      <i class="fa fa-print" ></i> Yearly 
                </a>
                <a class="btn btn-app" style="width: 100px; height: 70px;" onclick="printAllCollection();">
                      <i class="fa fa-print" ></i>  All 
                </a>
              </div>

            </div>

            

          </div>
          <!-- /.box-body -->
        </div>
          <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<!-- TRANSACTION REPORT -->
<script>
  function printMonthlyTransactions(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if (mm == 1){
      currentMonth = "January";
    }
    if (mm == 2){
      currentMonth = "February";
    }
    if (mm == 3){
      currentMonth = "March";
    }
    if (mm == 4){
      currentMonth = "April";
    }
    if (mm == 5){
      currentMonth = "May";
    }
    if (mm == 6){
      currentMonth = "June";
    }
    if (mm == 7){
      currentMonth = "July";
    }
    if (mm == 8){
      currentMonth = "August";
    }
    if (mm == 9){
      currentMonth = "September";
    }
    if (mm == 10){
      currentMonth = "October";
    }
    if (mm == 11){
      currentMonth = "November";
    }
    if (mm == 12  ){
      currentMonth = "December";
    }
    var currentMonth;
    if(dd<10){
        dd='0'+dd;
    } 
    if(mm<10){
        mm='0'+mm;
    }
    
    var today = dd+'/'+mm+'/'+yyyy;
    $.ajax({
      type: "GET",
      url:  "/RetrieveMonthlyTransaction",
      success: function(data){
        var totalAmount = 0;
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        frameDoc.document.write('<html><body> <div >');
        frameDoc.document.write('<image src = "logo.png" align = "pullcenter" width = "130" height = "100" style ="padding-left:10px"­> ');
        frameDoc.document.write('<p align = "Center">Margareth Catering Services </br>');
        frameDoc.document.write('B4 L5 Ph7 JP Rizal St., New San Mateo Subd., Gitnangbayan I, San Mateo, Rizal </br>');
        frameDoc.document.write('696-4528 | (+63) 928-297-2321 | (+63) 907-208-3331 </br>');
        frameDoc.document.write('margarethcateringservices@gmail.com </p></br></br>');
        frameDoc.document.write('<p align="right" >' +today+ '</p>');
        frameDoc.document.write('<p align= "center" style ="font-weight:bold;font-size:16pt">Sales Report for the Month of ' +currentMonth+ '</p>');
        frameDoc.document.write('<table border="1" style="width:100%;">');
        frameDoc.document.write('<tr>');
        frameDoc.document.write('<th> Event Date</th>') ;
        frameDoc.document.write('<th> Client Info</th>');
        frameDoc.document.write('<th> Service Acquired </th>');
        frameDoc.document.write('<th> Amount </th>');
        frameDoc.document.write('</tr>');
        for (i = 0; i < data['transactionData'].length; i++) { 
          var packagePrice = data['transactionData'][i]['packageCost'] * data['transactionData'][i]['guestCount'];
          packagePrice = packagePrice.toFixed(2);
          frameDoc.document.write('<tr style ="text-align:center">');
          frameDoc.document.write('<td>' +data['transactionData'][i]['eventDate']+ '</td>');
          frameDoc.document.write('<td>' +data['transactionData'][i]['fullName']+ '</td>');
          frameDoc.document.write('<td>' +data['transactionData'][i]['packageName']+ ' for ' +data['transactionData'][i]['guestCount']+ ' People' + '<br>w/Addons</td>');
          frameDoc.document.write('<td>'+data['transactionData'][i]['totalFee']+ '</td>');
          frameDoc.document.write('</tr>');
          var transactionFee = parseFloat(data['transactionData'][i]['totalFee']);
          totalAmount = totalAmount + transactionFee;
        }
        // alert(totalAmount);
        frameDoc.document.write('<tr style ="text-align:center">');
        frameDoc.document.write('<td>  </td>');
        frameDoc.document.write('<td>  </td>');
        frameDoc.document.write('<td>TOTAL</td>');
        frameDoc.document.write('<td>' +totalAmount +'</td>');
        frameDoc.document.write('</tr>');
        frameDoc.document.write('</table></br>')
        frameDoc.document.write('</html>')
        frameDoc.document.close();

        setTimeout(function () {
          window.frames["frame1"].focus();
          window.frames["frame1"].print();
          frame1.remove();
        }, 500);
      }, 
      error: function(xhr)
      {
        alert($.parseJSON(xhr.responseText)['error']['message']);
      }                
    });
  }
</script>

<script>
  function printYearlyTransactions(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if (mm == 1){
      currentMonth = "January";
    }
    if (mm == 2){
      currentMonth = "February";
    }
    if (mm == 3){
      currentMonth = "March";
    }
    if (mm == 4){
      currentMonth = "April";
    }
    if (mm == 5){
      currentMonth = "May";
    }
    if (mm == 6){
      currentMonth = "June";
    }
    if (mm == 7){
      currentMonth = "July";
    }
    if (mm == 8){
      currentMonth = "August";
    }
    if (mm == 9){
      currentMonth = "September";
    }
    if (mm == 10){
      currentMonth = "October";
    }
    if (mm == 11){
      currentMonth = "November";
    }
    if (mm == 12  ){
      currentMonth = "December";
    }
    var currentMonth;
    if(dd<10){
        dd='0'+dd;
    } 
    if(mm<10){
        mm='0'+mm;
    }
    
    var today = dd+'/'+mm+'/'+yyyy;
    $.ajax({
      type: "GET",
      url:  "/RetrieveYearlyTransaction",
      success: function(data){
        var totalAmount = 0;
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        frameDoc.document.write('<html><body> <div >');
        frameDoc.document.write('<image align = "pullcenter" width = "130" height = "100" style ="padding-left:10px"­> ');
        frameDoc.document.write('<p align = "Center">Margareth Catering Services </br>');
        frameDoc.document.write('B4 L5 Ph7 JP Rizal St., New San Mateo Subd., Gitnangbayan I, San Mateo, Rizal </br>');
        frameDoc.document.write('696-4528 | (+63) 928-297-2321 | (+63) 907-208-3331 </br>');
        frameDoc.document.write('margarethcateringservices@gmail.com </p></br></br>');
        frameDoc.document.write('<p align="right" >' +today+ '</p>');
        frameDoc.document.write('<p align= "center" style ="font-weight:bold;font-size:16pt">Sales Report for Year ' +yyyy+ '</p>');
        frameDoc.document.write('<table border="1" style="width:100%;">');
        frameDoc.document.write('<tr>');
        frameDoc.document.write('<th> Event Date</th>') ;
        frameDoc.document.write('<th> Client Info</th>');
        frameDoc.document.write('<th> Service Acquired </th>');
        frameDoc.document.write('<th> Amount </th>');
        frameDoc.document.write('</tr>');
        for (i = 0; i < data['transactionData'].length; i++) { 
          var packagePrice = data['transactionData'][i]['packageCost'] * data['transactionData'][i]['guestCount'];
          packagePrice = packagePrice.toFixed(2);
          frameDoc.document.write('<tr style ="text-align:center">');
          frameDoc.document.write('<td>' +data['transactionData'][i]['eventDate']+ '</td>');
          frameDoc.document.write('<td>' +data['transactionData'][i]['fullName']+ '</td>');
          frameDoc.document.write('<td>' +data['transactionData'][i]['packageName']+ ' for ' +data['transactionData'][i]['guestCount']+ ' People' + '<br>w/Addons</td>');
          frameDoc.document.write('<td>'+data['transactionData'][i]['totalFee']+ '</td>');
          frameDoc.document.write('</tr>');
          var transactionFee = parseFloat(data['transactionData'][i]['totalFee']);
          totalAmount = totalAmount + transactionFee;
        }
        // alert(totalAmount);
        frameDoc.document.write('<tr style ="text-align:center">');
        frameDoc.document.write('<td>  </td>');
        frameDoc.document.write('<td>  </td>');
        frameDoc.document.write('<td>TOTAL</td>');
        frameDoc.document.write('<td>' +totalAmount +'</td>');
        frameDoc.document.write('</tr>');
        frameDoc.document.write('</table></br>')
        frameDoc.document.write('</html>')
        frameDoc.document.close();

        setTimeout(function () {
          window.frames["frame1"].focus();
          window.frames["frame1"].print();
          frame1.remove();
        }, 500);
      }, 
      error: function(xhr)
      {
        alert($.parseJSON(xhr.responseText)['error']['message']);
      }                
    });
  }
</script>

<script>
  function printAllTransactions(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if (mm == 1){
      currentMonth = "January";
    }
    if (mm == 2){
      currentMonth = "February";
    }
    if (mm == 3){
      currentMonth = "March";
    }
    if (mm == 4){
      currentMonth = "April";
    }
    if (mm == 5){
      currentMonth = "May";
    }
    if (mm == 6){
      currentMonth = "June";
    }
    if (mm == 7){
      currentMonth = "July";
    }
    if (mm == 8){
      currentMonth = "August";
    }
    if (mm == 9){
      currentMonth = "September";
    }
    if (mm == 10){
      currentMonth = "October";
    }
    if (mm == 11){
      currentMonth = "November";
    }
    if (mm == 12  ){
      currentMonth = "December";
    }
    var currentMonth;
    if(dd<10){
        dd='0'+dd;
    } 
    if(mm<10){
        mm='0'+mm;
    }
    
    var today = dd+'/'+mm+'/'+yyyy;
    var totalAmount = 0;
    $.ajax({
      type: "GET",
      url:  "/RetrieveAllTransaction",
      success: function(data){
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        frameDoc.document.write('<html><body> <div >');
        frameDoc.document.write('<image src = "logo.png" align = "pullcenter" width = "130" height = "100" style ="padding-left:10px"­> ');
        frameDoc.document.write('<p align = "Center">Margareth Catering Services </br>');
        frameDoc.document.write('B4 L5 Ph7 JP Rizal St., New San Mateo Subd., Gitnangbayan I, San Mateo, Rizal </br>');
        frameDoc.document.write('696-4528 | (+63) 928-297-2321 | (+63) 907-208-3331 </br>');
        frameDoc.document.write('margarethcateringservices@gmail.com </p></br></br>');
        frameDoc.document.write('<p align="right" >' +today+ '</p>');
        frameDoc.document.write('<p align= "center" style ="font-weight:bold;font-size:16pt">Sales Report of Margareth`s Catering Services</p>');
        frameDoc.document.write('<table border="1" style="width:100%;">');
        frameDoc.document.write('<tr>');
        frameDoc.document.write('<th> Event Date</th>') ;
        frameDoc.document.write('<th> Client Info</th>');
        frameDoc.document.write('<th> Service Acquired </th>');
        frameDoc.document.write('<th> Amount </th>');
        frameDoc.document.write('</tr>');
        for (i = 0; i < data['transactionData'].length; i++) { 
          var packagePrice = data['transactionData'][i]['packageCost'] * data['transactionData'][i]['guestCount'];
          packagePrice = packagePrice.toFixed(2);
          frameDoc.document.write('<tr style ="text-align:center">');
          frameDoc.document.write('<td>' +data['transactionData'][i]['eventDate']+ '</td>');
          frameDoc.document.write('<td>' +data['transactionData'][i]['fullName']+ '</td>');
          frameDoc.document.write('<td>' +data['transactionData'][i]['packageName']+ ' for ' +data['transactionData'][i]['guestCount']+ ' People' + '<br>w/Addons</td>');
          frameDoc.document.write('<td>'+data['transactionData'][i]['totalFee']+ '</td>');
          frameDoc.document.write('</tr>');
          var transactionFee = parseFloat(data['transactionData'][i]['totalFee']);
          totalAmount = totalAmount + transactionFee;
        }
        // alert(totalAmount);
        frameDoc.document.write('<tr style ="text-align:center">');
        frameDoc.document.write('<td>  </td>');
        frameDoc.document.write('<td>  </td>');
        frameDoc.document.write('<td>TOTAL</td>');
        frameDoc.document.write('<td>' +totalAmount +'</td>');
        frameDoc.document.write('</tr>');
        frameDoc.document.write('</table></br>')
        frameDoc.document.write('</html>')
        frameDoc.document.close();
        setTimeout(function () {
          window.frames["frame1"].focus();
          window.frames["frame1"].print();
          frame1.remove();
        }, 500);
      }, 
      error: function(xhr)
      {
        alert($.parseJSON(xhr.responseText)['error']['message']);
      }                
    });
  }
</script>
<!-- END OF TRANSACTION REPORT -->

<!-- PO REPORT -->
<script>
  function printMonthlyPO(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if (mm == 1){
      currentMonth = "January";
    }
    if (mm == 2){
      currentMonth = "February";
    }
    if (mm == 3){
      currentMonth = "March";
    }
    if (mm == 4){
      currentMonth = "April";
    }
    if (mm == 5){
      currentMonth = "May";
    }
    if (mm == 6){
      currentMonth = "June";
    }
    if (mm == 7){
      currentMonth = "July";
    }
    if (mm == 8){
      currentMonth = "August";
    }
    if (mm == 9){
      currentMonth = "September";
    }
    if (mm == 10){
      currentMonth = "October";
    }
    if (mm == 11){
      currentMonth = "November";
    }
    if (mm == 12  ){
      currentMonth = "December";
    }
    var currentMonth;
    if(dd<10){
        dd='0'+dd;
    } 
    if(mm<10){
        mm='0'+mm;
    }
    
    var today = dd+'/'+mm+'/'+yyyy;
    $.ajax({
      type: "GET",
      url:  "/RetrieveMonthlyPO",
      success: function(data){
        var totalPrice = 0;
        var totalQty = 0;
        var totalGrossPrice = 0;
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        frameDoc.document.write('<html><body> <div >');
        frameDoc.document.write('<image src = "logo.png" align = "pullcenter" width = "130" height = "100" style ="padding-left:10px"­> ');
        frameDoc.document.write('<p align = "Center">Margareth Catering Services </br>');
        frameDoc.document.write('B4 L5 Ph7 JP Rizal St., New San Mateo Subd., Gitnangbayan I, San Mateo, Rizal </br>');
        frameDoc.document.write('696-4528 | (+63) 928-297-2321 | (+63) 907-208-3331 </br>');
        frameDoc.document.write('margarethcateringservices@gmail.com </p></br></br>');
        frameDoc.document.write('<p align="right" >' +today+ '</p>');
        frameDoc.document.write('<p align= "center" style ="font-weight:bold;font-size:16pt">Purchase Order Report for the Month of ' +currentMonth+ '</p>');
        frameDoc.document.write('<table border="1" style="width:100%;">');
        frameDoc.document.write('<tr>');
        frameDoc.document.write('<th> Purchase Date</th>') ;
        frameDoc.document.write('<th> Item Category</th>');
        frameDoc.document.write('<th> Item Name </th>');
        frameDoc.document.write('<th> Unit of Measurement </th>');
        frameDoc.document.write('<th> Quantity </th>');
        frameDoc.document.write('<th> Price </th>');
        frameDoc.document.write('<th> Gross Price </th>');
        frameDoc.document.write('</tr>');
        for (i = 0; i < data['poData'].length; i++) { 
          frameDoc.document.write('<tr style ="text-align:center">');
          frameDoc.document.write('<td>' +data['poData'][i]['poDate']+ '</td>');
          frameDoc.document.write('<td>' +data['poData'][i]['poTypeName']+ '</td>');
          frameDoc.document.write('<td>' +data['poData'][i]['poItemName']+ '</td>');
          frameDoc.document.write('<td>' +data['poData'][i]['uomName']+ '</td>');
          frameDoc.document.write('<td>' +data['poData'][i]['poQty']+ '</td>');
          frameDoc.document.write('<td>' +data['poData'][i]['poPrice']+ '</td>');
          var grossPrice = parseFloat(data['poData'][i]['poPrice']) * parseFloat(data['poData'][i]['poQty'])
          frameDoc.document.write('<td>' +grossPrice+ '</td>');
          frameDoc.document.write('</tr>');
          totalQty = totalQty + parseFloat(data['poData'][i]['poQty']);
          totalPrice = totalPrice + parseFloat(data['poData'][i]['poPrice']);
          totalGrossPrice = totalGrossPrice + grossPrice;
        }
        frameDoc.document.write('<tr style ="text-align:center">');
        frameDoc.document.write('<th> </th>') ;
        frameDoc.document.write('<th> </th>');
        frameDoc.document.write('<th> </th>');
        frameDoc.document.write('<th> TOTAL </th>');
        frameDoc.document.write('<th> '+totalQty+' </th>');
        frameDoc.document.write('<th> '+totalPrice+' </th>');
        frameDoc.document.write('<th> '+totalGrossPrice+'</th>');
        frameDoc.document.write('</tr>');
        frameDoc.document.write('</table></br>')
        frameDoc.document.write('</html>')
        frameDoc.document.close();

        setTimeout(function () {
          window.frames["frame1"].focus();
          window.frames["frame1"].print();
          frame1.remove();
        }, 500);
      }, 
      error: function(xhr)
      {
        alert($.parseJSON(xhr.responseText)['error']['message']);
      }                
    });
  }
</script>

<script>
  function printYearlyPO(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if (mm == 1){
      currentMonth = "January";
    }
    if (mm == 2){
      currentMonth = "February";
    }
    if (mm == 3){
      currentMonth = "March";
    }
    if (mm == 4){
      currentMonth = "April";
    }
    if (mm == 5){
      currentMonth = "May";
    }
    if (mm == 6){
      currentMonth = "June";
    }
    if (mm == 7){
      currentMonth = "July";
    }
    if (mm == 8){
      currentMonth = "August";
    }
    if (mm == 9){
      currentMonth = "September";
    }
    if (mm == 10){
      currentMonth = "October";
    }
    if (mm == 11){
      currentMonth = "November";
    }
    if (mm == 12  ){
      currentMonth = "December";
    }
    var currentMonth;
    if(dd<10){
        dd='0'+dd;
    } 
    if(mm<10){
        mm='0'+mm;
    }
    
    var today = dd+'/'+mm+'/'+yyyy;
    $.ajax({
      type: "GET",
      url:  "/RetrieveYearlyPO",
      success: function(data){ 
        var totalPrice = 0;
        var totalQty = 0;
        var totalGrossPrice = 0;
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        frameDoc.document.write('<html><body> <div >');
        frameDoc.document.write('<image align = "pullcenter" width = "130" height = "100" style ="padding-left:10px"­> ');
        frameDoc.document.write('<p align = "Center">Margareth Catering Services </br>');
        frameDoc.document.write('B4 L5 Ph7 JP Rizal St., New San Mateo Subd., Gitnangbayan I, San Mateo, Rizal </br>');
        frameDoc.document.write('696-4528 | (+63) 928-297-2321 | (+63) 907-208-3331 </br>');
        frameDoc.document.write('margarethcateringservices@gmail.com </p></br></br>');
        frameDoc.document.write('<p align="right" >' +today+ '</p>');
        frameDoc.document.write('<p align= "center" style ="font-weight:bold;font-size:16pt">Purchase Report for Year ' +yyyy+ '</p>');
        frameDoc.document.write('<table border="1" style="width:100%;">');
        frameDoc.document.write('<tr>');
        frameDoc.document.write('<th> Purchase Date</th>') ;
        frameDoc.document.write('<th> Item Category</th>');
        frameDoc.document.write('<th> Item Name </th>');
        frameDoc.document.write('<th> Unit of Measurement </th>');
        frameDoc.document.write('<th> Quantity </th>');
        frameDoc.document.write('<th> Price </th>');
        frameDoc.document.write('<th> Gross Price </th>');
        frameDoc.document.write('</tr>');
        for (i = 0; i < data['poData'].length; i++) { 
          frameDoc.document.write('<tr style ="text-align:center">');
          frameDoc.document.write('<td>' +data['poData'][i]['poDate']+ '</td>');
          frameDoc.document.write('<td>' +data['poData'][i]['poTypeName']+ '</td>');
          frameDoc.document.write('<td>' +data['poData'][i]['poItemName']+ '</td>');
          frameDoc.document.write('<td>' +data['poData'][i]['uomName']+ '</td>');
          frameDoc.document.write('<td>' +data['poData'][i]['poQty']+ '</td>');
          frameDoc.document.write('<td>' +data['poData'][i]['poPrice']+ '</td>');
          var grossPrice = parseFloat(data['poData'][i]['poPrice']) * parseFloat(data['poData'][i]['poQty'])
          frameDoc.document.write('<td>' +grossPrice+ '</td>');
          frameDoc.document.write('</tr>');
          totalQty = totalQty + parseFloat(data['poData'][i]['poQty']);
          totalPrice = totalPrice + parseFloat(data['poData'][i]['poPrice']);
          totalGrossPrice = totalGrossPrice + grossPrice;
        }
        frameDoc.document.write('<tr style ="text-align:center">');
        frameDoc.document.write('<th> </th>') ;
        frameDoc.document.write('<th> </th>');
        frameDoc.document.write('<th> </th>');
        frameDoc.document.write('<th> TOTAL </th>');
        frameDoc.document.write('<th> '+totalQty+' </th>');
        frameDoc.document.write('<th> '+totalPrice+' </th>');
        frameDoc.document.write('<th> '+totalGrossPrice+'</th>');
        frameDoc.document.write('</tr>');
        frameDoc.document.write('</table></br>')
        frameDoc.document.write('</html>')
        frameDoc.document.close();

        setTimeout(function () {
          window.frames["frame1"].focus();
          window.frames["frame1"].print();
          frame1.remove();
        }, 500);
      }, 
      error: function(xhr)
      {
        alert($.parseJSON(xhr.responseText)['error']['message']);
      }                
    });
  }
</script>

<script>
  function printAllPO(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if (mm == 1){
      currentMonth = "January";
    }
    if (mm == 2){
      currentMonth = "February";
    }
    if (mm == 3){
      currentMonth = "March";
    }
    if (mm == 4){
      currentMonth = "April";
    }
    if (mm == 5){
      currentMonth = "May";
    }
    if (mm == 6){
      currentMonth = "June";
    }
    if (mm == 7){
      currentMonth = "July";
    }
    if (mm == 8){
      currentMonth = "August";
    }
    if (mm == 9){
      currentMonth = "September";
    }
    if (mm == 10){
      currentMonth = "October";
    }
    if (mm == 11){
      currentMonth = "November";
    }
    if (mm == 12  ){
      currentMonth = "December";
    }
    var currentMonth;
    if(dd<10){
        dd='0'+dd;
    } 
    if(mm<10){
        mm='0'+mm;
    }
    
    var today = dd+'/'+mm+'/'+yyyy;
    $.ajax({
      type: "GET",
      url:  "/RetrieveAllPO",
      success: function(data){ 
        var totalPrice = 0;
        var totalQty = 0;
        var totalGrossPrice = 0;
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        frameDoc.document.write('<html><body> <div >');
        frameDoc.document.write('<image src = "logo.png" align = "pullcenter" width = "130" height = "100" style ="padding-left:10px"­> ');
        frameDoc.document.write('<p align = "Center">Margareth Catering Services </br>');
        frameDoc.document.write('B4 L5 Ph7 JP Rizal St., New San Mateo Subd., Gitnangbayan I, San Mateo, Rizal </br>');
        frameDoc.document.write('696-4528 | (+63) 928-297-2321 | (+63) 907-208-3331 </br>');
        frameDoc.document.write('margarethcateringservices@gmail.com </p></br></br>');
        frameDoc.document.write('<p align="right" >' +today+ '</p>');
        frameDoc.document.write('<p align= "center" style ="font-weight:bold;font-size:16pt">Purchase Report of Margareth`s Catering Services</p>');
        frameDoc.document.write('<table border="1" style="width:100%;">');
        frameDoc.document.write('<tr>');
        frameDoc.document.write('<th> Purchase Date</th>') ;
        frameDoc.document.write('<th> Item Category</th>');
        frameDoc.document.write('<th> Item Name </th>');
        frameDoc.document.write('<th> Unit of Measurement </th>');
        frameDoc.document.write('<th> Quantity </th>');
        frameDoc.document.write('<th> Price </th>');
        frameDoc.document.write('<th> Gross Price </th>');
        frameDoc.document.write('</tr>');
        for (i = 0; i < data['poData'].length; i++) { 
          frameDoc.document.write('<tr style ="text-align:center">');
          frameDoc.document.write('<td>' +data['poData'][i]['poDate']+ '</td>');
          frameDoc.document.write('<td>' +data['poData'][i]['poTypeName']+ '</td>');
          frameDoc.document.write('<td>' +data['poData'][i]['poItemName']+ '</td>');
          frameDoc.document.write('<td>' +data['poData'][i]['uomName']+ '</td>');
          frameDoc.document.write('<td>' +data['poData'][i]['poQty']+ '</td>');
          frameDoc.document.write('<td>' +data['poData'][i]['poPrice']+ '</td>');
          var grossPrice = parseFloat(data['poData'][i]['poPrice']) * parseFloat(data['poData'][i]['poQty'])
          frameDoc.document.write('<td>' +grossPrice+ '</td>');
          frameDoc.document.write('</tr>');
          totalQty = totalQty + parseFloat(data['poData'][i]['poQty']);
          totalPrice = totalPrice + parseFloat(data['poData'][i]['poPrice']);
          totalGrossPrice = totalGrossPrice + grossPrice;
        }
        frameDoc.document.write('<tr style ="text-align:center">');
        frameDoc.document.write('<th> </th>') ;
        frameDoc.document.write('<th> </th>');
        frameDoc.document.write('<th> </th>');
        frameDoc.document.write('<th> TOTAL </th>');
        frameDoc.document.write('<th> '+totalQty+' </th>');
        frameDoc.document.write('<th> '+totalPrice+' </th>');
        frameDoc.document.write('<th> '+totalGrossPrice+'</th>');
        frameDoc.document.write('</tr>');
        frameDoc.document.write('</table></br>')
        frameDoc.document.write('</html>')
        frameDoc.document.close();
        setTimeout(function () {
          window.frames["frame1"].focus();
          window.frames["frame1"].print();
          frame1.remove();
        }, 500);
      }, 
      error: function(xhr)
      {
        alert($.parseJSON(xhr.responseText)['error']['message']);
      }                
    });
  }
</script>
<!-- END OF TRANSACTION REPORT -->

<!-- COLLECTION REPORT -->
<script>
  function printMonthlyCollection(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if (mm == 1){
      currentMonth = "January";
    }
    if (mm == 2){
      currentMonth = "February";
    }
    if (mm == 3){
      currentMonth = "March";
    }
    if (mm == 4){
      currentMonth = "April";
    }
    if (mm == 5){
      currentMonth = "May";
    }
    if (mm == 6){
      currentMonth = "June";
    }
    if (mm == 7){
      currentMonth = "July";
    }
    if (mm == 8){
      currentMonth = "August";
    }
    if (mm == 9){
      currentMonth = "September";
    }
    if (mm == 10){
      currentMonth = "October";
    }
    if (mm == 11){
      currentMonth = "November";
    }
    if (mm == 12  ){
      currentMonth = "December";
    }
    var currentMonth;
    if(dd<10){
        dd='0'+dd;
    } 
    if(mm<10){
        mm='0'+mm;
    }
    
    var today = dd+'/'+mm+'/'+yyyy;
    $.ajax({
      type: "GET",
      url:  "/RetrieveMonthlyCollection",
      success: function(data){
        var totalAmount = 0;
        var totalBalance = 0;
        var totalPaid = 0;
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        frameDoc.document.write('<html><body> <div >');
        frameDoc.document.write('<image src = "logo.png" align = "pullcenter" width = "130" height = "100" style ="padding-left:10px"­> ');
        frameDoc.document.write('<p align = "Center">Margareth Catering Services </br>');
        frameDoc.document.write('B4 L5 Ph7 JP Rizal St., New San Mateo Subd., Gitnangbayan I, San Mateo, Rizal </br>');
        frameDoc.document.write('696-4528 | (+63) 928-297-2321 | (+63) 907-208-3331 </br>');
        frameDoc.document.write('margarethcateringservices@gmail.com </p></br></br>');
        frameDoc.document.write('<p align="right" >' +today+ '</p>');
        frameDoc.document.write('<p align= "center" style ="font-weight:bold;font-size:16pt">Collection Report for the Month of '+currentMonth+'</p>');
        frameDoc.document.write('<table border="1" style="width:100%;">');
        frameDoc.document.write('<tr>');
        frameDoc.document.write('<th> Event Date</th>');
        frameDoc.document.write('<th> Name</th>');
        frameDoc.document.write('<th> Occasion/Event </th>');
        frameDoc.document.write('<th> Paid Amount </th>');
        frameDoc.document.write('<th> Balance Amount </th>');
        frameDoc.document.write('<th> Total Amount </th>');
        frameDoc.document.write('</tr>');
        for (i = 0; i < data['paymentData'].length; i++) {
          frameDoc.document.write('<tr style ="text-align:center">');
          frameDoc.document.write('<td>'+ data['paymentData'][i]['eventDate'] +'</td>');
          frameDoc.document.write('<td>'+data['paymentData'][i]['fullName']+'</br>'+data['paymentData'][i]['guestCount']+' Guests</br>'+data['paymentData'][i]['packageName']+'</br></td>');
          frameDoc.document.write('<td>'+data['paymentData'][i]['eventName']+'</td>');
          frameDoc.document.write('<td>'+data['paymentData'][i]['paid']+'</td>');
          var balanceAmt = 0;
          var totalFee = 0;
          var totalPaid = 0;
          totalFee = parseFloat(data['paymentData'][i]['totalFee']);
          paid = parseFloat(data['paymentData'][i]['paid']);
          balanceAmt = totalFee - totalPaid;
          frameDoc.document.write('<td>'+balanceAmt+'</td>');
          frameDoc.document.write('<td>'+data['paymentData'][i]['totalFee']+'</td>');
          frameDoc.document.write('</tr>');
          totalAmount = totalAmount + totalFee;
          totalPaid = totalPaid + paid;
          totalBalance = totalBalance + balanceAmt;
        }
        frameDoc.document.write('<tr style ="text-align:center">');
        frameDoc.document.write('<td></td>');
        frameDoc.document.write('<td></td>');
        frameDoc.document.write('<td>TOTAL</td>');
        frameDoc.document.write('<td>'+totalPaid+'</td>');
        frameDoc.document.write('<td>'+totalBalance+'</td>');
        frameDoc.document.write('<td>'+totalAmount+'</td>');
        frameDoc.document.write('</tr>');
        frameDoc.document.write('</table></br>')
        frameDoc.document.write('</html>')
        frameDoc.document.close();
        setTimeout(function () {
          window.frames["frame1"].focus();
          window.frames["frame1"].print();
          frame1.remove();
        }, 500);
      }, 
      error: function(xhr)
      {
        alert($.parseJSON(xhr.responseText)['error']['message']);
      }                
    });
  }
</script>

<script>
  function printYearlyCollection(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if (mm == 1){
      currentMonth = "January";
    }
    if (mm == 2){
      currentMonth = "February";
    }
    if (mm == 3){
      currentMonth = "March";
    }
    if (mm == 4){
      currentMonth = "April";
    }
    if (mm == 5){
      currentMonth = "May";
    }
    if (mm == 6){
      currentMonth = "June";
    }
    if (mm == 7){
      currentMonth = "July";
    }
    if (mm == 8){
      currentMonth = "August";
    }
    if (mm == 9){
      currentMonth = "September";
    }
    if (mm == 10){
      currentMonth = "October";
    }
    if (mm == 11){
      currentMonth = "November";
    }
    if (mm == 12  ){
      currentMonth = "December";
    }
    var currentMonth;
    if(dd<10){
        dd='0'+dd;
    } 
    if(mm<10){
        mm='0'+mm;
    }
    
    var today = dd+'/'+mm+'/'+yyyy;
    $.ajax({
      type: "GET",
      url:  "/RetrieveYearlyCollection",
      success: function(data){
        var totalAmount = 0;
        var totalBalance = 0;
        var totalPaid = 0;        
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        frameDoc.document.write('<html><body> <div >');
        frameDoc.document.write('<image src = "logo.png" align = "pullcenter" width = "130" height = "100" style ="padding-left:10px"­> ');
        frameDoc.document.write('<p align = "Center">Margareth Catering Services </br>');
        frameDoc.document.write('B4 L5 Ph7 JP Rizal St., New San Mateo Subd., Gitnangbayan I, San Mateo, Rizal </br>');
        frameDoc.document.write('696-4528 | (+63) 928-297-2321 | (+63) 907-208-3331 </br>');
        frameDoc.document.write('margarethcateringservices@gmail.com </p></br></br>');
        frameDoc.document.write('<p align="right" >' +today+ '</p>');
        frameDoc.document.write('<p align= "center" style ="font-weight:bold;font-size:16pt">Collection Report for the Year of '+yyyy+'</p>');
        frameDoc.document.write('<table border="1" style="width:100%;">');
        frameDoc.document.write('<tr>');
        frameDoc.document.write('<th> Event Date</th>');
        frameDoc.document.write('<th> Name</th>');
        frameDoc.document.write('<th> Occasion/Event </th>');
        frameDoc.document.write('<th> Down </th>');
        frameDoc.document.write('<th> Balance </th>');
        frameDoc.document.write('<th> Total </th>');
        frameDoc.document.write('</tr>');
        for (i = 0; i < data['paymentData'].length; i++) {
          frameDoc.document.write('<tr style ="text-align:center">');
          frameDoc.document.write('<td>'+ data['paymentData'][i]['eventDate'] +'</td>');
          frameDoc.document.write('<td>'+data['paymentData'][i]['fullName']+'</br>'+data['paymentData'][i]['guestCount']+' Guests</br>'+data['paymentData'][i]['packageName']+'</br></td>');
          frameDoc.document.write('<td>'+data['paymentData'][i]['eventName']+'</td>');
          frameDoc.document.write('<td>'+data['paymentData'][i]['paid']+'</td>');
          var balanceAmt = 0;
          var totalFee = 0;
          var totalPaid = 0;
          totalFee = parseFloat(data['paymentData'][i]['totalFee']);
          paid = parseFloat(data['paymentData'][i]['paid']);
          balanceAmt = totalFee - totalPaid;
          frameDoc.document.write('<td>'+balanceAmt+'</td>');
          frameDoc.document.write('<td>'+data['paymentData'][i]['totalFee']+'</td>');
          frameDoc.document.write('</tr>');
          totalAmount = totalAmount + totalFee;
          totalPaid = totalPaid + paid;
          totalBalance = totalBalance + balanceAmt;
        }
        frameDoc.document.write('<tr style ="text-align:center">');
        frameDoc.document.write('<td></td>');
        frameDoc.document.write('<td></td>');
        frameDoc.document.write('<td>TOTAL</td>');
        frameDoc.document.write('<td>'+totalPaid+'</td>');
        frameDoc.document.write('<td>'+totalBalance+'</td>');
        frameDoc.document.write('<td>'+totalAmount+'</td>');
        frameDoc.document.write('</tr>');
        frameDoc.document.write('</table></br>')
        frameDoc.document.write('</html>')
        frameDoc.document.close();
        setTimeout(function () {
          window.frames["frame1"].focus();
          window.frames["frame1"].print();
          frame1.remove();
        }, 500);
      }, 
      error: function(xhr)
      {
        alert($.parseJSON(xhr.responseText)['error']['message']);
      }                
    });
  }
</script>

<script>
  function printAllCollection(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if (mm == 1){
      currentMonth = "January";
    }
    if (mm == 2){
      currentMonth = "February";
    }
    if (mm == 3){
      currentMonth = "March";
    }
    if (mm == 4){
      currentMonth = "April";
    }
    if (mm == 5){
      currentMonth = "May";
    }
    if (mm == 6){
      currentMonth = "June";
    }
    if (mm == 7){
      currentMonth = "July";
    }
    if (mm == 8){
      currentMonth = "August";
    }
    if (mm == 9){
      currentMonth = "September";
    }
    if (mm == 10){
      currentMonth = "October";
    }
    if (mm == 11){
      currentMonth = "November";
    }
    if (mm == 12  ){
      currentMonth = "December";
    }
    var currentMonth;
    if(dd<10){
        dd='0'+dd;
    } 
    if(mm<10){
        mm='0'+mm;
    }
    
    var today = dd+'/'+mm+'/'+yyyy;
    $.ajax({
      type: "GET",
      url:  "/RetrieveAllCollection",
      success: function(data){
        var totalAmount = 0;
        var totalBalance = 0;
        var totalPaid = 0;
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        frameDoc.document.write('<html><body> <div >');
        frameDoc.document.write('<image src = "logo.png" align = "pullcenter" width = "130" height = "100" style ="padding-left:10px"­> ');
        frameDoc.document.write('<p align = "Center">Margareth Catering Services </br>');
        frameDoc.document.write('B4 L5 Ph7 JP Rizal St., New San Mateo Subd., Gitnangbayan I, San Mateo, Rizal </br>');
        frameDoc.document.write('696-4528 | (+63) 928-297-2321 | (+63) 907-208-3331 </br>');
        frameDoc.document.write('margarethcateringservices@gmail.com </p></br></br>');
        frameDoc.document.write('<p align="right" >' +today+ '</p>');
        frameDoc.document.write('<p align= "center" style ="font-weight:bold;font-size:16pt">Collection Report for the Margareth`s Catering Services</p>');
        frameDoc.document.write('<table border="1" style="width:100%;">');
        frameDoc.document.write('<tr>');
        frameDoc.document.write('<th> Event Date</th>');
        frameDoc.document.write('<th> Name</th>');
        frameDoc.document.write('<th> Occasion/Event </th>');
        frameDoc.document.write('<th> Down </th>');
        frameDoc.document.write('<th> Balance </th>');
        frameDoc.document.write('<th> Total </th>');
        frameDoc.document.write('</tr>');
        for (i = 0; i < data['paymentData'].length; i++) {
          frameDoc.document.write('<tr style ="text-align:center">');
          frameDoc.document.write('<td>'+ data['paymentData'][i]['eventDate'] +'</td>');
          frameDoc.document.write('<td>'+data['paymentData'][i]['fullName']+'</br>'+data['paymentData'][i]['guestCount']+' Guests</br>'+data['paymentData'][i]['packageName']+'</br></td>');
          frameDoc.document.write('<td>'+data['paymentData'][i]['eventName']+'</td>');
          frameDoc.document.write('<td>'+data['paymentData'][i]['paid']+'</td>');
          var balanceAmt = 0;
          var totalFee = 0;
          var totalPaid = 0;
          totalFee = parseFloat(data['paymentData'][i]['totalFee']);
          paid = parseFloat(data['paymentData'][i]['paid']);
          balanceAmt = totalFee - totalPaid;
          frameDoc.document.write('<td>'+balanceAmt+'</td>');
          frameDoc.document.write('<td>'+data['paymentData'][i]['totalFee']+'</td>');
          frameDoc.document.write('</tr>');
          totalAmount = totalAmount + totalFee;
          totalPaid = totalPaid + paid;
          totalBalance = totalBalance + balanceAmt;
        }
        frameDoc.document.write('<tr style ="text-align:center">');
        frameDoc.document.write('<td></td>');
        frameDoc.document.write('<td></td>');
        frameDoc.document.write('<td>TOTAL</td>');
        frameDoc.document.write('<td>'+totalPaid+'</td>');
        frameDoc.document.write('<td>'+totalBalance+'</td>');
        frameDoc.document.write('<td>'+totalAmount+'</td>');
        frameDoc.document.write('</tr>');
        frameDoc.document.write('</table></br>')
        frameDoc.document.write('</html>')
        frameDoc.document.close();
        setTimeout(function () {
          window.frames["frame1"].focus();
          window.frames["frame1"].print();
          frame1.remove();
        }, 500);
      }, 
      error: function(xhr)
      {
        alert($.parseJSON(xhr.responseText)['error']['message']);
      }                
    });
  }
</script>


<!-- END OF COLLECTION REPORT -->

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
@endsection