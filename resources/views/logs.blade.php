
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Changelog</div>

                <div class="card-body">

                     <div class="row justify-content-center">
                        
                        <ul>
                        @foreach($audits as $key => $audit)

                        <li>  
                         @lang($audit->auditable_type.'.updated.metadata', $audit->getMetadata()) 

                          @foreach ($audit->getModified() as $attribute => $modified)
                            <ul>
                                <li>@lang($audit->auditable_type.'.'.$audit->event.'.modified.'.$attribute, $modified)</li>
                            </ul>
                            @endforeach

                        </li>
                  
                        @endforeach
                    </ul>
 
                </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

