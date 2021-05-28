@extends('layouts.ownerapp')

@section('content')
<div class="container">

    <div class="row mb-2">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <h3 id="page_header">Shedule</h3>
            </div>
        </div>
    </div>

    <div class="row mb-2">
    <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FColombo&amp;src=YnVkZGhpa2FzcmFuYXNpbmdoZTk2QGdtYWlsLmNvbQ&amp;src=ZW4ubGsjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&amp;color=%23039BE5&amp;color=%230B8043&amp;showTitle=0&amp;showTabs=1&amp;showTz=0&amp;showPrint=0" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe>
    </div>

</div>
@endsection