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
                <h1 class="h4 text-gray-900 mb-4"> Create Notice</h1>
              </div>
              <form class="user" action="<?php echo base_url() ?>jcpscAdmin/notice_store" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                  <label for="#"><i class="fas fa-exclamation-circle"></i> Notice Title English :</label>
                    <input type="text" name="title_english" class="form-control form-control-user" required id="dfsdf" placeholder="Enter Notice Title English">
                  </div>

                  <div class="form-group">
                  <label for="#"><i class="fas fa-exclamation-circle"></i> Notice Title Bangla :</label>
                    <input type="text" name="title_bangla" class="form-control form-control-user" required id="sdf" placeholder="Enter Notice Title Bangla">
                  </div>

                <div class="form-group">
                <label for="#"><i class="fas fa-exclamation-circle"></i> Notice Description English :</label>
                  <textarea type="text" name="des_english" class="form-control form-control-user" required id="dsf" placeholder="Notice Description English"></textarea>
                </div>

                <div class="form-group">
                <label for="#"><i class="fas fa-exclamation-circle"></i> Notice Description Bangla :</label>
                  <textarea type="text" name="des_bangla" class="form-control form-control-user" required id="dsfhf" placeholder="Notice Description Bangla"></textarea>
                </div>

                <div class="form-group">
                <label for="#"><i class="fas fa-exclamation-circle"></i> Notice Attachment :</label>
                  <input type="file" name="attachment" class="form-control form-control-user pb-5" required id="attachment" placeholder="Notice Description Bangla">
                </div>

                <div class="form-group">
                <label for="#"><i class="fas fa-exclamation-circle"></i> Notice Date :</label>
                  <input type="text" name="notice_date" class="form-control form-control-user" required id="notice_date" placeholder="Notice Date">
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="#"><i class="fas fa-exclamation-circle"></i> Notice Publish Date :</label>
                    <input type="text" name="publish_date" class="form-control form-control-user"  required id="publish_date" placeholder="Notice Publish Date">
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="#"><i class="fas fa-exclamation-circle"></i> Notice Publish Time :</label>
                    <input type="text" name="publish_time" class="form-control form-control-user"  required id="publish_time" placeholder="Notice Publish Time">
                  </div>
                </div>


                <div class="form-group">
                <label for="#"><i class="fas fa-exclamation-circle"></i> Notice Creator Name :</label>
                  <input type="text" name="creator" class="form-control form-control-user" required id="creator" placeholder="Enter Creator Name">
                </div>
                <div class="form-group">
                <label for="#"><i class="fas fa-exclamation-circle"></i> Notice Show Document :</label>
                  <input type="number" name="showDocument" class="form-control form-control-user" required id="showDocument" placeholder="Enter Show Document">
                </div>

                <div class="form-group row">
                    <div class="col-sm-4 mb-4 mb-sm-0">
                        <button  formaction="<?php echo base_url() ?>jcpscAdmin/notice_print" class="btn btn-primary btn-user btn-block">Print</button>
                    </div>
                    <div class="col-sm-4 mb-4 mb-sm-0">
                        <button type="submit" class="btn btn-primary btn-user btn-block">Save</button>
                    </div>
                    <div class="col-sm-4 mb-4 mb-sm-0">
                        <button  formaction="<?php echo base_url() ?>jcpscAdmin/notice_store_and_print" class="btn btn-primary btn-user btn-block">Save & Print</button>
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
    defaultTime: '11',
    startTime: '10:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});

</script>