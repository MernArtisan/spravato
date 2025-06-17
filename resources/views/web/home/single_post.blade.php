@extends('web.layouts.master')

@section('content')
    <style>
        .single-post-wrapper {
            max-width: 900px;
            margin: 50px auto;
        }

        .post-meta button {
            background: none;
            border: none;
            color: #1877f2;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .post-meta button:hover {
            opacity: 0.8;
        }
        
        .like-btn {
            background: none;
            border: none;
            color: #ccc !important;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .like-btn.liked {
            color: #1877f2 !important;
            /* Facebook blue */
        }

        .like-btn i {
            font-size: 18px;
        }
    </style>

    <br><br>

    <div class="single-post-wrapper">
        <div id="lightGallery1" class="post-thumb-gallery img-gallery row g-1 mb-3">
            @include('web.home.partials.post_user', ['posts' => [$post]]) {{-- Pass as array --}}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.0/lightgallery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.0/plugins/video/lg-video.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const el = document.getElementById("lightGallery1");
            if (el) {
                lightGallery(el, {
                    selector: 'a',
                    plugins: [lgVideo],
                    licenseKey: '0000-0000-000-0000',
                    speed: 500,
                });
            }
        });

        // Like AJAX
        function toggleLike(postId) {
            $.ajax({
                url: '/like-post',
                type: 'POST',
                data: {
                    post_id: postId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.liked) {
                        $('#likeBtn_' + postId).addClass('liked');
                        $('#likeText_' + postId).text('Liked');
                    } else {
                        $('#likeBtn_' + postId).removeClass('liked');
                        $('#likeText_' + postId).text('Like');
                    }

                    $('#likeCount_' + postId).text(response.like_count);
                },
                error: function() {
                    alert('Error liking post');
                }
            });
        }

        // Comment Toggle
        function toggleCommentBox(postId) {
            $('#commentBox_' + postId).toggle();
        }

        // Submit Comment AJAX
        function submitComment(postId) {
            const commentText = $('#commentInput_' + postId).val().trim();
            if (commentText === '') return;

            $.ajax({
                url: '/comment-post',
                type: 'POST',
                data: {
                    post_id: postId,
                    comment_text: commentText,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#commentList_' + postId).prepend(`
                        <div class="mb-1">
                            <strong>${response.user_name}</strong>: ${response.comment_text}
                        </div>
                    `);

                    $('#commentInput_' + postId).val('');

                    let currentCount = parseInt($('#commentCount_' + postId).text());
                    $('#commentCount_' + postId).text(currentCount + 1);
                },
                error: function() {
                    alert('Error submitting comment');
                }
            });
        }
    </script>
@endsection
