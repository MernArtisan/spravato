@extends('web.layouts.master')

@section('content')
    <style>
        .full-preview {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .profile-sidebar {
            position: fixed;
            top: 100px;
            z-index: 99;
            width: 20%;
            margin-top: -19px !important;
        }

        .recent-notification {
            position: fixed;
            right: 10%;
            width: 20%;
        }

        .card.widget-item.latest-news {
            height: 40vh;
            overflow: auto;
        }

        @media (max-width: 991.98px) {

            .profile-sidebar,
            .recent-notification {
                position: static !important;
                width: 100% !important;
                margin: 0 !important;
            }

            .scrollable-center {
                height: auto !important;
                overflow: visible !important;
            }

            .offset-3 {
                margin-left: 0 !important;
            }
        }

        #submitPostBtn {
            background-color: #26a69a;
            padding: 6px;
            color: white;
        }

        .like-btn {
            background: none;
            border: none;
            color: #ccc;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .like-btn.liked {
            color: #1877f2;
            /* Facebook blue */
        }

        .like-btn i {
            font-size: 18px;
        }
    </style>
    @php
        $image =
            Auth::user()->image ?? (Auth::user()->provider->logo ?? '/web/assets/images/profile/Default-image.jpg');
    @endphp

    <main>
        <div class="main-wrapper pt-80">
            <div class="container">

                <div class="row">
                    <div class="col-12 col-lg-3 order-2 order-lg-1 profile-sidebar d-none d-lg-block">
                        <aside class="widget-area">
                            <!-- widget single item start -->
                            <div class="card card-profile widget-item p-0">
                                <div class="profile-banner">
                                    <figure class="profile-banner-small">
                                        <a href="{{ route('users.profile', Auth::user()->id) }}">
                                            <img src="{{ asset($image) }}" width="260px"
                                                alt="">
                                        </a>
                                        <a href="{{ route('users.profile', Auth::user()->id) }}" class="profile-thumb-2">
                                            <img src="{{ asset($post->user->image ?? ($post->user->provider->logo ?? '')) }}"
                                                alt="">
                                        </a>
                                    </figure>
                                    <div class="profile-desc text-center">
                                        <h6 class="author"><a
                                                href="{{ route('users.profile', Auth::user()->id) }}">{{ Auth::user()->first_name }}
                                                {{ Auth::user()->last_name }}</a></h6>
                                        <p>Any one can join with but Social network us if you want Any one can join with us
                                            if you want</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-profile widget-item p-0">
                                <div class="profile-banner">
                                </br>
                               
                                &nbsp;&nbsp;&nbsp;  <i class="fa fa-calendar" aria-hidden="true"></i> <b>&nbsp;&nbsp;&nbsp;  {{ Auth::user()->created_at->format('d M Y') }}  </b>
                                
                                </div>
                                </br>
                            </div>
                            <!-- widget single item end -->
                        </aside>
                    </div>

                    <div class="col-12 col-lg-6 order-1 order-lg-2 scrollable-center offset-3">
                        <!-- share box start -->
                        <div class="card card-small">
                            <div class="share-box-inner">
                                <!-- profile picture end -->
                                <div class="profile-thumb">
                                    <a href="#">
                                        <figure class="profile-thumb-middle">
                                         

                                            <img src="{{ asset($image) }}" alt="profile picture">

                                        </figure>
                                    </a>
                                </div>
                                <!-- profile picture end -->

                                <!-- share content box start -->
                                <div class="share-content-box w-100">
                                    <form class="share-text-box d-flex align-items-center justify-content-between gap-2">
                                        <textarea name="share" class="share-text-field form-control bg-transparent" placeholder="Say Something"
                                            id="triggerTextarea" rows="1"></textarea>
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-teal text-white px-3 py-1 rounded-pill" type="submit"
                                                style="background-color: #26a69a;">Share</button>
                                            <a href="#" class="btn btn-teal text-white px-3 py-1 rounded-pill"
                                                style="background-color: #26a69a;">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                        </div>
                                    </form>
                                </div>



                            </div>
                        </div>
                        <div id="postContainer">
                            @include('web.home.partials.post_list', ['posts' => $posts])
                        </div>

                        <div id="loadMoreLoader" class="text-center my-3" style="display: none;">
                            <span class="spinner-border text-primary"></span>
                        </div>



                    </div>

                    <div class="col-12 col-lg-3 order-3 recent-notification d-none d-lg-block">
                        <aside class="widget-area">
                            <!-- widget single item start -->
                            <div class="card widget-item">
                                <h4 class="widget-title">Recent Notifications</h4>
                                <div class="widget-body">
                                    <ul class="like-page-list-wrapper">

                                        @forelse ($latest_post as  $lpost)
                                            <li class="unorder-list">

                                                <a href="{{ route('single.post', $lpost->id) }}">
                                                    <figure class="profile-thumb-small">
                                                        <img src="{{ asset($lpost->user->image) }}" alt="profile picture">
                                                    </figure>
                                                </a>
                                                <!-- profile picture end -->

                                                <div class="unorder-list-info">
                                                    <h3 class="list-title"><a
                                                            href="{{ route('single.post', $lpost->id) }}">{{ $lpost->content ?? ' ' }}</a>
                                                    </h3>
                                                    <p class="list-subtitle">{{ $lpost->created_at->diffForHumans() }}
                                                    </p>
                                                </div>
                                            </li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="d-flex justify-content-center">
        <Spinner Type="SpinnerType.Border" />
    </div>

    <!-- Modal -->
    <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header border-0">
                    <div class="d-flex align-items-center gap-2">

                        <img src="{{ asset($user->image ?? ($user->provider->logo ?? '')) }}" class="rounded-circle"
                            width="40" height="40">

                        <div>
                            <strong>{{ Auth::user()->name }}</strong>
                            <div class="text-muted" style="font-size: 12px;">Post to Anyone</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <textarea class="form-control border-0" id="postText" rows="6" placeholder="What do you want to talk about?"
                        style="resize: none; font-size: 12px; min-height: 50px;"></textarea>

                    <!-- Preview area -->
                    <div id="previewBox" class="mt-3"></div>
                    <!-- File input -->
                    <input type="file" id="postFile" class="form-control mt-3 d-none" accept="image/*,video/*" multiple>


                </div>

                <div class="modal-footer border-0 justify-content-between">
                    <div class="d-flex gap-2">
                        <button class="btn btn-light" onclick="$('#postFile').click()" title="Photo/Video"><i
                                class="fas fa-image"></i></button>
                        {{-- <button class="btn btn-light" title="Event"><i class="fas fa-calendar-alt"></i></button>
            <button class="btn btn-light" title="More"><i class="fas fa-plus"></i></button> --}}
                    </div>
                    <button class="rounded-pill px-4" id="submitPostBtn" onclick="submitPost()">Post</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fullscreen Loader -->
    <div id="postLoader"
        style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(2, 2, 2, 0.8); z-index:9999;">
        <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
            <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>


    <!-- Add to your layout -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
