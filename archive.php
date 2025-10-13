<?php
/**
 * The template for displaying archive pages
 *
 * @package digitalia
 */

get_header();

// Get current post type
$current_post_type = get_post_type();
if (is_post_type_archive()) {
    $current_post_type = get_queried_object()->name;
}

// Get total number of posts
$total_posts = wp_count_posts($current_post_type)->publish;

// Get all categories and tags used in current post type
$post_categories = get_categories(array(
    'taxonomy' => 'category',
    'object_type' => array($current_post_type)
));

$post_tags = get_tags(array(
    'object_type' => array($current_post_type)
));

// Get all post IDs for filtering (used by JavaScript)
$all_posts_query = new WP_Query(array(
    'post_type' => $current_post_type,
    'posts_per_page' => -1,
    'fields' => 'ids'
));
$all_post_ids = $all_posts_query->posts;
wp_reset_postdata();

// Query to get initial posts (20 per page)
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$posts_per_page = 20;

$posts_query = new WP_Query(array(
    'post_type' => $current_post_type,
    'posts_per_page' => $posts_per_page,
    'paged' => $paged,
    'orderby' => 'date',
    'order' => 'DESC'
));

// Calculate total pages
$total_pages = ceil($total_posts / $posts_per_page);
?>

<main id="primary" class="site-main bg-gray-50 min-h-screen py-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Archive Header -->
        <header class="relative mb-12 text-center">
            <div class="absolute inset-0 -z-10">
                <div class="absolute inset-0 bg-gradient-to-br from-purple-100/50 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 h-1/2 bg-gradient-to-t from-gray-50 to-transparent"></div>
            </div>
            <div class="max-w-3xl mx-auto pt-8 pb-12">
                <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-4">
                    <?php 
                    if ($current_post_type === 'podcast') {
                        echo 'Nuestro Podcast';
                    } else {
                        post_type_archive_title();
                    }
                    ?>
                </h1>
                <?php if ($current_post_type === 'producto') : ?>
                    <p class="text-xl text-gray-600 mb-6">Plataforma de lanzamiento de productos realizados en talleres Co-Laboratorios producidos por organizaciones sociales y población diferencial. Estos productos representan el resultado tangible de nuestro compromiso con el empoderamiento digital y la construcción de paz mediática.</p>
                <?php endif; ?>
                <?php if ($total_posts > 0) : ?>
                    <p class="text-xl text-gray-600 mb-6">
                        <?php 
                        if ($current_post_type === 'podcast') {
                            printf(
                                _n(
                                    'Descubre nuestra colección de %s episodio',
                                    'Descubre nuestra colección de %s episodios',
                                    $total_posts,
                                    'digitalia'
                                ),
                                number_format_i18n($total_posts)
                            );
                        } else {
                            printf(
                                _n(
                                    'Descubre nuestra colección de %s entrada',
                                    'Descubre nuestra colección de %s entradas',
                                    $total_posts,
                                    'digitalia'
                                ),
                                number_format_i18n($total_posts)
                            );
                        }
                        ?>
                    </p>
                <?php endif; ?>
                <?php
                $archive_description = get_the_archive_description();
                if ($archive_description) : ?>
                    <div class="prose max-w-2xl mx-auto text-gray-600">
                        <?php echo wp_kses_post($archive_description); ?>
                    </div>
                <?php endif; ?>
            </div>
        </header>

        <?php if ($posts_query->have_posts()) : ?>
            <!-- Filter Navigation -->
            <div class="mb-8">
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="space-y-6">
                        <!-- Categories Filter -->
                        <?php if ($post_categories) : ?>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Categorías</h3>
                            <div class="flex flex-wrap gap-2" id="category-filters">
                                <?php foreach ($post_categories as $category) : ?>
                                    <button 
                                        class="filter-btn px-3 py-1 rounded-full text-sm font-medium transition-colors"
                                        data-type="category"
                                        data-id="<?php echo esc_attr($category->term_id); ?>"
                                    >
                                        <?php echo esc_html($category->name); ?>
                                        <span class="ml-1 text-xs">(<?php echo $category->count; ?>)</span>
                                    </button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Tags Filter -->
                        <?php if ($post_tags) : ?>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Etiquetas</h3>
                            <div class="flex flex-wrap gap-2" id="tag-filters">
                                <?php foreach ($post_tags as $tag) : ?>
                                    <button 
                                        class="filter-btn px-3 py-1 rounded-full text-sm font-medium transition-colors"
                                        data-type="tag"
                                        data-id="<?php echo esc_attr($tag->term_id); ?>"
                                    >
                                        <?php echo esc_html($tag->name); ?>
                                        <span class="ml-1 text-xs">(<?php echo $tag->count; ?>)</span>
                                    </button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Active Filters -->
                        <div id="active-filters" class="hidden border-t pt-4">
                            <h3 class="text-sm font-medium text-gray-700 mb-2">Filtros activos:</h3>
                            <div class="flex flex-wrap gap-2" id="active-filters-list"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Posts Grid -->
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3" id="episodes-grid" data-total-pages="<?php echo esc_attr($total_pages); ?>" data-current-page="1">
                <?php
                while ($posts_query->have_posts()) :
                    $posts_query->the_post();
                    // Get post terms
                    $post_categories = get_the_category();
                    $post_tags = get_the_tags();
                    $term_ids = array();
                    
                    if ($post_categories) {
                        foreach ($post_categories as $cat) {
                            $term_ids[] = 'category-' . $cat->term_id;
                        }
                    }
                    if ($post_tags) {
                        foreach ($post_tags as $tag) {
                            $term_ids[] = 'tag-' . $tag->term_id;
                        }
                    }
                    
                    // Get ACF fields only for podcast post type
                    $is_podcast = get_post_type() === 'podcast';
                    $episode_excerpt = $is_podcast ? get_field('episode_excerpt') : '';
                    $episode_duration = $is_podcast ? get_field('episode_duration') : '';
                    $episode_audio = $is_podcast ? get_field('episode_audio') : '';
                    $episode_number = $is_podcast ? get_field('episode_number') : '';
                    $episode_season = $is_podcast ? get_field('episode_season') : '';
                ?>
                    <article <?php post_class('podcast-episode group bg-white rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden flex flex-col'); ?> data-terms="<?php echo esc_attr(implode(' ', $term_ids)); ?>">
                        <!-- Thumbnail -->
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="block aspect-[16/9] overflow-hidden bg-gray-100 relative">
                                <?php the_post_thumbnail('medium_large', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-300']); ?>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span class="px-4 py-2 bg-white/90 text-gray-900 rounded-full text-sm font-medium">
                                        <?php echo $is_podcast ? 'Ver Episodio' : 'Ver Entrada'; ?>
                                    </span>
                                </div>
                            </a>
                        <?php endif; ?>

                        <!-- Post Info -->
                        <div class="flex-1 p-6">
                            <!-- Episode Number (only for podcasts) -->
                            <?php if ($is_podcast && ($episode_number || $episode_season)) : ?>
                                <div class="text-sm font-medium text-purple-600 mb-2">
                                    <?php
                                    if ($episode_season) {
                                        printf('Temporada %d', $episode_season);
                                        if ($episode_number) echo ' • ';
                                    }
                                    if ($episode_number) {
                                        printf('Episodio %d', $episode_number);
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>

                            <!-- Title -->
                            <h2 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-purple-700 transition-colors">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                            <!-- Metadata -->
                            <div class="flex items-center gap-4 text-sm text-gray-600 mb-4">
                                <time datetime="<?php echo get_the_date('c'); ?>" class="flex items-center gap-1.5">
                                    <i class="fa-regular fa-calendar text-gray-400"></i>
                                    <?php echo get_the_date(); ?>
                                </time>
                                <?php if ($is_podcast && $episode_duration) : ?>
                                    <div class="flex items-center gap-1.5">
                                        <i class="fa-regular fa-clock text-gray-400"></i>
                                        <?php echo esc_html($episode_duration); ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Categories -->
                            <?php
                            $categories = get_the_category();
                            if ($categories) : ?>
                                <div class="flex flex-wrap gap-2 mb-2">
                                    <?php foreach ($categories as $category) : ?>
                                        <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" 
                                           class="px-2 py-1 text-xs font-medium text-purple-700 bg-purple-50 rounded-full hover:bg-purple-100 transition-colors">
                                            <?php echo esc_html($category->name); ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <!-- Tags -->
                            <?php
                            $tags = get_the_tags();
                            if ($tags) : ?>
                                <div class="flex flex-wrap gap-2 mb-4">
                                    <?php foreach ($tags as $tag) : ?>
                                        <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" 
                                           class="px-2 py-1 text-xs font-medium text-gray-600 bg-gray-50 rounded-full hover:bg-gray-100 transition-colors">
                                            #<?php echo esc_html($tag->name); ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <!-- Excerpt -->
                            <?php if ($episode_excerpt || has_excerpt()) : ?>
                                <p class="text-gray-600 mb-6 line-clamp-2">
                                    <?php echo $episode_excerpt ?: get_the_excerpt(); ?>
                                </p>
                            <?php endif; ?>

                            <!-- Audio Player (only for podcasts) -->
                            <?php if ($is_podcast && $episode_audio) : ?>
                                <div class="mt-auto pt-4">
                                    <div class="flex items-center gap-3 bg-gray-50 p-3 rounded-xl">
                                        <button 
                                            onclick="togglePlay(this, '<?php echo get_the_ID(); ?>')"
                                            class="w-10 h-10 flex items-center justify-center bg-purple-600 hover:bg-purple-700 rounded-full text-white transition-all"
                                            data-playing="false"
                                            aria-label="Reproducir audio"
                                        >
                                            <i class="fa-solid fa-play text-sm"></i>
                                        </button>
                                        <audio 
                                            id="audio-<?php echo get_the_ID(); ?>"
                                            class="flex-1 h-10 w-full"
                                            controls
                                            onplay="updateOtherPlayers(this.id)"
                                        >
                                            <source src="<?php echo esc_url($episode_audio); ?>" type="audio/mpeg">
                                            Tu navegador no soporta el elemento de audio.
                                        </audio>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <!-- Loading Indicator -->
            <div id="loading-indicator" class="hidden text-center py-8">
                <div class="inline-block animate-spin rounded-full h-8 w-8 border-4 border-gray-200 border-t-purple-600"></div>
            </div>

            <!-- No Results Message -->
            <div id="no-results" class="hidden text-center py-12">
                <div class="mb-4">
                    <i class="fa-regular fa-face-frown text-4xl text-gray-400"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">No se encontraron entradas</h2>
                <p class="text-gray-600">No hay entradas que coincidan con los filtros seleccionados.</p>
                <button id="clear-filters" class="mt-4 px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors">
                    Limpiar filtros
                </button>
            </div>

        <?php else : ?>
            <div class="text-center py-12">
                <div class="mb-4">
                    <i class="fa-regular fa-face-frown text-4xl text-gray-400"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">No se encontraron entradas</h2>
                <p class="text-gray-600">Parece que aún no hemos publicado ninguna entrada. ¡Vuelve pronto!</p>
            </div>
        <?php endif; ?>
    </div>
</main>

<!-- Filter Scripts -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const posts = document.querySelectorAll('.podcast-episode');
    const noResults = document.getElementById('no-results');
    const activeFilters = document.getElementById('active-filters');
    const activeFiltersList = document.getElementById('active-filters-list');
    const grid = document.getElementById('episodes-grid');
    const loadingIndicator = document.getElementById('loading-indicator');
    
    let isLoading = false;
    const currentPage = parseInt(grid.dataset.currentPage);
    const totalPages = parseInt(grid.dataset.totalPages);
    
    // Store all post IDs and their terms for filtering
    const allPostIds = <?php echo json_encode($all_post_ids); ?>;
    const postTerms = new Map();
    posts.forEach(post => {
        postTerms.set(post.dataset.id, post.dataset.terms.split(' '));
    });

    const activeTerms = {
        category: new Set(),
        tag: new Set()
    };

    // Lazy Load Function
    async function loadMorePosts() {
        if (isLoading || currentPage >= totalPages) return;
        
        isLoading = true;
        loadingIndicator.classList.remove('hidden');
        
        const nextPage = currentPage + 1;
        
        try {
            const response = await fetch(`${window.location.pathname}?paged=${nextPage}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            
            if (!response.ok) throw new Error('Network response was not ok');
            
            const data = await response.text();
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = data;
            
            const newPosts = tempDiv.querySelectorAll('.podcast-episode');
            newPosts.forEach(post => {
                if (shouldShowPost(post.dataset.terms.split(' '))) {
                    grid.appendChild(post);
                    postTerms.set(post.dataset.id, post.dataset.terms.split(' '));
                }
            });
            
            grid.dataset.currentPage = nextPage;
            
        } catch (error) {
            console.error('Error loading more posts:', error);
        } finally {
            isLoading = false;
            loadingIndicator.classList.add('hidden');
        }
    }

    // Intersection Observer for infinite scroll
    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting && !isLoading) {
            loadMorePosts();
        }
    }, { rootMargin: '100px' });

    if (loadingIndicator) {
        observer.observe(loadingIndicator);
    }

    function shouldShowPost(terms) {
        if (!activeTerms.category.size && !activeTerms.tag.size) return true;

        let showPost = true;

        if (activeTerms.category.size > 0) {
            const hasCategory = terms.some(term => 
                term.startsWith('category-') && activeTerms.category.has(term.replace('category-', ''))
            );
            showPost = showPost && hasCategory;
        }

        if (activeTerms.tag.size > 0) {
            const hasTag = terms.some(term => 
                term.startsWith('tag-') && activeTerms.tag.has(term.replace('tag-', ''))
            );
            showPost = showPost && hasTag;
        }

        return showPost;
    }

    // Filter function
    function filterPosts() {
        let visibleCount = 0;
        const hasActiveFilters = activeTerms.category.size > 0 || activeTerms.tag.size > 0;

        posts.forEach(post => {
            const terms = post.dataset.terms.split(' ');
            const show = !hasActiveFilters || shouldShowPost(terms);
            post.style.display = show ? '' : 'none';
            if (show) visibleCount++;
        });

        // Show/hide no results message
        noResults.style.display = visibleCount === 0 ? 'block' : 'none';
        
        // Reset lazy loading
        grid.dataset.currentPage = '1';
        if (visibleCount > 0 && !isLoading) {
            loadMorePosts();
        }

        // Update active filters display
        updateActiveFilters();
    }

    // Update active filters display
    function updateActiveFilters() {
        const hasActiveFilters = activeTerms.category.size > 0 || activeTerms.tag.size > 0;
        activeFilters.classList.toggle('hidden', !hasActiveFilters);
        
        if (hasActiveFilters) {
            activeFiltersList.innerHTML = '';
            filterButtons.forEach(btn => {
                if (activeTerms[btn.dataset.type].has(btn.dataset.id)) {
                    const filterTag = document.createElement('span');
                    filterTag.className = 'px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm font-medium flex items-center gap-2';
                    filterTag.innerHTML = `
                        ${btn.textContent.trim().split('(')[0].trim()}
                        <button class="remove-filter" data-type="${btn.dataset.type}" data-id="${btn.dataset.id}">
                            <i class="fa-solid fa-times"></i>
                        </button>
                    `;
                    activeFiltersList.appendChild(filterTag);
                }
            });
        }
    }

    // Click handler for filter buttons
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const type = this.dataset.type;
            const id = this.dataset.id;

            if (activeTerms[type].has(id)) {
                activeTerms[type].delete(id);
                setActiveStyle(this, false);
            } else {
                activeTerms[type].add(id);
                setActiveStyle(this, true);
            }

            filterPosts();
        });
    });

    // Style functions
    function setActiveStyle(button, active = false) {
        if (active) {
            button.classList.remove('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
            button.classList.add('bg-purple-100', 'text-purple-700', 'hover:bg-purple-200');
        } else {
            button.classList.remove('bg-purple-100', 'text-purple-700', 'hover:bg-purple-200');
            button.classList.add('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
        }
    }

    // Initialize button styles
    filterButtons.forEach(btn => setActiveStyle(btn, false));

    // Click handler for removing active filters
    activeFiltersList.addEventListener('click', function(e) {
        const removeButton = e.target.closest('.remove-filter');
        if (removeButton) {
            const type = removeButton.dataset.type;
            const id = removeButton.dataset.id;
            
            activeTerms[type].delete(id);
            const filterBtn = document.querySelector(`.filter-btn[data-type="${type}"][data-id="${id}"]`);
            if (filterBtn) setActiveStyle(filterBtn, false);
            
            filterPosts();
        }
    });

    // Clear all filters
    if (document.getElementById('clear-filters')) {
        document.getElementById('clear-filters').addEventListener('click', function() {
            activeTerms.category.clear();
            activeTerms.tag.clear();
            filterButtons.forEach(btn => setActiveStyle(btn, false));
            filterPosts();
        });
    }
});
</script>

<!-- Audio Player Scripts -->
<script>
function togglePlay(button, postId) {
    const audio = document.getElementById(`audio-${postId}`);
    const icon = button.querySelector('i');
    
    if (audio.paused) {
        audio.play();
        icon.classList.remove('fa-play');
        icon.classList.add('fa-pause');
        button.dataset.playing = 'true';
        button.setAttribute('aria-label', 'Pausar audio');
    } else {
        audio.pause();
        icon.classList.remove('fa-pause');
        icon.classList.add('fa-play');
        button.dataset.playing = 'false';
        button.setAttribute('aria-label', 'Reproducir audio');
    }
}

function updateOtherPlayers(currentId) {
    // Pause all other audio players
    document.querySelectorAll('audio').forEach(audio => {
        if (audio.id !== currentId) {
            audio.pause();
            const button = audio.parentElement.querySelector('button');
            const icon = button.querySelector('i');
            icon.classList.remove('fa-pause');
            icon.classList.add('fa-play');
            button.dataset.playing = 'false';
            button.setAttribute('aria-label', 'Reproducir audio');
        }
    });
}

// Update play button when audio ends
document.querySelectorAll('audio').forEach(audio => {
    audio.addEventListener('ended', () => {
        const button = audio.parentElement.querySelector('button');
        const icon = button.querySelector('i');
        icon.classList.remove('fa-pause');
        icon.classList.add('fa-play');
        button.dataset.playing = 'false';
        button.setAttribute('aria-label', 'Reproducir audio');
    });
});
</script>

<?php
wp_reset_postdata();
get_footer();