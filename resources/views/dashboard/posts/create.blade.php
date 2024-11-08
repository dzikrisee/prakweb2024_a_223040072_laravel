@extends('dashboard.layouts.main')

@section('container')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-semibold text-gray-800">Create New Post</h1>
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
    <form class="max-w-sm  text-black" method="post" action="/dashboard/posts">
      @csrf
        <div class="mb-5">
          <label for="title" class="block mb-2 text-sm font-medium">Title</label>
          <input type="text" id="title" name="title" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required autofocus />
        </div>
        <div class="mb-5">
          <label for="slug" class="block mb-2 text-sm font-medium">Slug</label>
          <input type="text" id="slug" name="slug" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required disabled readonly/>
        </div>
        <div class="mb-5">
          <label for="category" class="block mb-2 text-sm font-medium">Category</label>
            <select id="category" name="category_id" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-primary-500 block w-full p-2.5    dark:focus:ring-primary-500 dark:focus:border-primary-500">
              @foreach ( $categories as $category )
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
        </div>
        <div class="mb-5">
          <label for="body" class="block mb-2 text-sm font-medium">Body</label>
          <input id="body" type="hidden" name="body">
          <trix-editor input="body"></trix-editor>
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
</script>
  

@endsection