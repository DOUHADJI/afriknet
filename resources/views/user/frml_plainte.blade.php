

@extends("user.layout")


@section("content")

    <div 

    style="
        background-image: url({{ asset('template_resources/img/11.jpg') }});
        background-repeat: no-repeat;
        background-size: cover;
        height:82vh;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-attachment: fixed;
        
        "
    >
        <div class="p-5 h-100 d-flex justify-content-center "  style="background-color: rgba(54, 150, 78, 0.582)">

            <form action="{{ route("user.formuler_plainte") }}" method="POST" class="p-5 border w-50 text-white " >
                @csrf
                <input type="text" hidden value="plainte" name="type" >
            
                <label for="motif" class="form-control-label">Motif</label>
                <select type="text" name="motif" id="motif" class="form-control form-control-user @error("motif") is-invalid @enderror" >

                    <option value="0"> -- Selectioinnner le motif de la plainte --</option>
                    <option value="La connexion est interrompue" >La connexion est interrompue</option>
                    <option value="J'ai souscrit mais connexion indisponible" >J'ai souscrit mais connexion indisponible</option>
                    <option  value="Mon routeur ne s'allume pas">Mon routeur ne s'allume pas</option>
                    <option value="Mon câble wifi est coupé" >Mon câble wifi est coupé</option>

                </select>
            
                @error("motif")
                 <div class="invalid-feedback">{{$message}}</div>
                @enderror
            
         


                <label for="message" class="form-control-label mt-5">Formuler votre plainte</label>
                <textarea type="text" name="message" id="message" class="form-control form-control-user @error("message") is-invalid @enderror" rows="6"> </textarea>
            
                @error("message")
                 <div class="invalid-feedback">{{$message}}</div>
                @enderror
            
                <button type="submit" class="btn btn-primary mt-5">Send</button>
            
              </form>
        </div>
    </div>


    
@endsection



 


