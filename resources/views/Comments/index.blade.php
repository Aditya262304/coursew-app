<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post and Comments') }}
        </h2>
    </x-slot>

    @section('content')

    @if (Auth::user()->usertype === "admin")
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid justify-items-center text-white">



        <div class="m-8 p-6 bg-gray-500 border border-gray-200 rounded-lg shadow dark:bg-gray-500 dark:border-gray-700 w-4/5">

            <div class="container mt-1">
                <div class="row g-3 mb-2">
                    <div class="col-md-3">
                        {{$post->user->name}}
                    </div>
                    <div class="col-md-7">
                        <a href="{{route('user.index',['id' =>$post->user->id])}}">{{$post->user->tags->nametag}}</a>
                    </div>

                </div>
            </div>

            <div class="mt-3 p-6 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class = "mb-3">
                        {{ $post->post }}
                </div>
                @if($post->image)
                <div class = "rounded mx-auto d-block ">
                    <img src="{{ asset('uploads/' . $post->image) }}" class="img-fluid rounded" alt="...">
                </div>
                @endif
            </div>
            <div class="text-bottom pt-6 flex items-center justify-between ">

                <div class="small d-flex justify-content-start">
                    <a href="#!" class="d-flex align-items-center me-3">
                        <i class="far fa-thumbs-up me-2"></i>
                        <p class="mb-0">Like</p>
                    </a>
                </div>
                {{$post->created_at->format('Y-m-d')}}
            </div>
            <div class=" mt-4 p-6 border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700
                text-white">
                @include('Comments.create')
            </div>

            <div
                class=" mt-4 p-6 border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700 text-white">
                <div class="mt-4 ">
                    @foreach ($post->comments as $comment)
                    <div class="mt-2 mb-4 p-6 border border-gray-200 rounded-lg shadow dark:bg-gray-500 dark:border-gray-700">
                        <div class="container mt-1">
                            <div class="row g-3 mb-4">
                                <div class="col-md-2">
                                    {{ $comment->user->name }}
                                </div>
                                <div class="col-md-8">
                                    <a href="{{route('user.index',['id' =>$post->user->id])}}">{{$post->user->tags->nametag}}</a>
                                </div>
                                <div class="col">

                                    <a href="#" class="link-muted">Edit</a>

                                </div>
                            </div>
                        </div>
                        <div class=" p-6 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            {{ $comment->comment }}
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>


        </div>


    </div>
    @else
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid justify-items-center text-white">



        <div class="m-8 p-6 bg-gray-500 border border-gray-200 rounded-lg shadow dark:bg-gray-500 dark:border-gray-700 w-4/5">

            <div class="container mt-1">
                <div class="row g-3 mb-2">
                    <div class="col-md-3">
                        {{$post->user->name}}
                    </div>
                    <div class="col-md-7">
                        <a href="{{route('user.index',['id' =>$post->user->id])}}">{{$post->user->tags->nametag}}</a>
                    </div>

                </div>
            </div>

            <div class="mt-3 p-6 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class = "mb-3">
                        {{ $post->post }}
                </div>
                @if($post->image)
                <div class = "rounded mx-auto d-block ">
                    <img src="{{ asset('uploads/' . $post->image) }}" class="img-fluid rounded" alt="...">
                </div>
                @endif
            </div>
            <div class="text-bottom pt-6 flex items-center justify-between ">

                <div class="small d-flex justify-content-start">
                    <a href="#!" class="d-flex align-items-center me-3">
                        <i class="far fa-thumbs-up me-2"></i>
                        <p class="mb-0">Like</p>
                    </a>
                </div>
                {{$post->created_at->format('Y-m-d')}}
            </div>
            <div class=" mt-4 p-6 border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700
                text-white">
                @include('Comments.create')
            </div>

            <div
                class=" mt-4 p-6 border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700 text-white">
                <div class="mt-4 ">
                    @foreach ($post->comments as $comment)
                    <div class="mt-2 mb-4 p-6 border border-gray-200 rounded-lg shadow dark:bg-gray-500 dark:border-gray-700">
                        <div class="container mt-1">
                            <div class="row g-3 mb-4">
                                <div class="col-md-2">
                                    {{ $comment->user->name }}
                                </div>
                                <div class="col-md-8">
                                    {{ $comment->user->tags->nametag }}
                                </div>
                                <div class="col">
                                    @auth
                                    @if (Auth::id() == $comment->user->id)
                                    <a href="#" class="link-muted">Edit</a>
                                    @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                        <div class=" p-6 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            {{ $comment->comment }}
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>


        </div>


    </div>
    @endif



    @endsection
</x-app-layout>
