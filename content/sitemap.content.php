<?php $page = $red->page; ?>

<div class="container">
	<div class="row recentRow">
		<div class="recentLabel">
			<h1>Page not found!</h1>
		</div>
		<div class="recentBlock">
			<div>
				<p>
					<h2>The requested page was not found.</h2>
				</p>

				<?php $page->linkTo(array("href" => "home", "class" => "btn btn-primary back-button"), "&laquo; Back");?>
			</div>
		</div>
	</div>
</div>