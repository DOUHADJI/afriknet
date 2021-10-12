@extends("user.layout")





@section('content')

@if ($message = Session::get('success'))

<div class="container">
  <div class="alert alert-success alert-dismissible fade show" role="alert">

    <p> <span class="bi-check-circle-fill mr-1 fa-2x"></span>{{ $message }}</p>
    
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>
</div>    

@endif

     <div class="">

         <p class=" text-xs fw-bold text-center fst-italic">Bienvenue dans votre espace client <span>Afriknet</span> <span class="bi bi-emoji-smile"></span>
        </p>

         {{-- User informations div --}}

        <div class="container-fluid bg-primary text-white py-5">
            <div class="container">

                <div class="row">

                    <div class="col-lg-6">
                            <p class="text-uppercase fw-bolder fs-6 mt-3">Code d'identification Client : {{$client->barcode_number}}</p>
                    </div>

                    <div class="col-lg-6 d-flex">
                     
                       
                        <div class="container">

                        <p class=" text-uppercase fw-bolder text-xs mt-3">Nom : <strong>{{$client->name}}</strong></p>
                        <p class=" text-uppercase fw-bolder text-xs mt-3">Prénom(s) : <strong>{{$client->prenom}}</strong></p>
                        <p class=" text-uppercase fw-bolder text-xs mt-3">Country : <strong>{{$client->pays}}</strong></p>
                        <p class=" text-uppercase fw-bolder text-xs mt-3">City : <strong>{{$client->ville}}</strong></p>
                        <p class=" text-uppercase fw-bolder text-xs mt-3">Contact : <strong>{{$client->contact}}</strong></p>
                        <p class=" text-uppercase fw-bolder text-xs mt-3"> Email : <strong>{{$client->email}}</strong></p>

                        </div>

                    </div>

                </div>

            </div>
               
        </div>

        <div class="container  pt-5">
            <p class="text-uppercase fw-bolder fs-6 text-white text-center bg-success p-5">
                Votre souscription en cours : 

            </p>

        </div>
       
         {{-- User informations div --}}


         <div class="container mt-5">
          <p class="text-uppercase fw-bolder fs-4 text-black text-center">
           Vos abonnements
         </p>

         <table class="table mb-5">

          <tr class="bg-dark text-white">
            <th>Payé le</th>
            <th>Moyen de payement</th>
            <th>Montant</th>
            <th>Abonnements</th>
          </tr>

          @if($souscriptions->count() ==0 )
          <tr>
            <p class="text-center">Vous n'avez aucune souscription effectuée</p>
          </tr>
          @else

              @foreach($souscriptions as $souscription)
              <tr>
                <td>{{$souscription->souscri_le}}</td>
                <td>Mobile</td>
                <td>{{$souscription->price}} F </td>
                <td>{{$souscription->nom}}</td>
              </tr>
              @endforeach
            
          @endif

        

         

        </table>

         </div>



        
        





        {{--  Plaints and request sending section --}}

{{--         <div class=" mx-5 my-5 border shadow">

            
            <div class="d-flex">

                
                        <img class="img-fluid w-50" src="https://www.republiquetogolaise.com/media/k2/items/cache/7d70964d0f7ca0ac820829f5fc1d53f9_XL.jpg" alt="statut de la liberté">
                

                <div class=" bg-white w-50 ">

                    <p class="text-center text-white container-fluid border-bottom py-3" style="background-color: #D2BBEB">Send us a request or a plaint here</p>

                    
                  

                    <div class="">

                      
        
                        <div>
        
                            <form class="p-2 m-2">
                                
                                <div class="row">

                                    <div class="col-4">
                                        
                                        <div class="mb-3">
                                            <div class="form-floating">
                                                <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                                                  <option selected>-- choix --</option>
                                                  <option value="requete">Requête</option>
                                                  <option value="plainte">Plainte</option>
                                                </select>
                                                <label for="floatingSelectGrid">Type de message </label>
                                              </div>

                                          </div>

                                    </div>

                                    <div class="col-8">

                                        <div class="mb-3">
                                            <label for="motif" class="form-label">Motif</label>
                                            <input type="text" class="form-control" id="motif" name="motif" aria-describedby="motiflHelp">
                                            <div id="motifHelp" class="form-text text-xs fst-italic ">Motif de votre message</div>
                                          </div>

                                    </div>

                                   

                                </div>


                                <div class="mb-3">
                                  <label for="exampleInputmessage1" class="form-label">Message</label>
                                  <textarea type="message" class="form-control" id="exampleInputmessage1"></textarea>
                                  <div id="typeHelp" class="form-text text-xs fst-italic">Dites nous quel est votre souci</div>
                                </div>

                                <div class="d-flex flex-row-reverse">
                                    <button type="submit" class="btn btn-success w-25">Send</button>
                                </div>
        
                            </form>
        
                        </div>
        
                      </div>
                </div>

            </div>

              

        </div> --}}

        {{--  Plaints and request sending section --}}

        <div class="container-fluid bg-gray-200 pt-5 pb-5">
            <p class="fw-bolder text-uppercase text-center fs-3 text-black">une question ? nous avons la réponse !</p>

            <div class="container">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                          Comment souscrire à une offre ?
                        </button>
                      </h2>
                      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Pour souscrire à une de nos offres rendez-vous dans un de <strong>nos points de vente</strong> ou souscrivez en payant via 
                            les services mobiles <strong>Flooz</strong> ou <strong>TMoney</strong>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                          Comment modifier mes identifiants ?
                        </button>
                      </h2>
                      <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo similique nesciunt libero a totam quo eius dolorem iure sapiente, corporis cupiditate est eveniet suscipit aspernatur! Optio nihil numquam similique aliquid.</div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                          Comment nous faire par de vos plaintes ?
                        </button>
                      </h2>
                      <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ullam voluptatum expedita, ex quo vero magni! Alias fugiat voluptatem suscipit optio, id repellendus, quam incidunt ipsum cumque dicta impedit et atque.</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                      </div>
                    </div>
                  </div>

                <p class="text-center mt-3">  Vous n'avez pas trouvé la réponse à votre question ? 
                  <a href="{{route("user.faq")}}"> Consultez notre FAQ.</a> 
                </p>

            </div>

            
    </div>

     </div>
@endsection