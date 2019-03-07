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
	<td class="text-center">
		<span class="badge badge-pill badge-light">{{ $player->pivot->wins }}</span>
	</td>
	<td class="text-center">
		<span class="badge badge-pill badge-light">{{ $player->pivot->losses }}</span>
	</td>
	<td class="text-center">
		<span class="badge badge-pill badge-light">{{ $player->pivot->ties }}</span>
	</td>
	@if($showAdminControls)
	<td class="text-center">
		<button type="button" class="btn btn-secondary btn-xs btn-fill btn-block"><i class="fa fa-pencil"></i> Edit</button>
		<button type="button" class="btn btn-danger btn-xs btn-fill btn-block"><i class="fa fa-trash"></i> Delete</button>
	</td>
	@endif
</tr>
