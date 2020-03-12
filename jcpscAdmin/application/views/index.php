<style>
.progress {
  width: 100%;
  height: 50px;
}

.progress-wrap {
    background: #f80;
    margin: 20px 0;
    padding: 2px;
    color: #0a42e2;
    text-align: center !important;
    font-size: 30px;
    overflow: hidden;
    position: relative;
    justify-content: center;
}
.progress-wrap .progress-bar {
  background: #ddd;
  left: 0;
  position: absolute;
  top: 0;
}
#proggress_glood{
	opacity: 99999999;
}
.total_sms_sec {
    float: left;
    border: 1px solid;
    margin: 0px 13px 20px 0px;
    padding: 10px 10px 0px 10px;
    text-align: center;
    color: #9c0bcc;
}
.total_success_sec {
    float: left;
    border: 1px solid;
    padding: 10px 10px 0px 10px;
    text-align: center;
	margin: 0px 13px 20px 0px;
    color: #0b9e38;
}

.total_sms_qty_sec {
    float: left;
    border: 1px solid;
    padding: 10px 10px 0px 10px;
    color: #1b0fcc;
	margin: 0px 13px 20px 0px;
    text-align: center;
}

.total_sms_failed_sec {
    float: left;
    border: 1px solid;
    color: #c000ff;
	text-align: center;
    margin: 0px 13px 20px 0px;
    padding: 10px 10px 0px 10px;
}

.total_sms_failed_id_sec {
    float: left;
    border: 1px solid;
    color: #552cb7;
    margin: 0px 13px 20px 0px;
    padding: 10px 10px 0px 10px;
	text-align: center;
}

.total_sms_failed_status_sec {
    float: left;
    border: 1px solid;
    text-align: center;
    color: #5600ff;
    margin: 0px 13px 20px 0px;
    padding: 10px 10px 0px 10px;
    
}

div#total_sms_success_failed_value {
    overflow: hidden;
	font-size: 20px;

}



p.total_sent_sms {
    margin-left: 10px;
    color: #1000ff;
    font-size: 21px;
}

p#total_success_sms {
    margin-left: 10px;
    font-size: 21px;
}
p#total_sms_qty {
    margin-left: 10px;
    font-size: 21px;
}


p#total_failed_sms {
    margin-left: 10px;
    font-size: 21px;
    /* color: #1000ff; */
}

p#failed_id_list {
    margin-left: 10px;
    font-size: 21px;
    color: red;
    word-spacing: 8px;
}

p#failed_sms_list {
    margin-left: 19px;
    font-size: 18px;
    color: red;
	word-spacing: 20px;
}


</style>


<div id="proggress">

</div>
<form action="">
<input type="hidden" value="20" id="progress_val" name="progress_val">
</form>


<div class="" id="total_sms_success_failed_value">


</div>

<form class="form-style-9" name="form1"  id="fupForm" method="post">
<ul>
<li>
    <input id="name" type="text" list="name" name="field1" class="field-style field-split align-left" placeholder="Name" />
    <input id="sms" type="text" list="sms1" name="field2" class="field-style field-split align-right" placeholder="SELECT SMS" />
    <datalist id="sms1">
    <?php foreach ($sms as $sms1){ ?>

        <option value="<?php echo ucwords($sms1->id); ?>">

    <?php }  ?>
    </datalist>
</li>
<li>
<input type="submit" value="Show Info" class="align-right"  id="butsave">
</li>
</ul>
</form>


<div id="all_info" style="overflow: hidden; margin-bottom: 5rem;">


<!-- Information -->






</div>