@section('scripts')
    <script>
        document.getElementById("triggerTextarea").addEventListener("focus", function() {
            var modal = new bootstrap.Modal(document.getElementById('postModal'));
            modal.show();
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $('#postFile').on('change', function(e) {
            const files = e.target.files;
            const previewBox = $('#previewBox');
            previewBox.html('');

            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const src = e.target.result;
                    let element = '';

                    if (file.type.startsWith('image/')) {
                        element =
                            `<img src="${src}" class="w-100 rounded mb-3" style="max-height: 300px; object-fit: cover;">`;

                    } else if (file.type.startsWith('video/')) {
                        element = `<video controls class="w-100 rounded mb-3" style="max-height: 300px; object-fit: cover;">
             <source src="${src}" type="${file.type}">
           </video>`;

                    }

                    previewBox.append(element);
                };
                reader.readAsDataURL(file);
            });
        });

        function submitPost() {
            const text = $('#postText').val();
            const files = $('#postFile')[0].files;
            const formData = new FormData();

            formData.append('text', text);
            for (let i = 0; i < files.length; i++) {
                formData.append('files[]', files[i]);
            }

            $('#postLoader').show();
            $('#submitPostBtn').prop('disabled', true);

            $.ajax({
                url: '/posts-store', // ✔ make sure route is correct
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // ✔ CSRF token from meta
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    location.reload();
                    $('#postModal').modal('hide');
                    $('#postText').val('');
                    $('#previewBox').html('');
                    $('#postFile').val('');
                },
                error: function(err) {
                    alert("Error submitting post.");
                    console.log(err);
                },
                complete: function() {
                    $('#postLoader').hide();
                    $('#submitPostBtn').prop('disabled', false);
                }
            });
        }

        document.addEventListener("DOMContentLoaded", function() {
            @foreach ($posts as $post)
                const el{{ $post->id }} = document.getElementById("lightGallery{{ $post->id }}");
                if (el{{ $post->id }}) {
                    lightGallery(el{{ $post->id }}, {
                        selector: 'a',
                        plugins: [lgVideo],
                        licenseKey: '0000-0000-000-0000',
                        speed: 500,
                    });
                }
            @endforeach
        });

        function checkPostValidity() {
            const text = document.getElementById('postText').value.trim();
            const files = document.getElementById('postFile').files;

            const postButton = document.getElementById('submitPostBtn');

            if (text.length > 0 || files.length > 0) {
                postButton.disabled = false;
                postButton.classList.add('btn-primary');
                postButton.classList.remove('btn-secondary');
            } else {
                postButton.disabled = true;
                postButton.classList.add('btn-secondary');
                postButton.classList.remove('btn-primary');
            }
        }

        // Events
        document.getElementById('postText').addEventListener('input', checkPostValidity);
        document.getElementById('postFile').addEventListener('change', checkPostValidity);

        // Initial state
        checkPostValidity();

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
                    } else {
                        $('#likeBtn_' + postId).removeClass('liked');
                    }

                    $('#likeText_' + postId).text(response.liked ? 'Like' : 'Like');
                    $('#likeCount_' + postId).text(response.like_count);


                    // $('#likeText_' + postId).text(response.liked ? 'Liked' : 'Like');
                }
            });
        }


        function toggleCommentBox(postId) {
            $('#commentBox_' + postId).toggle(); // You can create a hidden comment box div
        }

        function submitComment(postId) {
            const commentText = $('#commentInput_' + postId).val();

            if (commentText.trim() === '') return;

            $.ajax({
                url: '/comment-post',
                type: 'POST',
                data: {
                    post_id: postId,
                    comment_text: commentText,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Append new comment
                    $('#commentList_' + postId).prepend(`
                <div><strong>${response.user_name}</strong>: ${response.comment_text}</div>
            `);

                    // Clear input
                    $('#commentInput_' + postId).val('');

                    // Update comment count
                    let currentCount = parseInt($('#commentCount_' + postId).text());
                    $('#commentCount_' + postId).text(currentCount + 1);
                }
            });
        }

        function initializeLightGallery() {
    document.querySelectorAll('[id^="lightGallery"]').forEach(function(el) {
        if (!el.classList.contains('lg-initialized')) {
            lightGallery(el, {
                selector: 'a',
                plugins: [lgVideo],
                licenseKey: '0000-0000-000-0000',
                speed: 500,
            });
            el.classList.add('lg-initialized');
        }
    });
}

document.addEventListener("DOMContentLoaded", function() {
    initializeLightGallery();
});

    </script>

    <script>
        let page = 1;
        let loading = false;
        let lastPageReached = false;

        $(window).scroll(function() {
            if (lastPageReached || loading) return;

            if ($(window).scrollTop() + $(window).height() >= $(document).height() - 300) {
                // Reached near bottom
                page++;
                loading = true;
                $('#loadMoreLoader').show();

                $.ajax({
                    url: "?page=" + page,
                    type: 'GET',
                    success: function(data) {
                        if (data.trim() === '') {
                            lastPageReached = true;
                            $('#loadMoreLoader').hide();
                        } else {
                            $('#postContainer').append(data);
                            $('#loadMoreLoader').hide();
                            loading = false;
                        }
                           initializeLightGallery();
                    },
                    error: function() {
                        alert('Something went wrong!');
                        $('#loadMoreLoader').hide();
                        loading = false;
                    }
                });
            }
        });
    </script>
@endsection
