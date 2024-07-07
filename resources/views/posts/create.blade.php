<x-layouts.main>

    <x-slot:title>
        Post Yaratish
    </x-slot:title>

    <x-page-header>
        Yangi Post Yaratish
    </x-page-header>

    <div class="row justify-content-center">
        <div class="col-lg-7 mb-5 mb-lg-0">
            <div class="contact-form">
                <div id="success"></div>


                <form action="{{ route('posts.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="control-group">
                        <input value="{{ old('title') }}" name="title" minlength="3" maxlength="40" type="text" class="form-control p-4" placeholder="Sarlavha"  />
                        <p class="help-block text-danger">
                        @error('title')
                            &nbsp &nbsp &nbsp{{ $message }}
                        @enderror
                        </p>
                    </div>
                    <div class="control-group">
                        <select name="category_id" class="text-dark form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="control-group">
                        <select name="tags[]" class="text-dark form-control" multiple>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
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
                        <textarea minlength="10" name="short_content" class="form-control p-4" rows="3" placeholder="Qisqacha Mazmuni" >{{ old('short_content') }}</textarea>
                        <p class="help-block text-danger">
                            @error('short_content')
                            &nbsp &nbsp &nbsp{{ $message }}
                            @enderror
                        </p>
                    </div>
                    <div class="control-group">
                        <textarea minlength="15" class="form-control p-4" rows="6" name="content" placeholder="Ma'qola" >{{ old('content') }}</textarea>
                        <p class="help-block text-danger">
                            @error('content')
                            &nbsp &nbsp &nbsp{{ $message }}
                            @enderror
                        </p>
                    </div>
                    <div>
                        <button title="salllo" class="btn btn-primary btn-block py-3 px-5" type="submit" id="sendMessageButton">
                            Saqlash
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.main>
