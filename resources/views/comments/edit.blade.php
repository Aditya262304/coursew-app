<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Comment') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid justify-items-center">
    <form class="w-3/5 max-w-2xl bg-gray-600 rounded-lg p-2 mx-auto m-4" action="{{route('comments.update', ['id' => $comment->id])}}" method="post"  >
        @csrf
        @method('PUT')
        <div class="px-3 mb-2 mt-2">
            <textarea placeholder="{{ $comment->comment }}"
                class="w-full bg-gray-500 rounded border border-gray-400 leading-normal resize-none h-20 py-2 px-3 font-medium placeholder-gray-900  focus:outline-none text-white"></textarea>
        </div>
        <div class="flex justify-end px-4">
            <input type="submit" class="px-2.5 py-1.5 rounded-md text-white text-sm bg-indigo-500" value="Update Comment">
        </div>
    </form>
</div>

    </div>


</x-app-layout>
