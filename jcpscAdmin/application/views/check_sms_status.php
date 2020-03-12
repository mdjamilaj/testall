<style>
    .cf:before, .cf:after{
    content:"";
    display:table;
}
 
.cf:after{
    clear:both;
}
 
.cf{
    zoom:1;
}    

 /* Form wrapper styling */
.search-wrapper {
width: 220px;
margin: 45px auto 50px auto;
box-shadow: 0 1px 1px rgba(0, 0, 0, .4) inset, 0 1px 0 rgba(255, 255, 255, .2);
}
 
/* Form text input */
 
.search-wrapper input {
    width: 148px;
    height: 40px;
padding: 10px 5px;
float: left;
font: bold 15px 'lucida sans', 'trebuchet MS', 'Tahoma';
border: 0;
background: #380082;
border-radius: 3px 0 0 3px;
}
 
.search-wrapper input:focus {
    outline: 0;
    background: #c363c5;
    box-shadow: 0 0 2px rgba(0,0,0,.8) inset;
}
 
.search-wrapper input::-webkit-input-placeholder {
   color: #999;
   font-weight: normal;
   font-style: italic;
}
 
.search-wrapper input:-moz-placeholder {
    color: #999;
    font-weight: normal;
    font-style: italic;
}
 
.search-wrapper input:-ms-input-placeholder {
    color: #999;
    font-weight: normal;
    font-style: italic;
}    
 
/* Form submit button */
.search-wrapper button {
overflow: visible;
position: relative;
float: right;
border: 0;
padding: 0;
cursor: pointer;
height: 40px;
width: 72px;
font: bold 15px/40px 'lucida sans', 'trebuchet MS', 'Tahoma';
color: white;
text-transform: uppercase;
background: #D83C3C;
border-radius: 0 3px 3px 0;
text-shadow: 0 -1px 0 rgba(0, 0, 0, .3);
}
   
.search-wrapper button:hover{     
    background: #e54040;
}   
   
.search-wrapper button:active,
.search-wrapper button:focus{   
    background: #c42f2f;
    outline: 0;   
}
 
.search-wrapper button:before { /* left arrow */
    content: '';
    position: absolute;
    border-width: 8px 8px 8px 0;
    border-style: solid solid solid none;
    border-color: transparent #d83c3c transparent;
    top: 12px;
    left: -6px;
}
 
.search-wrapper button:hover:before{
    border-right-color: #e54040;
}
 
.search-wrapper button:focus:before,
.search-wrapper button:active:before{
        border-right-color: #c42f2f;
}      
 
.search-wrapper button::-moz-focus-inner { /* remove extra button spacing for Mozilla Firefox */
    border: 0;
    padding: 0;

    // sets

$gl-ms         : "screen and (max-width: 23.5em)"; // up to 360px
$gl-xs         : "screen and (max-width: 35.5em)"; // up to 568px
$gl-sm         : "screen and (max-width: 48em)";   // max 768px
$gl-md         : "screen and (max-width: 64em)";   // max 1024px
$gl-lg         : "screen and (max-width: 80em)";   // max 1280px

// table style

table{ 
  border-spacing: 1; 
  border-collapse: collapse; 
  background:white;
  border-radius:6px;
  overflow:hidden;
  max-width:800px; 
  width:100%;
  margin:0 auto;
  position:relative;
  
  *               { position:relative }
  
  td,th           { padding-left:8px}

  thead tr        { 
    height:60px;
    background:#FFED86;
    font-size:16px;
  }
  
  tbody tr        { height:48px; border-bottom:1px solid #E3F1D5 ;
    &:last-child  { border:0; }
  }
  
 	td,th 					{ text-align:left;
		&.l 					{ text-align:right }
		&.c 					{ text-align:center }
		&.r 					{ text-align:center }
	}
}


@media #{$gl-xs}              {
  
  table					              { display:block;
	  > *,tr,td,th              { display:block }
    
    thead                     { display:none }
    tbody tr                  { height:auto; padding:8px 0;
      td                      { padding-left:45%; margin-bottom:12px;
        &:last-child          { margin-bottom:0 }
        &:before              { 
          position:absolute;
          font-weight:700;
          width:40%;
          left:10px;
          top:0
        }
        
        &:nth-child(1):before { content:"Code";}
        &:nth-child(2):before { content:"Stock";}
        &:nth-child(3):before { content:"Cap";}
        &:nth-child(4):before { content:"Inch";}
        &:nth-child(5):before { content:"Box Type";}
      }        
    }
  }
}  
}    

thead {
    background: #7b2bfb;
    color: #ffffff;
}
tbody {
    background: #a968f1;
    color: #000000;
}
td {
    padding: 10px;
    border: 1px solid;
}
.status_sms{
    font-weight: 900;
}

th {
    text-align: inherit;
    padding: 10px;
    border: 1px solid #e202c1;
}
.green{
    color: #00ff43 !important;
}
</style>

<form action="" class="search-wrapper cf">
        <input type="text" placeholder="Search here..." required="" id="sms_uid_num">
        <button type="submit" id="cheak_sms_uid">Search</button>
    </form>

<div id="show_sms_uid_info">

</div>


    <script>


$(document).ready(function() {
	$('#cheak_sms_uid').on('click', function() {
		$("#cheak_sms_uid").attr("disabled", "disabled");
		var sms_uid_num = $('#sms_uid_num').val();


			$.ajax({
				url: "<?php echo base_url(); ?>phone_book/check_sms_status",
				type: "POST",
				data: {
					sms_uid_num: sms_uid_num		
				},
				cache: false,
				success: function(response){
					var data = jQuery.parseJSON(response);

                        console.log(data);
                        
                        if(data!=""){
                        var string = "<table><thead><tr><th>SMS_uID</th><th>Contact</th><th>SMS CONTANT</th><th>SMS-LENGTH</th><th>SMS-Quntity</th><th>Status</th></tr><thead><tbody>";
                            string += "<tr><td>"+data.sms.sms_uid+"</td><td>"+data.sms.recipient+"</td><td>"+data.sms.message_body+"</td><td>"+data.sms.length+"</td><td>"+data.sms.sms_quantity+"</td><td style='color: red; font-weight: bold; letter-spacing: 2px;' id='sms_status_color'>"+data.sms.sms_status+"</td></tr>";
                            string += "</tbody><table/>";
                           
                              


                            $('#show_sms_uid_info').html(string);
                            if(data.sms.sms_status == "SUCCESS")
                            {
                                // alert("dsfsdfsdf");
                                $( "#sms_status_color" ).addClass( "green" );
                            }  
                        }else{
                            alert("Data Not Found!!!");
                        }
                        // alert("Total SMS SENT "+data.success+" NUMBERS Total SMS Faild "+data.total_failed+" !! Total SMS Quantity " + data.qty + " Failed Status !-" + data.failed_status + "-! Faild Student ID list "+ data.failed_send_student_id);
						// $("#all_info").html("");
                    	// $("#sms").val('');
						// $("#name").val('');
						// $("#butsave").removeAttr("disabled");
				}
			});
	});
});
</script>