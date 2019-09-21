
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php $this->load->view('admin/inc/topnav'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Create Post</h1>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
              <?php echo validation_errors(); ?>
            </div>
            <div class="card-body">
              <?php
                $form_attr = array(
                  'id' => 'postcreate'
                );
                echo form_open_multipart(current_url(), $form_attr);
              ?>

                <div class="form-row">
                  <div class="col-md-6">
                    <label for="">Post Title</label>
                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        value="<?php echo $post->title; ?>">
                  </div>
                  <div class="col-md-6">
                    <label for="">Post Images</label>
                    <input
                        type="file"
                        name="image"
                        class="form-control-file">
                  </div>
                </div>

                <div class="form-row mb-2">
                  <div class="col-md-6">
                    <label for="">Post Content(Rich Text Editor)</label>
                    <textarea
                        id="post_content"
                        name="post_content"><?php echo $post->content; ?></textarea>
                  </div>

                </div>

                <input type="submit" value="submit" class="btn btn-primary">

              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
