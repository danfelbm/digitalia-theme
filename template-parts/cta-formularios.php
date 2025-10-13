<?php
/**
 * Template part for displaying CTA form section
 *
 * @package Digitalia
 */

$args = wp_parse_args($args, array(
    'title' => 'Contáctanos',
    'description' => 'Completa el formulario y nos pondremos en contacto contigo pronto.',
    'background_class' => ''
));
?>

<section class="py-32 <?php echo esc_attr($args['background_class']); ?>">
    <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex w-full flex-col gap-16 overflow-hidden rounded-lg bg-accent p-8 md:rounded-xl lg:flex-row lg:items-center lg:p-16">
            <div class="flex-1">
                <h3 class="mb-3 text-2xl font-semibold md:mb-4 md:text-4xl lg:mb-6">
                    <?php echo esc_html($args['title']); ?>
                </h3>
                <p class="text-muted-foreground lg:text-lg">
                    <?php echo esc_html($args['description']); ?>
                </p>
            </div>
            <div class="shrink-0">
                <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 2 ) ); ?>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('ctaForm');
    const formMessage = document.getElementById('formMessage');

    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Hide form fields
            const formFields = form.querySelectorAll('input, button');
            formFields.forEach(field => {
                field.style.display = 'none';
            });

            // Show success message
            formMessage.classList.remove('hidden');
            formMessage.classList.add('block');
        });
    }
});
</script>
