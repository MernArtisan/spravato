<div class="page-wrapper-img">
    <div class="page-wrapper-img-inner">
        <div class="sidebar-user media">
            <img src="{{ asset($post->user->image ?? ($post->user->provider->logo ?? 'admin/assets/images/default.jpg')) }}" alt="user"
                class="rounded-circle img-thumbnail mb-1">
            <span class="online-icon"><i class="mdi mdi-record text-success"></i></span>
            <div class="media-body">
                <h5 class="text-light">Mr. {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h5>
                <ul class="list-unstyled list-inline mb-0 mt-2">
                    {{-- <li class="list-inline-item">
                        <a href="#"><i class="mdi mdi-account text-light"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" id="btnlogout2">
                            <i class="mdi mdi-power text-danger"></i>
                        </a>
                    </li> --}}
                    
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title mb-2">
                        {{-- <i class="mdi mdi-view-dashboard-outline mr-2"></i>  --}}
                    </h4>
                    <div>
                        {{-- <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"></a></li>
                            <li class="breadcrumb-item"><a href="#"></a></li>
                            <li class="breadcrumb-item active"></li>
                        </ol> --}}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
