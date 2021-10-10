@extends("user.layout")





@section('content')

@if ($message = Session::get('success'))

<script>

    var toastLiveExample = document.getElementById('liveToast')
    var toast = new bootstrap.Toast(toastLiveExample)

    toast.show()

</script>

@endif

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <img src="..." class="rounded me-2" alt="...">
        <strong class="me-auto">Bootstrap</strong>
        <small>11 mins ago</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Hello, world! This is a toast message.
      </div>
    </div>
</div>

     <div class="">

         <p class=" text-xs fw-bold text-center fst-italic">Bienvenue dans votre espace client <span>Afriknet</span> <span class="bi bi-emoji-smile"></span>
        </p>



        
        
         <div class="container">
             <p class="alert alert-danger text-center">Votre abonnement (nom de l'abonnement) prendra fin le (expire le) !!!</p>  
             <p class="alert alert-danger text-center">Votre abonnement (nom de l'abonnement) prendra fin le (expire le) !!!</p>  

             

         </div>

         {{-- User informations div --}}

        <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xm-12">

                        <div class="card shadow mb-4">
                            <!-- Card Header - Accordion -->
                            <a href="#collapseCardExample1" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
                                <h6 class="m-0 font-weight-bold text-primary"> <span class="bi bi-person-fill"></span>  Legal informations</h6>
                            </a>
                            <!-- Card Content - Collapse -->
                            <div class="collapse" id="collapseCardExample1" style="">
                                <div class="card-body">

                                    <div class="row row-cols-2">
                                        <p class=" col text-xs">Nom : <strong>{{$client->name}}</strong></p>
                                        <p class=" col text-xs">Prénom(s) : <strong>{{$client->prenom}}</strong></p>
                                    </div>

                                    <div class="row row-cols-2">
                                        <p class=" col text-xs">Country : <strong>{{$client->pays}}</strong></p>
                                        <p class=" col text-xs">City : <strong>{{$client->ville}}</strong></p>
                                    </div>


                                   

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xm-12">

                        <div class="card shadow mb-4">
                            <!-- Card Header - Accordion -->
                            <a href="#collapseCardExample2" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
                                <h6 class="m-0 font-weight-bold text-primary">Contact informations</h6>
                            </a>
                            <!-- Card Content - Collapse -->
                            <div class="collapse" id="collapseCardExample2" style="">
                                <div class="card-body">

                                    <div class="row row-cols-2">
                                        <p class=" col text-xs">Contact : <strong>{{$client->contact}}</strong></p>
                                        <p class=" col text-xs">Email : <strong>{{$client->email}}</strong></p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        
                    </div>

                </div>
        </div>

         {{-- User informations div --}}



        {{--  Plaints and request sending section --}}

        <div class=" mx-5 my-5 border shadow">

            
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

              

        </div>

        {{--  Plaints and request sending section --}}

     </div>
@endsection