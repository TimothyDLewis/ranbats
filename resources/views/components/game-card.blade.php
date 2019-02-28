<div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-2 form-group">
	<div class="card mb-0">
		<a href="{{ url("/games/".$game->slug) }}">
			<img src="{{ $game->boxartSrc() }}" class="card-img-top"/>
		</a>
		<div class="card-body text-center">
			<div class="row">
				<div class="col-12">
					<h4 class="mt-0">
						<a href="{{ url("/games/".$game->slug) }}">{{ $game->name }}</a>
					</h4>
				</div>
			</div>
		</div>
	</div>
</div>