<script>
$(document).ready(function() {
	$('#butsave').on('click', function() {
		$("#butsave").attr("disabled", "disabled");
		var name = $('#name').val();
		var sms = $('#sms').val();
        // console.log(sms);
		if(name!="" && sms!=""){
			$.ajax({
				url: "<?php echo base_url(); ?>phone_book/search_data_insert",
				type: "POST",
				data: {
					name: name,
					sms: sms		
				},
				cache: false,
				success: function(data){
					var data = JSON.parse(data);

                        // console.log(data.student_info);
                        // console.log(data.sms.message_body);

                        var student_info = data.student_info;
                        var sms = data.sms;

					if(student_info == '')
					{
						alert("Oops!! Student not found!!!");
					}else{


                    var string = "<form name='form2' id='form2' method='post' ><div class='show_info'></div><div class='stu_info'><table class='responstable' id='stu_data'>";



                $.each( student_info, function( key, value ) { 
                       
                    string += "<tr><td><input type='checkbox' name='myCheckboxes[]' id='myCheckboxes' value='"+value['id'] +"'></td><td>"+value['student_id'] +"</td><td>"+value['name']+"</td><td>"+value['contact']+"</td></tr> ";
                                
                }); 


                    

                	$("#stu_data").html(string);
                

                    string += '</table></div><div class="sms" id="sms_print"><h2 class="sms_header">SMS Content</h2><div id="sms_body">';

                    string += sms['status'];
                    string += "<input type='hidden' id='send_sms_id' value='"+sms['id'] +"' ><input type='hidden' id='send_sms_status' value='"+sms['status'] +"' ></div></div></div><input type='submit' value='SEND SMS' class='sub_btn' id='send_sms'></form>";
                
                    $("#all_info").html(string);







// start Second request ***************************************************************



  $(document).ready(function() {
	$('#send_sms').on('click', function() {
		$("#send_sms").attr("disabled", "disabled");
		var send_sms_status = $('#send_sms_status').val();
		var send_sms_id = $('#send_sms_id').val();


            var myCheckboxes = new Array();
                $("input:checked").each(function() {
                    myCheckboxes.push($(this).val());
                });
				

			var cheak_length = myCheckboxes.length;
			if(cheak_length!='')
			{
				var str = "<div class='progress-wrap progress' id='progress' data-progress-percent='100'><div id='proggress_glood'></div><div class='progress-bar progress'></div></div>";
				$('#proggress').html(str);

				var total_sms = "<div class='total_response_show'><div class='total_sms_sec'>TOTAL SENT : <p class='total_sent_sms'>"+ cheak_length +"</p> </div><div class='total_success_sec'> TOTAL SUCCESS SMS : <p id='total_success_sms'>0</p> </div><div class='total_sms_qty_sec'> TOTAL SMS QUNTITY : <p id='total_sms_qty'>0</p> </div><div class='total_sms_failed_sec'>TOTAL FAILED SMS : <p id='total_failed_sms'>0</p></div><div class='total_sms_failed_id_sec'> FAILED ID : <p id='failed_id_list'>0</p> </div><div class='total_sms_failed_status_sec'>FAILED SMS STATUS : <p id='failed_sms_list'>0</p> </div></div>";
				$('#total_sms_success_failed_value').html(total_sms);
					
			}


			console.log(cheak_length);
			//progressber incriment system
			var count = 0;
			function incrimentFunction(data){
				count++;

				var div = 100/cheak_length;
				var result = div*count;
				document.getElementById("progress_val").value = result;
				document.getElementById("proggress_glood").innerText = result+"%";
				if(result == 100)
				{
					document.getElementById("proggress_glood").innerText = "ALL SMS SENT";
				}
				console.log(count);
			}

			//error value count
			var failed_status = [];
			var error = [];
			var failed_send_student_ids = [];

			function errorFunction(data){
				failed_status.push(this.failed_status + ",  ");
				error.push(this.cheak);
				failed_send_student_ids.push(this.failed_send_student_id + ",  ");


				var total_failed_sms = failed_send_student_ids.length;
				$('#total_failed_sms').html(total_failed_sms);

				var failed_id_list = failed_send_student_ids;
				$('#failed_id_list').html(failed_id_list);

				var failed_sms_list = failed_status;
				$('#failed_sms_list').html(failed_sms_list);

				console.log(error);
				console.log(failed_status);
				console.log(failed_send_student_ids);
			}

			//success value count
			var qty = [];
			function successFunction(data){
				qty.push(this.qty);
				var total_success_sms = qty.length;
				$('#total_success_sms').html(total_success_sms);
				var total_sms_qty = total_success_sms * 2;
				$('#total_sms_qty').html(total_sms_qty);
				console.log(data);
			}

			
		for(var i=0; i<myCheckboxes.length; i++){

			if(myCheckboxes[i]!="" && send_sms_status!=""){
				$.ajax({
					url: "<?php echo base_url(); ?>phone_book/send_sms_data",
					type: "POST",
					data: {
						myCheckboxes: myCheckboxes[i],
						send_sms_status: send_sms_status,
						send_sms_id: send_sms_id		
					},
					cache: false,
					success: function(response){
						var data = jQuery.parseJSON(response);

							console.log(data);
							if(data.cheak == "error"){
								errorFunction.call(data);
							}else{
								successFunction.call(data);
							}
							incrimentFunction.call(data);


							//proggress bar  length control

							// on page load...
							moveProgressBar();
							// on browser resize...
							$(window).resize(function() {
								moveProgressBar();
							});

							// SIGNATURE PROGRESS
							function moveProgressBar() {
								
								var set_data_percentage = document.getElementById("progress_val").value;
								// console.log(set_data_percentage);
								var getPercent = (set_data_percentage / 100);
								var getProgressWrapWidth = $('.progress-wrap').width();
								var progressTotal = getPercent * getProgressWrapWidth;
								// console.log(progressTotal);
								var animationLength = 2500;
								
								// on page load, animate percentage bar to data percentage length
								// .stop() used to prevent animation queueing
								$('.progress-bar').stop().animate({
									left: progressTotal
								}, animationLength);
							}
					}
				});
			}
			else{
				alert('Please fill all the field !');
			}
		}
	});
});


// start Second request ***************************************************************


				}
			  }
	    	});
		  }
		else{
			alert('Please fill all the field !');
		}
	});
});




				
</script>



