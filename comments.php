<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package digitalia
 */

if (post_password_required()) {
    return;
}
?>

<section id="comments" class="not-format pt-12">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">
            <?php
            $digitalia_comment_count = get_comments_number();
            if ('1' === $digitalia_comment_count) {
                printf(
                    /* translators: 1: title. */
                    esc_html__('One thought on "%1$s"', 'digitalia'),
                    '<span>' . wp_kses_post(get_the_title()) . '</span>'
                );
            } else {
                printf(
                    /* translators: 1: comment count number, 2: title. */
                    esc_html(_nx('%1$s Comments', '%1$s Comments', $digitalia_comment_count, 'comments title', 'digitalia')),
                    number_format_i18n($digitalia_comment_count)
                );
            }
            ?>
        </h2>
    </div>

    <?php if (comments_open()) : ?>
        <div id="respond" class="mb-6">
            <?php
            comment_form(array(
                'class_form' => 'space-y-4',
                'title_reply' => '',
                'title_reply_before' => '',
                'title_reply_after' => '',
                'logged_in_as' => '',
                'comment_notes_before' => '',
                'comment_field' => sprintf(
                    '<div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                        <label for="comment" class="sr-only">%s</label>
                        <textarea id="comment" name="comment" rows="6" 
                            class="w-full px-4 py-2 text-sm text-gray-900 bg-white border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" 
                            placeholder="%s" required></textarea>
                    </div>',
                    _x('Comment', 'noun'),
                    __('Write a comment...')
                ),
                'submit_button' => '<button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">%s</button>',
                'submit_field' => '<div class="flex items-center justify-end">%1$s %2$s</div>',
                'class_submit' => '',
            ));
            ?>
        </div>
    <?php endif; ?>

    <?php if (have_comments()) : ?>
        <div class="comment-list space-y-4">
            <?php
            wp_list_comments(array(
                'style' => 'div',
                'short_ping' => true,
                'callback' => function ($comment, $args, $depth) {
                    $GLOBALS['comment'] = $comment;
                    ?>
                    <article <?php comment_class('p-6 text-base bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700' . ($depth > 1 ? ' ml-6 lg:ml-12' : '')); ?>>
                        <footer class="flex justify-between items-center mb-2">
                            <div class="flex items-center">
                                <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white">
                                    <?php echo get_avatar($comment, 24, '', '', array('class' => 'mr-2 w-6 h-6 rounded-full')); ?>
                                    <?php comment_author_link(); ?>
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    <time datetime="<?php echo get_comment_date('c'); ?>" title="<?php echo get_comment_date(); ?>">
                                        <?php echo get_comment_date(); ?>
                                    </time>
                                </p>
                            </div>
                            <?php if (current_user_can('edit_comment', $comment->comment_ID)) : ?>
                                <div class="relative">
                                    <button id="dropdownComment<?php echo $comment->comment_ID; ?>Button" 
                                            data-dropdown-toggle="dropdownComment<?php echo $comment->comment_ID; ?>" 
                                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" 
                                            type="button">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                        </svg>
                                        <span class="sr-only">Comment settings</span>
                                    </button>
                                    <div id="dropdownComment<?php echo $comment->comment_ID; ?>" 
                                         class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">
                                            <li>
                                                <?php edit_comment_link(__('Edit'), '<a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">', '</a>'); ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </footer>
                        <div class="text-gray-800 dark:text-gray-200">
                            <?php comment_text(); ?>
                        </div>
                        <?php if ($args['max_depth'] > $depth) : ?>
                            <div class="flex items-center mt-4 space-x-4">
                                <?php
                                comment_reply_link(array_merge($args, array(
                                    'depth' => $depth,
                                    'max_depth' => $args['max_depth'],
                                    'reply_text' => sprintf(
                                        '<span class="flex items-center font-medium text-sm text-gray-500 hover:underline dark:text-gray-400"><svg class="mr-1.5 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18"><path d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z"/></svg>%s</span>',
                                        __('Reply', 'digitalia')
                                    ),
                                    'before' => '',
                                    'after' => ''
                                )));
                                ?>
                            </div>
                        <?php endif; ?>
                    </article>
                    <?php
                }
            ));
            ?>
        </div>

        <?php the_comments_navigation(); ?>

        <?php if (!comments_open()) : ?>
            <p class="no-comments text-gray-600 dark:text-gray-400"><?php esc_html_e('Comments are closed.', 'digitalia'); ?></p>
        <?php endif; ?>
    <?php endif; ?>
</section>
