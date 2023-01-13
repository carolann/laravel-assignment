@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            <button type="button" id="btnCustomers">Load Customers</button>
            <table id="table">
                <tr ><th >Last Name</th><th>First Name</th><th>Email</th><th>Loan ID</th><th>Salary</th><th>Loan Amount</th></tr>
                  
            </table>
        </div>
    </div>
    
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    var readonly=false;
    $(function(){
       // console.log($("meta[name='xsrf-token']").prop('content'));
		var headers = {};
		
		localStorage.headers = 'Bearer ' + '{{$token}}';
        $("#btnCustomers").click(LoadCustomers);
    });

    function LoadCustomers(){
        post("api/customer", "GET", "", function(data){
            $.each(data, function(index, value){
                var row="<tr><td>" + value.lastname + "</td><td>" + value.firstname + "</td><td>" + value.email +
                    "</td><td>" + value.loanid  + "</td><td>";
                   row +=  value.job.salary==undefined ? "" : value.job.salary;
                   row += "</td><td>" + value.loanamount + "</td></tr>";
                    $("#table").append(row);
            });
            console.log(data);
        });

    }
</script>
@endpush