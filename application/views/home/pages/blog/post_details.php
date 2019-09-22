<div class="container_fluid">
    <div class="row justify-content-center">

        <div class="col-md-7 col-12 mb-5">
            <a href="<?php echo lang("blog"); ?>" class="btn btn-warning mb-3"><-- Back to Blog</a>
            <div class="media mb-3">
                <?php
                    $img_url = lang('post_img');
                    if($img = $post[0]->img){
                        $img_name = $post[0]->id . $post[0]->img;
                        $img_url .= $img_name;
                    }else{
                        $img_url .= 'avatar.jpg';
                    }
                ?>
                <img src="<?php echo $img_url; ?>" class="img-fluid">
            </div>
            <div class="post-header">
                <div class="post-title mb-3">
                    <h5><?php echo $post[0]->title; ?></h5>
                    <p class="text-muted">
                        <?php
                            $date = explode(' ', $post[0]->doc)[0];
                            $date = explode('-', $date);
                            echo num_to_month($date[1]) . ' ' . $date[2] . ', ' . $date[0];
                        ?>
                    </p>
                </div>
            </div>
            <div class="post-details mb-2 text-justify">
                <?php
                    echo $post[0]->content;
                ?>
            </div>
        </div>
    </div>
</div>