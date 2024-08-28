@extends('user.layout', ['user' => isset($user) ? $user : null])

@section('profile-title')
    {{ $user->name }}'s Profile
@endsection

@section('meta-img')
    {{ $user->avatarUrl }}
@endsection

@section('profile-content')
    {!! breadcrumbs(['Users' => 'users', $user->name => $user->url]) !!}

<<<<<<< HEAD
@if($user->is_banned)
    <div class="alert alert-danger">This user has been banned.</div>
@endif
<h1>
    <img src="/images/avatars/{{ $user->avatar }}" style="width:125px; height:125px; float:left; border-radius:50%; margin-right:25px;" alt="{{ $user->name }}" >
    {!! $user->displayName !!}
    <a href="{{ url('reports/new?url=') . $user->url }}"><i class="fas fa-exclamation-triangle fa-xs" data-toggle="tooltip" title="Click here to report this user." style="opacity: 50%; font-size:0.5em;"></i></a>

    @if($user->settings->is_fto)
        <span class="badge badge-success float-right" data-toggle="tooltip" title="This user has not owned any characters from this world before.">FTO</span>
    @endif
</h1>
<div class="row">
    <div class="col-md mb-4">
        <div class="row">
            <div class="row col-md-6">
                <div class="col-md-2 col-4"><h5>Alias</h5></div>
                <div class="col-md-10 col-8">{!! $user->displayAlias !!}</div>
            </div>
            <div class="row col-md-6">
                <div class="col-md-2 col-4"><h5>Joined</h5></div>
                <div class="col-md-10 col-8">{!! format_date($user->created_at, false) !!} ({{ $user->created_at->diffForHumans() }})</div>
            </div>
            <div class="row col-md-6">
                <div class="col-md-2 col-4"><h5>Rank</h5></div>
                <div class="col-md-10 col-8">{!! $user->rank->displayName !!} {!! add_help($user->rank->parsed_description) !!}</div>
            </div>
            @if($user->birthdayDisplay && isset($user->birthday))
                <div class="row col-md-6">
                    <div class="col-md-2 col-4"><h5>Birthday</h5></div>
                    <div class="col-md-10 col-8">{!! $user->birthdayDisplay !!}</div>
                </div>
            @endif
        </div>
    </div>
    @if(Settings::get('event_teams') && $user->settings->team)
        <div class="col-md-2 text-center">
            <a href="{{ url('event-tracking') }}">
                @if($user->settings->team->has_image)
                    <img src="{{ $user->settings->team->imageUrl }}" class="mw-100"/>
                @endif
                <h5>{{ $user->settings->team->name }}</h5>
            </a>
        </div>
    @endif
</div>
=======
    @if (mb_strtolower($user->name) != mb_strtolower($name))
        <div class="alert alert-info">This user has changed their name to <strong>{{ $user->name }}</strong>.</div>
    @endif
>>>>>>> 0e64f5bf38b88c74c42555e1a3de7429f927474e

    @if ($user->is_banned)
        <div class="alert alert-danger">This user has been banned.</div>
    @endif

    @if ($user->is_deactivated)
        <div class="alert alert-info text-center">
            <h1>{!! $user->displayName !!}</h1>
            <p>This account is currently deactivated, be it by staff or the user's own action. All information herein is hidden until the account is reactivated.</p>
            @if (Auth::check() && Auth::user()->isStaff)
                <p class="mb-0">As you are staff, you can see the profile contents below and the sidebar contents.</p>
            @endif
        </div>
    @endif

    @if (!$user->is_deactivated || (Auth::check() && Auth::user()->isStaff))
        @include('user._profile_content', ['user' => $user, 'deactivated' => $user->is_deactivated])
    @endif

@endsection
