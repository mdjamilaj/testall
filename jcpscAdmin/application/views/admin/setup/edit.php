<?php

var_dump($edit_data);

?>

<style>
    form.user .form-control-user{
            border-radius: 3px;
    }
</style>

<?php  ?>

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row justify-content-center">
          <div class="col-lg-8 justify-content-center">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Edit <?php echo $edit_data[0]->news_type ?> Page</h1>
              </div>
              <form class="user" action="<?php echo base_url() ?>jcpscAdmin/update" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                  <label for="" class="h6  text-right text-black pt-1 w-100 h-100"><i  style="border: 1px solid gray"  class="fas fa-pen p-2"></i> News Tittle English</label>
                  </div>
                  <div class="col-sm-8">
                    <input type="text" name="news_title" value="<?php echo $edit_data[0]->news_title  ?>" class="form-control form-control-user" id="exampleLastName" placeholder="Search Title">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <label for="" class="h6  text-right text-black pt-1 w-100 h-100"><i style="border: 1px solid gray" class="fas fa-pen p-2 shadow"></i> News Tittle Bangla</label>
                  </div>
                  <div class="col-sm-8">
                    <input type="text" name="news_title_bangla" value="<?php echo $edit_data[0]->news_title_bangla  ?>" class="form-control form-control-user" id="exampleLastName" placeholder="Search Title">
                  </div>
                </div>
                <div class="form-group">
                    <label for="" class="h6  text-left text-black pt-1 w-100 h-100"><i style="border: 1px solid gray" class="fas fa-pen p-2 shadow"></i> News Details English</label>
                </div>
                <div class="form-group">
                  <textarea type="text" name="news_details" class="form-control form-control-user" id="exampleLastName" placeholder="Content English details"><?php echo $edit_data[0]->news_details  ?></textarea>
                </div>


                <div class="form-group">
                    <label for="" class="h6  text-left text-black pt-1 w-100 h-100"><i style="border: 1px solid gray" class="fas fa-pen p-2 shadow"></i> News Details Bangla</label>
                </div>
                <div class="form-group">
                  <textarea type="text" name="news_details_bangla" class="form-control form-control-user" id="exampleLastName" placeholder="Content Bangla details"><?php echo $edit_data[0]->news_details_bangla  ?></textarea>
                </div>


                <div class="form-group row">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                  <label for="" class="h6  text-left text-black pt-1 w-100 h-100"><i  style="border: 1px solid gray"  class="fas fa-pen p-2"></i> News Date</label>
                  </div>
                  <div class="col-sm-8">
                    <input type="text" name="news_date" value="<?php echo $edit_data[0]->news_date  ?>" class="form-control form-control-user" id="exampleLastName" placeholder="Search Title">
                  </div>
                </div>


                <div class="form-group row">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                  <label for="" class="h6  text-left text-black pt-1 w-100 h-100"><i  style="border: 1px solid gray"  class="fas fa-pen p-2"></i> Show Document</label>
                  </div>
                  <div class="col-sm-8">
                    <input type="number" name="showDocument" value="<?php echo $edit_data[0]->showDocument  ?>" class="form-control form-control-user" id="exampleLastName" placeholder="Search Title">
                  </div>
                </div>


                <input type="hidden" value="<?php echo $edit_data[0]->news_id  ?>" name="news_id">
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Update
                </button>
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
    CKEDITOR.replace( 'news_details' );
    CKEDITOR.replace( 'news_details_bangla' );
</script>