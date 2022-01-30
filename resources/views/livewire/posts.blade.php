<div class="container mx-auto mt-2">
    <div class="flex content-center p-2 ml-6">
        <x-jet-button wire:click="showCreatePostModal">
            Create Post
        </x-jet-button>
    </div>
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 shadow md:rounded-lg">
                <table class="w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-200">
                                Id</th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-200">
                                Title</th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-200">
                                Status</th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-200">
                                Image</th>
                            <th scope="col" class="relative px-6 py-3">Edit</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr></tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">id</td>
                            <td class="px-6 py-4 whitespace-nowrap">title</td>
                            <td class="px-6 py-4 whitespace-nowrap">Active</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img class="w-8 h-8 rounded-full" src="https://picsum.photos/200" />
                            </td>
                            <td class="px-6 py-4 text-sm text-right">Edit Delete</td>
                        </tr>
                        <!-- More items... -->
                    </tbody>
                </table>
                <div class="p-2 m-2">Pagination</div>
            </div>
        </div>
        <x-jet-dialog-modal wire:model="showModalForm">
            <x-slot name="title">title</x-slot>
            <x-slot name="content">content</x-slot>
            <x-slot name="footer">footer</x-slot>
        </x-jet-dialog-modal>
    </div>
