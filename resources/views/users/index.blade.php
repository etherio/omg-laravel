<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
            <span class="sm:ml-3">
                <x-button>
                    <a href="{{ route('users.create') }}">
                        <i class="fa fa-plus fa-fw pr-2"></i> <span class="font-bold">Add User</span>
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
                        Name
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Role
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Created at
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
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" alt="avatar"
                                        src="https://ui-avatars.com/api/?name={!!  urlencode($user->name) !!}">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $user->name }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        <a href="mailto:{{ $user->email }}"
                                            class="text-blue-600 hover:text-indigo-800 hover:underline">
                                            {{ $user->email }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if ($user->isAdmin())
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-600 text-white">Admin</span>
                            @else
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-400 text-white">User</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if ($user->email_verified_at)
                                <span
                                    class="px-2 cursor-pointer inline-flex text-xs leading-5 font-semibold rounded-full bg-green-600 text-white"
                                    data-tooltip="{{ $user->email_verified_at->getTimestamp() }}">Verified</span>
                            @else
                                <form action="{{ route('users.verify', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="px-2 cursor-pointer inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-600 text-white">Pending</button>
                                </form>
                            @endif
                        </td>
                        <td class="px-6 py-5 whitespace-no-wrap text-sm font-medium">
                            {{ $user->created_at }}
                        </td>
                        <td class="px-6 py-5 whitespace-no-wrap text-sm font-medium">
                            <a href="{{ route('users.edit', $user->id) }}"
                                class="text-indigo-600 hover:underline">Edit</a>
                        </td>
                        <td class="px-6 py-5 whitespace-no-wrap text-sm font-medium">
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
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
