@extends('user.layout')


@section('content')
    <div class="container position-relative">

        <div class="alert alert-light mb-5">
            <p class=" text-xs fw-bold text-center fst-italic">Bienvenue dans votre espace messagerie client <span></span> <span class="bi bi-emoji-smile"></span>
            </p>

            <p class=" text-md fw-bold text-center fst-italic">Communiquez avec nous via cette messagerie intégrée <span></span>
            </p>

        </div>

        

      <div class="d-flex">

        <div class="alert alert-dark" role="alert">
            A simple dark alert—check it out!
          </div>

      </div>


      <div class="d-flex flex-row-reverse">

        <div class="alert alert-success" role="alert">
            A simple dark alert—check it out!
          </div>

        </div>

        <div class="position-fixed" style="bottom: 100px; right: 80px;" >
             <button class="btn btn-primary d-inline-flex" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> 
                 <span class="fas fa-plus mr-1"></span>
                 <span class="fas fa-envelope"></span> 
            </button>
        </div>

        <!-- Modal -->
            <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Writte a new message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="" id="myform" method="GET">
                            @csrf
                            <textarea class="form-control" name="" id="" cols="10" rows="5" placeholder="Your message here"></textarea>
                        </form>

                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button  class="btn btn-success" type="submit" form="myform" >Send</button>
                    </div>
                </div>
                </div>
            </div>

      
        

              

    </div>
@endsection