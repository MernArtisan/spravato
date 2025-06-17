@extends('web.layouts.master')

@section('content')
    <style>
        .profile-header {
            position: relative;
            margin-bottom: 120px;
        }

        .cover-photo-container {
            height: 350px;
            background-color: #ddd;
            border-radius: 8px 8px 0 0;
            overflow: hidden;
            position: relative;
        }

        .cover-photo {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-picture-container {
            position: absolute;
            bottom: -75px;
            left: 20px;
            width: 168px;
            height: 168px;
            border-radius: 50%;
            border: 4px solid #fff;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #f0f2f5;
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
        }

        .edit-cover-btn {
            background-color: rgba(255, 255, 255, 0.8);
            color: #050505;
            border: none;
            border-radius: 6px;
            padding: 8px 12px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .edit-cover-btn:hover {
            background-color: rgba(255, 255, 255, 0.9);
        }

        .hidden-file-input {
            display: none;
        }

        .profile-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .profile-card-header {
            padding: 16px;
            border-bottom: 1px solid #ddd;
            font-weight: 600;
            font-size: 1.25rem;
        }

        .profile-card-body {
            padding: 16px;
        }

        .profile-card-body-pri {
            padding: 16px 16px 60px 16px;
        }

        .form-label {
            font-weight: 600;
            color: #65676b;
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 6px;
            padding: 10px 12px;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            border-color: #1877f2;
            box-shadow: 0 0 0 2px rgba(24, 119, 242, 0.2);
        }

        .btn-primary {
            background-color: #1877f2;
            border: none;
            border-radius: 6px;
            padding: 10px 16px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #166fe5;
        }

        .btn-secondary {
            background-color: #e4e6eb;
            color: #050505;
            border: none;
            border-radius: 6px;
            padding: 10px 16px;
            font-weight: 600;
        }

        .btn-secondary:hover {
            background-color: #d8dadf;
        }

        .profile-nav {
            background-color: #1877f2;
            border-radius: 0 0 8px 8px;
            margin-bottom: 20px;
        }
    </style>
    <main>
        <div class="container py-4">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Profile Header -->
                <div class="profile-header">
                    <!-- Cover Photo with Edit Button -->

                    <div class="cover-photo-container">
                        <img src="{{ asset($profile->cover_image ? $profile->cover_image : $profile->cover_image) }}"
                            alt="Cover Photo" class="cover-photo" id="coverPhoto">
                        <div class="edit-buttons">
                            <button type="button" class="edit-cover-btn" id="editCoverBtn">
                                <i class="bi bi-camera"></i> Edit Cover Photo
                            </button>
                            <input name="cover_image" type="file" id="coverPhotoInput" class="hidden-file-input"
                                accept="image/*">
                        </div>
                    </div>

                    <!-- Profile Picture with Edit Button -->
                    <div class="profile-picture-container">
                        <img name="cover_image"
                            src="{{ asset($profile->image ?? (optional($profile->provider)->image ?? (optional($profile->provider)->logo ?? 'assets/images/default-profile.jpg'))) }}"
                            alt="Profile Picture" class="profile-picture" id="profilePicture">
                        <button type="button" class="edit-photo-btn" id="editPhotoBtn">
                            <i class="bi bi-camera"></i>
                        </button>
                        <input name="image" type="file" id="profilePhotoInput" class="hidden-file-input"
                            accept="image/*">
                    </div>
                </div>

                <!-- Profile Navigation -->


                <!-- Edit Profile Form -->
                <div class="row">


                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Basic Info -->
                            <div class="profile-card">
                                <div class="profile-card-header">Basic Information</div>
                                <div class="profile-card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">First Name</label>
                                            <input type="text" name="first_name" class="form-control"
                                                value="{{ $profile->first_name ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" name="last_name" class="form-control"
                                                value="{{ $profile->last_name ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Bio</label>
                                        <textarea name="bio" class="form-control" rows="3">{{ $profile->bio ?? '' }}</textarea>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Gender</label>
                                            <select name="gender" class="form-control">
                                                <option value="male" {{ $profile->gender == 'male' ? 'selected' : '' }}>
                                                    Male</option>
                                                <option value="female" {{ $profile->gender == 'female' ? 'selected' : '' }}>
                                                    Female</option>
                                                <option value="other" {{ $profile->gender == 'other' ? 'selected' : '' }}>
                                                    Other</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Birthday</label>
                                            <input type="date" name="birthday" class="form-control"
                                                value="{{ $profile->dob ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Languages</label>
                                        <input type="text" name="language" class="form-control"
                                            value="{{ $profile->language ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Contact Info -->
                            <div class="profile-card">
                                <div class="profile-card-header">Contact Information</div>
                                <div class="profile-card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ $profile->email ?? '' }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="tel" name="phone" class="form-control"
                                            value="{{ $profile->phone ?? '' }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" name="address" class="form-control"
                                            value="{{ $profile->address ?? '' }}">
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">City</label>
                                            <input type="text" name="city" class="form-control"
                                                value="{{ $profile->city ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Country</label>
                                            <input type="text" name="country" class="form-control"
                                                value="{{ $profile->country ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Work/Education -->
                            <div class="profile-card">
                                <div class="profile-card-header">Education and Work</div>
                                <div class="profile-card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Education</label>
                                        <input type="text" name="education" class="form-control"
                                            value="{{ $profile->education ?? '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Workplace</label>
                                        <input type="text" name="workplace" class="form-control"
                                            value="{{ $profile->workplace ?? '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Position</label>
                                        <input type="text" name="position" class="form-control"
                                            value="{{ $profile->position ?? '' }}">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Save Buttons -->
                    <div class="d-flex justify-content-end gap-3 mt-4">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
            </form>
        </div>
        </div>
        </div>


        </div>

        <!-- Save Buttons -->
        <div class="d-flex justify-content-end gap-3 mt-4 profile-edit-panel">
            {{-- <button class="btn btn-secondary">Cancel</button>
            <button class="edit-btn">Save Changes</button> --}}
        </div>
        </div>
    </main>
@endsection
@section('scripts')
    <script>
        // Profile Picture Change
        document.getElementById('editPhotoBtn').addEventListener('click', function() {
            document.getElementById('profilePhotoInput').click();
        });

        document.getElementById('profilePhotoInput').addEventListener('change', function(e) {
            if (e.target.files && e.target.files[0]) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('profilePicture').src = event.target.result;
                };
                reader.readAsDataURL(e.target.files[0]);
            }
        });

        // Cover Photo Change
        document.getElementById('editCoverBtn').addEventListener('click', function() {
            document.getElementById('coverPhotoInput').click();
        });

        document.getElementById('coverPhotoInput').addEventListener('change', function(e) {
            if (e.target.files && e.target.files[0]) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('coverPhoto').src = event.target.result;
                };
                reader.readAsDataURL(e.target.files[0]);
            }
        });
    </script>
@endsection
