<x-layouts.main>
    <x-slot:title>
        Post - {{ $post->id }}
    </x-slot>

    <x-page-header>
        Post - {{ $post->id }}
    </x-page-header>


    <!-- Detail Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="text-right row">
                        <a class="ml-5 btn btn-sm btn-outline-warning"
                           href="{{ route('posts.edit', ['post' => $post->id]) }}">O'zgartirish</a>
                        &nbsp; &nbsp; &nbsp;
                        <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST"
                              onsubmit="return confirm('Rostdan ham o\'chirishni xoxlaysizmi?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" type="submit">O'chirish</button>
                        </form>
                    </div>
                    <br>
                    <div class="mb-5">
                        <div class="d-flex mb-2">
                            <p>
                                @foreach($post->tags as $tag)
                                    <a class="text-secondary text-uppercase font-weight-medium">{{ $tag->name }}</a>
                                    <span class="text-primary px-2">|</span>
                                @endforeach
                            </p>
                            <a class="text-secondary text-uppercase font-weight-medium">{{ $post->created_at }}</a>
                        </div>
                        <div style="height: 5% !important;" class="d-flex mb-2">
                            <p class="text-white rounded py-1 px-2 font-weight-medium badge-secondary">{{ $post->category->name }}</p>
                        </div>
                        <h1 class="section-title mb-3">{{ $post->title }}</h1>
                    </div>

                    <div class="mb-5">
                        <img class="img-fluid rounded w-100 mb-4" src="{{asset('img/carousel-1.jpg')}}" alt="Image">
                        <p>{{ $post->content }}</p>
                        <h2 class="mb-4">Est dolor lorem et ea</h2>
                        <img class="img-fluid rounded w-50 float-left mr-4 mb-3"
                             src="{{asset('storage/' . $post->photo)}}" alt="Image">
                    </div>

                    <div class="mb-5">
                        <h3 class="mb-4 section-title">{{ $post->comments()->count() }} ta izoh</h3>
                        @foreach($post->comments as $comment)
                            <div class="media mb-4">
                                <img src="{{asset('img/user.jpg')}}" alt="Image"
                                     class="img-fluid rounded-circle mr-3 mt-1"
                                     style="width: 45px;">
                                <div class="media-body">
                                    <h6>{{ $comment->user->name }} <small><i>{{ $comment->created_at }}</i></small></h6>
                                    <p>{{ $comment->body }}</p>
                                    {{--                                    <button class="btn btn-sm btn-light">Reply</button>--}}
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="bg-light rounded p-5">
                        <h3 class="mb-4 section-title">Izoh qoldirish</h3>

                        {{--<div class="form-row">
                            <div class="form-group col-sm-6">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="url" class="form-control" id="website">
                        </div>--}}
                        <form action="{{ route('comments.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="message">Xabar</label>
                                <textarea name="body" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="form-group mb-0">
                                <input type="submit" value="Yuborish" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="d-flex flex-column text-center bg-secondary rounded mb-5 py-5 px-4">
                        <img src="{{asset('img/user.jpg')}}" alt="" class="img-fluid rounded-circle mx-auto mb-3"
                             style="width: 100px;">
                        <h3 class="text-white mb-3">John Doe</h3>
                        <p class="text-white m-0">Conset elitr erat vero dolor ipsum et diam, eos dolor lorem ipsum,
                            ipsum
                            ipsum sit no ut est. Guber ea ipsum erat kasd amet est elitr ea sit.</p>
                    </div>
                    <div class="mb-5">
                        <div class="w-100">
                            <div class="input-group">
                                <input type="text" class="form-control" style="padding: 25px;" placeholder="Keyword">
                                <div class="input-group-append">
                                    <button class="btn btn-primary px-4">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h3 class="mb-4 section-title">Categories</h3>
                        <ul class="list-inline m-0">
                            @foreach($categories as $category)
                                <li class="mb-1 py-2 px-3 bg-light d-flex justify-content-between align-items-center">
                                    <a class="text-dark" href="#"><i class="fa fa-angle-right text-secondary mr-2"></i>
                                        {{ $category->name }}
                                    </a>
                                    <span class="badge badge-primary badge-pill">{{ $category->posts()->count() }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mb-5">
                        <h3 class="mb-4 section-title">Taglar</h3>
                        <div class="d-flex flex-wrap m-n1">
                            @foreach($tags as $tag)
                                <a href="" class="btn btn-outline-secondary m-1">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-5">
                        <img src="{{asset('img/blog-1.jpg')}}" alt="" class="img-fluid rounded">
                    </div>
                    <div class="mb-5">
                        <h3 class="mb-4 section-title">Recent Post</h3>
                        @foreach($recent_posts as $post)
                            <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                <img class="img-fluid rounded" src="{{asset('img/blog-1.jpg')}}"
                                     style="width: 80px; height: 80px; object-fit: cover;" alt="">
                                <div class="d-flex flex-column pl-3">
                                    <a class="text-dark mb-2" href="">{{ $post->title }}</a>
                                    <div class="d-flex">
                                        <small><a class="text-secondary text-uppercase font-weight-medium"
                                                  href="">Admin</a></small>
                                        <small class="text-primary px-2">|</small>
                                        <small><a class="text-secondary text-uppercase font-weight-medium" href="">Cleaning</a></small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mb-5">
                        <img src="{{asset('img/blog-2.jpg')}}" alt="" class="img-fluid rounded">
                    </div>
                    <div class="mb-5">
                        <img src="{{asset('img/blog-3.jpg')}}" alt="" class="img-fluid rounded">
                    </div>
                    <div>
                        <h3 class="mb-4 section-title">Plain Text</h3>
                        Aliquyam sed lorem stet diam dolor sed ut sit. Ut sanctus erat ea est aliquyam dolor et. Et no
                        consetetur eos labore ea erat voluptua et. Et aliquyam dolore sed erat. Magna sanctus sed eos
                        tempor
                        rebum dolor, tempor takimata clita sit et elitr ut eirmod.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->


</x-layouts.main>
