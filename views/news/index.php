<div id="indexCon">
<?php foreach ($news as $news_item): ?>

	<div class="row indexItem">
	  <div class="col-md-3">

	<?php echo '<img class="coverImage" src="/tribune/images/'.$news_item['filename'].'">'; ?>

	</div><div class="col-md-9">

    <h2 class="indexHeadline"><?php echo $news_item['title'] ?></h2>
	<h4 class="articleAuthor">By <strong><?php echo $news_item['author'] ?></strong></h4>

    <div class="indexText">
        <p><?php echo $news_item['text'] ?></p>
    </div>
    <a href="/tribune/news/<?php echo $news_item['slug'] ?>">
	<button type="button" class="readMore btn btn-default">Read More</button>
	</a>
	<button class="articleCategory btn btn-disabled"><?php echo $news_item['category'] ?></button>

	  </div>
	  </div>
<?php endforeach ?>
</div>

						<!-- START ADVERTISMENT -->
<?php
$adverts = array(
	'<img class="advertImage" src="/tribune/ads/steal.png">',
	'<img class="advertImage" src="/tribune/ads/this.png">',
	'<img class="advertImage" src="/tribune/ads/duckey.jpg">'
	);
$rand_keys = array_rand($adverts, 1);
echo $adverts[$rand_keys] . "\n";
?>
						<!-- END ADVERTISMENT -->