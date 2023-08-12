<?php
    $message = get_message();

    if ($message):
?>
    <div class="position-fixed bottom-0 start-0 px-3 py-5">
        <div class="toast align-items-center text-bg-<?php echo $message['type']; ?> border-0" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <?php echo $message['content']; ?>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
    <?php clear_message(); ?>
<?php endif; ?>