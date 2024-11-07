<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-semibold text-gray-800">Welcome back, {{ auth()->user()->name }}!</h1>
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