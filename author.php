<?php
/**
 * The template for displaying Author pages
 *
 * @package Digitalia
 */

get_header();

// Get author data
$author_id = get_queried_object_id();
$author_name = get_the_author_meta('display_name', $author_id);
$author_bio = get_the_author_meta('description', $author_id);
$author_avatar = get_avatar_url($author_id);
$author_team = get_field('equipo', 'user_' . $author_id);

// Get color scheme for the team
$team_colors = digitalia_get_color_schemes('pill');
$team_color = isset($team_colors[$author_team]) ? $team_colors[$author_team] : 'bg-indigo-50';
?>
<section class="relative pt-36">
    <img src="https://pagedone.io/asset/uploads/1705471739.png" alt="cover-image" class="w-full absolute top-0 left-0 z-0 h-60 object-cover">
    <div class="w-full max-w-7xl mx-auto px-6 md:px-8">
        <div class="flex items-center justify-center relative z-10 mb-2.5">
            <img src="<?php echo esc_url($author_avatar); ?>" alt="user-avatar-image" class="border-4 border-solid border-white rounded-full object-cover">
        </div>
        <div class="flex flex-col sm:flex-row max-sm:gap-5 items-center justify-between mb-5">
            <ul class="flex items-center gap-5">
                <li> <a href="javascript:;" class="flex items-center gap-2 cursor-pointer group">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.5 14.0902L7.5 14.0902M2.5 9.09545V14.0902C2.5 15.6976 2.5 16.5013 2.98816 17.0006C3.47631 17.5 4.26198 17.5 5.83333 17.5H14.1667C15.738 17.5 16.5237 17.5 17.0118 17.0006C17.5 16.5013 17.5 15.6976 17.5 14.0902V10.9203C17.5 9.1337 17.5 8.24039 17.1056 7.48651C16.7112 6.73262 15.9846 6.2371 14.5313 5.24606L11.849 3.41681C10.9528 2.8056 10.5046 2.5 10 2.5C9.49537 2.5 9.04725 2.80561 8.151 3.41681L3.98433 6.25832C3.25772 6.75384 2.89442 7.0016 2.69721 7.37854C2.5 7.75548 2.5 8.20214 2.5 9.09545Z" stroke="black" stroke-width="1.6" stroke-linecap="round"></path>
                        </svg>
                        <span class="font-medium text-base leading-7 text-gray-900">Digitalia</span>
                    </a>
                </li>
                <li> <a href="javascript:;" class="flex items-center gap-2 cursor-pointer group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="5" height="20" viewBox="0 0 5 20" fill="none">
                            <path d="M4.12567 1.13672L1 18.8633" stroke="#E5E7EB" stroke-width="1.6" stroke-linecap="round"></path>
                        </svg>
                        <span class="font-medium text-base leading-7 text-gray-400">Equipo</span>
                    </a>
                </li>
                <li><a href="javascript:;" class="flex items-center gap-2 cursor-pointer group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="5" height="20" viewBox="0 0 5 20" fill="none">
                            <path d="M4.12567 1.13672L1 18.8633" stroke="#E5E7EB" stroke-width="1.6" stroke-linecap="round"></path>
                        </svg>
                        <span class="font-medium text-base leading-7 text-gray-400"><?php echo esc_html($author_name); ?></span>
                        <?php if ($author_team) : ?>
                            <span class="rounded-full py-1.5 px-2.5 <?php echo esc_attr($team_color); ?> flex items-center justify-center font-medium text-xs text-indigo-600"><?php echo esc_html($author_team); ?></span>
                        <?php endif; ?>
                    </a>
                </li>
            </ul>
            <div class="flex items-center gap-4">
                <button class="rounded-full border border-solid border-indigo-600 bg-indigo-600 py-3 px-4 text-sm font-semibold text-white whitespace-nowrap shadow-sm shadow-transparent transition-all duration-500 hover:shadow-gray-200 hover:bg-indigo-700 hover:border-indigo-700">Enviar un mensaje</button>
            </div>
        </div>
        <h3 class="text-center font-manrope font-bold text-3xl leading-10 text-gray-900 mb-3"><?php echo esc_html($author_name); ?></h3>
        <p class="font-normal text-base leading-7 text-gray-500 text-center mb-8"><?php echo esc_html($author_bio); ?></p>
        <div class="flex items-center justify-center gap-5">
            <?php if (have_rows('red_social', 'user_' . $author_id)) : ?>
                <div class="my-2 flex items-start gap-4">
                    <?php while (have_rows('red_social', 'user_' . $author_id)) : the_row(); 
                        $social_type = get_sub_field('red_social_item');
                        $profile_link = get_sub_field('link_al_perfil');
                        if ($profile_link) :
                            switch ($social_type) {
                                case 'facebook': ?>
                                    <a href="<?php echo esc_url($profile_link); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook size-4 text-muted-foreground"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                                    </a>
                                <?php break;
                                case 'twitter': ?>
                                    <a href="<?php echo esc_url($profile_link); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-twitter size-4 text-muted-foreground"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/></svg>
                                    </a>
                                <?php break;
                                case 'instagram': ?>
                                    <a href="<?php echo esc_url($profile_link); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram size-4 text-muted-foreground"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                                    </a>
                                <?php break;
                                case 'tiktok': ?>
                                    <a href="<?php echo esc_url($profile_link); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-music size-4 text-muted-foreground"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>
                                    </a>
                                <?php break;
                                case 'linkedin': ?>
                                    <a href="<?php echo esc_url($profile_link); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-linkedin size-4 text-muted-foreground"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/></svg>
                                    </a>
                                <?php break;
                                case 'youtube': ?>
                                    <a href="<?php echo esc_url($profile_link); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-youtube size-4 text-muted-foreground"><path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17"/><path d="m10 15 5-3-5-3z"/></svg>
                                    </a>
                                <?php break;
                            }
                        endif;
                    endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="pt-16 pb-24">
    <div class="container">
        <div class="grid gap-x-4 gap-y-8 md:grid-cols-3 lg:gap-x-6 lg:gap-y-12 2xl:grid-cols-3">
            <?php
            // Get author's posts
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            if (have_posts()) :
                while (have_posts()) : the_post();
                    // Get post category
                    $categories = get_the_category();
                    $category_name = !empty($categories) ? esc_html($categories[0]->name) : '';
                    ?>
                    <a href="<?php the_permalink(); ?>" class="group flex flex-col">
                        <div class="mb-4 flex text-clip rounded-xl md:mb-5">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium', array('class' => 'w-full h-auto rounded-xl')); ?>
                            <?php endif; ?>
                        </div>
                        <div class="flex flex-col">
                            <?php if ($category_name) : ?>
                                <span class="mb-2 text-sm font-medium text-indigo-600"><?php echo $category_name; ?></span>
                            <?php endif; ?>
                            <h3 class="mb-4 font-manrope text-xl font-bold leading-8 text-gray-900 group-hover:text-indigo-600 md:text-2xl">
                                <?php the_title(); ?>
                            </h3>
                            <div class="text-base font-normal leading-7 text-gray-500">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </a>
                <?php
                endwhile;
                
                // Pagination
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('Previous', 'digitalia'),
                    'next_text' => __('Next', 'digitalia'),
                ));
            else : ?>
                <p><?php _e('No posts found.', 'digitalia'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
get_footer();
