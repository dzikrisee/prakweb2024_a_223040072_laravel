@extends('dashboard.layouts.main')


@section('container')
<div class="mt-10 bg-white p-6 rounded-lg shadow-md">
    <h3 class="text-xl font-semibold text-gray-800 mb-4">Activity Table</h3>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="text-left bg-gray-50">
                    <th class="py-3 px-6 text-sm font-medium text-gray-700">Title</th>
                    <th class="py-3 px-6 text-sm font-medium text-gray-700">Category</th>
                    <th class="py-3 px-6 text-sm font-medium text-gray-700">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Row 1 -->
                <tr class="border-b border-gray-200">
                    <td class="py-3 px-6 text-sm text-gray-800">Activity One</td>
                    <td class="py-3 px-6 text-sm text-gray-600">Category A</td>
                    <td class="py-3 px-6 text-sm">
                        <div class="flex space-x-3">
                            <!-- Lihat Button -->
                            <button class="text-indigo-600 hover:text-indigo-800">
                                <i data-feather="eye" class="w-5 h-5"></i>
                            </button>
                            <!-- Edit Button -->
                            <button class="text-yellow-500 hover:text-yellow-700">
                                <i data-feather="edit" class="w-5 h-5"></i>
                            </button>
                            <!-- Delete Button -->
                            <button class="text-red-600 hover:text-red-800">
                                <i data-feather="trash-2" class="w-5 h-5"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <!-- Row 2 -->
                <tr class="border-b border-gray-200">
                    <td class="py-3 px-6 text-sm text-gray-800">Activity Two</td>
                    <td class="py-3 px-6 text-sm text-gray-600">Category B</td>
                    <td class="py-3 px-6 text-sm">
                        <div class="flex space-x-3">
                            <!-- Lihat Button -->
                            <button class="text-indigo-600 hover:text-indigo-800">
                                <i data-feather="eye" class="w-5 h-5"></i>
                            </button>
                            <!-- Edit Button -->
                            <button class="text-yellow-500 hover:text-yellow-700">
                                <i data-feather="edit" class="w-5 h-5"></i>
                            </button>
                            <!-- Delete Button -->
                            <button class="text-red-600 hover:text-red-800">
                                <i data-feather="trash-2" class="w-5 h-5"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <!-- Row 3 -->
                <tr class="border-b border-gray-200">
                    <td class="py-3 px-6 text-sm text-gray-800">Activity Three</td>
                    <td class="py-3 px-6 text-sm text-gray-600">Category C</td>
                    <td class="py-3 px-6 text-sm">
                        <div class="flex space-x-3">
                            <!-- Lihat Button -->
                            <button class="text-indigo-600 hover:text-indigo-800">
                                <i data-feather="eye" class="w-5 h-5"></i>
                            </button>
                            <!-- Edit Button -->
                            <button class="text-yellow-500 hover:text-yellow-700">
                                <i data-feather="edit" class="w-5 h-5"></i>
                            </button>
                            <!-- Delete Button -->
                            <button class="text-red-600 hover:text-red-800">
                                <i data-feather="trash-2" class="w-5 h-5"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection















