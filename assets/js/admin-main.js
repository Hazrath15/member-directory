jQuery(document).ready(function ($) {
    $('.medir-upload-btn').on('click', function (e) {
        e.preventDefault();

        const targetInputId = $(this).data('target');
        const imagePreviewId = targetInputId.replace('medir_', '') + '_preview';

        const mediaUploader = wp.media({
            title: 'Select Image',
            button: {
                text: 'Use this image'
            },
            multiple: false
        });

        mediaUploader.on('select', function () {
            const attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#' + targetInputId).val(attachment.url);
            $('#' + imagePreviewId).attr('src', attachment.url);
        });

        mediaUploader.open();
    });
});
