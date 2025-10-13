document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('nav a[href^="#"]');
    
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            
            // Skip empty href or href="#"
            if (!targetId || targetId === '#') {
                e.preventDefault();
                return;
            }
            
            const targetSection = document.querySelector(targetId);
            
            if (targetSection) {
                e.preventDefault();
                
                // Smooth scroll with offset for sticky header
                const offset = 100; // Adjust this value based on your sticky header height
                const elementPosition = targetSection.getBoundingClientRect().top + window.pageYOffset;
                
                window.scrollTo({
                    top: elementPosition - offset,
                    behavior: 'smooth'
                });

                // Update active state
                navLinks.forEach(l => {
                    l.classList.remove('border', 'border-solid', 'border-muted2', 'shadow-sm');
                    l.classList.remove('bg-background', 'text-foreground');
                });
                this.classList.add('border', 'border-solid', 'border-muted2', 'shadow-sm');
                this.classList.add('bg-background', 'text-foreground');
            }
        });
    });
});
