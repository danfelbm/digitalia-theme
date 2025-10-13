document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu
    const mobileMenuButton = document.querySelector('.mobile-menu-button');
    const mobileMenu = document.querySelector('#mobile-menu');
    const menuOpenIcon = document.querySelector('.menu-open-icon');
    const menuCloseIcon = document.querySelector('.menu-close-icon');

    if (mobileMenuButton && mobileMenu && menuOpenIcon && menuCloseIcon) {
        mobileMenuButton.addEventListener('click', () => {
            const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';
            mobileMenuButton.setAttribute('aria-expanded', !isExpanded);
            mobileMenu.classList.toggle('hidden');
            menuOpenIcon.classList.toggle('hidden');
            menuCloseIcon.classList.toggle('hidden');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (event) => {
            if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                mobileMenuButton.setAttribute('aria-expanded', 'false');
                mobileMenu.classList.add('hidden');
                menuOpenIcon.classList.remove('hidden');
                menuCloseIcon.classList.add('hidden');
            }
        });
    }

    // Profile dropdown
    const profileButton = document.querySelector('.profile-menu-button');
    const profileDropdown = document.querySelector('.profile-dropdown');

    if (profileButton && profileDropdown) {
        profileButton.addEventListener('click', () => {
            const isExpanded = profileButton.getAttribute('aria-expanded') === 'true';
            profileButton.setAttribute('aria-expanded', !isExpanded);
            profileDropdown.classList.toggle('hidden');
        });

        // Close profile dropdown when clicking outside
        document.addEventListener('click', (event) => {
            if (!profileButton.contains(event.target) && !profileDropdown.contains(event.target)) {
                profileButton.setAttribute('aria-expanded', 'false');
                profileDropdown.classList.add('hidden');
            }
        });
    }
});
