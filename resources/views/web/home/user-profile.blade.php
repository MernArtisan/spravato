@extends('web.layouts.master')

@section('content')
    <style>
        /* Main Layout Styles */
        .main-wrapper {
            background-color: #f0f2f5;
            min-height: 100vh;
        }

        /* Profile Header Styles */
        .profile-header {
            position: relative;
            margin-bottom: 18px;
        }

        .cover-photo-container {
            height: 350px;
            background-color: #e4e6eb;
            border-radius: 8px 8px 0 0;
            overflow: hidden;
            position: relative;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .cover-photo {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .cover-photo-container:hover .cover-photo {
            transform: scale(1.02);
        }

        .profile-picture-container {
            position: absolute;
            bottom: -75px;
            left: 20px;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 4px solid #fff;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            background-color: #f0f2f5;
            transition: all 0.3s ease;
        }

        .profile-picture-container:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .profile-picture {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .edit-buttons {
            position: absolute;
            right: 20px;
            bottom: 20px;
            display: flex;
            gap: 10px;
        }

        .edit-photo-btn {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            border: none;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .edit-photo-btn:hover {
            background-color: rgba(0, 0, 0, 0.8);
            transform: scale(1.1);
        }

        .edit-cover-btn {
            background-color: rgba(255, 255, 255, 0.9);
            color: #050505;
            border: none;
            border-radius: 6px;
            padding: 8px 16px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .edit-cover-btn:hover {
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .hidden-file-input {
            display: none;
        }

        /* Sidebar Styles */
        .profile-sidebar {
            position: sticky;
            top: 100px;
            height: fit-content;
            margin-bottom: 20px;
        }

        .recent-notification {
            position: sticky;
            top: 100px;
            height: fit-content;
        }

        /* Post Card Styles */
        .post-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        .post-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .post-title {
            padding: 15px;
            border-bottom: 1px solid #f0f2f5;
        }

        .profile-thumb-middle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
        }

        .post-content {
            padding: 15px;
        }

        .post-desc {
            margin-bottom: 15px;
            color: #050505;
            line-height: 1.5;
        }

        .post-thumb-gallery {
            margin-bottom: 15px;
        }

        .post-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 10px;
            border-top: 1px solid #f0f2f5;
        }

        .post-meta-like,
        .post-comment,
        .post-share {
            background: none;
            border: none;
            display: flex;
            align-items: center;
            gap: 5px;
            color: #65676b;
            font-weight: 500;
            transition: color 0.3s;
        }

        .post-meta-like:hover,
        .post-comment:hover,
        .post-share:hover {
            color: #1877f2;
        }

        .comment-share-meta {
            display: flex;
            gap: 15px;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        /* Share Box Styles */
        .share-box {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            padding: 15px;
        }

        .share-content-box {
            width: 100%;
        }

        .share-text-field {
            border-radius: 20px;
            padding: 10px 15px;
            border: 1px solid #ddd;
            resize: none;
            transition: border-color 0.3s;
        }

        .share-text-field:focus {
            border-color: #1877f2;
            box-shadow: 0 0 0 2px rgba(24, 119, 242, 0.1);
            outline: none;
        }

        /* Notification Styles */
        .notification-item {
            padding: 10px;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        .notification-item:hover {
            background-color: #f0f2f5;
        }

        .notification-item .list-title {
            font-size: 14px;
            margin-bottom: 2px;
        }

        .notification-item .list-subtitle {
            font-size: 12px;
            color: #65676b;
        }

        /* Responsive Styles */
        @media (max-width: 991.98px) {

            .profile-sidebar,
            .recent-notification {
                position: static;
                margin-top: 0px;
            }

            .profile-picture-container {
                width: 120px;
                height: 120px;
                bottom: -60px;
            }

            .cover-photo-container {
                height: 250px;
            }
        }

        @media (max-width: 767.98px) {
            .profile-picture-container {
                width: 100px;
                height: 100px;
                bottom: -50px;
            }

            .edit-buttons {
                bottom: 10px;
                right: 10px;
            }

            .edit-cover-btn {
                padding: 6px 12px;
                font-size: 14px;
            }
        }

        /* Animation Styles */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .post-card {
            animation: fadeIn 0.5s ease forwards;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        /* Modal Styles */
        .modal-content {
            border: none;
            border-radius: 10px;
            overflow: hidden;
        }

        .modal-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #e9ecef;
        }

        .modal-footer {
            background-color: #f8f9fa;
            border-top: 1px solid #e9ecef;
        }

        /* Gallery Grid Styles */
        .gallery-grid {
            display: grid;
            grid-gap: 5px;
            border-radius: 8px;
            overflow: hidden;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .gallery-item:hover {
            transform: scale(1.02);
        }

        .gallery-item img,
        .gallery-item video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .remaining-count {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        /* Loading Spinner */
        .spinner-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100px;
        }

        .loading-spinner {
            width: 3rem;
            height: 3rem;
            border-width: 0.25em;
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

    <main class="main-wrapper">
        <div class="container py-5">
            <!-- Profile Header -->
            <div class="profile-header">
                <div class="cover-photo-container">
                    <img src="{{ asset($user->cover_image ? $user->cover_image : 'assets/images/default-cover.jpg') }}"
                        alt="Cover Photo" class="cover-photo" id="coverPhoto">
                    <div class="edit-buttons">

                        <input name="cover_image" type="file" id="coverPhotoInput" class="hidden-file-input"
                            accept="image/*">
                    </div>
                </div>

                <div class="profile-picture-container">
                    <img name="cover_image"
                        src="{{ asset($user->image ?? (optional($user->provider)->image ?? (optional($user->provider)->logo ?? 'assets/images/default-profile.jpg'))) }}"
                        alt="Profile Picture" class="profile-picture" id="profilePicture">
                    {{-- <button type="button" class="edit-photo-btn" id="editPhotoBtn">
                        <i class="bi bi-camera-fill"></i>
                    </button> --}}
                    <input name="image" type="file" id="profilePhotoInput" class="hidden-file-input" accept="image/*">
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-3 d-none d-lg-block profile-sidebar">
                        <div class="card shadow-sm mb-4 border-0 rounded-4">
                            <div class="card-body p-4">
                                <div class="text-center mb-4">
                                    <div class="fs-4 fw-semibold">{{ $user->first_name ?? '' }} {{ $user->last_name ?? '' }}</div>
                                    <div class="text-muted small">Profile Summary</div>
                                </div>
                                <hr>
                                <h5 class="card-title mb-3 text-primary">About</h5>
                                <ul class="list-unstyled lh-lg">
                                    <li class="d-flex align-items-center mb-2">
                                        <i class="bi bi-house-door-fill text-primary me-3 fs-5"></i>
                                        <span class="text-dark">Lives in
                                            <strong>{{ $user->city ?? 'Unknown' }}</strong></span>
                                    </li>
                                    <li class="d-flex align-items-center mb-2">
                                        <i class="bi bi-geo-alt-fill text-primary me-3 fs-5"></i>
                                        <span class="text-dark">From
                                            <strong>{{ $user->country ?? 'Unknown' }}</strong></span>
                                    </li>
                                    <li class="d-flex align-items-center mb-2">
                                        <i class="bi bi-calendar-event-fill text-primary me-3 fs-5"></i>
                                        <span class="text-dark">Joined
                                            <strong>{{ $user->created_at->format('M d, Y') }}</strong></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <!-- Main Content -->
                    <div class="col-lg-6">
                        @php
                            $image =
                                Auth::user()->image ??
                                (Auth::user()->provider->logo ?? '/web/assets/images/profile/Default-image.jpg');
                        @endphp
  <div id="postContainer">
                            @include('web.home.partials.post_list', ['posts' => $posts])
                        </div>

                        <div id="loadMoreLoader" class="text-center my-3" style="display: none;">
                            <span class="spinner-border text-primary"></span>
                        </div>



                    </div>

                    <!-- Right Sidebar - Desktop Only -->
                    <div class="col-lg-3 d-none d-lg-block recent-notification">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Recent Notifications</h5>
                                <div class="list-group list-group-flush">
                                    @foreach (range(1, 5) as $i)
                                        <a href="#"
                                            class="list-group-item list-group-item-action notification-item">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="profile-thumb">
                                                    <figure class="profile-thumb-small">
                                                        <img src="{{ asset($image) }}" alt="profile picture"
                                                            class="rounded-circle">
                                                    </figure>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1">New notification {{ $i }}</h6>
                                                    <small class="text-muted">{{ $i * 5 }} minutes ago</small>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                                <a href="#" class="btn btn-link w-100 mt-2">See All Notifications</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- Fullscreen Loader -->
    <div id="postLoader"
        style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.7); z-index:9999; backdrop-filter: blur(5px);">
        <div class="d-flex flex-column justify-content-center align-items-center h-100">
            <div class="spinner-border text-light" style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="text-white mt-3">Posting...</p>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.0/lightgallery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.0/plugins/video/lg-video.min.js"></script>

    <script>
        // Initialize lightGallery for each post
        document.addEventListener("DOMContentLoaded", function() {
            @foreach ($posts as $post)
                lightGallery(document.getElementById('lightGallery{{ $post->id }}'), {
                    selector: 'a',
                    plugins: [lgVideo],
                    download: false,
                    share: false
                });
            @endforeach

            // Profile picture and cover photo upload
            $('#editPhotoBtn').click(function() {
                $('#profilePhotoInput').click();
            });

            $('#editCoverBtn').click(function() {
                $('#coverPhotoInput').click();
            });

            $('#profilePhotoInput').change(function(e) {
                if (e.target.files.length > 0) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        $('#profilePicture').attr('src', event.target.result);
                        // Here you would typically upload the image to the server
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            });

            $('#coverPhotoInput').change(function(e) {
                if (e.target.files.length > 0) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        $('#coverPhoto').attr('src', event.target.result);
                        // Here you would typically upload the image to the server
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            });
        });

        // Post modal functionality
        function triggerPostModal() {
            $('#postModal').modal('show');
        }

        $('#triggerTextarea').on('focus', function() {
            triggerPostModal();
        });

        // File preview functionality
        $('#postFile').on('change', function(e) {
            const files = e.target.files;
            const previewBox = $('#previewBox');
            previewBox.html('');

            if (files.length > 0) {
                previewBox.append('<h6 class="mb-2">Media Preview:</h6>');
                previewBox.append('<div class="row g-2" id="mediaPreview"></div>');

                Array.from(files).forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const src = e.target.result;
                        const mediaCol = $('<div class="col-4"></div>');
                        const mediaContainer = $('<div class="position-relative"></div>');

                        if (file.type.startsWith('image/')) {
                            mediaContainer.append(
                                `<img src="${src}" class="img-fluid rounded" style="height: 100px; object-fit: cover;">`
                            );
                        } else if (file.type.startsWith('video/')) {
                            mediaContainer.append(`<video class="img-fluid rounded" style="height: 100px; object-fit: cover;" controls>
                                <source src="${src}" type="${file.type}">
                            </video>`);
                        }

                        // Add remove button
                        mediaContainer.append(`<button class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1 rounded-circle p-0" style="width: 20px; height: 20px;" onclick="removeMedia(${index})">
                            <i class="bi bi-x" style="font-size: 10px;"></i>
                        </button>`);

                        mediaCol.append(mediaContainer);
                        $('#mediaPreview').append(mediaCol);
                    };
                    reader.readAsDataURL(file);
                });
            }
        });

        function removeMedia(index) {
            const files = $('#postFile')[0].files;
            const newFiles = Array.from(files).filter((_, i) => i !== index);

            // Create new DataTransfer and add remaining files
            const dataTransfer = new DataTransfer();
            newFiles.forEach(file => dataTransfer.items.add(file));

            // Update file input
            $('#postFile')[0].files = dataTransfer.files;

            // Trigger change event to update preview
            $('#postFile').trigger('change');
        }

        // Infinite scroll
        let loading = false;
        let page = 2;

        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() > $(document).height() - 300 && !loading) {
                loadMorePosts();
            }
        });

        function loadMorePosts() {
            loading = true;
            $('.spinner-container').show();

            $.get(`/profile?page=${page}`, function(data) {
                if (data.html) {
                    $('.spinner-container').before(data.html);
                    page++;
                }
            }).always(function() {
                loading = false;
                $('.spinner-container').hide();
            });
        }


    
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
    </script>


@endsection
