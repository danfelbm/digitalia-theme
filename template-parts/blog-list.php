<?php
/**
 * Template part for displaying blog list
 */
?>

<style>
  #categoryFilters [data-id="1"] { display: none; }
</style>

<!-- HTMX and Mustache Dependencies -->
<script src="https://unpkg.com/htmx.org@1.9.12"></script>
<script src="https://unpkg.com/htmx.org@1.9.12/dist/ext/client-side-templates.js"></script>
<script src="https://unpkg.com/mustache@latest"></script>
<!-- end HTMX and Mustache Dependencies -->

<script>
    // Preselected categories mapping
    const preselectedCategories = {
        'page-id-302': 23,
        'page-id-304': 21,
        'page-id-306': 22,
        'page-id-308': 25,
        'page-id-310': 24,
    };

    let page = 1;
    let activeFilters = {
        categories: [],
        tags: [],
        authors: [],
        formatos: []
    };

    document.addEventListener('DOMContentLoaded', function() {
        // Detect current page class and preselect category
        for (let className in preselectedCategories) {
            if (document.body.classList.contains(className)) {
                activeFilters.categories.push(preselectedCategories[className]);
                break;
            }
        }
        // Load filters and posts
        getFilters();
        getPosts();
    });
</script>

<section class="py-32 bg-white">
    <div class="container">
        <div class="mb-8 md:mb-10 lg:mb-12">      
                  
            <!-- Filters Section -->
            <div class="mb-10 flex flex-wrap items-center gap-x-4 gap-y-3 lg:gap-x-3">
                <!-- Categories Filter -->
                <div class="shrink-0 md:w-52 lg:w-56" id="categoryFilters">
                    <button type="button" class="flex h-10 w-full items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background">
                        <span>Módulos</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down h-4 w-4 opacity-50"><path d="m6 9 6 6 6-6"></path></svg>
                    </button>
                </div>

                <!-- Tags Filter -->
                <div class="shrink-0 md:w-52 lg:w-56" id="tagFilters">
                    <button type="button" class="flex h-10 w-full items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background">
                        <span>Temas</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down h-4 w-4 opacity-50"><path d="m6 9 6 6 6-6"></path></svg>
                    </button>
                </div>

                <!-- Authors Filter -->
                <div class="shrink-0 md:w-52 lg:w-56" id="authorFilters">
                    <button type="button" class="flex h-10 w-full items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background">
                        <span>Autores</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down h-4 w-4 opacity-50"><path d="m6 9 6 6 6-6"></path></svg>
                    </button>
                </div>

                <!-- Format Filter -->
                <div class="shrink-0 md:w-52 lg:w-56" id="formatoFilters">
                    <button type="button" class="flex h-10 w-full items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background">
                        <span>Formatos</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down h-4 w-4 opacity-50"><path d="m6 9 6 6 6-6"></path></svg>
                    </button>
                </div>

                <!-- Sort Filter -->
                <div class="shrink-0 md:w-52 lg:w-56">
                    <select id="sortFilter" onchange="applyFilters()" class="flex h-10 w-full items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background">
                        <option value="desc">Nuevos Primero</option>
                        <option value="asc">Viejos Primero</option>
                    </select>
                </div>

                <!-- Reset Filters Button -->
                <button onclick="resetFilters()" class="inline-flex items-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-primary-foreground hover:bg-primary/90">
                    Reestablecer filtros
                </button>
            </div>
        </div>

        <!-- Posts Grid -->
        <div id="postGrid" class="grid gap-4 md:grid-cols-3 lg:gap-6 2xl:grid-cols-3" hx-ext="client-side-templates">
            <!-- Posts will load here -->
        </div>

        <!-- Load More Button -->
        <div class="mt-8 flex justify-center">
            <button id="loadMore" onclick="loadMorePosts()" class="inline-flex items-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-primary-foreground hover:bg-primary/90">
                Cargar más
            </button>
        </div>
    </div>
</section>

