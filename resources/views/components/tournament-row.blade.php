<tr class="tournament-row">
	<td>
		<a href="{{ url("series/".$series->slug."/".$tournament->slug) }}">{{ $tournament->name }}</a>
	</td>
	<td class="text-center">
		<span class="badge badge-pill badge-light">{{ count($tournament->entrants) }}</span>
	</td>
	<td class="text-center">
		{{ $tournament->date->format("M. jS, Y") }}
	</td>
	<td class="text-center">
		@if($tournament->overview_link)
		<a href="{{ $tournament->overview_link }}" target="_blank">{{ $tournament->overview_link }}</a>
		@else
		<em class="text-muted">Unavailable</em>
		@endif
	</td>
	<td class="text-center">
		@if($tournament->format)
		{{ $tournament->printFormat() }}
		@else
		<em class="text-muted">Unavailable</em>
		@endif
	</td>
	@if($showAdminControls)
	<td class="text-center action-col">
		<button type="button" class="btn btn-secondary btn-xs btn-fill btn-block"><i class="fa fa-pencil"></i> Edit</button>
		<button type="button" class="btn btn-danger btn-xs btn-fill btn-block"><i class="fa fa-trash"></i> Delete</button>
	</td>
	@endif
</tr>