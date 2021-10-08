@extends("user.layout")


@section("content")

<div class="container">
    <div class="row">

        <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Select the forfait
                    </div>

                    <div class="card-body">
                        <form action="">

                            <p class="fw-bolder">Select your forfait</p>

                            <div>
                                <select name="bank" id="" class="form-control">
                                    <option value="0">click to select your forfait</option>

                                    @foreach($forfaits as $forfait)
                                    
                                    <option><strong> {{$forfait->nom}}</strong> </option>
                                        
                                    @endforeach
                                  
                                </select>
                            </div>

                           {{--  <button class="btn btn-success mt-2" type="submit"><span class="bi bi-phone"></span> Proceed Payment</button> --}}


                            <div class="mt-3">
                                <p>
                                    <strong>Note :</strong> There is above a list of our differents forfaits availables.
                                </p>
                            </div>

                        </form>
                    </div>
                 

                </div>

                <div class="mt-5 d-flex  justify-content-around">
                    @foreach ($forfaits as $forfait )
                        <div class="card">
                            <div class="card-header">
                                {{$forfait->nom}}
                            </div>
                            <div class="card-body">
                                <div class="fst-italic fw-bold d-flex text-xs">
                                    <span>Débit : <span class="fw-bold"> {{$forfait->volume}}  Go</span></span>
                                </div>

                                <div class="fst-italic fw-bold d-flex text-xs my-2">
                                    <span> Price: <span class="fw-bold">{{$forfait->price}} F CFA </span></span>
                                </div>

                                <div class="d-flex flex-row-reverse text-xs">
                                    <p class="fst-italic fst-bold text-warning">Validité : <span> {{$forfait->validite}} jours</span></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


        </div>

        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    Payment mode
                </div>
                <div class="card-body">

                    <ul class="nav nav-pills mb-3 nav-justified " id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><span class="bi bi-credit-card fa-2x"></span> <p>Credit card</p></button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><span class="fab fa-paypal fa-2x"></span> <p>Paypal</p></button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><span class="bi bi-phone fa-2x"></span> <p>Net banking</p></button>
                        </li>
                      </ul>
                      <div class="tab-content mt-4" id="pills-tabContent">

                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                            <form action="">
                                <div>
                                    <label for="name" class="fw-bold">Card Owner</label>
                                    <input type="text" name="name" class="form-control form-control-user" placeholder="Card Owner name" >
                                </div>

                                <div class="mt-3">
                                    <label for="name" class="fw-bold">Card Number</label>
                                   <div class="input-group">
                                        <input type="text" name="name" class="form-control form-control-user" placeholder="Card number" aria-describedby="basic-addon2">
                                        <span class="input-group-text " id="basic-addon2">
                                            <span class="fab fa-cc-visa mr-1"></span>
                                            <span class="fab fa-cc-mastercard mx-1"></span>
                                            <span class="fas fa-credit-card ml-1"></span>
                                        </span>
                                   </div>
                                </div>

                                <div class="d-flex mt-3">

                                    <div class="mr-5">
                                        <label for="" class="fw-bold">Expiration date</label>
                                        <div class="input-group">
                                            <input type="number" aria-label="First name" class="form-control" placeholder="MM" min="1" max="12">
                                            <input type="number" aria-label="Last name" class="form-control" placeholder="YY" min="2001" >
                                          </div>
                                    </div>

                                    <div class="">

                                        <label for="" class="fw-bold">CVV <span class="bi bi-question-circle-fill"></span></label>
                                        <input type="text" name="cvv" class="form-control form-control-user" placeholder="" >

                                    </div>
                            
                                </div>

                                <hr class="my-4">
                          
                                <button class="btn btn-success mb-2 w-100" ><span class="fas fa-check"></span> Confirm payment</button>


                            </form>
                        </div>

                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <form action="">

                                <p class="fw-bolder">Select your paypal account type</p>

                                <div>

                                    <div class="input-group">
                                        <div class="form-check mr-3">
                                            <input class="form-check-input form-check-user" type="radio" value="" id="flexCheckDefault" name="account-type">
                                            <label class="form-check-label" for="flexCheckDefault">
                                              Domestic
                                            </label>
                                          </div>
                                          <div class="form-check ml-3">
                                            <input class="form-check-input form-check-user" type="radio" value="" id="flexCheckChecked" checked name="account-type">
                                            <label class="form-check-label" for="flexCheckChecked">
                                              International
                                            </label>
                                          </div>
                                    </div>

                                </div>

                                <button class="btn btn-success mt-2" type="submit"><span class="fab fa-paypal"></span> Log in to my paypal</button>


                                <div class="mt-3">
                                    <p>
                                        <strong>Note :</strong> After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order.
                                    </p>
                                </div>

                            </form>
                        </div>

                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

                            <form action="">

                                <p class="fw-bolder">Select your bank</p>

                                <div>
                                    <select name="bank" id="" class="form-control">
                                        <option value="0">click to select your bank</option>
                                        @for($i = 0; $i < 10; $i++)
                                            <option><strong>Bank {{$i+1}}</strong> </option>
                                        @endfor
                                    </select>
                                </div>

                                <button class="btn btn-success mt-2" type="submit"><span class="bi bi-phone"></span> Proceed Payment</button>


                                <div class="mt-3">
                                    <p>
                                        <strong>Note :</strong> After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order.
                                    </p>
                                </div>

                            </form>

                        </div>


                      </div>

                </div>

            </div>
        </div>

    </div>
</div>
    
@endsection