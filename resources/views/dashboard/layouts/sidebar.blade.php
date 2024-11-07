<div class="w-64 bg-indigo-800 text-white p-5">
    <h2 class="text-2xl font-bold mb-6">Admin Dashboard</h2>
    <ul>
        <li><a href="#" class="block py-2 px-4 hover:bg-indigo-700 rounded {{ Request::is('dashboard') ? 'active' : '' }}">Dashboard</a></li>
        <li><a href="/dashboard/posts" class="block py-2 px-4 hover:bg-indigo-700 rounded {{ Request::is('dashboard/posts') ? 'active' : '' }}">My Posts</a></li>
    </ul>
</div>