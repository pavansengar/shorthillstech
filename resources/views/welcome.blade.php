<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Insert encrypted values in database use laravel</title>
        <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<link rel="stylesheet" href="{{url('asset/css/fullcalendar.css')}}">
		<style type="text/css">
		  #dialog{
		      display:none;
		  }
		  .error {
              color: red;
              font-size: 13px;
              font-weight: normal !important;
           }
           table{
                font-family:'Calibri';
                font-size:15px;
                background-color:#fff;
                color:#333;
            }
            .modal-header{
                background-color:#333;
                color:#fff;
            }
		</style>
    </head>
    <body>
    
    	<div class="container-fluid">
  			<div class="row content">
                <div class="col-sm-12">
                  
                  
            		<div class="container">
                      <h2>Insert encrypted values in database use laravel | Shorthillstech</h2>
                      <hr>
                      <form action="{{route('eventStore')}}" method="post">
                      @csrf
                        <div class="form-group">
                          <label for="email">Title:</label>
                          <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
                        </div>
                        <div class="form-group">
                          <label for="pwd">Description:</label>
                          <input type="text" class="form-control" id="description" placeholder="Enter description" name="description">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                      </form>
                    </div>
					<br>                    
					<br>                    
					<br>                    
                    <div class="container">
                	<div class="row">
                		<table class="table table-hover table-responsive">
                		    <thead>
                		        <tr>
                		            <th>ID</th>
                		            <th>Title</th>
                		            <th>Description</th>
                		        </tr>
                		    </thead>
                		    <tbody>
                		    @php
                            $i=1;
                            $rowC = count($result['data']);
                            foreach($result['data'] as $web){

                            
                            @endphp
                		        <tr id="d{{$i}}">
                		            <td>{{$i}}</td>
                		            <td id="f{{$i}}">{{$web->title}}</td>
                		            <td id="l{{$i}}">{{$web->description}}</td>
                		            
                		        </tr>
            		        @php
            		        $i++;
                		       }
                            @endphp
                		    </tbody>
                		</table>
                	</div>
                </div>
                <!-- Day Click Dialog Start -->
                
                    
               
                    <!-- Day Click Dialog ENd -->
                </div>
  			</div>
		</div>
        <script src="{{url('asset/js/jquery.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" ></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" ></script>
        
        <script src="{{url('asset/js/jquery.validate.min.js')}}"></script>
        <!-- <script src="{{url('asset/js/function.js')}}"></script>-->
        
        @include('sweetalert::alert');
    </body>
</html>
