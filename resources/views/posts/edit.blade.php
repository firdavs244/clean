<x-layouts.main>
    <x-slot:title>
        Postni o'zgartirish #{{ $post->id }}
    </x-slot:title>

    <x-page-header>
        Postni o'zgartirish #{{ $post->id }}
    </x-page-header>

    <div class="row justify-content-center">
        <div class="col-lg-7 mb-5 mb-lg-0">
            <div class="contact-form">
                <div id="success"></div>


                <form action="{{ route('posts.update', ['post' => $post->id]) }}" enctype="multipart/form-data" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="control-group">
                        <input value="{{ $post->title }}" name="title" minlength="3" maxlength="40" type="text" class="form-control p-4" placeholder="Sarlavha"  />
                        <p class="help-block text-danger">
                            @error('title')
                            &nbsp &nbsp &nbsp{{ $message }}
                            @enderror
                        </p>
                    </div>
                    <div>
                        &nbsp <input name="photo" class="form-control-lg" type="file">
                        <p class="help-block text-danger">
                            @error('photo')
                            &nbsp &nbsp &nbsp{{ $message }}
                            @enderror
                        </p>
                    </div>
                    <div class="control-group">
                        <textarea minlength="10" name="short_content" class="form-control p-4" rows="3" placeholder="Qisqacha Mazmuni" >{{ $post->short_content }}</textarea>
                        <p class="help-block text-danger">
                            @error('short_content')
                            &nbsp &nbsp &nbsp{{ $message }}
                            @enderror
                        </p>
                    </div>
                    <div class="control-group">
                        <textarea minlength="15" class="form-control p-4" rows="6" name="content" placeholder="Ma'qola" >{{ $post->content }}</textarea>
                        <p class="help-block text-danger">
                            @error('content')
                            &nbsp &nbsp &nbsp{{ $message }}
                            @enderror
                        </p>
                    </div>
                    <div class="flex">
                        <button title="salllo" class="btn btn-primary py-3 px-5" type="submit" id="sendMessageButton">
                            Saqlash
                        </button>
                        <a href="{{ route('posts.show', ['post' => $post->id]) }}" title="salllo" class="btn btn-danger py-3 px-5" type="submit" id="sendMessageButton">
                            Bekor qilish
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layouts.main>
