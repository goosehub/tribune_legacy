<?php
echo '<h1 class="viewTitle">'.$news_item['title'].'</h1>';
echo '<h5 class="articleAuthor">By <strong>'.$news_item['author'].'</strong></h5>';
echo '<h6 class="articleDate">Submitted on '.$news_item['date'].'</h6>';
echo '<img class="coverImage img-thumbnail" src="/tribune/images/'.$news_item['filename'].'">';
echo '<em id="caption">'.$news_item['caption'].'</em>';
echo '<p id="articleBody">'.nl2br($news_item['text']).'</p>';
?>
<a href="../news"><button type="button" class="btn btn-default">Return to News Feed</button></a>

// ADVERTISMENT
<?php
$adverts = array(
	'<img class="advertImage" src="/tribune/ads/steal.png">',
	'<img class="advertImage" src="/tribune/ads/this.png">',
	'<img class="advertImage" src="/tribune/ads/duckey.jpg">'
	);
$rand_keys = array_rand($adverts, 2);
echo $adverts[$rand_keys[0]] . "\n";
?>

<h3>Join the Discussion</h3>

<?php echo validation_errors(); 
	$link = $this->uri->uri_string();
	echo form_open($link);
?>

	<div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Name</div>
	<input type="input" class="form-control" name="name" /><br />
	</div>
	</div>

	<div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Comment</div>
	<textarea class="form-control" name="text" rows="4"></textarea><br />
	</div>
	</div>

	<input id="commentSubmit" class="form-control input-lg" type="submit" name="submit" value="Comment" />

</form>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
<?php
foreach ($comments as $row) {
echo '<h3>'.$row['name'].'</h3>';
echo nl2br($row['text']);
}
?>
</div>
<div class="col-md-2"></div>
</div>