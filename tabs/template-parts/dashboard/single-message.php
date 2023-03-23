<div class="accordion-item">
    <h2 class="accordion-header" id="flush-heading<?php echo $message_id; ?>">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $message_id; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $message_id; ?>">
            <?php echo $message_title; ?>
        </button>
    </h2>
    <div id="flush-collapse<?php echo $message_id; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $message_id; ?>" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
            <?php echo $message_content; ?>
        </div>
    </div>

</div>