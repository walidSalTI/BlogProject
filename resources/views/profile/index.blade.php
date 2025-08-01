@extends('layout.app')
@section('title','profile')
@section('content')
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .profile-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
        }

        .profile-header {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            color: white;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }

        .profile-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1519681393784-d120267933ba?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80') center/cover;
            opacity: 0.2;
        }

        .avatar-container {
            position: relative;
            z-index: 2;
        }

        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid rgba(255, 255, 255, 0.3);
            object-fit: cover;
            background-color: #fff;
        }

        .profile-stats {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .stat-card {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #6c757d;
            font-size: 1rem;
        }

        .profile-bio {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .bio-title {
            color: #495057;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 15px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .created-date {
            background: rgba(233, 236, 239, 0.5);
            border-radius: 10px;
            padding: 15px;
            font-size: 0.9rem;
            margin-top: 25px;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f1f3f5;
            color: #495057;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            transform: translateY(-3px);
            background: #e9ecef;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        @media (max-width: 768px) {
            .profile-header {
                text-align: center;
            }

            .avatar-container {
                margin-bottom: 20px;
            }
        }
    </style>
    <div class="profile-container">
        <!-- Profile Header -->
        <div class="profile-header">
            <div class="row align-items-center">
                <div class="col-md-3 d-flex justify-content-center justify-content-md-start">
                    <div class="avatar-container">
                        <img src="../images/{{ $user->image }}"
                            alt="User Avatar" class="profile-avatar">
                    </div>
                </div>
                <div class="col-md-9 text-center text-md-start">
                    <h1 class="display-5 fw-bold">{{ $user->name }}</h1>
                    <p class="lead">{{ $profile->bio }}</p>

                    <div class="social-links justify-content-center justify-content-md-start">
                        <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-github"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="profile-stats">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="stat-card bg-light">
                        <div class="stat-number text-primary">{{ $profile->friends }}</div>
                        <div class="stat-label">Friends</div>
                        <div class="mt-2">
                            <i class="bi bi-people-fill fs-1 text-primary"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="stat-card bg-light">
                        <div class="stat-number text-success">{{ $profile->posts }}</div>
                        <div class="stat-label">Posts</div>
                        <div class="mt-2">
                            <i class="bi bi-file-earmark-post fs-1 text-success"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="stat-card bg-light">
                        <div class="stat-number text-info">2.1K</div>
                        <div class="stat-label">Followers</div>
                        <div class="mt-2">
                            <i class="bi bi-heart-fill fs-1 text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bio Section -->
        <div class="profile-bio">
            <h3 class="bio-title">About Me</h3>
            <p class="lead">
                Hello! I'm Alex, a passionate web developer with over 5 years of experience in creating modern,
                responsive web applications.
            </p>
            <p>
                I specialize in front-end development using React and Vue.js, but I also have extensive experience with
                back-end technologies like Node.js and Express. I'm passionate about creating intuitive user experiences
                and clean, maintainable code.
            </p>
            <p>
                When I'm not coding, you can find me hiking in the mountains, reading science fiction novels, or
                experimenting with new recipes in the kitchen.
            </p>

            <div class="mt-4">
                <h5>Skills</h5>
                <div class="d-flex flex-wrap gap-2 mt-3">
                    <span class="badge bg-primary p-2">HTML/CSS</span>
                    <span class="badge bg-primary p-2">JavaScript</span>
                    <span class="badge bg-primary p-2">React.js</span>
                    <span class="badge bg-primary p-2">Vue.js</span>
                    <span class="badge bg-primary p-2">Node.js</span>
                    <span class="badge bg-primary p-2">UI/UX Design</span>
                    <span class="badge bg-primary p-2">Responsive Design</span>
                </div>
            </div>

            <div class="created-date mt-4">
                <i class="bi bi-calendar-check me-2"></i>
                <strong>Member since:</strong> {{ $user->created_at->format('F j Y') }}
            </div>
{{-- 
            for other user profiles 

            <div class="action-buttons">
                <button class="btn btn-primary px-4 py-2">
                    <i class="bi bi-chat-dots me-2"></i>Send Message
                </button>
                <button class="btn btn-outline-primary px-4 py-2">
                    <i class="bi bi-person-plus me-2"></i>Add Friend
                </button>
                <button class="btn btn-outline-secondary px-4 py-2">
                    <i class="bi bi-three-dots"></i>
                </button>
            </div> --}}
        </div>
    </div>
    @endsection()