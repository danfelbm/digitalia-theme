document.addEventListener('DOMContentLoaded', function() {
    const faqButtons = document.querySelectorAll('[data-orientation="vertical"] button');
    
    faqButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Get the accordion item container and content
            const container = this.closest('[data-state]');
            const contentId = this.getAttribute('aria-controls');
            const content = contentId ? document.getElementById(contentId) : null;
            
            if (!container || !content) return;
            
            // Check if it's currently open
            const isOpen = container.getAttribute('data-state') === 'open';
            
            // Close all other items first
            const allContainers = document.querySelectorAll('[data-orientation="vertical"] > div');
            allContainers.forEach(item => {
                if (!item) return;
                
                const itemButton = item.querySelector('button');
                if (!itemButton) return;
                
                const itemContentId = itemButton.getAttribute('aria-controls');
                const itemContent = itemContentId ? document.getElementById(itemContentId) : null;
                
                if (itemContent) {
                    item.setAttribute('data-state', 'closed');
                    itemButton.setAttribute('data-state', 'closed');
                    itemButton.setAttribute('aria-expanded', 'false');
                    itemContent.setAttribute('data-state', 'closed');
                }
            });
            
            // Toggle the clicked item
            if (!isOpen) {
                container.setAttribute('data-state', 'open');
                this.setAttribute('data-state', 'open');
                this.setAttribute('aria-expanded', 'true');
                content.setAttribute('data-state', 'open');
            }
            
            // Rotate chevron
            const allChevrons = document.querySelectorAll('.lucide-chevron-down');
            allChevrons.forEach(chevron => {
                if (chevron) {
                    chevron.style.transform = 'rotate(0deg)';
                }
            });
            
            const currentChevron = this.querySelector('.lucide-chevron-down');
            if (!isOpen && currentChevron) {
                currentChevron.style.transform = 'rotate(180deg)';
            }
        });
    });
});
