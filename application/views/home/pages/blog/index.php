
<div class="blog-header text-center">
    <h2>Welcome to Our blog</h2>
</div>

<div class="container_fluid pt-5 pb-5">
    <div class="row justify-content-center">
        <?php if($posts){ ?>
        <?php foreach($posts->result() as $row){ ?>
        <div class="col-md-7 col-12 mb-5">
            <div class="brief-post-box">
                <div class="post-header">
                    <div class="row">
                        <div class="pr-0 col-1">
                            <div class="round-media">
                                <?php
                                    $img_url = lang('post_img');
                                    if($img = $row->img){
                                        $img_name = $row->id . $row->img;
                                        $img_url .= 'thumb/' . $img_name;
                                    }else{
                                        $img_url .= 'avatar.jpg';
                                    }
                                ?>
                                <img src="<?php echo $img_url; ?>" class="img-fluid">
                            </div>
                        </div>
                        <div class="pl-0 col-10 d-flex align-items-center">
                            <div class="post-title">
                                <h5 class="mb-0"><?php echo $row->title; ?></h5>
                                <p class="text-muted">
                                    <?php
                                        $date = explode(' ', $row->doc)[0];
                                        $date = explode('-', $date);
                                        echo num_to_month($date[1]) . ' ' . $date[2] . ', ' . $date[0];
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="post-details pt-3 mb-2 text-justify">
                    <?php
                        $content = strip_tags($row->content);
                        echo substr($content, 0, 400);
                    ?>
                </div>
                <a href="<?php echo lang('post_details') . $row->id . '/' . $row->seo_url; ?>" class="btn btn-primary">Read more --></a>
            </div>
        </div>
        <?php } ?>
        <?php } ?>
    </div>
</div>