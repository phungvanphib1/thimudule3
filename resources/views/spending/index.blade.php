@extends('master')
@section('content')
    <h1>Chi Tiêu</h1>

<div class="container">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="market-updates">
                        <div class="col-md-3 market-update-gd"><a href="{{ route('spending.add') }}"
                                class="btn btn-warning ">Thêm Chi Tiêu</a></div>

                    </div>
                    <h1>
                        {{-- Tổng Chi tiêu: {{ sum($spendings->price)}} --}}
                    </h1>
                    </form>
                </div>
            </div>
            <div>
                <table class="table" ui-jq="footable"
                    ui-options='{
"paging": {
  "enabled": true
},
"filtering": {
  "enabled": true
},
"sorting": {
  "enabled": true
}}'>
                    <thead>
                        <tr>
                            <th data-breakpoints="xs">ID</th>
                            <th>Danh Mục</th>
                            <th>Ngày</th>
                            <th>Số tiền</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @php $totalAll = 0 @endphp
                        @foreach ($spendings as $key => $spending)
                            <tr data-expanded="true" class="item-{{ $spending->id }}">
                                <td>{{ ++$key }}</td>
                                <td>{{ $spending->category }}</td>
                                <td>{{ $spending->date }}</td>
                                <td>{{number_format($spending->price)}} VNĐ</td>
                                <td>
                                    <a href="{{ route('spending.edit', $spending->id) }}" class="btn btn-primary">Edit</a>
                                    <a data-href="{{ route('spending.delete', $spending->id) }}" id="{{ $spending->id }}"
                                        class="btn btn-danger sm deleteIcon">Delete</i></a>
                                </td>

                            </tr>
                            @php $totalAll += $spending->price @endphp
                        @endforeach
                        <h3 style="color: red">tổng tiền {{number_format($totalAll)}} VND</h3>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </section>
</div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '.deleteIcon', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            let href = $(this).data('href');
            let csrf = '{{ csrf_token() }}';
            console.log(id);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: href,
                        method: 'delete',
                        data: {
                            _token: csrf
                        },
                        success: function(res) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            $('.item-' + id).remove();
            window.location.reload();
                        }

                    });
                }
            })
        });

        @php
       if(Session::has('message')){
       @endphp
       Swal.fire({
            icon: 'success',
            title: 'add thành công!',
            showClass: {
            popup: 'swal2-show'
                }
            })
        @php
       }
        @endphp

        @php
       if(Session::has('chinhsua')){
       @endphp
       Swal.fire({
            icon: 'success',
            title: 'edit thành công!',
            showClass: {
            popup: 'swal2-show'
                }
            })
        @php
       }
        @endphp
    </script>
@endsection
