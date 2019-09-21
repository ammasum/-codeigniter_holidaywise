    <?php $this->load->view('admin/inc/delete_model'); ?>
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
          <h1 class="h3 mb-2 text-gray-800">Post List</h1>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <p>
                <?php echo $this->session->flashdata('body_message'); ?>
                </p>
                <?php echo validation_errors(); ?>
            </div>
            <div class="card-body">

                <?php if($posts){ ?>
                <div class="table-responsive-md">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Created On</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($posts->result() as $row){ ?>
                            <tr>
                                <?php
                                    $tmp_img = lang('post_img_thumb');
                                    if($img = $row->img){
                                        $tmp_img .= $row->id . $img;
                                    }
                                ?>
                                <th>
                                    <img src="<?php echo $tmp_img; ?>" style="width: 120px;height: 80px">
                                </th>
                                <td class="align-middle"><?php echo $row->title; ?></td>
                                <td class="align-middle"><?php echo $row->doc; ?></td>
                                <td class="align-middle">
                                    <a href="<?php echo lang('edit_post') . $row->id; ?>">Edit</a>
                                    <a href="<?php echo lang('delete_post') . $row->id; ?>">Delete</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php } ?>

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
    <script>
      var delete_url = baseUrl + 'admin/delete_post/';
      function delete(){
        window.location.href = delete_url;
      }
      function set_id(id){
        delete_url += id;
      }

    </script>