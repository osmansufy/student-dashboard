<div class="accordion-item mb-2">
    <h2 class="accordion-header" id="flush-heading<?php echo $message_id; ?>">
        <button class="accordion-button collapsed text-white  bg-gradient" style="background-color: #7BA631;" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $message_id; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $message_id; ?>">
            <?php echo $message_title; ?>
        </button>
    </h2>
    <div id="flush-collapse<?php echo $message_id; ?>" class="accordion-collapse collapse text-dark" aria-labelledby="flush-heading<?php echo $message_id; ?>" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
            <?php echo $message_content; ?>
        </div>
    </div>

</div>