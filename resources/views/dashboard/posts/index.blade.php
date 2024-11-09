@extends('dashboard.layouts.main')


@section('container')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-semibold text-gray-800">My Posts</h1>

    

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
<div class="mt-10 bg-white p-6 rounded-lg shadow-md">
    <a href="/dashboard/posts/create" class="bg-indigo-600 text-white px-5 py-2 rounded mb-4">
        Create New Post
    </a>
    @if (session('success'))
        <div class="p-4 mb-4 mt-3 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            <span class="font-large">{{ session('success') }}</span> 
        </div>
    @endif
    <h3 class="text-xl font-semibold text-gray-800 mb-4 mt-5">Activity Table</h3>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="text-left bg-gray-50">
                    <th class="py-3 px-6 text-sm font-medium text-gray-700">#</th>
                    <th class="py-3 px-6 text-sm font-medium text-gray-700">Title</th>
                    <th class="py-3 px-6 text-sm font-medium text-gray-700">Category</th>
                    <th class="py-3 px-6 text-sm font-medium text-gray-700">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post )
                    <!-- Row 1 -->
                <tr class="border-b border-gray-200">
                    <td class="py-3 px-6 text-sm text-gray-800">{{ $loop->iteration }}</td>
                    <td class="py-3 px-6 text-sm text-gray-800">{{ $post->title }} One</td>
                    <td class="py-3 px-6 text-sm text-gray-600">{{ $post->category->name }}</td>
                    <td class="py-3 px-6 text-sm">
                        <div class="flex space-x-3">
                            <!-- Lihat Button -->
                            <a href="/dashboard/posts/{{ $post->slug }}" class="text-indigo-600 hover:text-indigo-800">
                                <i data-feather="eye" class="w-5 h-5"></i>
                            </a>
                            
                            <!-- Edit Button -->
                            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="text-yellow-500 hover:text-yellow-700">
                                <i data-feather="edit" class="w-5 h-5"></i>
                            </a>
                            
                            <!-- Delete Button -->
                            <form action="/dashboard/posts/{{ $post->slug }}" method="post" onsubmit="return confirm('Are you sure?')">
                                @method('delete')
                                @csrf
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <i data-feather="trash-2" class="w-5 h-5"></i>
                                </button>
                            </form>

                        
                        </div>
                    </td>
                </tr>
                @endforeach
                
                
            </tbody>
        </table>
    </div>
</div>
@endsection















