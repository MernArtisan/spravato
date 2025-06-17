@php
    $media = $post->postmedia;
    $mediaCount = $media->count();
    $firstMedia = $media->take(1);
    $nextThree = $media->slice(1, 3);
    $remainingCount = $mediaCount - 4;
@endphp

<div class="card mb-4">
    <div class="post-title d-flex align-items-center">
        <div class="profile-thumb">
            <a href="#">
                <figure class="profile-thumb-middle">
                    <img src="{{ asset($post->user->image ?? ($post->user->provider->logo ?? '/web/assets/images/profile/Default-image.jpg')) }}"
                        alt="profile picture">
                </figure>
            </a>
        </div>
        <div class="posted-author">
            <h6 class="author">
                <a href="{{ route('users.profile', $post->user->id) }}" style="text-decoration: none;">
                    {{ $post->user->first_name . ' ' . $post->user->last_name }}
                </a>
            </h6>
            <span class="post-time">{{ $post->created_at->diffForHumans() }}</span>
        </div>
    </div>

    <div class="post-content">
        <p class="post-desc">{{ $post->content }}</p>

        <div id="lightGallery{{ $post->id }}" class="post-thumb-gallery img-gallery row g-1">
            <!-- First (Large) -->
            <div class="{{ $mediaCount > 1 ? 'col-8' : 'col-12' }}">
                @foreach ($firstMedia as $item)
                    <a href="{{ asset($item->path) }}"
                        @if ($item->type === 'video') data-video='{"source": [{"src": "{{ asset($item->path) }}", "type": "video/mp4"}], "attributes": {"controls": true}}'
                                            @else 
                                                data-lg-size="1400-900" @endif>
                        @if ($item->type === 'image')
                            <img src="{{ asset($item->path) }}"
                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                        @else
                            <video id="video{{ $item->id }}" class="video-js vjs-default-skin" controls
                                preload="auto" width="100%" data-setup='{}'>
                                <source src="{{ asset($item->path) }}" type="video/mp4" />
                            </video>
                        @endif
                    </a>
                @endforeach
            </div>

            <!-- Next 3 Thumbnails (stacked) -->
            <div class="col-4 d-flex flex-column gap-1">
                @foreach ($nextThree as $index => $item)
                    @php $isLastVisible = $index === 2 && $remainingCount > 0; @endphp
                    <a href="{{ asset($item->path) }}"
                        @if ($item->type === 'video') data-video='{"source": [{"src": "{{ asset($item->path) }}", "type": "video/mp4"}], "attributes": {"controls": true}}'
                                            @else 
                                                data-lg-size="1400-900" @endif
                        class="position-relative" style="flex: 1;">
                        @if ($item->type === 'image')
                            <img src="{{ asset($item->path) }}"
                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                        @else
                            <video muted style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                                <source src="{{ asset($item->path) }}" type="video/mp4">
                            </video>
                        @endif

                        @if ($isLastVisible)
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center"
                                style="background: rgba(0,0,0,0.5); color: white; font-size: 24px; border-radius: 8px;">
                                +{{ $remainingCount }}
                            </div>
                        @endif
                    </a>
                @endforeach
            </div>

            <!-- Hidden remaining media -->
            @foreach ($media->slice(4) as $item)
                <a href="{{ asset($item->path) }}"
                    @if ($item->type === 'video') data-video='{"source": [{"src": "{{ asset($item->path) }}", "type": "video/mp4"}], "attributes": {"controls": true}}'
                                        @else 
                                            data-lg-size="1400-900" @endif
                    class="d-none"></a>
            @endforeach
        </div>

        <!-- Post Meta -->
        <div class="post-meta mt-2">
            <button
                class="like-btn {{ in_array(Auth::id(), $post->likes->pluck('user_id')->toArray()) ? 'liked' : '' }}"
                id="likeBtn_{{ $post->id }}" onclick="toggleLike({{ $post->id }})">
                <i class="fa fa-thumbs-up"></i>
                <span id="likeText_{{ $post->id }}">
                    {{ in_array(Auth::id(), $post->likes->pluck('user_id')->toArray()) ? 'Liked' : 'Like' }}
                </span>
            </button>
            <span id="likeCount_{{ $post->id }}">&nbsp;{{ $post->likes->count() }}
            </span>

            <ul class="comment-share-meta">
                <li>
                    <button class="post-comment" onclick="toggleCommentBox({{ $post->id }})">
                        <i class="bi bi-chat-bubble"></i>
                        <span id="commentCount_{{ $post->id }}">{{ $post->comments->count() }}</span>
                    </button>
                </li>
            </ul>
        </div>

        <!-- Comment Box -->
        <div id="commentBox_{{ $post->id }}" class="mt-2" style="display: none">
            <div class="mb-2 d-flex align-items-center">
                <input type="text" class="form-control" id="commentInput_{{ $post->id }}"
                    placeholder="Write a comment...">
                <button class="ms-2"
                    style="    background-color: #26aba3;border-radius: 10px;padding: 8px;"
                    onclick="submitComment({{ $post->id }})">Submit</button>
            </div>

            <!-- Comment List -->
            <div id="commentList_{{ $post->id }}" class="mt-2">
                @foreach ($post->comments as $comment)
                    <div>
                        <strong>{{ $comment->user->first_name }} {{ $comment->user->last_name }}</strong>:
                        {{ $comment->comment_text }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
