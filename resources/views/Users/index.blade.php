<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Post and Comment') }}
        </h2>
    </x-slot>

    <div class="py-12">

                <div class="col-md-6">
                <h1 class="align-center text-black">Posts</h1>

                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach ($posts as $post)
                            <div class="m-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-red-800 dark:border-red-700">
                                {{ $post->post }}
                            </div>
                        @endforeach
                    </div>

                </div>

                <div class="col-md-6 mt-5">
                <h1 class="text-black">Comments</h1>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach ($comments as $comment)
                            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                {{ $comment->comment }}
                            </div>
                        @endforeach
                    </div>
                </div>

    </div>
</x-app-layout>
