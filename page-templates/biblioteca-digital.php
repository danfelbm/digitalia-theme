<?php

/**
 * Template Name: Biblioteca Digital
 *
 * @package Digitalia
 */
get_header();
?>

<main id="primary" class="site-main">

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

    <div id="app" class="lg:container">
        <div v-if="isLoading" class="fixed inset-0 bg-black/50 z-9999 flex items-center justify-center">
            <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center justify-center gap-3 w-48">
                <i class="fas fa-circle-notch text-3xl text-black animate-spin"></i>
                <span class="text-black text-base font-medium">Cargando...</span>
            </div>
        </div>
        <section class="overflow-hidden rounded-[0.5rem] border bg-background shadow">
            <!-- Mobile Toggle Button -->
            <button @click="toggleSidebar" class="md:hidden fixed right-4 top-1/2 -translate-y-1/2 z-50 bg-primary text-white rounded-full p-3 shadow-lg">
                <i class="fas fa-bars h-6 w-6"></i>
            </button>

            <div :class="['bg-background', {'grid lg:grid-cols-5': !isSidebarOpen}]">
                <!-- Sidebar -->
                <div :class="['pb-12 col-span-2 lg:col-span-1 transform transition-transform duration-300 ease-in-out md:transform-none overflow-y-auto', isSidebarOpen ? 'fixed inset-y-0 right-0 z-9999 w-80 bg-background shadow-lg md:mt-0' : 'hidden md:block']">
                    <!-- Close button for mobile -->
                    <button v-if="isSidebarOpen" @click="toggleSidebar" class="md:hidden fixed right-4 top-1/2 -translate-y-1/2 z-9999 bg-primary text-white rounded-full p-3 shadow-lg">
                        <i class="fas fa-times h-6 w-6"></i>
                    </button>
                    <!-- Reset Filters Button -->
                    <div class="px-3 py-2">
                        <button @click="resetFilters" class="w-full inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-9 px-4 py-2">
                            Restablecer filtros
                        </button>
                    </div>
                    <!-- Post Types -->
                    <div class="px-3 py-2">
                        <h2 class="mb-2 px-4 text-lg font-semibold tracking-tight">Contenidos Digitalia</h2>
                        <div class="space-y-1">
                            <button v-for="type in postTypes" 
                                    :key="type.slug"
                                    @click="selectPostType(type)"
                                    :class="[
                                        'inline-flex items-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 h-9 px-4 py-2 w-full justify-start',
                                        (selectedPostType && selectedPostType.slug === type.slug) ? 'bg-teal-300 text-secondary-foreground shadow-sm' : 'hover:bg-teal-100 hover:text-accent-foreground'
                                    ]">
                                {{ type.name }}
                            </button>
                        </div>
                    </div>
                    <!-- Other Taxonomies -->
                    <div v-if="selectedPostType && otherTaxonomies.length > 0" class="space-y-4">
                        <div v-for="tax in otherTaxonomies" :key="tax.slug" class="rounded-lg border p-4 mx-4">
                            <h3 class="text-lg font-semibold mb-2">{{ tax.name }}</h3>
                            <div class="space-y-1">
                                <button v-for="term in tax.terms"
                                        :key="term.id"
                                        @click="selectTerm({term: term, taxonomy: tax})"
                                        :class="[
                                            'inline-flex items-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 h-9 px-4 py-2 w-full justify-start',
                                            (selectedTerms[tax.slug]?.some(t => t.id === term.id)) ? 'bg-secondary text-secondary-foreground shadow-sm' : 'hover:bg-accent hover:text-accent-foreground'
                                        ]">
                                    {{ term.name }}
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Tags (if available) -->
                    <div v-if="hasPostTags" class="py-2 mb-6 mx-4 px-4 lg:px-0">
                        <div class="rounded-lg px-4 mt-2">
                            <h4 class="text-lg font-semibold mb-2">Etiquetas</h4>
                        </div>
                        <div class="flex flex-wrap gap-1 rounded-lg bg-muted p-1 text-muted-foreground">
                            <button v-for="term in postTags"
                                    :key="term.id"
                                    @click="selectTerm({term: term, taxonomy: tagTaxonomy})"
                                    :class="[
                                        'inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 text-sm font-medium transition-all',
                                        (selectedTerms[tagTaxonomy.slug]?.some(t => t.id === term.id)) ? 'bg-background text-foreground shadow' : ''
                                    ]">
                                {{ term.name }}
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-span-3 lg:col-span-4 lg:border-l">
                    <div class="h-full px-0 py-6 lg:px-8">
                        <div v-if="!selectedPostType" class="text-center py-12">
                            <p class="text-lg text-gray-600">Selecciona de los filtros los contenidos para empezar a explorar la biblioteca</p>
                        </div>

                        <template v-else>
                            <!-- Posts Grid -->
                            <section class="py-8">
                                <div class="lg:container">
                                    <h1 class="mb-4 px-4 text-3xl font-semibold md:text-4xl" v-if="selectedPostType">
                                        {{ selectedPostType.name }}
                                    </h1>
                                    <h2 class="mb-3 px-4 text-2xl font-medium md:text-3xl" v-if="Object.keys(selectedTerms).length > 0 && Object.keys(selectedTerms).some(key => key !== 'post_tag')">
                                        {{ Object.entries(selectedTerms).filter(([key]) => key !== 'post_tag').map(([_, terms]) => terms.map(term => term.name).join(', ')).join(' - ') }}
                                    </h2>
                                    <h3 class="mb-6 px-4 text-xl font-normal md:text-2xl text-muted-foreground" v-if="selectedTerms['post_tag'] && selectedTerms['post_tag'].length > 0">
                                        {{ selectedTerms['post_tag'].map(term => term.name).join(', ') }}
                                    </h3>
                                    <div class="flex flex-col">
                                        <hr class="border-t border-border" />
                                        <template v-for="post in posts" :key="post.id">
                                            <a :href="post.link" class="block group hover:bg-accent/5 transition-colors">
                                                <div class="grid items-center gap-4 px-4 py-5 md:grid-cols-4">
                                                    <div class="order-2 flex items-center gap-2 md:order-0">
                                                        <span class="flex h-14 w-16 shrink-0 items-center justify-center rounded-md bg-muted">
                                                            <img v-if="post.featured_media_url" :src="post.featured_media_url" 
                                                                 :alt="post.title.rendered"
                                                                 class="h-full w-full object-cover rounded-md">
                                                            <i v-else class="fas fa-image h-6 w-6 text-muted-foreground"></i>
                                                        </span>
                                                        <div class="flex flex-col gap-1">
                                                            <h3 class="font-semibold">{{ selectedPostType.name }}</h3>
                                                            <p class="text-sm text-muted-foreground">
                                                                {{ new Date(post.date).toLocaleDateString() }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <p class="order-1 text-2xl font-semibold md:order-0 md:col-span-2 group-hover:text-primary transition-colors" v-html="post.title.rendered">
                                                    </p>
                                                    <div class="order-3 ml-auto w-fit gap-2 md:order-0">
                                                        <button @click="window.location.href = post.link" 
                                                                class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 px-4 py-2">
                                                            <span>Ver contenido</span>
                                                            <i class="fas fa-arrow-right ml-2 h-4 w-4"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="border-t border-border" />
                                        </template>
                                    </div>
                                </div>
                            </section>
                        </template>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const wpApiUrl = "<?php echo esc_url(rest_url('wp/v2')); ?>";
        const { createApp, ref, computed, watch } = Vue;

        const app = createApp({
            setup() {
                const isLoading = ref(false);
                const postTypes = ref([]);
                const taxonomies = ref([]);
                const posts = ref([]);
                const selectedPostType = ref(null);
                const selectedTerms = ref({});
                const isInitialLoad = ref(true);
                const tagTaxonomy = ref(null);
                const taxonomyTermsMap = ref({});
                const isSidebarOpen = ref(false);

                // Toggle sidebar function for mobile
                function toggleSidebar() {
                    isSidebarOpen.value = !isSidebarOpen.value;
                }

                // Reset filters function
                function resetFilters() {
                    if (isInitialLoad.value) return;
                    
                    selectedPostType.value = null;
                    selectedTerms.value = {};
                    updateURLParameters();
                    fetchPosts();
                }

                // Computed properties
                const hasPostTags = computed(() => {
                    return filteredTaxonomies.value.some(tax => tax.slug === 'post_tag');
                });

                const postTags = computed(() => {
                    return taxonomyTermsMap.value['post_tag'] || [];
                });

                const otherTaxonomies = computed(() => {
                    return filteredTaxonomies.value
                        .filter(tax => tax.slug !== 'post_tag')
                        .map(tax => ({
                            ...tax,
                            terms: taxonomyTermsMap.value[tax.slug] || []
                        }));
                });

                const filteredTaxonomies = ref([]);

                // URL parameter handling
                function updateURLParameters() {
                    if (isInitialLoad.value) return;
                    
                    const params = new URLSearchParams();
                    
                    // Add post type to URL
                    if (selectedPostType.value) {
                        params.set('type', selectedPostType.value.slug);
                    }
                    
                    // Add taxonomy terms to URL
                    Object.entries(selectedTerms.value).forEach(([taxSlug, terms]) => {
                        const termIds = terms.map(t => t.id).join(',');
                        params.set(taxSlug, termIds);
                    });
                    
                    // Update URL without reloading the page
                    const newURL = `${window.location.pathname}${params.toString() ? '?' + params.toString() : ''}`;
                    window.history.pushState({}, '', newURL);
                }

                // Load filters from URL parameters
                async function loadURLParameters() {
                    const params = new URLSearchParams(window.location.search);
                    let hasValidParams = false;

                    try {
                        isLoading.value = true;
                        // Load post type first
                        const typeParam = params.get('type');
                        if (typeParam && postTypes.value.length > 0) {
                            const foundType = postTypes.value.find(type => type.slug === typeParam);
                            if (foundType) {
                                hasValidParams = true;
                                selectedPostType.value = foundType;
                                await updateFilteredTaxonomies();
                                await fetchTaxonomyTerms();

                                // Load all taxonomy terms
                                const termPromises = [];
                                for (const tax of filteredTaxonomies.value) {
                                    const termParam = params.get(tax.slug);
                                    if (termParam) {
                                        const termIds = termParam.split(',');
                                        if (termIds.length > 0) {
                                            termPromises.push(
                                                fetch(`${wpApiUrl}/${tax.rest_base}?include=${termIds}`)
                                                    .then(response => response.json())
                                                    .then(terms => {
                                                        if (terms && terms.length > 0) {
                                                            selectedTerms.value[tax.slug] = terms;
                                                        }
                                                    })
                                                    .catch(error => {
                                                        console.error(`Error loading terms for ${tax.name}:`, error);
                                                    })
                                            );
                                        }
                                    }
                                }

                                if (termPromises.length > 0) {
                                    await Promise.all(termPromises);
                                }
                            }
                        }
                    } catch (error) {
                        console.error('Error loading URL parameters:', error);
                    } finally {
                        isLoading.value = false;
                    }

                    return hasValidParams;
                }

                // Selection handlers
                function selectTerm({term, taxonomy}) {
                    if (isInitialLoad.value) return;
                    
                    if (!selectedTerms.value[taxonomy.slug]) {
                        selectedTerms.value[taxonomy.slug] = [];
                    }
                    
                    const termIndex = selectedTerms.value[taxonomy.slug].findIndex(t => t.id === term.id);
                    if (termIndex === -1) {
                        selectedTerms.value[taxonomy.slug].push(term);
                    } else {
                        selectedTerms.value[taxonomy.slug].splice(termIndex, 1);
                        if (selectedTerms.value[taxonomy.slug].length === 0) {
                            delete selectedTerms.value[taxonomy.slug];
                        }
                    }
                    
                    updateURLParameters();
                    fetchPosts();
                }

                function selectPostType(type) {
                    if (isInitialLoad.value) return;
                    
                    selectedPostType.value = type;
                    selectedTerms.value = {};
                    updateFilteredTaxonomies();
                    fetchTaxonomyTerms().then(() => {
                        updateURLParameters();
                        fetchPosts();
                    });
                }

                // Update filtered taxonomies
                function updateFilteredTaxonomies() {
                    if (selectedPostType.value && selectedPostType.value.slug && taxonomies.value) {
                        filteredTaxonomies.value = taxonomies.value.filter(tax => 
                            tax.types && Array.isArray(tax.types) && tax.types.includes(selectedPostType.value.slug)
                        );
                    } else {
                        filteredTaxonomies.value = [];
                    }
                }

                // Fetch post types
                async function fetchPostTypes() {
                    try {
                        isLoading.value = true;
                        const response = await fetch(`${wpApiUrl}/types`);
                        const responseText = await response.text(); // First get the raw text
                        
                        let data;
                        try {
                            data = JSON.parse(responseText); // Try to parse it as JSON
                        } catch (parseError) {
                            console.error('Response is not valid JSON:', responseText);
                            throw new Error(`Invalid JSON response: ${responseText.substring(0, 100)}...`);
                        }

                        const allowedTypes = {
                            'post': 'Entradas',
                            'curso': 'Cursos',
                            'episodios': 'Episodios',
                            'actores': 'Actores',
                            'personajes': 'Personajes',
                            'series': 'Series',
                            'faq': 'Preguntas Frecuentes',
                            'descarga': 'Descargas'
                        };

                        const filteredTypes = Object.entries(data)
                            .filter(([slug]) => slug in allowedTypes)
                            .filter(([, type]) => type.rest_base)
                            .map(([slug, type]) => ({
                                name: allowedTypes[slug],
                                slug: slug,
                                rest_base: type.rest_base
                            }));
                            
                        postTypes.value = filteredTypes;
                    } catch (error) {
                        console.error('Error fetching post types:', error);
                        postTypes.value = [];
                    } finally {
                        isLoading.value = false;
                    }
                }

                // Fetch taxonomies
                async function fetchTaxonomies() {
                    try {
                        isLoading.value = true;
                        const response = await fetch(`${wpApiUrl}/taxonomies`);
                        const data = await response.json();
                        taxonomies.value = Object.values(data)
                            .filter(tax => tax.rest_base && tax.slug && tax.types)
                            .map(tax => ({
                                name: tax.name,
                                slug: tax.slug,
                                rest_base: tax.rest_base,
                                types: Array.isArray(tax.types) ? tax.types : []
                            }));
                        updateFilteredTaxonomies();
                    } catch (error) {
                        console.error('Error fetching taxonomies:', error);
                        taxonomies.value = [];
                        filteredTaxonomies.value = [];
                    } finally {
                        isLoading.value = false;
                    }
                }

                // Fetch taxonomy terms
                async function fetchTaxonomyTerms() {
                    if (!selectedPostType.value) return;
                    
                    taxonomyTermsMap.value = {};
                    
                    for (const tax of filteredTaxonomies.value) {
                        try {
                            isLoading.value = true;
                            const response = await fetch(`${wpApiUrl}/${tax.rest_base}`);
                            const terms = await response.json();
                            taxonomyTermsMap.value[tax.slug] = terms;
                            
                            if (tax.slug === 'post_tag') {
                                tagTaxonomy.value = tax;
                            }
                        } catch (error) {
                            console.error(`Error fetching terms for ${tax.name}:`, error);
                            taxonomyTermsMap.value[tax.slug] = [];
                        } finally {
                            isLoading.value = false;
                        }
                    }
                }

                // Modified fetchPosts to handle multiple terms
                async function fetchPosts() {
                    if (!selectedPostType.value || !selectedPostType.value.rest_base) return;

                    isLoading.value = true;
                    let url = `${wpApiUrl}/${selectedPostType.value.rest_base}?_embed`;
                    
                    // Add all selected terms to the query
                    const taxonomyQueries = [];
                    for (const [taxSlug, terms] of Object.entries(selectedTerms.value)) {
                        const taxonomy = taxonomies.value.find(t => t.slug === taxSlug);
                        if (taxonomy && terms.length > 0) {
                            const termIds = terms.map(t => t.id).join(',');
                            taxonomyQueries.push(`${taxonomy.rest_base}=${termIds}`);
                        }
                    }
                    
                    if (taxonomyQueries.length > 0) {
                        url += '&' + taxonomyQueries.join('&');
                    }

                    try {
                        const response = await fetch(url);
                        const data = await response.json();
                        posts.value = data.map(post => ({
                            ...post,
                            featured_media_url: post._embedded?.['wp:featuredmedia']?.[0]?.source_url || null,
                            link: post.link
                        }));
                    } catch (error) {
                        console.error('Error fetching posts:', error);
                        posts.value = [];
                    } finally {
                        isLoading.value = false;
                    }
                }

                // Watch for post type changes
                watch(selectedPostType, async (newType) => {
                    if (!isInitialLoad.value && newType) {
                        await fetchTaxonomyTerms();
                    }
                });

                // Initial data fetch with improved URL parameter handling
                isLoading.value = true;
                Promise.all([
                    fetchPostTypes(),
                    fetchTaxonomies()
                ]).then(async () => {
                    if (window.location.search) {
                        const hasValidParams = await loadURLParameters();
                        if (hasValidParams) {
                            await fetchPosts();
                        }
                    }
                    isInitialLoad.value = false;
                }).catch(error => {
                    console.error('Error during initialization:', error);
                    isInitialLoad.value = false;
                }).finally(() => {
                    isLoading.value = false;
                });

                return {
                    postTypes,
                    posts,
                    selectedPostType,
                    selectedTerms,
                    hasPostTags,
                    postTags,
                    otherTaxonomies,
                    tagTaxonomy,
                    selectPostType,
                    selectTerm,
                    resetFilters,
                    toggleSidebar,
                    isSidebarOpen,
                    isLoading
                };
            }
        });

        // Ensure any previous app instance is unmounted
        if (window._vueApp) {
            window._vueApp.unmount();
        }
        window._vueApp = app;
        app.mount('#app');
    });
    </script>
</main>

<?php
get_footer();
