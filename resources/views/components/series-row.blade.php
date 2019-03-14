<tr class="series-row">
	<td>
		<a href="{{ url("/series/".$series->slug) }}">
			{{ $series->name }}
		</a>
	</td>
	<td class="game-boxart text-center p-1">
		<a href="{{ url("/games/".$series->game->slug) }}">
			<img src="{{ $series->game->boxartSrc() }}" class="img-fluid"/>
		</a>
	</td>
	<td class="text-center">
		<a href="{{ url("/games/".$series->game->slug) }}">
			{{ $series->game->name }}
		</a>
	</td>
	<td class="text-center">
		<span class="badge badge-pill badge-light">{{ count($series->entrants) }}</span>
	</td>
	<td class="text-center">
		<span class="badge badge-pill badge-light">{{ count($series->tournaments) }}</span>
	</td>
	<td class="text-center">
		{!! $series->renderDateRange() !!}
	</td>
	@if($showAdminControls)
	<td class="text-center action-col">
		<button type="button" class="btn btn-secondary btn-xs btn-fill btn-block"><i class="fa fa-pencil"></i> Edit</button>
		<button type="button" class="btn btn-danger btn-xs btn-fill btn-block"><i class="fa fa-trash"></i> Delete</button>
	</td>
	@endif
</tr>