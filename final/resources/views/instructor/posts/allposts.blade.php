@extends('layouts.instructorapp')

@section('content')

<style>
    #img{
        width: 60px;
        height: auto;
        border-radius: 50px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding-left: 0px;
    }
</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Post</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('instructor.instructordashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px"> / All post</a>
    </div>

    <div class="row-mb-2">
        <div class="row justify-content-end">
            <div id="card" style="padding-right: 15px">
                <a type="button" class="btn btn-primary" href="{{ route('instructorcreatepost') }}" >Create Post</a>
            </div>
        </div>
    </div>

    <div class="row-mb-2">
        @if (session('successmsg'))
            <div class="alert alert-success">
                <h5>
                    {{ session('successmsg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        @if (session('errormsg'))
            <div class="alert alert-success">
                <h5>
                    {{ session('errormsg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
        @endif
    </div>

    <div class="row-mb-2">
        @if (count($posts) == 0)
            <div id="card">
                <div class="alert alert-info">
                    <h5><strong>Wooops!!</strong> no any posts</h5>
                </div>
            </div>
        @else
            <div class="card-columns">
            @foreach($posts as $post)
                {{-- <div class="col-sm-4"> --}}
                    <div id="card">
                        <div class="card border-dark">
                            <div class="card-header" style="background-color: #222944 !important; color: white; border-radius: 10px 10px 0px 0px">
                                <div style="display: inline-flex">
                                    @if($post->user->role_id == 1)
                                        <div style="display: inline-block">
                                            <img src="/uploadimages/owner_profile/{{ $post->user->profile_img }}" alt="profile image" id="img">
                                        </div>
                                        <div style="display: inline-block;padding-left: 10px">
                                            <h5>
                                                {{ $post->user->f_name }} {{ $post->user->l_name }}
                                            </h5>
                                            <small> ( owner )</small>
                                        </div>
                                    @else
                                        <div style="display: inline-block">
                                            <img src="/uploadimages/instructors_profiles/{{ $post->user->profile_img }}" alt="profile image" id="img">
                                        </div>
                                        <div style="display: inline-block;padding-left: 10px">
                                            <h5>
                                                {{ $post->user->f_name }} {{ $post->user->l_name }}
                                            </h5>
                                            <small>( instructor )</small>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- convert to html --}}
                                <div id="post">{!! $post->message !!}</div>
                            </div>
                            <div class="card-footer text-muted">
                                <div class="row justify-content-between">
                                    <div style="display: inline-block; padding-left: 10px">
                                        {{ $post->created_at }}
                                    </div>
                                    <div style="display: inline-block; padding-right: 10px">
                                        <div>
                                            <div style="display: inline-block">
                                                <a href="{{ route('instructoreditpost', [$post->id, $post->user_id]) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                    </svg>
                                                </a>
                                            </div>
                                            <div style="display: inline-block">
                                                <form method="POST" action="{{ route('instructordeletepost', [$post->id, $post->user_id]) }}" id="delete-form-{{ $post->id }}" style="display: none">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                                <button onclick="if(confirm('Are You Sure Want to Delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $post->id }}').submit();
                                                }else{
                                                    event.preventDefault();
                                                }" style="background-color: transparent; border: none;outline:none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </div> --}}
            @endforeach
            </div>
        @endif
    </div>

</div>

<script>
    $(document).ready(function(){
        $('aside ul .posts').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection
