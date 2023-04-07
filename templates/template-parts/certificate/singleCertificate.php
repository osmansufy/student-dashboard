<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-body py-4">
                <div style="
                    position: relative;
                    width: 600px;
                    height: 430px;
                    margin: 0 auto;
                    ">
                    <iframe src="<?php echo $certificate_url ?>#toolbar=0&navpanes=0" width="100%" height="100%" frameborder="0" style="border:0">


                    </iframe>
                    <div style="position:absolute; top:0; left:0; bottom:0;
                    right:0; width:100%; height: 100%;
                     margin:0; padding:0; border:none">
                        <img alt="watermark" src="<?php echo plugin_dir_url(dirname(__FILE__)) . '../../assets/images/water-mark.png' ?>" />

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <a type="button" href="<?php echo site_url() . '/certificate' ?>" target="_blank" class="btn btn-primary">
                    <i class="far fa-file-pdf" style="margin-right:7px;"></i>
                    Order Certificate
                </a>
            </div>
        </div>
    </div>
</div>