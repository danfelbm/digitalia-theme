<?php
/**
 * The template for displaying FAQ archive
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    // Get archive information
    $archive_title = 'Preguntas Frecuentes';
    $archive_description = 'Encuentra respuestas a las preguntas más comunes.';

    get_template_part('template-parts/page-header', null, array(
        'title' => $archive_title,
        'subtitle' => $archive_description,
        'show_cta' => false
    ));
    ?>

    <style>
        .faq-content {
            display: block;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
            visibility: hidden;
            opacity: 0;
            transition: max-height 0.3s ease-out, opacity 0.2s ease-out;
        }
        .faq-content.active {
            max-height: none;
            opacity: 1;
            visibility: visible;
        }
        .faq-button svg {
            transition: transform 0.3s ease;
        }
        .faq-header {
            display: flex;
            align-items: center;
            width: 100%;
            gap: 1rem;
        }
        .faq-title {
            flex-grow: 1;
        }
        .share-button {
            padding: 0.5rem;
            color: #6B7280;
            transition: color 0.2s;
        }
        .share-button:hover {
            color: #374151;
        }
        .share-button.copied {
            color: #059669;
        }
    </style>

    <section class="py-32">
        <div class="container">
            <div>
                <div class="inline-flex items-center rounded-full border px-2.5 py-0.5 transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-primary text-primary-foreground hover:bg-primary/80 text-xs font-medium">FAQ</div>
                <h1 class="mt-4 text-4xl font-semibold"><?php echo esc_html($archive_title); ?></h1>
                <p class="mt-6 font-medium text-muted-foreground"><?php echo esc_html($archive_description); ?></p>

                <?php if (have_posts()) : ?>
                    <div class="space-y-4 mt-8">
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="faq-item bg-white rounded-lg shadow-sm border border-gray-100">
                                <div class="faq-header p-4">
                                    <button class="faq-button flex-grow flex items-center justify-between font-medium hover:text-gray-500 text-left">
                                        <h3 class="text-lg faq-title"><?php the_title(); ?></h3>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                                    </button>
                                    <button class="share-button" title="Copy link to FAQ" data-permalink="<?php echo esc_url(get_permalink()); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                                    </button>
                                </div>
                                <div class="faq-content px-4 pb-4">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>

                    <?php
                    the_posts_pagination(array(
                        'prev_text' => __('Previous page', 'digitalia'),
                        'next_text' => __('Next page', 'digitalia'),
                    ));
                    ?>

                <?php else : ?>
                    <p class="mt-8"><?php esc_html_e('No FAQs found.', 'digitalia'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php 
wp_enqueue_script('digitalia-faq-accordion', get_template_directory_uri() . '/js/faq-accordion.js', array(), '1.0', true);
// Add a small script to handle the copy link functionality
?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const shareButtons = document.querySelectorAll('.share-button');
    
    shareButtons.forEach(button => {
        button.addEventListener('click', async function(e) {
            e.preventDefault();
            const permalink = this.dataset.permalink;
            
            try {
                await navigator.clipboard.writeText(permalink);
                this.classList.add('copied');
                
                // Reset the button state after 2 seconds
                setTimeout(() => {
                    this.classList.remove('copied');
                }, 2000);
            } catch (err) {
                console.error('Failed to copy link:', err);
            }
        });
    });
});
</script>

<?php get_footer(); ?>
