@extends('public.layouts.app')
@section('content')
<script src="{{ asset('libs/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
  <section>
        <div class="container">
          <div class="row mt-5 mb-5" >
                <h1 class="text-center">Inscrire votre entreprise</h1>
            
          </div>

           

            <div class="row">
            <div class="col-md-12">
                
                        <div class="row mt-5 mb-5">
                            <div class="col-md-6 ">
                                <form  role="form"  method="POST" action="{{ route('business.store') }}" id="business_form">
                                    @csrf
                                    <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }} ">
                                        <label class="form-control-label" for="name">Login société (partie de l'URL, ne peut être modifié)</label>
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="" type="text" name="name" value="{{ old('name') }}"  autofocus>
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="email">{{ __('Email') }}</label>
                                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" type="text" name="email" value="{{ old('email') }}"  autofocus>
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    

                                    <div class="form-group{{ $errors->has('telephone') ? ' has-danger' : '' }} ">
                                        <label class="form-control-label" for="telephone">Téléphone</label>
                                        <input class="form-control" placeholder="" type="text" name="telephone" value="{{ old('telephone') }}"  value="{{ old('telephone') }}" autofocus="">
                                        @error('telephone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                   <div class="form-group{{ $errors->has('category_id') ? ' has-danger' : '' }} ">
                                        <label class="form-control-label" for="category_id">Categorie de mon entreprise</label>
                                        <select class="form-control custom-select" id="category_id" name="category_id" value="{{ old('category_id') }}">
                                            <option value="">Select Categorie</option>
                                            @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }} ">
                                        <label class="form-control-label" for="address">Adresse de l’entreprise</label>
                                        <input class="form-control" placeholder="" type="text" name="address" value="{{ old('address') }}"  autofocus="">
                                    </div>

                                    <div class="form-group{{ $errors->has('company_name') ? ' has-danger' : '' }} ">
                                        <label class="form-control-label" for="company_name">Titre de votre page de réservation (nom de l'entreprise, par exemple)</label>
                                        <input class="form-control" placeholder="" type="text" name="company_name" value="{{ old('company_name') }}"  autofocus="">
                                        @error('company_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }} ">
                                        <label class="form-control-label" for="description">{{ __('Description ') }}</label>
                                        <textarea id="categoryCreateDescription1" class="form-control" name="description" >{{ old('description') }}</textarea>
                                        <script> tinymce.init({ plugins: 'link', selector: '#categoryCreateDescription1', promotion: false, branding: false, height: 250 }); </script>
                                    </div>


                                   
                                    <div class="form-group">
                                        <label for="image">J'accepte les modalités</label>
                                        <div class="toggle">
                                            <input type="checkbox" name = "status" checked/>
                                            <label></label>
                                        </div>
                                    </div>



                                    <div class="text-center" id="createCategory">
                                        <input type="submit" class="btn btn-primary btn-block my-5" value="{{ __('S’inscrire maintenant') }}">
                                        
                                    </div>
                                </form>
                        </div>
                    
            </div>
        </div>
        </div>
    </section>
    


<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script> -->

<script>
    // $(document).ready(function() {



    //     $(document).find('#business_form').validate({


    //   rules:{
    //     'name':
    //     {
    //       required:true,
    //     },


    //     'category_id':
    //     {
    //       required:true,
    //       validAge: true
    //     },

    //   },
    //   messages:{
    //     'name':
    //     {
    //       'required':' Name is Required.'
    //     },

    //     'category_id':
    //     {
    //       'required':'Category is Required.'
    //     },

    //   },
    // });


    // });
</script>
@endsection
