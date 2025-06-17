@php
    $isVideo = $item->type === 'video';
    $thumbnail = $isVideo
        ? asset('web/assets/images/video-thumbnail.jpg')  // make sure this image exists
        : asset($item->path);

    $href = asset($item->path);
@endphp

<a
    href="{{ $href }}"
    data-lg-size="1400-900"
    class="{{ isset($hidden) && $hidden ? 'd-none' : '' }}"
>
    @if($isVideo)
        <div style="position: relative; width: 100%; height: 100%;">
            <img src="{{ $thumbnail }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);">
                <i class="fa fa-play-circle" style="font-size: 40px; color: white;"></i>
            </div>
        </div>
    @else
        <img src="{{ $thumbnail }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
    @endif
</a>
