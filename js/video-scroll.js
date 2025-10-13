document.addEventListener('DOMContentLoaded', function() {
    // Configuration object that can be modified
    const config = {
        autoplayOnScroll: true, // Global switch for autoplay on scroll
        threshold: 0.5 // Visibility threshold to trigger autoplay
    };

    // Function to check if autoplay is enabled for a specific video
    const isAutoplayEnabled = (video) => {
        const videoSetting = video.dataset.videoAutoplay;
        // If the video has an explicit setting, use it; otherwise use global config
        return videoSetting === 'false' ? false : 
               videoSetting === 'true' ? true : 
               config.autoplayOnScroll;
    };
    
    const videos = document.querySelectorAll('.js-scroll-video');
    
    // Create an Intersection Observer
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            const video = entry.target;
            
            // Only proceed if autoplay is enabled for this video
            if (!isAutoplayEnabled(video)) return;
            
            // When video is in view
            if (entry.isIntersecting) {
                // Try to play the video
                const playPromise = video.play();
                
                // Handle the play promise to avoid potential errors
                if (playPromise !== undefined) {
                    playPromise.catch(() => {
                        // Auto-play was prevented, do nothing
                        // This can happen due to browser autoplay policies
                    });
                }
            } else {
                // Pause the video when it's out of view
                video.pause();
            }
        });
    }, {
        threshold: config.threshold
    });
    
    // Observe all videos with the scroll-video class
    videos.forEach(video => {
        observer.observe(video);
    });
});
