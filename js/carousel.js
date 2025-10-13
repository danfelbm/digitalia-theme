document.addEventListener('DOMContentLoaded', function() {
    // Initialize traditional carousels
    function initTraditionalCarousel() {
        const carousels = document.querySelectorAll('.carousel-container');
        
        carousels.forEach(carousel => {
            if (!carousel) return;
            
            const prevButton = carousel.closest('section').querySelector('.carousel-prev');
            const nextButton = carousel.closest('section').querySelector('.carousel-next');
            
            if (!prevButton || !nextButton) return;

            const slideWidth = 360; // Width of each slide including padding
            let currentPosition = 0;
            const slides = carousel.children;
            const totalWidth = slides.length * slideWidth;
            const viewportWidth = carousel.parentElement.offsetWidth;
            
            let startX = 0;
            let isDragging = false;
            let startPosition = 0;
            let hasMoved = false;

            function updateButtons() {
                prevButton.disabled = currentPosition >= 0;
                nextButton.disabled = currentPosition <= -totalWidth + viewportWidth;
            }

            function setTransform(position, withTransition = true) {
                carousel.style.transition = withTransition ? 'transform 0.3s ease-out' : 'none';
                carousel.style.transform = `translateX(${position}px)`;
            }

            function slide(direction) {
                const step = direction * slideWidth;
                let newPosition = currentPosition + step;
                
                if (newPosition > 0) {
                    newPosition = 0;
                } else if (newPosition < -totalWidth + viewportWidth) {
                    newPosition = -totalWidth + viewportWidth;
                }
                
                currentPosition = newPosition;
                setTransform(currentPosition);
                updateButtons();
            }

            function handleDragStart(e) {
                if (e.type === 'mousedown') {
                    e.preventDefault();
                }
                isDragging = true;
                startX = e.type === 'mousedown' ? e.clientX : e.touches[0].clientX;
                startPosition = currentPosition;
                setTransform(currentPosition, false);
                
                carousel.style.cursor = 'grabbing';
                carousel.style.userSelect = 'none';
            }

            function handleDragMove(e) {
                if (!isDragging) return;
                
                const x = e.type === 'mousemove' ? e.clientX : e.touches[0].clientX;
                const diff = x - startX;
                let newPosition = startPosition + diff;

                if (newPosition > 0) {
                    newPosition = newPosition * 0.5;
                } else if (newPosition < -totalWidth + viewportWidth) {
                    const overscroll = newPosition + totalWidth - viewportWidth;
                    newPosition = -totalWidth + viewportWidth + (overscroll * 0.5);
                }

                setTransform(newPosition, false);
                hasMoved = true;
            }

            function handleDragEnd() {
                if (!isDragging) return;
                isDragging = false;
                
                carousel.style.cursor = 'grab';
                carousel.style.userSelect = '';
                
                const finalPosition = parseFloat(carousel.style.transform.replace('translateX(', '').replace('px)', ''));
                
                if (finalPosition > 0) {
                    currentPosition = 0;
                } else if (finalPosition < -totalWidth + viewportWidth) {
                    currentPosition = -totalWidth + viewportWidth;
                } else {
                    currentPosition = finalPosition;
                }
                
                setTransform(currentPosition, true);
                updateButtons();
                hasMoved = false;
            }

            // Add event listeners
            prevButton.addEventListener('click', () => slide(1));
            nextButton.addEventListener('click', () => slide(-1));

            carousel.addEventListener('mousedown', handleDragStart);
            carousel.addEventListener('touchstart', handleDragStart, { passive: true });
            
            window.addEventListener('mousemove', handleDragMove);
            window.addEventListener('touchmove', handleDragMove, { passive: true });
            
            window.addEventListener('mouseup', handleDragEnd);
            window.addEventListener('touchend', handleDragEnd);
            carousel.addEventListener('mouseleave', handleDragEnd);

            // Prevent default drag on carousel items
            Array.from(carousel.children).forEach(item => {
                item.addEventListener('dragstart', e => e.preventDefault());
            });

            // Set initial state
            carousel.style.cursor = 'grab';
            updateButtons();
        });
    }

    // Initialize Radix UI carousels
    function initRadixCarousel() {
        const radixCarousels = document.querySelectorAll('[role="region"][aria-roledescription="carousel"]');
        
        radixCarousels.forEach(carousel => {
            // Skip if it's a traditional carousel
            if (carousel.querySelector('.carousel-container')) return;

            const slides = carousel.querySelectorAll('[role="tabpanel"]');
            const buttons = document.querySelectorAll('[role="radio"]');
            
            if (!slides.length || !buttons.length) return;

            let currentIndex = 0;
            let startX = 0;
            let currentX = 0;
            let isDragging = false;

            function updateCarousel(index, withAnimation = true) {
                const slideWidth = slides[0].offsetWidth;
                const offset = -index * slideWidth;
                
                const container = carousel.querySelector('.flex');
                container.style.transition = withAnimation ? 'transform 0.3s ease-out' : 'none';
                container.style.transform = `translate3d(${offset}px, 0px, 0px)`;

                buttons.forEach((button, i) => {
                    button.setAttribute('aria-checked', i === index ? 'true' : 'false');
                    button.setAttribute('data-state', i === index ? 'on' : 'off');
                });

                slides.forEach((slide, i) => {
                    if (i === index) {
                        slide.setAttribute('data-active', 'true');
                        slide.setAttribute('tabindex', '0');
                    } else {
                        slide.setAttribute('data-active', 'false');
                        slide.setAttribute('tabindex', '-1');
                    }
                });

                currentIndex = index;
            }

            buttons.forEach((button, index) => {
                button.addEventListener('click', () => {
                    updateCarousel(index);
                });
            });

            function handleDragStart(event) {
                isDragging = true;
                startX = event.type === 'mousedown' ? event.clientX : event.touches[0].clientX;
                currentX = -currentIndex * slides[0].offsetWidth;
                
                const container = carousel.querySelector('.flex');
                container.style.transition = 'none';
            }

            function handleDragMove(event) {
                if (!isDragging) return;
                event.preventDefault();

                const x = event.type === 'mousemove' ? event.clientX : event.touches[0].clientX;
                const diff = x - startX;
                const newX = currentX + diff;
                
                const container = carousel.querySelector('.flex');
                container.style.transform = `translate3d(${newX}px, 0px, 0px)`;
            }

            function handleDragEnd(event) {
                if (!isDragging) return;
                isDragging = false;

                const x = event.type === 'mouseup' ? event.clientX : 
                         event.type === 'touchend' ? event.changedTouches[0].clientX : startX;
                const diff = x - startX;
                const threshold = slides[0].offsetWidth * 0.2;

                let newIndex = currentIndex;
                if (Math.abs(diff) > threshold) {
                    newIndex = diff > 0 ? Math.max(0, currentIndex - 1) : 
                                        Math.min(slides.length - 1, currentIndex + 1);
                }

                updateCarousel(newIndex);
            }

            carousel.addEventListener('mousedown', handleDragStart);
            carousel.addEventListener('touchstart', handleDragStart, { passive: true });
            
            window.addEventListener('mousemove', handleDragMove);
            window.addEventListener('touchmove', handleDragMove, { passive: false });
            
            window.addEventListener('mouseup', handleDragEnd);
            window.addEventListener('touchend', handleDragEnd);

            updateCarousel(0, false);
        });
    }

    // Initialize both types of carousels
    initTraditionalCarousel();
    initRadixCarousel();
});
