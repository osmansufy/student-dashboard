<div class="panel">
    <div style="  color: black;
    display: flex;
    justify-content: space-between;">
        <h5><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                href="#<?php echo $message_id ?>"><?php echo $message_title ?></h5>

        </a>
        <span style="color:black"><?php echo $message_date ?></span>

    </div>
    <div id="<?php echo $message_id ?>" class="panel-collapse collapse out">
        <div class="panel-body" style="color:#000;">
            <?php
                                    echo $message_content;
                                    ?>
        </div>
    </div>
</div>