<!-- Templates -->
<template id="post-template">
    {{#data}}
    <a href="{{link}}" class="group flex flex-col justify-between rounded-xl border border-border bg-slate-100 p-6">
        <div>
            <div class="flex aspect-[3/2] text-clip rounded-xl">
                <div class="flex-1">
                    <div class="relative size-full origin-bottom transition duration-300 group-hover:scale-105">
                        <img src="{{featured_image_src}}" alt="{{title.rendered}}" class="size-full object-cover object-center">
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-2 line-clamp-3 break-words pt-4 text-lg font-medium md:mb-3 md:pt-4 md:text-2xl lg:pt-4 lg:text-3xl">
            {{title.rendered}}
        </div>
        <div class="mb-8 line-clamp-2 text-sm text-muted-foreground md:mb-12 md:text-base lg:mb-9">
            {{{excerpt.rendered}}}
        </div>
        <div class="flex flex-wrap gap-2">
            {{#_embedded.wp:term}}
            {{#.}}
            <div class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-primary text-primary-foreground">
                {{name}}
            </div>
            {{/.}}
            {{/_embedded.wp:term}}
        </div>
    </a>
    {{/data}}
</template>

<template id="filter-pill-template">
    {{#data}}
    <div class="relative flex w-full cursor-default select-none items-center rounded-sm py-1.5 pl-8 pr-2 text-sm outline-none hover:bg-accent hover:text-accent-foreground" onclick="toggleFilter('{{type}}', '{{id}}', this)" data-type="{{type}}" data-id="{{id}}">
        {{#icon}}
        <img src="{{icon}}" alt="{{name}}" class="absolute left-2 h-4 w-4">
        {{/icon}}
        <span>{{name}}</span>
    </div>
    {{/data}}
</template>

<script>
    const wpApiUrl = "<?php echo esc_url(rest_url('wp/v2')); ?>";

    function getPosts() {
        let sort = document.getElementById('sortFilter').value;
        let url = `${wpApiUrl}/posts?page=${page}&per_page=6&_embed&order=${sort}`;
        
        if (activeFilters.categories.length) url += `&categories=${activeFilters.categories.join(',')}`;
        if (activeFilters.tags.length) url += `&tags=${activeFilters.tags.join(',')}`;
        if (activeFilters.authors.length) url += `&author=${activeFilters.authors.join(',')}`;
        if (activeFilters.formatos.length) url += `&formato=${activeFilters.formatos.join(',')}`;

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('No more posts to load');
                }
                return response.json();
            })
            .then(data => {
                data.forEach(post => {
                    post.excerpt.rendered = post.excerpt.rendered.replace(/<[^>]*>?/gm, '');
                });
                
                const postGrid = document.getElementById('postGrid');
                if (page === 1) {
                    postGrid.innerHTML = '';
                }
                postGrid.innerHTML += Mustache.render(document.getElementById('post-template').innerHTML, { data: data });
            })
            .catch(error => {
                console.error(error.message);
                document.getElementById('loadMore').disabled = true;
            });
    }

    function getFilters() {
        // Categories
        fetch(`${wpApiUrl}/categories`)
            .then(response => response.json())
            .then(data => {
                const formattedData = data.map(category => ({
                    id: category.id,
                    name: category.name,
                    type: 'categories',
                    icon: category.acf?.icono_categoria || ''
                }));
                renderFilterDropdown('categoryFilters', formattedData);
            });

        // Tags
        fetch(`${wpApiUrl}/tags`)
            .then(response => response.json())
            .then(data => {
                const formattedData = data.map(tag => ({
                    id: tag.id,
                    name: tag.name,
                    type: 'tags'
                }));
                renderFilterDropdown('tagFilters', formattedData);
            });

        // Authors
        fetch(`${wpApiUrl}/users`)
            .then(response => response.json())
            .then(data => {
                const formattedData = data.map(author => ({
                    id: author.id,
                    name: author.name,
                    type: 'authors'
                }));
                renderFilterDropdown('authorFilters', formattedData);
            });

        // Formats
        fetch(`${wpApiUrl}/formato`)
            .then(response => response.json())
            .then(data => {
                const formattedData = data.map(formato => ({
                    id: formato.id,
                    name: formato.name,
                    type: 'formatos'
                }));
                renderFilterDropdown('formatoFilters', formattedData);
            });
    }

    function renderFilterDropdown(containerId, items) {
        const container = document.getElementById(containerId);
        const dropdownContent = document.createElement('div');
        dropdownContent.className = 'absolute z-50 mt-2 w-full rounded-md border bg-popover shadow-lg max-w-64';
        dropdownContent.style.display = 'none';
        dropdownContent.innerHTML = Mustache.render(document.getElementById('filter-pill-template').innerHTML, { data: items });
        container.appendChild(dropdownContent);

        container.querySelector('button').addEventListener('click', () => {
            dropdownContent.style.display = dropdownContent.style.display === 'none' ? 'block' : 'none';
        });

        document.addEventListener('click', (e) => {
            if (!container.contains(e.target)) {
                dropdownContent.style.display = 'none';
            }
        });
    }

    function toggleFilter(type, id, element) {
        let filterArray = activeFilters[type];
        if (filterArray.includes(id)) {
            filterArray.splice(filterArray.indexOf(id), 1);
            element.classList.remove('bg-accent');
        } else {
            filterArray.push(id);
            element.classList.add('bg-accent');
        }
        applyFilters();
    }

    function loadMorePosts() {
        page++;
        getPosts();
    }

    function applyFilters() {
        page = 1;
        getPosts();
    }

    function resetFilters() {
        activeFilters = {
            categories: [],
            tags: [],
            authors: [],
            formatos: []
        };
        document.getElementById('sortFilter').value = 'desc';
        document.querySelectorAll('[data-type]').forEach(el => el.classList.remove('bg-accent'));
        applyFilters();
    }
</script>
