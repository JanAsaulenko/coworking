<div id="main-wrapper">
	<div class="container">
		<div class="row 200%">
			<div class="4u 12u(medium)">

				<!-- Sidebar -->
				<div id="sidebar">
					<section class="widget thumbnails">
						<h3 id="intrst_stff">Interesting stuff</h3>
						<div class="grid">
							<div class="row 50%">
								@foreach($pictures as $picture)
									<div class="6u">
										<a href="#" class="image fit">
											<img src="{{ asset($picture) }}"style="height:101px;"/>
										</a>
									</div>
								@endforeach
							</div>
						</div>
						<a href="{{ url('/gallery') }}" class="button icon fa-file-text-o">More</a>
					</section>
				</div>

			</div>
			<div class="8u 12u(medium) important(medium)">

				<!-- Content -->
				<div id="content">
					<section class="last">
						<h2>So what's this all about?</h2>
						<p>This is <strong>{{ $config->header}}</strong>, a free and fully responsive HTML5 site template by <a href="http://html5up.net">HTML5 UP</a>.
							Verti is released under the <a href="http://html5up.net/license">Creative Commons Attribution license</a>, so feel free to use it for any personal or commercial project you might have going on (just don't forget to credit us for the design!)</p>
						<p>Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus. Praesent semper bibendum ipsum, et tristique augue fringilla eu. Vivamus id risus vel dolor auctor euismod quis eget mi. Etiam eu ante risus. Aliquam erat volutpat. Aliquam luctus mattis lectus sit amet phasellus quam turpis.</p>
						<a href="#" class="button icon fa-arrow-circle-right">Continue Reading</a>
					</section>
				</div>

			</div>
		</div>
	</div>
</div>