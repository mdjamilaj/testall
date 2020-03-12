<style>

.form1 {
    text-align: center;
    height: 200px;
    background: #4c70da;
    box-shadow: 1px 1px 10px 6px;
    padding-top: 5%;
}
.first_date {
    width: 271px;
    height: 47px;
    /* border-radius: 3rem; */
    border: 1px solid #ef02ff;
    background: #bea1e4;
    padding: 10px;
    margin: 5px;
}
.first_date:focus{
    background: #6d19da;
    color: #ffffff;
}
.last_date {
    width: 271px;
    height: 47px;
    /* border-radius: 3rem; */
    border: 1px solid #ef02ff;
    background: #bea1e4;
    padding: 10px;
    margin: 5px;
}
.last_date:focus{
    background: #6d19da;
    color: #ffffff;
}
#date_search {
    width: 150px;
    height: 46px;
    background: linear-gradient(45deg, #1bb92f, #8d14a2);
    color: #fff;
    font-size: 20px;
    border: none;
    margin: 5px;
    letter-spacing: 2px;
}

table {
    border: 2px solid #ccc;
    border-collapse: collapse;
    margin: 0;
    margin-top: 1px;
    padding: 0;
    width: 100%;
    table-layout: fixed;
    box-shadow: -1px 9px 10px 6px;
}
table tr {
  background-color: #f8f8f8;
  border: 1px solid #ddd;
  padding: .35em;
}

table th,
table td {
    padding: .625em;
    text-align: center;
    color: #fff;
    background: #b400ff;
    border: 1px solid #fff;
}

table th {
    font-size: 1.25em;
    letter-spacing: .1em;
    text-transform: uppercase;
    background: #1900a7;
    color: #ffffff;
    border: 1px solid #ffffff;
}

@media screen and (max-width: 600px) {
  table {
    border: 0;
  }

  table caption {
    font-size: 1.3em;
  }
  
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  
  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  
  table td:last-child {
    border-bottom: 0;
  }
}

</style>

<form action="" class="form1">
<input type="text" id="first_date" class="first_date" name="first_date" placeholder="ENTER FIRST DATE">
<input type="text" id="last_date" class="last_date" name="last_date"  placeholder="ENTER LAST DATE">
<input type="submit" value="Search" id="date_search">
</form>


<div id="date_search_value">

</div>

<script>


$(document).ready(function() {
	$('#date_search').on('click', function() {
		$("#date_search").attr("disabled", "disabled");
		var first_date = $('#first_date').val();
        var last_date = $('#last_date').val();
        


			$.ajax({
				url: "<?php echo base_url(); ?>phone_book/date_search_sql",
				type: "POST",
				data: {
                    first_date: first_date,
					last_date: last_date		
				},
				cache: false,
				success: function(response){
					var data = jQuery.parseJSON(response);

                        console.log(data);
                        
                        if(data!=""){
                        var string = "<table><thead><tr><th>ID</th><th>STUDENT ID</th><th>SMS ID</th><th>SMS uID</th><th class='sms_status_sec_head'>SMS-Status</th><th>SMS-Quntity</th><th>Date</th></tr><thead><tbody id='singel_date_result'>";


                            for(var i=0; i<data.length; i++){

                            string += "<tr><td>"+data[i].id+"</td><td>"+data[i].client_id+"</td><td>"+data[i].send_sms_id+"</td><td>"+data[i].sms_uid+"</td><td class='sms_status_sec'>"+data[i].sms_status+"</td><td>"+data[i].sms_qty+"</td><td style='color: #56ff00; font-weight: bold; letter-spacing: 2px;' id='sms_status_color'>"+data[i].date+"</td></tr>";
                        }

                        $("#singel_date_result").html(string);
                        
                        string += "</tbody><table/>";
                           
                              


                            $('#date_search_value').html(string);
                        }else{
                            alert("Data Not Found!!!");
                            window.location.reload(true); 
                        }
				}
			});
	});
});


</script>