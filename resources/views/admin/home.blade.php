@extends('layouts.master')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Tickets
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card text-white bg-primary">
                                <div class="card-body pb-3">
                                    <div class="text-value">{{ number_format($totalTickets) }}</div>
                                    <div>Total des tickets</div>
                                    <br/>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card text-white bg-success">
                                <div class="card-body pb-3">
                                    <div class="text-value">{{ number_format($openTickets) }}</div>
                                    <div>Tickets Ouverts</div>
                                    <br/>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card text-white bg-danger">
                                <div class="card-body pb-3">
                                    <div class="text-value">{{ number_format($closedTickets) }}</div>
                                    <div>Tickets fermés</div>
                                    <br/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
          <div class="card">
              <div class="card-header">
                  Sites
              </div>

              <div class="card-body">
                  @if(session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif

                  <div class="row">
                      <div class="col-md-4">
                          <div class="card">
                              <div class="card-body pb-3">
                                  <div class="text-value">{{ number_format($totalTickets) }}</div>
                                  <div>Nombre de sites</div>
                                  <br/>
                              </div>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="card">
                              <div class="card-body pb-3">
                                  <div class="text-value">{{ number_format($openTickets) }}</div>
                                  <div>Vitrine</div>
                                  <br/>
                              </div>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="card">
                              <div class="card-body pb-3">
                                  <div class="text-value">{{ number_format($closedTickets) }}</div>
                                  <div>E-commerce</div>
                                  <br/>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
@section('scripts')
@parent

@endsection
