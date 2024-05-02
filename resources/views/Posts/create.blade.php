@if (session('status'))
    <h6 class="alert alert-success">{{session('status')}}</h6>
@endif
<div class="bg-gray-300 dark:bg-gray-600 overflow-hidden shadow-sm sm:rounded-lg w-3/5 m-4 ">
    <form class="max-w-2xl bg-gray-200 rounded-lg p-2 mx-auto m-4" action="{{route('post.store')}}" method="post" enctype="multipart/form-data" >
        @csrf

        <div class="px-3 mb-2 mt-2">
            <textarea name="post" placeholder="Post"
                class="w-full bg-gray-100 rounded border border-gray-400 leading-normal resize-none h-20 py-2 px-3 font-medium placeholder-gray-900  focus:outline-none "></textarea>
        </div>
        <div class="px-3 mb-2 mt-2">
            <label for="">Upload Image</label>
            <input type="file" name ="image" class="form-control" accept="image/*">
        </div>
        <div class="flex justify-end px-4">
            <input type="submit" class="px-2.5 py-1.5 rounded-md text-white text-sm bg-indigo-500" value="Post">
        </div>
    </form>
</div>
