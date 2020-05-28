@extends('core-api::app')
@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form id="createCustomer">
                @csrf
                <h2>Add new Customer</h2>
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control" id="firstName" placeholder="Enter first name"
                           name="firstName" required>
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" id="lastName" placeholder="Enter last name" name="lastName"
                           required>

                </div>
                <div class="form-group">
                    <label for="dateOfBirth">Last Name</label>
                    <input type="date" class="form-control" id="dateOfBirth" placeholder="Enter date of birthday"
                           name="dateOfBirth" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#createCustomer input").change(function () {
                $(this).parent().removeClass('has-error');
                $(this).next(".help-block").remove()
            });

            $("#createCustomer").submit(function (e) {
                e.preventDefault();
                var first_name = $("input[name='firstName']").val();
                var lastName = $("input[name='lastName']").val();
                var dateOfBirth = $("input[name='dateOfBirth']").val();

                $.ajax({
                    url: "{{route('core-api.customer.store')}}",
                    type: 'POST',
                    data: {firstName: first_name, lastName: lastName, dateOfBirth: dateOfBirth},
                    success: function (data) {
                        $.notify("Customer Created", "success");
                        setTimeout(function () {
                            window.location.href = '{{route('core-api.customers')}}';
                        }, 1000)

                    },
                    error: function (data) {
                        if (data.status === 422) {
                            printFormErrorMsg(data.responseJSON);
                        } else {
                            $.notify("Something went wrong. Please try again", "error");
                        }
                    }
                });
            });
        });
    </script>
@endsection
