<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title> Patient Registration Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

        <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}" rel="stylesheet"
              integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/reg.css')}}">


    </head>
    <body>
        <nav class="navbar navbar-light bg-light">
            </div>
          </nav>

            <h2 style="text-align: center;color:seagreen">Welcome To Patient Experience Tracker</h2>
            <p class="text-center h4">Sign Up as New User</p>

        <div class="msb" id="msb">
            <p class="text-center fs-2">PET</p>

            <nav class="navbar navbar-default" role="navigation">
                <div class="btn-group-vertical" style=" margin-top:0%; width:0%">
                    <ul class="nav flex-column" style="width:10%">
                        <li class="nav-item">
                            <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">
                                <img src="{{asset('assets/images/signup.png')}}" width="25" height="25" class="d-inline-block align-right"> Sign Up
                            </a></p>
                        </li>
                        <li class="nav-item">
                            <p class="text-center"><a class="text-dark nav-link active" aria-current="page" href="#">
                                    <img src="{{asset('assets/images/key.png')}}" width="25" height="25" class="d-inline-block align-right">  Patient Login
                            </a></p>
                        </li>
                      </ul>
                    </div>
                </nav>
            </div>
            <!--<form method = "post" action = "">--->
            {!! Form::open(['action' => 'App\Http\Controllers\PatientRegistrationController@register', 'method' => 'POST']) !!}
                <br><br><br>
                <p style = "color:red;"><strong>All fields are required</strong> </p>
                <!-- create four text boxes for user input -->
                <div class="form-group">
                {{Form::label('firstname', 'First Name ')}}
                {{Form::text('firstName', '' , ['class' => 'form-control', 'placeholder' => 'First Name'])}}
                 </div>

                 <br>

                <div class="form-group">
                {{Form::label('lastname', 'Last Name')}}
                {{Form::text('lastName', '' , ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
                </div>

                <div class="form-group">
                {{Form::label('dob', 'Date of Birth')}}
                {{Form::text('dob', '' , ['class' => 'form-control', 'placeholder' => 'DOB: dd-mm-yyyy'])}}
                </div>

                <br>

                 <div class="form-group">    
                {{Form::label('weight', 'Weight')}}
                {{Form::number('weight', '' , ['class' => 'form-control', 'placeholder' => 'Weight' , 'width' => '25'])}}

               <br>
                
             <div class="form-group">    
             {{Form::label('height', 'Height')}}           
             {{Form::number('heightFeet', '' , ['class' => 'form-control', 'placeholder' => 'Feet'])}}         
             {{Form::number('heightInches', '' , ['class' => 'form-control', 'placeholder' => 'Inches'])}} 
             }            
             <br>


           <div class="form-group">    
            {{Form::label('gender', 'Gender')}}
            {{Form::select('gender', ['Male' => 'Male' ,'Female' => 'Female'], ['class' => 'form-control', 'placeholder' => 'Gender'])}}
         </div>

         <br>

             <div class="form-group">
                {{Form::label('email', 'Email')}}
                {{Form::text('email', '' , ['class' => 'form-control', 'placeholder' => 'Email'])}}
                 </div>

                <br>
            
                {{Form::label('condition', 'Condition')}}
                {!! Form::select('condition',  $conditionList, null,['class' => 'form-control', 'placeholder' => 'Select Condition']) !!}  

                          <br>
          {{Form::label('medications', 'Select any medicaitons you are taking from this list.')}}
          <div class = 'container'>
          @foreach($medicationList as $meds)            
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox("medication[]", $meds) !!} {{$meds}}
                    </label>
                </div>                
        @endforeach
         </div>        
                       
         <br>
         
         {{Form::submit('Submit' , ['class' => 'btn btn-success'])}}
         {!! Form::close() !!}
    </body>
</html>
