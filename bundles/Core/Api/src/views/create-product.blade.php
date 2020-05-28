@extends('core-api::app')
@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form id="createProduct">
                @csrf
                <h2>Add new Product</h2>
                <div class="form-group">
                    <label for="customer_id">Select Customer</label>
                    <select class="form-control" name="customer_id" id="customer_id" required>
                        <option>-- Select Customer --</option>
                        @foreach($customers as $id => $customer)
                            <option value="{{$id}}">{{$customer}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Select Status</label>
                    <select class="form-control" name="status" id="status" required>
                        <option value="new">New</option>
                        <option value="pending">Pending</option>
                        <option value="in review">In review</option>
                        <option value="approved">Approved</option>
                        <option value="inactive">Inactive</option>
                    </select>

                </div>
                <div class="form-group">
                    <label for="issn">Issn</label>
                    <input type="text" class="form-control" id="issn" placeholder="Enter issn" name="issn" required>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#createProduct input").change(function () {
                $(this).parent().removeClass('has-error');
                $(this).next(".help-block").remove()
            });

            $("#createProduct").submit(function (e) {
                e.preventDefault();
                var customer_id = $("select[name='customer_id']").val();
                var status = $("input[name='status']").val();
                var issn = $("input[name='issn']").val();
                var name = $("input[name='name']").val();
                console.log(customer_id)
                $.ajax({
                    url: "{{route('core-api.product.store')}}",
                    type: 'POST',
                    data: {customer_id: customer_id, status: status, issn: issn, name: name},
                    success: function (data) {
                        $.notify("Product Created", "success");
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
