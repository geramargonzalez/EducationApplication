<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-block">

                <div class="row">
                    <div class="col-xl-2 col-lg-3 col-md-4">

                        <h4 class="m-t-5 m-b-15 font-16">Crear observacion o evento</h4>
                        <form method="post" id="add_event_form" class="m-t-5 m-b-20">
                            <input type="text" class="form-control new-event-form" placeholder="Add new event..." />
                        </form>

                        <div id='external-events'>
                            <h4 class="m-b-15 font-16">Eventos</h4>
                             <p class="m-b-15 font-16">Arrastre los eventos hacia la fecha deseada</p>
                            
                        </div>
                        <!-- checkbox -->
                        <label class="custom-control custom-checkbox mt-2" for="drop-remove">
                            <input type="checkbox" class="custom-control-input" id="drop-remove">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Remover despues de arrastrar</span>
                        </label>

                    </div>

                    <div id='calendar' class="col-xl-10 col-lg-9 col-md-8"></div>

                </div>
                <!-- end row -->

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->