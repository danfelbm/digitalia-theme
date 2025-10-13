document.addEventListener('DOMContentLoaded', function() {
    // Tab functionality
    const tabButtons = document.querySelectorAll('.tab-button');
    
    // Set initial active state for the first tab
    const firstButton = tabButtons[0];
    if (firstButton) {
        firstButton.classList.remove('text-gray-500', 'border-transparent');
        firstButton.classList.add('text-blue-600', 'border-blue-600');
    }
    
    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const tabId = button.getAttribute('data-tab');
            const tabPanel = document.getElementById(tabId);
            
            if (!tabPanel) return;
            
            // Remove active state from all tabs
            document.querySelectorAll('.tab-button').forEach(btn => {
                btn.classList.remove('text-blue-600', 'border-blue-600');
                btn.classList.add('text-gray-500', 'border-transparent');
            });
            
            // Hide all panels
            document.querySelectorAll('.tab-panel').forEach(panel => {
                panel.classList.add('hidden');
            });
            
            // Activate clicked tab
            button.classList.remove('text-gray-500', 'border-transparent');
            button.classList.add('text-blue-600', 'border-blue-600');
            tabPanel.classList.remove('hidden');
        });
    });

    // Accordion functionality
    const faqButtons = document.querySelectorAll('.faq-button');
    
    faqButtons.forEach(button => {
        button.addEventListener('click', () => {
            const content = button.nextElementSibling;
            const isOpen = content.classList.contains('active');
            
            // Close all items in the same tab panel
            const currentPanel = button.closest('.tab-panel');
            currentPanel.querySelectorAll('.faq-content').forEach(content => {
                content.style.display = 'none';
                content.classList.remove('active');
            });
            currentPanel.querySelectorAll('.faq-button svg').forEach(svg => {
                svg.style.transform = 'rotate(0deg)';
            });
            
            // Open clicked item if it was closed
            if (!isOpen) {
                content.style.display = 'block';
                content.classList.add('active');
                button.querySelector('svg').style.transform = 'rotate(180deg)';
            }
        });
    });
});
