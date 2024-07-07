<x-layouts.main>
    <x-slot:title>
        Blog
    </x-slot:title>

    <x-page-header>
        Blog
    </x-page-header>

    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-end mb-4">
                <div class="col-lg-6">
                    <h6 class="text-secondary font-weight-semi-bold text-uppercase mb-3">Latest Blog</h6>
                    <h1 class="section-title mb-3">Oxirgi Postlar</h1>
                </div>
                <div class="row">

                    @foreach ($posts as $post)
                        <div style="height: 100%" class="col-lg-4 col-md-6 mb-5">
                            <div style="height: 203px !important; width: 100% !important;"
                                 class="position-relative mb-4">
                                @if($post->photo)
                                    <img style="height: 100% !important;" class="img-fluid rounded w-100"
                                         src="{{ asset('storage/'.$post->photo) }}" alt="">
                                @else
                                    <img style="height: 100% !important;" class="img-fluid rounded w-100"
                                         src="{{asset('/default.png')}}"
                                         alt="">
                                @endif
                                <div class="blog-date">
                                    <h4 class="font-weight-bold mb-n1">01</h4>
                                    <small class="text-white text-uppercase">Jan</small>
                                </div>
                            </div>
                            <div style="height: 5% !important;" class="d-flex mb-2">
                                <p style="height: 50px!important; overflow: hidden">
                                @foreach($post->tags as $tag)
                                    <a class="text-secondary text-uppercase font-weight-medium">{{ $tag->name }}</a>
                                    <span class="text-primary px-2">|</span>
                                @endforeach
                                </p>
                            </div>
                            <div style="height: 5% !important;" class="d-flex mb-2">
                                <a class="text-danger text-uppercase font-weight-medium">{{ $post->category->name }}</a>
                            </div>
                            <h5 style="height: 2.4em ; overflow: hidden"
                                class="font-weight-medium mb-2">{{ $post->title }}</h5>
                            <p style="height: 4.7em ; overflow: hidden" class="mb-2">{{ $post->short_content }}</p>
                            <a class="btn btn-sm btn-primary py-2"
                               href="{{ route('posts.show', ['post' => $post->id]) }}">O'qish
                            </a>
                        </div>
                    @endforeach
                    {{--<div class="col-12">
                        {{ $posts->links() }}
                    </div>--}}
                </div>
                <div class="col-12 d-block">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-lg justify-content-center mb-0">
                            <li class="page-item">
                                {{--<a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>--}}
                                {{ $posts->links() }}
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Blog End -->
    </div>
</x-layouts.main>
