<style>

@charset "UTF-8";
@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

body {
  font-family: 'Open Sans', sans-serif;
  font-weight: 300;
  line-height: 1.42em;
  color:#A7A1AE;
  background-color:#1F2739;
}

h1 {
  font-size:3em; 
  font-weight: 300;
  line-height:1em;
  text-align: center;
  color: #4DC3FA;
}

h2 {
  font-size:1em; 
  font-weight: 300;
  text-align: center;
  display: block;
  line-height:1em;
  padding-bottom: 2em;
  color: #FB667A;
  height: 100%;
}

h2 a {
  font-weight: 700;
  text-transform: uppercase;
  color: #FB667A;
  text-decoration: none;
}

.blue { color: #185875; }
.yellow { color: #FFF842; }

.container th h1 {
	  font-weight: bold;
	  font-size: 1em;
  /* text-align: left; */
    color: #ffffff;
}
.container th {
    background-color: #000000;
    color: #ffffff;
    border-right: 1px solid #ebefe3;
    text-align: center;
}

.container td {
	  font-weight: normal;
	  font-size: 1em;
  -webkit-box-shadow: 0 2px 2px -2px #0E1119;
	   -moz-box-shadow: 0 2px 2px -2px #0E1119;
	        box-shadow: 0 2px 2px -2px #0E1119;
}

.container {
	  text-align: left;
	  overflow: scroll;
	  margin: 0 auto;
    display: table;
}

.container td, .container th {
	  /* padding-bottom: 2%;
	  padding-top: 2%; */
    padding: 10px;
    text-align: center;  
}
.container th {
	  padding-bottom: 2%;
	  padding-top: 2%;
    font-size: 14px;
}

/* Background-color of the odd rows */
.container tr:nth-child(odd) {
	  background-color: #1b2454;
}

/* Background-color of the even rows */
.container tr:nth-child(even) {
	  background-color: #163a8a;
}
td {
    border: 1px solid #fff;
    max-height: 20px;
}
.container td:first-child { color: #FB667A; }

.container tr:hover {
   background-color: #464A52;
-webkit-box-shadow: 0 6px 6px -6px #0E1119;
	   -moz-box-shadow: 0 6px 6px -6px #0E1119;
	        box-shadow: 0 6px 6px -6px #0E1119;
}

.container td:hover {
  background-color: #FFF842;
  color: #403E10;
  font-weight: bold;
  
  box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
  transform: translate3d(6px, -6px, 0);
  
  transition-delay: 0s;
	  transition-duration: 0.4s;
	  transition-property: all;
  transition-timing-function: line;
}
.edit_td a{
    color: #Ffffff;
    /* background: #d4d65f; */
    float: left;
    width: 100% !important;
    height: 58px !important;
    padding-top: 16px;
}
.edit_td a:hover{
  color: #000000;
}

@media (max-width: 800px) {
.container td:nth-child(4),
.container th:nth-child(4) { display: none; }
}

</style>



<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <!-- <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div> -->
              <form class="user">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Search Name">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Search Title">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="search details">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="">
                  </div>
                </div>
                <a href="" class="btn btn-primary btn-user btn-block">
                  SEARCH
                </a>
                <hr>
              </form>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>










  <table class="container">
	<thead>
		<tr>
			<th><h1>SN</h1></th>
			<th><h1>PAGES</h1></th>
      <th><h1>Page Title English</h1></th>
      <th><h1>Page Title Bangla</h1></th>
      <th><h1>Page contant English</h1></th>
      <th><h1>Page contant Bangla</h1></th>
      <th><h1>Actions</h1></th>
		</tr>
	</thead>
	<tbody>
    <?php foreach ($details as $show_data){ ?>


		<tr>
			<td><?php echo $out = strlen($show_data['news_id']) > 50 ? substr($show_data['news_id'],0,50)."..." : $show_data['news_id'];?></td>
			<td><?php echo $out = strlen($show_data['news_type']) > 50 ? substr($show_data['news_type'],0,50)."..." : $show_data['news_type'];?></td>
			<td><?php echo $out = strlen($show_data['news_title']) > 50 ? substr($show_data['news_title'],0,50)."..." : $show_data['news_title'];?></td>
      <td><?php echo $out = strlen($show_data['news_title_bangla']) > 50 ? substr($show_data['news_title_bangla'],0,50)."..." : $show_data['news_title_bangla'];?></td>
      <td><?php echo $out = strlen($show_data['news_details']) > 50 ? substr($show_data['news_details'],0,50)."..." : $show_data['news_details'];?></td>
      <td><?php echo $out = strlen($show_data['news_details_bangla']) > 50 ? substr($show_data['news_details_bangla'],0,50)."..." : $show_data['news_details_bangla'];?></td>
      <td class="edit_td" style="padding: 0 !important"><a href="<?php echo base_url(); ?>jcpscAdmin/edit?edit=<?php echo $show_data['news_id'] ?>">Edit</a></td>
    </tr>

    <?php } ?>
	</tbody>
</table>






