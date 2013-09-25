<?php $page = $red->page; ?>

<div class="container">
	<div class="row recentRow">
		<div class="recentLabel">
			<h1>Page not found!</h1>
		</div>
		<div class="recentBlock">
			<div>
				<p>
					<span id="noEvents">The requested page was not found.</span>
				</p>

				<?php $page->linkTo(array("href" => "home", "class" => "btn btn-primary back-button"), "&laquo; Back");?>
			</div>
		</div>
	</div>
</div>