@extends("user.layout")


@section("content")

    <div 

    style="
        background-image: url({{ asset('template_resources/img/11.jpg') }});
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-attachment: fixed;
        
        "
    >
        <div class="p-3 h-100 d-flex justify-content-center "  style="background-color: rgba(54, 150, 78, 0.582)">

            <form action="{{ route("user.formuler_requete") }}" method="POST" class="p-5 border w-100  text-white " >
                @csrf
                <input type="text" hidden value="requete" name="type" >
            
                <label for="motif" class="form-control-label">Motif</label>
                <input type="text" name="motif" id="motif" class="form-control bg-transparent text-white form-control-user @error("motif") is-invalid @enderror" >
            
                @error("motif")
                 <div class="invalid-feedback">{{$message}}</div>
                @enderror
            
         


                <label for="message" class="form-control-label mt-5">Formuler votre requête</label>
                <textarea type="text" name="message" id="message" class="form-control bg-transparent text-white form-control-user @error("message") is-invalid @enderror" rows="8"> </textarea>
            
                @error("message")
                 <div class="invalid-feedback">{{$message}}</div>
                @enderror
            
                <button type="submit" class="btn bg-transparent text-white border mt-5 w-100 py-2">Send</button>
            
              </form>
        </div>
    </div>


    
@endsection



 


