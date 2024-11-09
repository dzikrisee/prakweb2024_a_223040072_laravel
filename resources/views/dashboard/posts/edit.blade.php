@extends('dashboard.layouts.main')

@section('container')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-semibold text-gray-800">Edit Post</h1>
    <div class="flex items-center space-x-4">
        <form action="/logout" method="post">
            @csrf
            <button class="bg-indigo-600 text-white px-5 py-2 rounded flex items-center space-x-2" type="submit">
                <span data-feather="log-out" class="w-5 h-5"></span> 
                <span>Logout</span>
            </button>
            
            
          </form>      
    </div>
</div>


<div class="col-lg-8">
    <form class="max-w-sm  text-black" method="post" action="/dashboard/posts/{{ $post->slug }}" enctype="multipart/form-data">
      @method('put')
      @csrf

        {{-- Title --}}
        <div class="mb-5">
          <label for="title" class="block mb-2 text-sm font-medium">Title</label>
          <input type="text" id="title" name="title" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('title') is-invalid @enderror" required autofocus value="{{ old('title', $post->title) }}" />
          @error('title')
            <div class="invalid-feedback text-red-500 mt-2">
              {{ $message }}
            </div>
          @enderror
        </div>

        {{-- Slug --}}
        <div class="mb-5">
          <label for="slug" class="block mb-2 text-sm font-medium">Slug</label>
          <input type="text" id="slug" name="slug" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('slug') is-invalid @enderror" required readonly value="{{ old('slug'), $post->slug }}">

          @error('slug')
            <div class="invalid-feedback text-red-500 mt-2">
              {{ $message }}
            </div>
          @enderror
        </div>

        {{-- Category --}}
        <div class="mb-5">
          <label for="category" class="block mb-2 text-sm font-medium">Category</label>
            <select id="category" name="category_id" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-primary-500 block w-full p-2.5 dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('category') is-invalid @enderror" autofocus value="{{ old('category') }}" required>
              @foreach ( $categories as $category )
                @if (old('category_id', $post->category_id) == $category->id)
                  <option value="{{ $category->id }}" selected >{{ $category->name }}</option>
                @else
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
              @endforeach
            </select>

            @error('category')
              <div class="invalid-feedback text-red-500 mt-2">
                {{ $message }}
              </div>
            @enderror
        </div>

        {{-- Image --}}
        <div class="mb-5">
          <label class="block mb-2 text-sm font-medium text-gray-900 " for="image">Image</label>
          <input type="hidden" name="oldImage" value="{{ $post->image }}">
          @if ($post->image)
            <img src="{{ asset('storage/'. $post->image) }}" class="img-preview img-fluid">
          @else
          <img class="img-preview img-fluid">
          @endif
          
          <input class="block w-full text-lg  border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none @error('image') is-invalid @enderror" id="image" name="image" type="file" onchange="previewImage()">

          @error('image')
            <div class="invalid-feedback text-red-500 mt-2">
              {{ $message }}
            </div>
          @enderror
        </div>

        {{-- Body --}}
        <div class="mb-5">
          <label for="body" class="block mb-2 text-sm font-medium">Body</label>
          <input id="body" type="hidden" name="body" required value="{{ old('body', $post->body) }}">
          <trix-editor input="body"></trix-editor>
          @error('body')
            <p class="invalid-feedback text-red-500 mt-2">
              {{ $message }}
            </p>
          @enderror
        </div>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create Post</button>
      </form>
</div>

  
<script>
  // Fungsi untuk mengubah teks menjadi slug
  function generateSlug(text) {
    return text.toLowerCase()
      .replace(/[^a-z0-9\s-]/g, '')      // Hapus karakter yang bukan alfanumerik
      .trim()                             // Hapus spasi di awal dan akhir
      .replace(/\s+/g, '-')               // Ganti spasi dengan -
      .replace(/-+/g, '-');               // Ganti banyak strip dengan satu strip
  }

  // Dapatkan elemen title dan slug
  const titleInput = document.getElementById('title');
  const slugInput = document.getElementById('slug');

  // Pantau perubahan pada title untuk mengisi slug
  titleInput.addEventListener('input', function() {
    slugInput.value = generateSlug(titleInput.value);
  });

  function previewImage() {
  const image = document.querySelector('#image');
  const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    };
  }

  // 
  const image = document.querySelector('#image');
  const imgPreview = document.querySelector('.img-Preview');

  imgPreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);

  oFReader.onload = function(oFEvent) {
    imgPreview.src = oFEvent.target.result;
  }
</script>
  

@endsection