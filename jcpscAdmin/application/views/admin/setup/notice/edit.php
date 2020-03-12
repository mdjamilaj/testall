<?php

// var_dump($edit_data);
    $publish = $edit_data[0]->notice_publish_date_time;
    $pub = explode("-",$publish);
    $pub_date = $pub[0];
    $pub_time = $pub[1];
?>

<style>
    form.user .form-control-user{
            border-radius: 3px;
    }
</style>

<script>
  $( function() {
    $( "#publish_date" ).datepicker();
    $( "#notice_date" ).datepicker();
  } );
</script>


<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row justify-content-center">
          <div class="col-lg-8 justify-content-center">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Edit <?php echo $edit_data[0]->title_english ?> Notice</h1>
              </div>
              <form class="user" action="<?php echo base_url() ?>jcpscAdmin/notice_update" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="#"><i class="fas fa-exclamation-circle"></i> Notice Title English :</label>
                    <input type="text" value="<?php echo $edit_data[0]->title_english ?>" name="title_english" class="form-control form-control-user" id="dfsdf" placeholder="Enter Notice Title English">
                  </div>

                  <div class="form-group">
                  <label for="#"><i class="fas fa-exclamation-circle"></i> Notice Title Bangla :</label>
                    <input type="text" value="<?php echo $edit_data[0]->title_bangla ?>" name="title_bangla" class="form-control form-control-user" id="sdf" placeholder="Enter Notice Title Bangla">
                  </div>

                <div class="form-group">
                <label for="#"><i class="fas fa-exclamation-circle"></i> Notice Description English :</label>
                  <textarea type="text" name="des_english" class="form-control form-control-user" id="dsf" placeholder="Notice Description English"><?php echo $edit_data[0]->des_english ?></textarea>
                </div>

                <div class="form-group">
                <label for="#"><i class="fas fa-exclamation-circle"></i> Notice Description Bangla :</label>
                  <textarea type="text" name="des_bangla" class="form-control form-control-user" id="dsfhf" placeholder="Notice Description Bangla"><?php echo $edit_data[0]->des_bangla ?></textarea>
                </div>

                <div class="form-group">
                <label for="#"><i class="fas fa-exclamation-circle"></i> Notice Attachment :</label>
                  <input type="file" name="attachment" class="form-control form-control-user pb-5" id="attachment" placeholder="Notice Description Bangla">
                </div>

                <div class="form-group">
                  <label for="#"><i class="fas fa-exclamation-circle"></i> Notice Date :</label>
                  <input type="text" value="<?php echo $edit_data[0]->notice_date ?>" name="notice_date" class="form-control form-control-user" id="notice_date" placeholder="Notice Date">
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="#"><i class="fas fa-exclamation-circle"></i> Notice Publish Date :</label>
                    <input type="text" value="<?php echo $pub_date ?>" name="publish_date" class="form-control form-control-user" id="publish_date" placeholder="Notice Publish Date">
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="#"><i class="fas fa-exclamation-circle"></i> Notice Publish Time :</label>
                    <input type="text" value="<?php echo $pub_time ?>" name="publish_time" class="form-control form-control-user" id="publish_time" placeholder="Notice Publish Time">
                  </div>
                </div>
                <input type="hidden" value="<?php echo $edit_data[0]->id ?>" name="notice_id" id="notice_id">
                <input type="hidden" value="<?php echo $edit_data[0]->attachment ?>" name="file_url" id="file_url">

                <div class="form-group">
                  <label for="#"><i class="fas fa-exclamation-circle"></i> Notice Creator Name :</label>
                  <input type="text"  value="<?php echo $edit_data[0]->creator ?>" name="creator" class="form-control form-control-user" id="creator" placeholder="Enter Creator Name">
                </div>
                <div class="form-group">
                  <label for="#" class="text-black"><i class="fas fa-exclamation-circle"></i> Notice Show Document :</label>
                  <input type="number"  value="<?php echo $edit_data[0]->showDocument ?>" name="showDocument" class="form-control form-control-user" id="showDocument" placeholder="Enter Show Document">
                </div>

                <div class="form-group row">
                    <div class="col-sm-4 mb-4 mb-sm-0">
                        <button  formaction="<?php echo base_url() ?>jcpscAdmin/notice_print" class="btn btn-primary btn-user btn-block">Print</button>
                    </div>
                    <div class="col-sm-4 mb-4 mb-sm-0">
                        <button type="submit" class="btn btn-primary btn-user btn-block">Update</button>
                    </div>
                    <div class="col-sm-4 mb-4 mb-sm-0">
                        <button  formaction="<?php echo base_url() ?>jcpscAdmin/notice_update_and_print" class="btn btn-primary btn-user btn-block">Update & Print</button>
                    </div>
                </div>
                <hr>
              </form>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>








  <script>
    CKEDITOR.replace( 'des_english' );
    CKEDITOR.replace( 'des_bangla' );
</script>

<script>

$('#publish_time').timepicker({
    timeFormat: 'h:mm p',
    interval: 60,
    minTime: '10',
    maxTime: '6:00pm',
    // defaultTime: '11',
    startTime: '10:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});

</script>