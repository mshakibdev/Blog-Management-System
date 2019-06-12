@include('layouts/blog-header')

    <div class="blog-post">
        <h2 class="blog-post-title">{{$post->title}}</h2>
        <img src="{{asset($post->photo->file)}}" height="400px" width="700px" alt="">
        <p class="blog-post-meta">{{$post->created_at->diffForHumans()}}<br> Posted By : <a href="#">{{$post->user->name}}</a></p>
        <hr>
        <p>{{ $post->body }}</p>
    </div><!-- /.blog-post -->
@include('layouts/blog-footer')

    <div>
        <div id="disqus_thread"></div>
        <script>

            /**
             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
            /*
            var disqus_config = function () {
            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };
            */
            (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://shakib-1.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        <script id="dsq-count-scr" src="//shakib-1.disqus.com/count.js" async></script>
    </div>

