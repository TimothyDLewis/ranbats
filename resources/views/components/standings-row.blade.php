<tr class="entrant-row">
	<td class="rank-col">
		<span class="badge badge-pill badge-light">{{ $rank }}</span>
	</td>
	<td>
		@if($player->prefix)
		<span class="text-muted">{{ $player->prefix}} </span> | 
		@endif
		{{ $player->name }}
	</td>
	<td class="text-center">
		<span class="badge badge-pill badge-light">{{ $player->pivot->points }}</span>
	</td>
	@foreach($series->tournaments AS $tournament)
	@if($player->tournaments->contains($tournament))
	<?php $pTournament = $player->tournaments->first(function($pTournament) use($tournament){
		return $pTournament->id == $tournament->id;
	}); ?>
	<td class="text-center">
		<span class="badge badge-pill badge-light">{{ $pTournament->pivot->points }}</span>
	</td>
	@else
	<td class="text-center">
		<i class="fa fa-minus text-muted"></i>
	</td>
	@endif
	@endforeach
</tr>