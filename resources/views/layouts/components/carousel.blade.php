{{-- Title --}}
<h2 class="red text-center" style="margin:1.1em 0 1.1em 0;">
    Ultimos livros
</h2>

{{-- Carousel bringing last 9 books --}}
<section>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            
        </div>
        <div class="carousel-inner text-center">
            <div class="carousel-item active">
                <div class="cards-wrapper">
                    <div class="card">
                        <div class="image-wrapper">
                            <img src="{{URL::asset('/imgs/book_covers/'.$books[0]->book_cover)}}"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title red"><b>{{$books[0]->book_name}}</b></h5>
                            <p class="gray">
                                <b>Genêros:</b> {{$books[0]->genre}}
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image-wrapper">
                        <img src="{{URL::asset('/imgs/book_covers/'.$books[1]->book_cover)}}"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title red"><b>{{$books[1]->book_name}}</b></h5>
                            <p class="card-text gray">
                                <b>Genêros:</b> {{$books[1]->genre}}
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image-wrapper">
                        <img src="{{URL::asset('/imgs/book_covers/'.$books[2]->book_cover)}}"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title red"><b>{{$books[2]->book_name}}</b></h5>
                            <p class="card-text gray">
                                <b>Genêros:</b> {{$books[2]->genre}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="cards-wrapper">
                    <div class="card">
                        <div class="image-wrapper">
                        <img src="{{URL::asset('/imgs/book_covers/'.$books[3]->book_cover)}}"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title red"><b>{{$books[3]->book_name}}</b></h5>
                            <p class="card-text " style="color:black;">
                                <b>Genêros:</b> {{$books[3]->genre}}
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image-wrapper">
                        <img src="{{URL::asset('/imgs/book_covers/'.$books[4]->book_cover)}}"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title red"><b>{{$books[4]->book_name}}</b></h5>
                            <p class="card-text" style="color:black;">
                                <b>Genêros:</b> {{$books[4]->genre}}
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image-wrapper">
                        <img src="{{URL::asset('/imgs/book_covers/'.$books[5]->book_cover)}}"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title red"><b>{{$books[5]->book_name}}</b></h5>
                            <p class="card-text gray">
                                <b>Genêros:</b> {{$books[5]->genre}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="cards-wrapper">
                    <div class="card">
                        <div class="image-wrapper">
                        <img src="{{URL::asset('/imgs/book_covers/'.$books[6]->book_cover)}}"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title red"><b>{{$books[6]->book_name}}</b></h5>
                            <p class="card-text gray">
                                <b>Genêros:</b> {{$books[6]->genre}}
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image-wrapper">
                        <img src="{{URL::asset('/imgs/book_covers/'.$books[7]->book_cover)}}"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title red"><b>{{$books[7]->book_name}}</b></h5>
                            <p class="card-text gray">
                                <b>Genêros:</b> {{$books[7]->genre}}
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image-wrapper">
                        <img src="{{URL::asset('/imgs/book_covers/'.$books[8]->book_cover)}}"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title red"><b>{{$books[8]->book_name}}</b></h5>
                            <p class="card-text gray">
                                <b>Genêros:</b> {{$books[8]->genre}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

</section>

<style>
    /* .card {
            border: none;
            border-radius: 0;
            box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
            background-color: #ffffff00;
        } */

        /* .carousel-control-prev span,
        .carousel-control-next span { */
            /* width: 1.5rem;
            height: 1.5rem; */
        /* }
        @media screen and (min-width: 577px) {
        .cards-wrapper {
            display: flex;
            background-color: #ffffff00;
        }
        .card {
            margin: 0 0.5em;
            width: calc(100% / 2);
        }
        .image-wrapper {
            height: 30vw;
            margin: 0 auto;
        }
        }
        @media screen and (max-width: 576px) {
        .card:not(:first-child) {
            display: none;
        }
        }

        .image-wrapper img {
            max-width: 100%;
            max-height: 100%;
        }
        .card-body{ */
            /* color: ; */
            /* background-color: #ffffff00;
        } */
</style> 