<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid justify-items-center">
    <form  method="post" id="commentForm" class="w-4/5 max-w-2xl bg-gray-300 rounded-lg p-2 mx-auto m-4">
        @csrf

        <input type="hidden" class="user_id" value="{{ auth()->user()->id }}">
        <input type="hidden" class="post_id" value="{{ $post->id }}">
        <input type="hidden" class="user_name" value="{{ auth()->user()->name }}">
        <input type="hidden" class="user_tag" value="{{ $post->user->tags->nametag }}">

        <div class="px-3 mb-2 mt-2">
            <textarea id="commentInput" placeholder="Comment" class="comment w-full bg-gray-100 rounded border border-gray-900 leading-normal resize-none h-20 py-2 px-3 font-medium placeholder-gray-900 focus:outline-none text-black"></textarea>
        </div>
        <div class="flex justify-end px-4">
            <input type="submit" class="comment_submit px-2.5 py-1.5 rounded-md text-white text-sm bg-indigo-500" value="Comment">
        </div>
    </form>
</div>

@section('scripts')
<script>

$(document).ready(function () {
        $(document).on('click', '.comment_submit', function(e){
            e.preventDefault();
            // AJAX request
            //console.log("hello");

            var data ={
                'comment' : $('.comment').val(),
                'user_id' : $('.user_id').val(),
                'post_id' : $('.post_id').val(),
            }
            console.log(data);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '/comments',
                data: data,
                dataType: "json",
                success: function (data) {
                    console.log('Comment submitted successfully:', data);


                    var commentHtml = '<div class=" mt-2 mb-4 p-6 border border-gray-200 rounded-lg shadow dark:bg-gray-500 dark:border-gray-700">' +
                        '<div class="container mt-1">' +
                            '<div class="row g-3 mb-4">' +
                                '<div class="col-md-2">' +
                                    $('.user_name').val() +
                                '</div>' +
                                '<div class="col-md-8">' +

                                    $('.user_tag').val() +
                                '</div>' +
                                '<div class="col">' +
                                    '<a href="#" class="link-muted">Edit</a>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                        '<div class=" p-6 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">' +
                            data.comment +
                        '</div>' +
                    '</div>';

                    $('.jai').append(commentHtml);

                },
                error: function (error) {
                    // Handle errors (e.g., display an error message)
                    console.error('Error submitting comment:', error);
                },
            });
        });
    });
</script>


@endsection
