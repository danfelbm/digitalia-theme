document.addEventListener('DOMContentLoaded', function() {
    const faqButtons = document.querySelectorAll('.faq-button');
    
    faqButtons.forEach(button => {
        button.addEventListener('click', function() {
            const content = this.closest('.faq-header').nextElementSibling;
            const isExpanding = !content.classList.contains('active');
            
            // Toggle the active class
            content.classList.toggle('active');
            
            // Handle the arrow rotation
            const arrow = this.querySelector('svg');
            arrow.style.transform = isExpanding ? 'rotate(180deg)' : '';
            
            if (isExpanding) {
                // Make content visible immediately when expanding
                content.style.visibility = 'visible';
                // Set max-height to enable transition
                content.style.maxHeight = content.scrollHeight + 'px';
            } else {
                // Start collapse transition
                content.style.maxHeight = '0';
                // Hide content after transition
                content.addEventListener('transitionend', function handler() {
                    if (!content.classList.contains('active')) {
                        content.style.visibility = 'hidden';
                    }
                    content.removeEventListener('transitionend', handler);
                });
            }
        });
    });
});
