<div class="modal " id="transcriptModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-body py-4">
                <div style="
                    position: relative;
                    width: 100%;
                 aspect-ratio:1;
                    ">
                    <iframe src="<?php echo $transcript_url ?>" width="100%" height="100%" frameborder="0"
                        style="border:0">
                    </iframe>

                </div>

            </div>
            <div class="modal-footer">
                <a type="button" href="<?php echo site_url() . '/certificate' ?>" target="_blank"
                    class="btn btn-primary">
                    <i class="far fa-file-pdf" style="margin-right:7px;"></i>
                    Order Certificate
                </a>
            </div>
        </div>
    </div>
</div>