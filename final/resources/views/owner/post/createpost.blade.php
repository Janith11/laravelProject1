@extends('layouts.ownerapp')

@section('content')

<style>
    .editor
    {
        border:solid 1px #ccc;
        padding: 20px;
        min-height:200px;
    }

    .sample-toolbar
    {
        border:solid 1px #ddd;
        background:#f4f4f4;
        padding: 5px;
        border-radius:3px;
    }

    .sample-toolbar > span
    {
        cursor:pointer;
    }

    .sample-toolbar > span:hover
    {
        text-decoration:underline;
    }

    #span{
        padding-right: 8px;
        color: #222944;
    }

    #a{
        font-size: 20px;
    }

    #heding{
        color: #222944;
        font-weight: bold;
    }

</style>

<div class="container">

    <div class="row mb-2">
        <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Post</h5>
        <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
        <a href="{{ route('owner.ownerdashboad') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-house-door-fill" viewBox="0 0 16 16" style="padding-left: 10px">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </a>
        <a style="padding-top: 6px; padding-left: 10px" href="{{ route('allposts') }}"> / All posts</a>
        <a style="padding-top: 6px; padding-left: 10px"> / Create post</a>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row-mb-2">
        <div id="card">
            <div class="card">
                <div class="card-body">
                    <h5 id="heding">Create Post</h5>
                    <hr style="border: 0.5px solid #222944">
                    <div class="sample-toolbar">
                        <a href="javascript:void(0)" onclick="format('bold')" id="a"><span class="fa fa-bold" id="span"></span></a>
                        <a href="javascript:void(0)" onclick="format('italic')" id="a"><span class="fa fa-italic" id="span"></span></a>
                        <a href="javascript:void(0)" onclick="format('insertunorderedlist')" id="a"><span class="fa fa-list-ul" id="span"></span></a>
                        <a href="javascript:void(0)" onclick="format('underline')" id="a"><span class="fa fa-underline" id="span"></span></a>
                        <a href="javascript:void(0)" onclick="format('subscript')" id="a"><span class="fa fa-subscript" id="span"></span></a>
                        <a href="javascript:void(0)" onclick="format('superscript')" id="a"><span class="fa fa-superscript" id="span"></span></a>
                        {{-- <a href="javascript:void(0)" onclick="setUrl()"><span class="fa fa-link fa-fw"></span></a>
                        <span><input id="txtFormatUrl" placeholder="url" class="form-control"></span> --}}
                    </div>

                    <div class="editor" id="sampleeditor" name="post"></div>

                    <div id="card">
                        <button class="btn btn-success" onclick="text()">Publish</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('savepost') }}" method="POST" style="display: none" id="form">
        @csrf
        <input type="text" name="post" id="get_post">
    </form>

</div>

<script>
    window.addEventListener('load', function(){
        document.getElementById('sampleeditor').setAttribute('contenteditable', 'true');
        document.getElementById('sampleeditor2').setAttribute('contenteditable', 'true');
    });

    function format(command, value) {
        document.execCommand(command, false, value);
    }

    function setUrl() {
        var url = document.getElementById('txtFormatUrl').value;
        var sText = document.getSelection();
        document.execCommand('insertHTML', false, '<a href="' + url + '" target="_blank">' + sText + '</a>');
        document.getElementById('txtFormatUrl').value = '';
    }

    function text(){
        var text = document.getElementById('sampleeditor').innerHTML;
        document.getElementById('get_post').value = text;
        var form = document.getElementById('form');
        form.submit();
    }
</script>

@endsection
