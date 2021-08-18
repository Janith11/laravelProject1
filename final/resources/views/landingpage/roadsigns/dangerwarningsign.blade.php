@extends('layouts.landingpage')
@section('content')
<style>
        .card {
            transition: transform 0.2s ease;
            box-shadow: 6px 6px 12px 6px rgba(27, 27, 29, 0.18);
            border-radius:30px;
            border: 0;
            margin-bottom: 1.5em;
            padding: 30px;
        }
        .card:hover {
            transform: scale(1.02);
        }
        h3{
            font-weight: 550;
        }
</style>
  
<main role="main">
<!-- start the images  -->
    <div class="album py-5 " style="background-color: aliceblue;">
        <div class="container">

            <div class="row mb-2">
                <a href="{{route('roadsigns')}}">
                    <h5 style="color: #222944; font-weight: bold; padding-top: 3px">Road Signs</h5>
                </a>
                <div style="border-right: 2px solid #222944; padding-left: 10px"></div>
                <a style="padding-top: 3px; padding-left: 10px" href="#"> / Danger Warning Signs</a>
            </div>

            <div class="row d-flex justify-content-center mt-4 mb-3">
                <h1 class="mb-3 text-center">Danger Warning Sign</h1>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href="DangerWarningSign.html"><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/7.png" alt="Card image cap"></a>
                            <div class="card-body">
                                <h3 class="card-text">Left Bend Ahead</h3>
                            </div>
                    </div>
                </div>    
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/8.png" alt="Card image cap"></a>
                            <div class="card-body">
                                <h3 class="card-text">Right Bend Ahed</h3>
                            </div>
                    </div>
                </div> 
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/9.png" alt="Card image cap"></a>
                            <div class="card-body">
                                <h3 class="card-text">Double Bend Left Ahed</h3>
                            </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/10.png" alt="Card image cap"></a>
                            <div class="card-body">
                                <h3 class="card-text">Double Bend Right Ahead</h3>
                            </div>
                    </div>
                </div>              
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/2.png" alt="Card image cap"></a>
                            <div class="card-body">
                                <h3 class="card-text">Hair Pin Bend Left Ahead</h3>
                            </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/39.png" alt="Card image cap"></a>
                            <div class="card-body">
                                <h3 class="card-text">Hair Pin Bend Right Ahead</h3>
                            </div>
                    </div>
                </div>    
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/4.png" alt="Card image cap"></a>
                        <div class="card-body">
                            <h3 class="card-text">Dual Carriage-way Starts Ahead</h3>
                        </div>
                    </div>
                </div>  
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/5.png" alt="Card image cap"></a>
                        <div class="card-body">
                            <h3 class="card-text">Dual Carriage-way Ends Ahead</h3>
                        </div>
                    </div>
                </div>  
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/13.png" alt="Card image cap"></a>
                        <div class="card-body">
                            <h3 class="card-text">Road Narrows on Both Sides Ahead</h3>
                        </div>
                    </div>
                </div>  
            </div>          
            
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/14.png" alt="Card image cap"></a>
                        <div class="card-body">
                            <h3 class="card-text">Road Narrows on the Left Side Ahead</h3>
                        </div>
                    </div>
                </div>  
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/15.png" alt="Card image cap"></a>
                        <div class="card-body">
                            <h3 class="card-text">Road Narrows on the Right Side Ahead</h3>
                        </div>
                    </div>
                </div>  
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/27.png" alt="Card image cap"></a>
                        <div class="card-body">
                                <h3 class="card-text">Cross Roads Ahead</h3>
                        </div>
                    </div>
                </div>  
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/30.png" alt="Card image cap"></a>
                        <div class="card-body">
                            <h3 class="card-text">Staggered Junction with the First Side Road to the Left Ahead</h3>
                        </div>
                    </div>
                </div>  
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/31.png" alt="Card image cap"></a>
                        <div class="card-body">
                            <h3 class="card-text">Staggered Junction with the First Side Road to the Right Ahead</h3>
                        </div>
                    </div>
                </div>  
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/34.png" alt="Card image cap"></a>
                        <div class="card-body">
                            <h3 class="card-text">Traffic form Left Merges Ahead</h3>
                        </div>
                    </div>
                </div>  
            </div> 

            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/35.png" alt="Card image cap"></a>
                        <div class="card-body">
                            <h3 class="card-text">Traffic form Right Merges Ahead</h3>
                        </div>
                    </div>
                </div>                                            
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/29.png" alt="Card image cap"></a>
                        <div class="card-body">
                            <h3 class="card-text text-center">Y-Junction Ahead</h3>
                        </div>
                    </div>
                </div>         
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/28.png" alt="Card image cap"></a>
                        <div class="card-body">
                            <h3 class="card-text text-center">T-Junction Ahead</h3>
                        </div>
                    </div>
                </div>  
            </div>  

            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/3.png" alt="Card image cap"></a>
                        <div class="card-body">
                            <h3 class="card-text text-center">Narrow Bridge Ahead</h3>
                        </div>
                    </div>
                </div> 
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/26.png" alt="Card image cap"></a>
                        <div class="card-body">
                            <h3 class="card-text text-center">Light Signals Ahead</h3>
                        </div>
                    </div>
                </div> 
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/11.png" alt="Card image cap"></a>
                        <div class="card-body">
                            <h3 class="card-text text-center">Dangerous Descent Ahead</h3>
                        </div>
                    </div>
                </div>  
            </div>  

            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/12.png" alt="Card image cap"></a>
                        <div class="card-body">
                            <h3 class="card-text text-center">Dangerous Ascent Ahead</h3>
                        </div>
                    </div>
                </div> 
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/19.png" alt="Card image cap"></a>
                        <div class="card-body">
                            <h3 class="card-text text-center">Slippery Road Ahead</h3>
                        </div>
                    </div>
                </div> 
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/20.png" alt="Card image cap"></a>
                        <div class="card-body">
                            <h3 class="card-text text-center">Falling Rocks Ahead</h3>
                        </div>
                    </div>
                </div> 
            </div> 

            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/21.png" alt="Card image cap"></a>
                        <div class="card-body">
                            <h3 class="card-text text-center">Prdestrian Crossing Ahead</h3>
                        </div>
                    </div>
                </div> 
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/22.png" alt="Card image cap"></a>
                        <div class="card-body">
                            <h3 class="card-text text-center">Children Crossing Ahead</h3>
                        </div>
                    </div>
                </div> 
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/25.png" alt="Card image cap"></a>
                        <div class="card-body">
                            <h3 class="card-text text-center">Road Works Ahead</h3>
                        </div>
                    </div>
                </div>   
            </div>   

            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/36.png" alt="Card image cap"></a>
                        <div class="card-body">
                            <h3 class="card-text text-center">Level Crossing with Gates Ahead</h3>
                        </div>
                    </div>
                </div> 
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/37.png" alt="Card image cap"></a>
                        <div class="card-body">
                            <h3 class="card-text text-center">Unprotected Level Crossing Ahead</h3>
                        </div>
                    </div>
                </div> 
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/23.png" alt="Card image cap"></a>
                        <div class="card-body">
                            <h3 class="card-text text-center">Cycle Crossing Ahead</h3>
                        </div>
                    </div>
                </div> 
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/24.png" alt="Card image cap"></a>
                        <div class="card-body">
                            <h3 class="card-text text-center">Cattle or Other Animals Crossing the Road Ahead</h3>
                        </div>
                    </div>
                </div> 
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/17.png" alt="Card image cap"></a>
                        <div class="card-body">
                            <h3 class="card-text text-center">Road Humps Ahead</h3>
                        </div>
                    </div>
                </div> 
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/16.png" alt="Card image cap"></a>
                        <div class="card-body">
                            <h3 class="card-text text-center">Uneven Road Ahead</h3>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href=""><img class="card-img-top" src="/images/roadsigns/Dangerwarningsigns/6.png" alt="Card image cap"></a>
                        <div class="card-body text-center">
                            <h3 class="card-text text-center">Level Crossing without Barrier Ahead</h3>
                        </div>
                    </div>
                </div> 
            </div> 
            
        </div>
    </div>

</main>
     
@endsection

       