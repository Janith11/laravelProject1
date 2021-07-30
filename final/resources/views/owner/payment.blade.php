@extends('layouts.ownerapp')

@section('content')
<div class="container">

    <div class="row mb-2">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <h3 id="page_header">Payments</h3>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function(){
        $('aside ul .students').css('border-left', '5px solid #00bcd4');
    })
</script>

@endsection
