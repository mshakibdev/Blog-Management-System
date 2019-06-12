
@include('layouts/blog-header')


                @if($posts)
                    @foreach($posts as $post)
                        <div class="row mb-2">

                            <div class="col-md-12">
                                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                    <div class="col p-4 d-flex flex-column position-static">
                                        <strong class="d-inline-block mb-2 text-success">{{ $post->user->name}}</strong>
                                        <h3 class="mb-0">{{ $post->title }}</h3>
                                        <div class="mb-1 text-muted">{{ $post->created_at->diffForHumans() }}</div>
                                        <p class="mb-auto">{{str_limit( $post->body,100) }}</p>
                                        <a href="{{route('post-details',$post->id)}} "class="stretched-link">Continue reading</a>
                                    </div>
                                    <div class="col-auto d-none d-lg-block">
                                        <img height="250" width="400" src="{{$post->photo ?asset($post->photo->file ): 'http://placehold.it/400x400'}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>


                    @endforeach

                @endif



@include('layouts/blog-footer')

