@extends("user.layout")





@section('content')



     <div class="">

         

         {{-- User informations div --}}

        <div class="  text-white" 

        style="
        background-image: url({{ asset('template_resources/img/11.jpg') }});
        background-repeat: no-repeat;
        background-size: cover;
    /*     height:600px; */
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-attachment: fixed;
        
        ">
            <div class="h-100 p-5" style="background-color: rgba(0, 0, 0, 0.13)">

              <p class=" text-xs fw-bold text-center fst-italic bg-white text-black mx-5 py-3 mb-5">Bienvenue dans votre espace client <span>Global <sup>.net</sup></span> <span class="bi bi-emoji-smile"></span>
              </p>

             

                <div class="mt-5 py-5" 

                @if(auth()->user()->statut_activite == '0')

                style="background-color: rgba(150, 54, 54, 0.582)"
                  
                @else

                style="background-color: rgba(54, 150, 78, 0.582)"
                  
                @endif
                
                
                
                >
                  <div class="container">
                    <div class="row" >

                      <div class="col-lg-7 mb-5 ">
                              <p class="text-uppercase fw-bolder fs-6 mt-3 mb-5    px-1 text-center">Code d'identification Client : {{$client->barcode_number}}</p>
  

                          @if(auth()->user()->statut_activite == '0')

                              <p class="text-uppercase fw-bolder fs-6 mt-3 mb-5    px-1 text-center">
                                Votre compte est actulllement inactif <br>
                                <br>
                                Veuillez vous rendre dans une de nos agences pour ré-activer votre compte ou cliquer sur le bouton ci-dessous pour une demande d'activation en ligne. Merci.
                              </p>

                              @if($request_existance != null )

                                <a href="#exampleModal" data-bs-toggle="modal" class="btn btn-light mb-3">Annuler ma demande d'activation de compte</a>
                                <!-- Modal -->
                                      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title text-danger text-center" id="exampleModalLabel">Confirmation d'annulation</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                              <p class="text-dark text-uppercase text-center">Voulez-vous vraiment annuler votre demande d'activation de compte ?</p>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                              <a href="{{ route('user.activation_request') }}" class="btn btn-danger">Confirmer</a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                              @else

                                  <a href="{{ route('user.activation_request') }}" class="btn btn-light mb-3">Demande d'activation de compte</a>
                              
                              @endif

                                
                              @else

                              <div class="d-flex justify-content-around mt-3 mb-3">

                                <a href="{{ route("user.formuler_requete") }}" class="btn px-5 text-white" style="background-color: #2f254dbb">Formuler une <br> requête</a>
                                <a href="{{ route("user.formuler_plainte") }}" class="btn text-white px-5" style="background-color: #fc08008c">Formuler une <br> plainte</a>
                               </div>

                               @endif
                           
                               
                               @if($plainte_courante == null || $plainte_courante->statut == "archivé" )

                                 @elseif ($plainte_courante->statut == "en cours de traitement")

                                 <div class="mt-2 py-2 text-center mb-3" style="background-color: rgba(28, 145, 115, 0.863)">
                                  <p class="bg-light text-danger fw-bolder"> Statut de traitement de votre plainte courante <br> </p>
                                  motif : {{ $plainte_courante->motif }} <br>
                                  Statut : <p class="badge badge-light"> {{ $plainte_courante->statut }} </p> le  {{ $plainte_courante->updated_at }} 
                                  </div>

                                  @elseif ($plainte_courante->statut == "traité")

                              {{--     Commented because if the statut = traité it always displays the code commented below --}}
                              
                             {{--      <div class="container">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  
                                      <p> <span class="bi-check-circle-fill mr-1 fa-2x"></span>Votre plainte a été traité. Merci de votre patience et pour votre confiance</p>
                                      
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  
                                  </div>
                                  </div>  --}}
                                   
                              
                               @else 

                                 <div class="mt-2 py-2 text-center mb-3" style="background-color: rgba(88, 22, 175, 0.863)">
                                <p class="bg-light text-danger fw-bolder"> Statut de traitement de votre plainte courante <br> </p>
                                motif : {{ $plainte_courante->motif }} <br>
                                Statut :  <p class="badge badge-light p-1">{{ $plainte_courante->statut }} </p> le  {{ $plainte_courante->updated_at }} 
                                </div>

                               @endif

                                
                    

                             

                              @if ($message = Session::get('success'))


                              <div class="container">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                              
                                  <p> <span class="bi-check-circle-fill mr-1 fa-2x"></span>{{ $message }}</p>
                                  
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              
                              </div>
                              </div>    
                              
                              @endif
  
                      </div>
  
                      <div class="col-lg-5 d-flex   mt-1 ">
                       
                         
                          <div class="container">
  
                          <p class=" text-uppercase fw-bolder text-xs mt-3">Nom : <strong>{{$client->name}}</strong></p>
                          <p class=" text-uppercase fw-bolder text-xs mt-3">Prénom(s) : <strong>{{$client->prenom}}</strong></p>
                          <p class=" text-uppercase fw-bolder text-xs mt-3">Pays : <strong>{{$client->pays}}</strong></p>
                          <p class=" text-uppercase fw-bolder text-xs mt-3">Ville : <strong>{{$client->ville}}</strong></p>
                          <p class=" text-uppercase fw-bolder text-xs mt-3">Contact : <strong>{{$client->contact}}</strong></p>
                          <p class=" text-uppercase fw-bolder text-xs mt-3"> Email : <strong>{{$client->email}}</strong></p>
  
                          </div>
  
                      </div>
  
            
  
                    </div>
                  </div>
                </div>
 
                @if(auth()->user()->statut_activite == '0')
                  
                @else

                <div class="d-flex justify-content-around mt-3 ">

                  <a href="{{ route("user.scrire_forfait") }}" class="btn text-white  " style="background-color: #2f254d">Souscrire à un <br> forfait</a>
                  <a href="{{ route("user.scrire_abonnement") }}" class="btn text-white  " style="background-color: #2f254d"">Souscrire à un  <br> abonnement</a>
                 </div>

                @endif
             
                 
            </div>
               
        </div>
        


        <div class="container  pt-5">

          <div class="row">

            <div class="col-lg-6 col-md-6">

              @if($last_souscription == null)

                    <p class="text-uppercase fw-bolder fs-6 text-white text-center bg-warning p-5">

                      Vous n'avez aucun abonnement en cours !!! 

                  </p>

              @else

                  <p class="text-uppercase fw-bolder fs-6 text-black text-center bg-gray-200 p-5">

                    Votre Abonnement en cours :  {{$last_souscription->nom}} 
                    <br>     
                    Votre abonnement prendra fin :  {{$last_souscription->fini_le}} 

                </p>

              @endif
                
            </div>

          <div class="col-lg-6 col-md-6">

              @if($last_forfait == null)

                    <p class="text-uppercase fw-bolder fs-6 text-white text-center bg-warning p-5">

                      Vous n'avez aucun forfait en cours !!! 

                  </p>

              @else
              
                  <p class="text-uppercase fw-bolder fs-6 text-black text-center bg-gray-200 p-5">

                    Votre forfait en cours :  {{$last_forfait->nom}}  
                    <br>     
                   Votre forfait prendra fin :  {{$last_forfait->fini_le}} 


                  </p>
          

              @endif
                
            </div>
  

          </div>


      </div>

           


       
         {{-- User informations div --}}


         <div class="container mt-5">
          <p class="text-uppercase fw-bolder fs-4 text-black text-center">
           Vos abonnements
         </p>

        

          @if($souscriptions->count() ==0 )
          <div class="bg-warning mx-5 py-2">
            <p class="text-center text-white">Vous n'avez aucune souscription effectuée <span class="bi bi-emoji-dizzy"></span></p>
          </div>
          @else

          <table class="table mb-5">

            <tr class="bg-dark text-white">
              <th>Payé le</th>
              <th>Moyen de payement</th>
              <th>Montant</th>
              <th>Abonnements</th>
            </tr>

              @foreach($souscriptions as $souscription)

              <tr>
                <td>{{$souscription->souscri_le}}</td>
                <td>Mobile</td>
                <td>{{$souscription->price}} F </td>
                <td>{{$souscription->nom}}</td>
              </tr>
              @endforeach
        </table>
            
          @endif

        

         


         </div>



        
        






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