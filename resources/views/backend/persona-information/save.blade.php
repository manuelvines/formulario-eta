@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Información personal</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                    <p>Aquí podrás personalizar los mensajes de ayuda para los visitantes.</p>
                    <p>Es posible agregar HTML:</p>
                </div>
            </div>
        </div>


                                <form action="{{ route('persona.store') }}" method="POST">
                                    @csrf


                                    <div class="row">

                                        <div class="col-md-6">
                                            <label for="surnames">Ingrese la información para apellidos:</label>
                                            <textarea name="info_surnames" id="info_surnames" class="md-textarea form-control" rows="3" cols="" rows="5"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="name">Ingrese la información para nombres:</label>
                                            <textarea name="info_name" id="info_name" class="md-textarea form-control" rows="3" cols="" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="email">Ingrese la información para email:</label>
                                            <textarea name="info_email" id="info_email" class="md-textarea form-control" rows="3" cols="" rows="5"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="phone">Ingrese la información para teléfono:</label>
                                            <textarea name="info_phone" id="info_phone" class="md-textarea form-control" rows="3" cols="" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="info_birth_date">Ingrese la información para fecha nacimiento:</label>
                                            <textarea name="info_birth_date " id="info_birth_date " class="md-textarea form-control" rows="3" cols="" rows="5"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="info_country_of_birth">Ingrese la información para País de nacimiento:</label>
                                            <textarea name="info_country_of_birth" id="info_country_of_birth" class="md-textarea form-control" rows="3" cols="" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="info_place_of_birth">Ingrese la información para lugar nacimiento:</label>
                                            <textarea name="info_place_of_birth" id="info_place_of_birth" class="md-textarea form-control" rows="3" cols="" rows="5"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="info_gender">Ingrese la información para Genero:</label>
                                            <textarea name="info_gender " id="info_gender " class="md-textarea form-control" rows="3" cols="" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="info_marital status">Ingrese la información para Estado Civil:</label>
                                            <textarea name="info_marital status" id="info_marital status" class="md-textarea form-control" rows="3" cols="" rows="5"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="name">Ingrese la información para País de Nacionalidad:</label>
                                            <textarea name="info_country_of_nationality" id="info_country_of_nationality" class="md-textarea form-control" rows="3" cols="" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <hr>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="info_representative_surnames">Ingrese la información para apellidos de Representante:</label>
                                            <textarea name="info_representative_surnames" id="info_representative_surnames" class="md-textarea form-control" rows="3" cols="" rows="5"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="info_representative_name">Ingrese la información para nombres de Representante:</label>
                                            <textarea name="info_representative_name" id="info_representative_name" class="md-textarea form-control" rows="3" cols="" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="info_representative_address">Ingrese la información para dirección de Representante:</label>
                                            <textarea name="info_representative_address" id="info_representative_address" class="md-textarea form-control" rows="3" cols="" rows="5"></textarea>
                                        </div>

                                    </div>
                                      <hr>
                                      <div class="row">
                                          <div class="col-md-12 text-center">

                                               <button type="submit" class="btn btn-primary btn-block">REGISTRAR DATOS</button>

                                          </div>
                                      </div>
                                </form>


    </div>
@endsection
