@extends('admin.layout')
@section('content')
<div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-9 col-lg-7 col-xl-6">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body p-5">
            <h2 class="text-uppercase text-center mb-5">Ajouter utilisateurs</h2>

            <form  method="POST" action="{{route('update_user',['id'=>$id])}}">
                @method("PATCH")
                @csrf
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" value="{{$user->name}}" id="form3Example1cg" name="name" class="form-control form-control-lg" />
                <label class="form-label"  for="form3Example1cg">Enter Name</label>
              </div>

              <div data-mdb-input-init class="form-outline mb-4">
                <input type="email" value="{{$user->email}}" id="form3Example3cg" name="email" class="form-control form-control-lg" />
                <label class="form-label" for="form3Example3cg">Enter Email</label>
              </div>
              <div data-mdb-input-init class="form-outline mb-4">
                <select
                class="form-select form-select-lg"
                name="role"
                id=""
            >
                <option selected>select role</option>
                <option value="admin">admin</option>
                <option value="prof">prof</option>
            </select>
                
                <label class="form-label" for="form3Example3cg"></label>
              </div>

              <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" name="password" id="form3Example4cg" class="form-control form-control-lg" />
                <label class="form-label" for="form3Example4cg">Passworde</label>
              </div>

            

             
              <div class="d-flex justify-content-center">
                <button type="submit"
                  data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Ajouter</button>
              </div>

          

            </form>

          </div>
        </div>
      </div>
    </div>
@endsection