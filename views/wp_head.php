<style type="text/css">
</style>
<script>
jQuery(document).ready(function($) {
    $.supersized({
        slide_interval: 3000,
        transition: 1,
        transition_speed: 700,
        slide_links: 'blank',
        slides: [
        <?php $slides = rwm_supersized(); ?>
        <?php foreach ($slides as $slide): ?>
            {
                image: '<?php echo $slide->guid; ?>',
                title: '<?php echo $slide->post_title; ?>',
            },
        <?php endforeach; ?>
        ]
    });
});
</script>