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
                        @foreach ($posts as $post )

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $post->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $post->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($post->active )
                                active
                                @else
                                Not active
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img class="w-8 h-8 rounded-full" src="{{ asset('storage/photos/'.$post->image) }}" />
                            </td>
                            <td class="px-6 py-4 text-sm text-right">
                                <x-jet-button wire:click="showEditPostModal({{ $post->id }})">Edit</x-jet-button>
                                <x-jet-button wire:click="deletePost({{ $post->id}})" class="bg-red-700">Delete</x-jet-button>                            </td>
                        </tr>
                        @endforeach
                        <!-- More items... -->
                    </tbody>
                </table>
                <div class="p-2 m-2">Pagination</div>
            </div>
        </div>
        <x-jet-dialog-modal wire:model="showModalForm">
            <x-slot name="title">title</x-slot>
            <x-slot name="content">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <form enctype="multipart/form-data">
                        <div class="sm:col-span-6">
                            <label for="title" class="block text-sm font-medium text-gray-700"> Post Title </label>
                            <div class="mt-1">
                                <input type="text" id="title" wire:model.lazy="title" name="title"
                                    class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <div class="w-64 p-2 m-2">
                                 @if ($newImage)
                                 Post Photo:
                                 <img src="{{ asset('storage/photos/'. $newImage ) }}">
                                 @endif
                                 @if ($image)
                                 Photo Preview:
                                 <img src="{{ $image->temporaryUrl() }}">
                                 @endif
                            </div>
                            <label for="title" class="block text-sm font-medium text-gray-700"> Post MyImage </label>
                            <div class="mt-1">
                                <input type="file" id="image" wire:model="image" name="image"
                                    class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <label for="body" class="block text-sm font-medium text-gray-700">Body</label>
                            <div class="mt-1">
                                <textarea id="body" rows="3" wire:model.lazy="body"
                                    class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                            </div>
                        </div>
                    </form>


                </div>
            </x-slot>
            <x-slot name="footer">
                @if($postId)
                <x-jet-button wire:click="updatePost">Update</x-jet-button>
                @else
                <x-jet-button wire:click="storePost">Store</x-jet-button>
                @endif
            </x-slot>
        </x-jet-dialog-modal>
    </div>
