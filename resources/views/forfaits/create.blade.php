@extends('forfaits.layout')


@section("content")

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add new forfait</h6>
        </div>
    
            
       
            <form action="{{route('forfaits.store')}}" method="POST">
                @csrf
                @method("POST")
                <div class="card-body">
    
                        <div class="form-group">
                            <div class="row">
    
                                <div class="col">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control form-control-user @error("name") is-invalid @enderror " 
                                    id="name"  name="name" value="{{old("name")}}">
                                    
                                    @error("name")
                                       <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
    
    
                                </div>
    
                                
                                <div class="col">
                                    <label for="volume">Data volume</label>
                                    <input type="number" class="form-control form-control-user  @error("volume") is-invalid @enderror " 
                                    id="volume"  name="volume" value="{{old("volume")}}">
                                    @error("volume")
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
    
                                </div>
    
                                <div class="col">
                                    <label for="validite">Validite</label>
                                    <input type="number" class="form-control form-control-user @error("validite") is-invalid @enderror "
                                     id="volume"  name="validite" value="{{old("validite")}}">
    
                                    @error("validite")
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
    
                                </div>

                                <div class="col">
                                    <label for="Prix">Validite</label>
                                    <input type="number" class="form-control form-control-user @error("price") is-invalid @enderror "
                                     id="price"  name="price" value="{{old("price")}}">
    
                                    @error("price")
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
    
                                </div>



    
    
                            </div>
                        
                        </div>
    
                     
                </div>
    
                <div class="card-footer ">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-success" type="submit">Create</button>
                    </div>
                </div>
    
            </form>
    
    </div>
</div>


@endsection