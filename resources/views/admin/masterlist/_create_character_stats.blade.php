@foreach ($stats as $stat)
    <div class="form-group">
        {!! Form::label($stat->name) !!} {!! $stat->displayLimits(true) ? '<b>(Limited to: ' . $stat->displayLimits(true) . ')</b>' : '' !!}
        {!! Form::number('stats[' . $stat->id . ']', $stat->base, ['class' => 'form-control']) !!}
    </div>
@endforeach
