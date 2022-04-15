@extends('layouts.admin')
@push('stylesheet')
<style>
    .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
    }

    .switch input {
    opacity: 0;
    width: 0;
    height: 0;
    }

    .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
    }

    .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    }

    input:checked + .slider {
    background-color: #2196F3;
    }

    input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
    border-radius: 34px;
    }

    .slider.round:before {
    border-radius: 50%;
    }

    #toast-container{
        margin-top : 20px;
    }

    #toast-container > .toast {
    width: 370px !important;
    }
</style>
@endpush
@push('stylesheet')
  <style>
      #select-bg{
            background-color : white;
            width : 100%;
        }
  </style>
@endpush

@push('stylesheet')
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
@endpush
@section('content')
    <div class="card" style="display : block;" id="normal-products">
        <div class="card-header">
            Users Report
        </div>

        <div class="card-body">
            
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="start_date" id="start_date" class="form-control start_date datepicker"
                        placeholder="Start Date" readonly>
                </div>
                <div class="col-md-4">
                    <input type="text" name="end_date" id="end_date" class="form-control end_date datepicker" placeholder="End Date"
                        readonly>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary search_btn" value="search">Search</button>
                    <a href="{{ url('backoffice/reports/users') }}" class="btn btn-danger clear_btn">Clear</a>
                </div>
            </div><br>

            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Product" style="width: 100%">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th>
                            ID
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Mobile No
                        </th>
                        <th>
                            Date
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    @parent
    <script>
       
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                scrollX: true,
                aaSorting: [], 
                dom: 'Bfrtlp',
                buttons: ['copy', 'excel', 'csv', 'pdf', 'print'],
                ajax: {
                    url: "{{ route('admin.reports.users') }}",
                    data: function (d) {
                        d.start_date = $('#start_date').val(),
                        d.end_date = $('#end_date').val()
                    }
                },
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'mobile',
                        name: 'mobile'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    }
                ],
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 25,
            };

            var table = $('.datatable-Product').DataTable(dtOverrideGlobals);

            var startDate = new Date();
            var FromEndDate = new Date();
            var ToEndDate = new Date();
            ToEndDate.setDate(ToEndDate.getDate() + 365);

            $('.start_date').datepicker({
                    format: 'dd-mm-yyyy',
                    weekStart: 1,
                    autoclose: true
                })
                .on('changeDate', function(selected) {
                    startDate = new Date(selected.date.valueOf());
                    startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
                    $('.end_date').datepicker('setStartDate', startDate);
                });
            $('.end_date')
                .datepicker({
                    format: 'dd-mm-yyyy',
                    weekStart: 1,
                    startDate: startDate,
                    endDate: ToEndDate,
                    autoclose: true
                })
                .on('changeDate', function(selected) {
                    FromEndDate = new Date(selected.date.valueOf());
                    FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
                    $('.start_date').datepicker('setEndDate', FromEndDate);
            });

            $(".search_btn").click(function (e) { 
                table.draw();
            });
        });
    </script>
@endsection
