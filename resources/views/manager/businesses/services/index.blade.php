@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">

                <div class="panel-heading">{{ trans('manager.services.index.title') }}</div>

                <div class="panel-body">
                    <table class="table">
                    @foreach ($services as $service)
                        <tr>
                            <td title="{{ $service->description }}">
                            <div class="btn-group">
                                {!! Button::normal()->withIcon(Icon::edit())->asLinkTo( route('manager.business.service.edit', [$business->id, $service->id]) ) !!}
                                {!! Button::normal($service->name)->asLinkTo( route('manager.business.service.show', [$business->id, $service->id]) ) !!}
                            </div>
                            </td>
                        </tr>
                    @endforeach
                    </table>

                {!! Button::primary(trans('manager.services.btn.create'))->withIcon(Icon::plus())->asLinkTo( route('manager.business.service.create', [$business->id]) )->block() !!}

                </div>
            
            </div>
            @if ($business->services()->count())
                {!! Alert::success(trans('manager.services.create.alert.go_to_vacancies')) !!}
                {!! Button::success(trans('manager.services.create.btn.go_to_vacancies'))->withIcon(Icon::time())->large()->block()->asLinkTo(route('manager.business.vacancy.create', $business->id)) !!}
            @endif
        </div>
    </div>
</div>
@endsection
