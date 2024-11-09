@extends('dashboard.layouts.main')

@section('container')

<div class="flex justify-between items-center mb-6 ">
    <article class="justify-between items-center format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">

        <a href="/dashboard/posts" class="inline-flex items-center text-indigo-600 hover:text-indigo-800 px-4 py-2 rounded-lg border border-indigo-600 hover:bg-indigo-100">
            <i data-feather="arrow-left" class="w-5 h-5 mr-2"></i>
            Back to all my posts
        </a>
        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="inline-flex items-center text-yellow-500 hover:text-yellow-700 px-4 py-2 rounded-lg border border-yellow-500 hover:bg-yellow-100">
            <i data-feather="edit" class="w-5 h-5 mr-2"></i>
            Edit
        </a>
        <!-- Delete Button -->
        <form action="/dashboard/posts/{{ $post->slug }}" method="post" onsubmit="return confirm('Are you sure?')" class="inline">
            @method('delete')
            @csrf
            <button type="submit" class="inline-flex items-center text-red-600 hover:text-red-800 px-4 py-2 rounded-lg border border-red-800 hover:bg-red-100">
                <i data-feather="trash-2" class="w-5 h-5 mr-2"></i>
                Delete
            </button>
        </form>

        <header class="mb-4 lg:mb-6 not-format">
            <address class="flex items-center my-6 not-italic">
                <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-black">
                    <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="{{ $post->author->name }}">
                    <div>
                        <a href="/posts?author={{ $post->author->username }}" rel="author" class="text-xl font-bold text-gray-900 dark:text-black">{{ $post->author->name }}</a>
                        {{-- <p class="text-base text-gray-500 dark:text-gray-400 mb-1">{{ $post->created_at->diffForHumans() }}</p> --}}
                        <a href="/posts?category={{ $post->category->slug }}">
                            <span class="bg-{{ $post->category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                {{ $post->category->name }}
                            </span>
                            </a>
                    </div>
                </div>
            </address>
            <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-black">{{ $post->title }}</h1>
        </header>
        
        <p>{{ $post->body }}</p>
    </article>
</div>

@endsection