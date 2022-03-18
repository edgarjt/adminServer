@extends('adminlte::page')

@section('title', 'Servidores | Perfil')



@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="card card-primary card-outline container">
        <div class="card-header">
            <h3 class="card-title">Mi perfil</h3>
        </div>

        <div class="card-body box-profile">
            <div class="text-center mb-5">
                <img src="/img/profile.jpg" class="profile-user-img img-fluid img-circle" alt="my profile">
            </div>

            <ul class="list-group list-group-unbordered mb-3 container">
                <li class="list-group-item">
                    <input class="label-input" type="text" id="name_value" value="{{$data->name}}">
                    <span class="float-right">
                        <button class="btn btn-info btn-sm" id="name">
                            <i class="fas fa-regular fa-pen"></i>
                        </button>
                    </span>
                </li>

                <li class="list-group-item">
                    <input class="label-input" type="text" id="first_surname_value" value="{{$data->first_surname}}">
                    <span class="float-right">
                        <button class="btn btn-info btn-sm" id="first_surname">
                            <i class="fas fa-regular fa-pen"></i>
                        </button>
                    </span>
                </li>

                <li class="list-group-item">
                    <input class="label-input" type="text" id="last_surname_value" value="{{$data->last_surname}}">
                    <span class="float-right">
                        <button class="btn btn-info btn-sm" id="last_surname">
                            <i class="fas fa-regular fa-pen"></i>
                        </button>
                    </span>
                </li>

                <li class="list-group-item">
                    <input class="label-input" type="text" id="email_value" value="{{$data->email}}">
                    <span class="float-right">
                        <button class="btn btn-info btn-sm" id="email">
                            <i class="fas fa-regular fa-pen"></i>
                        </button>
                    </span>
                </li>
            </ul>
        </div>
    </div>
@stop
@section('js')
    <script>
        $('#name').click(function () {
            let name = $('#name_value').val();
            if(!name)
            {
                Swal.fire({
                    position: 'top-end',
                    type: 'error',
                    title: 'El nombre es requerido',
                    showConfirmButton: false,
                    timer: 1500
                });
                return false
            }

            sendForm(name, 'name');
        });

        $('#first_surname').click(function () {
            let first_surname = $('#first_surname_value').val();

            if(!first_surname)
            {
                Swal.fire({
                    position: 'top-end',
                    type: 'error',
                    title: 'El apellido es requerido',
                    showConfirmButton: false,
                    timer: 1500
                });
                return false;
            }
            sendForm(first_surname, 'first_surname');
        });

        $('#last_surname').click(function () {
            let last_surname = $('#last_surname_value').val();

            if(!last_surname)
            {
                Swal.fire({
                    position: 'top-end',
                    type: 'error',
                    title: 'El apellido es requerido',
                    showConfirmButton: false,
                    timer: 1500
                });
                return false;
            }
            sendForm(last_surname, 'last_surname');
        });

        $('#email').click(function () {
            let email = $('#email_value').val();

            if(!email)
            {
                Swal.fire({
                    position: 'top-end',
                    type: 'error',
                    title: 'El correo es requerido',
                    showConfirmButton: false,
                    timer: 1500
                });
                return false;
            }
            sendForm(email, 'email');
        })

        function sendForm(data, input)
        {
            $.ajax({
                url : 'edit',
                data : { data : data, input: input, _token: @json(csrf_token()) },
                type : 'POST',
                dataType : 'json',
                success : function(data) {
                    if(data.status)
                    {
                        location.reload();
                    }
                }
            })
        }
    </script>
@stop
