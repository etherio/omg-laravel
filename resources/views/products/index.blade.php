<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Products') }}
            </h2>
            <span class="sm:ml-3">
                <x-button>
                    <a href="{{ route('products.create') }}">
                        <i class="fa fa-plus fa-fw pr-2"></i> <span class="font-bold">Add Product</span>
                    </a>
                </x-button>
            </span>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-8 pt-2 overflow-x-auto bg-white shadow-sm rounded-lg border-gray-20">

        <x-alert-status :status="session('status')" />

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Code#
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Product Infomation
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Price
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Color
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Size
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Age Groups
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <span class="sr-only">Edit</span>
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <span class="sr-only">Delete</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 text-sm">
                @foreach ($products as $product)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $product->code }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="ml-4">
                                    <div class="text-gray-900">
                                        {{ $product->name }}
                                    </div>
                                    <div class="text-xs text-gray-500">
                                        {{ $product->description }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            MMK{{ price($product->price) }}
                        </td>
                        <td class="px-6 py-5 whitespace-no-wrap text-sm">
                            {{ $product->color }}
                        </td>
                        <td class="px-6 py-5 whitespace-no-wrap text-sm">
                            {{ $product->size }}
                        </td>
                        <td class="px-6 py-5 whitespace-no-wrap text-sm">
                            <span id="min_age">{{ $product->min_age ?? '' }}</span>-<span id="max_age">{{ $product->max_age ?? '' }}</span>

                        </td>
                        <td class="px-6 py-5 whitespace-no-wrap text-sm">
                            <a href="{{ route('products.edit', $product->id) }}"
                                class="text-indigo-600 hover:underline">Edit</a>
                        </td>
                        <td class="px-6 py-5 whitespace-no-wrap text-sm">
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
