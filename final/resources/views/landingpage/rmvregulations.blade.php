@extends('layouts.landingpage')
@section('content')
 
<!-- start the main part -->
<div class="container bg-light" id="maincontainer">
  <h4 class="text-danger mb-2">Common requirements for Driving License</h4>
  <p>1. Applicant should be present in person</p>
  <p>2. Should bring the National Identity card or the valid passport with the National Identity card number.</p>
  <p>3. In obtaining the service from offices where online method is available producing phoographs is not required and the relevent photoraphs are taken during the computer process. For offices where offline method is used two passport size black and white photographs with white background are required.</p>
  <p>4. In obtaining a driving license for the first time, original of the birth certificate should be produced.</p>

  <h4 class="text-danger mt-4 mb-2">Obtaining a new driving license for light vehicals.</h4>
  <p>1. It is possible to register and sit for the written test if 17 years of age has been completed.</p>
  <p>2. In the event of pasing the written test, a learners' permit is issued up to a maximum of <span class="text-danger">18 months</span>.</p>
  <p>3. Holder of such permit can practice driving.</p>
  <p>4. One should complete 18 years of age to face the practrical test and a minimum of 3 months should have passed after obtaining the learners' permit.</p>
  <p>5. It is compulsory to face the practrical test and pass it.</p>
  <p>6. Aptitude Medical Certificate obtained from the National Transport Medical Institution within a period not exceeding 6 months.</p>

  <h4 class="text-danger mt-4 mb-2">Renewal of validity and extension of driving license.</h4>
  <p>1. Current driving license.</p>
  <p>2. National Identity Card or the valid passport with the NIC number</p>
  <p>3. Medical fitness certificate obtained from the Sri Lanka Transport Institute with in a period of six months.</p>
</div>
<!-- end of the main part  -->
<div class="mt-5 container">
  <table class="table table-striped">
    <thead>
      <tr >
        <th class="align-self-center" scope="col">Description</th>
        <th scope="col">Vehical class</th>
        <th scope="col">Other class of vehical can be driven</th>
        <th scope="col">Pictograph</th>
        <th scope="col">Old class</th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <td scope="row">Light motor cycles of which Engine Capacity does not exceeds 100CC</td>
        <td>A1</td>
        <td>G1</td>
        <td><i class="fas fa-car"></i></td>
        <td>D</td>
      </tr>
      
      <tr>
        <td scope="row">Motorcycles of which Engine capacity exceeds 100CC</td>
        <td>A</td>
        <td>A1, G1</td>
        <td></td>
        <td>D</td>
      </tr>

      
      <tr>
        <td scope="row">Motor Tricycle or van of which tare does not exceed 500kg and Gross vehicle weight does not exceed 1000 kg: Motor vehicle in this class include an invalid carriage</td>
        <td>B1</td>
        <td>G1</td>
        <td>@twitter</td>
        <td>E,F</td>
      </tr>

      <tr>
        <td scope="row">Dual purpose Motor vehicle of which Gross Vehicle Weight does not exceed 3500kg and the seating capacity does not exceed 9 seats inclusive of the driver’s seat, which may be combined with a trailer of which maximum authorized tare does not exceed 750kg: Motor vehicle in this class include and invalid carriage and all cars where the seating capacity does not exceed 9 seats inclusive of the Driver’s seat.</td>
        <td>B</td>
        <td>G1</td>
        <td>@fat</td>
        <td>C,C1</td>
      </tr>

      <tr>
        <td scope="row">Light Motor Lorry – Motor Lorry of which Gross Vehicle Weight exceeds 3500 kg and does not exceed 17000kg: Motor vehicles in this class may be combined with a trailer having maximum authorized tare which does not exceed 750kg: Motor vehicles of this class include a motor ambulance and motor hearses.</td>
        <td>C1</td>
        <td>B, G1</td>
        <td>@fat</td>
        <td>B1</td>
      </tr>

      <tr>
        <td scope="row">Motor Lorry of which Gross vehicle Weight is more than 1700kg; may be combine with a trailer having a maximum authorized tare which does not exceed 750kg</td>
        <td>C</td>
        <td>C1, B, J, G, G1</td>
        <td>@fat</td>
        <td>B</td>
      </tr>

      <tr>
        <td scope="row">Heavy Motor Lorry; combination of motor lorry and trailer (s) including articulated vehicles and its trailer (s) of which maximum authorized tare of the trailer exceeds 750kg and gross vehicle weight exceeds 3500kg</td>
        <td>CE</td>
        <td>C, C1, B, B1, G, G1,J</td>
        <td>@fat</td>
        <td>B</td>
      </tr>

      <tr>
        <td scope="row">Light Motor Coach- Motor vehicles used for the carriage of persons and having seating capacity of not less than 9 seats and not more than 33 seats inclusive of the driver’s seat; motor vehicle in this class may be combined with a trailer having a maximum authorized tare which does not exceed 750kg</td>
        <td>D1</td>
        <td>C1, B, B1, G, G1</td>
        <td>@fat</td>
        <td>A1</td>
      </tr>

      <tr>
        <td scope="row">Motor Coach where the seating capacity does not exceed 33 seats inclusive of the driver’s seat; motor vehicles in this class may be combined with a trailer having a maximum authorized tare which does not exceed 750kg</td>
        <td>D</td>
        <td>D1, C, C1, B, B1, G, G1,J</td>
        <td>@fat</td>
        <td>A</td>
      </tr>


      <tr>
        <td scope="row">Heavy Motor Coach – Combination of motor coach having a seating capacity of 33 seats inclusive of the driver’s seat and it’s trailer having maximum authorized tare exceeding 750kg or a combination of two motor coaches</td>
        <td>DE</td>
        <td>D, D1, C, C1, CE, B, B1, G, G1,J</td>
        <td>@fat</td>
        <td>-</td>
      </tr>


      <tr>
        <td scope="row">Hand Tractors - Two Wheel Tractor with a Trailer</td>
        <td>G1</td>
        <td>Nil</td>
        <td>@fat</td>
        <td>G1</td>
      </tr>


      <tr>
        <td scope="row">Land Vehicle - Agricultural Land Vehicle with or without a trailer</td>
        <td>G</td>
        <td>G1</td>
        <td>@fat</td>
        <td>G</td>
      </tr>


      <tr>
        <td scope="row">Special purpose Vehicle, Vehicle used for construction, loading & unloading excluding motor lorries, light motor lorries and heavy motor lorries, equipped with construction equipment and equipment for loading and unloading goods</td>
        <td>J</td>
        <td>G1</td>
        <td>@fat</td>
        <td>-</td>
      </tr>





    </tbody>
  </table>
</div>
@endsection