@extends('layouts.landingpage')
@section('content')
     <!-- start the main part -->
     <div class="container " id="maincontainer">
        <h1 class="d-flex justify-content-center mt-5 mb-5">Prices</h1>
        <table class="table table-striped ">
          <thead>
            <tr class="table-info">
              <th scope="col">#</th>
              <th scope="col">Lessons</th>
              <th scope="col">Prices(Rs)</th>
              <!-- <th scope="col">Handle</th> -->
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Prime Mover</td>
              <td>28,000</td>
              <!-- <td>@mdo</td> -->
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Heavy vehical</td>
              <td>15,000</td>
              <!-- <td>@fat</td> -->
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Car/Van (Manual)</td>
              <td>13,000</td>
              <!-- <td>@twitter</td> -->
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>Car (Auto)</td>
              <td>14,500</td>
              <!-- <td>@twitter</td> -->
            </tr>
            <tr>
              <th scope="row">5</th>
              <td>Three wheel</td>
              <td>7,500</td>
              <!-- <td>@twitter</td> -->
            </tr>
            <tr>
              <th scope="row">6</th>
              <td>Motorcycle</td>
              <td>6,500</td>
              <!-- <td>@twitter</td> -->
            </tr>
            <tr>
              <th scope="row">6</th>
              <td>Heavy Vehical + Motorcycle</td>
              <td>17,500</td>
              <!-- <td>@twitter</td> -->
            </tr>
            <tr>
              <th scope="row">7</th>
              <td>Car + Three wheel + Motorcycle</td>
              <td>20,000</td>
              <!-- <td>@twitter</td> -->
            </tr>
            <tr>
              <th scope="row">8</th>
              <td>Car + Motorcycle</td>
              <td>15,000</td>
              <!-- <td>@twitter</td> -->
            </tr>
            <tr>
              <th scope="row">9</th>
              <td>Car + Three Wheel</td>
              <td>16,500</td>
              <!-- <td>@twitter</td> -->
            </tr>
            <tr>
              <th scope="row">10</th>
              <td>Three Weel + Motorcycle</td>
              <td>10,500</td>
              <!-- <td>@twitter</td> -->
            </tr>
          </tbody>
        </table>
        <p class="mt-5 mb-5"><span class="text-danger">*</span> We have initial price list in above.If you want more practrical classes, you can pay and schudule the classes. Price list is given below.</p>

        <table class="table table-striped">
          <thead>
            <tr class="table-info">
              <th scope="col">#</th>
              <th scope="col">Practrical Lessons</th>
              <th scope="col">Prices(Rs)</th>
              <!-- <th scope="col">Handle</th> -->
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Heavy vehical (Half an hour)</td>
              <td>800</td>
              <!-- <td>@mdo</td> -->
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Car / van manual (Half an hour)</td>
              <td>650</td>
              <!-- <td>@fat</td> -->
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Car-Auto (Half an hour)</td>
              <td>850</td>
              <!-- <td>@twitter</td> -->
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>Three wheel (Half an hour)</td>
              <td>500</td>
              <!-- <td>@twitter</td> -->
            </tr>
            <tr>
              <th scope="row">5</th>
              <td>Motorcycle (Half an hour)</td>
              <td>450</td>
              <!-- <td>@twitter</td> -->
            </tr>
            
          </tbody>
        </table> 

        <table class="table table-striped mt-5">
          <thead>
            <tr class="table-info">
              <th scope="col">#</th>
              <th scope="col">Medical Chargers</th>
              <th scope="col">Prices(Rs)</th>
              <!-- <th scope="col">Handle</th> -->
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Car / Van / Three wheel / Motorcycle</td>
              <td>800</td>
              <!-- <td>@mdo</td> -->
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Heavy Vehical</td>
              <td>1,3000</td>
              <!-- <td>@fat</td> -->
            </tr>
            
          </tbody>
        </table> 

        <table class="table table-striped mt-5">
          <thead>
            <tr class="table-info">
              <th scope="col">#</th>
              <th scope="col">Government Charges</th>
              <th scope="col">Prices(Rs)</th>
              <!-- <th scope="col">Handle</th> -->
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Heavy vehical</td>
              <td>2,000</td>
              <!-- <td>@mdo</td> -->
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Car / Van</td>
              <td>2,000</td>
              <!-- <td>@fat</td> -->
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Three Wheel</td>
              <td>2,000</td>
              <!-- <td>@fat</td> -->
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>Motorcycle</td>
              <td>1,850</td>
              <!-- <td>@fat</td> -->
            </tr>
            <tr>
              <th scope="row">5</th>
              <td>Hevy Vehical + Motorcycle</td>
              <td>2,450</td>
              <!-- <td>@fat</td> -->
            </tr>
            <tr>
              <th scope="row">6</th>
              <td>Car + Three Wheel + Motorcycle</td>
              <td>2,700</td>
              <!-- <td>@fat</td> -->
            </tr>
            <tr>
              <th scope="row">7</th>
              <td>Car + Three Wheel</td>
              <td>2,300</td>
              <!-- <td>@fat</td> -->
            </tr>
            <tr>
              <th scope="row">8</th>
              <td>Car + Motorcycle</td>
              <td>2,450</td>
              <!-- <td>@fat</td> -->
            </tr>
            
          </tbody>
        </table> 

        <table class="table table-striped mt-5">
          <thead>
            <tr class="table-info">
              <th scope="col">#</th>
              <th scope="col">Essential Documents</th>
              <!-- <th scope="col">Prices(Rs)</th> -->
              <!-- <th scope="col">Handle</th> -->
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Original Birh Certiicate</td>
              <!-- <td>2,000</td> -->
              <!-- <td>@mdo</td> -->
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>National Identity Card</td>
              <!-- <td>2,000</td> -->
              <!-- <td>@fat</td> -->
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Medical Report</td>
              <!-- <td>2,000</td> -->
              <!-- <td>@fat</td> -->
            </tr>
           
          </tbody>
        </table> 
        
      </div>
      <!-- end of the main part  -->
@endsection