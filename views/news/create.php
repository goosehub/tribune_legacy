<h4>See news happening in your browser?</h4>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('news/contribute') ?>

	<div id="inputAuthor" class="form-group">
	    <div class="input-group">
	      <div class="input-group-addon">Author</div>
			<select class="form-control" name="author">
			  <option value="Anonymous">Anonymous</option>
			  <option value="Peter Parker">Peter Parker</option>
			  <option value="Tom Brokah">Tom Brokah</option>
			  <option value="Jesus">Jesus</option>
			</select>
		</div>
	</div>

	<div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Title</div>
	<input class="form-control" type="input" name="title" /><br />
	</div>

    <div class="input-group">
      <div class="input-group-addon">Body</div>
	<textarea class="form-control" name="text" rows="12"></textarea><br />
	</div>
	</div>

	<div class="form-group">
    <div class="input-group">
      <div class="input-group-addon contributeFileAddon">Cover Image</div>
		<input class="form-control contributeFile" name="file" type="file" />
	</div>


    <div class="input-group">
      <div class="input-group-addon">Caption</div>
	<textarea class="form-control" name="caption" rows="4"></textarea><br />
	</div>
	</div>

	<div id="inputCategory" class="form-group">
	    <div class="input-group">
	      <div class="input-group-addon">Category</div>
			<select class="form-control" name="category">
			  <option value="S4S">S4S</option>
			  <option value="4Chan">4Chan</option>
			  <option value="World Wide Web">World Wide Web</option>
			  <option value="Opinion">Opinion</option>
			  <option value="Advice">Advice</option>
			  <option value="Reviews">Reviews</option>
			  <option value="Interviews">Interviews</option>
			  <option value="Investigations">Investigations</option>
			</select>
		</div>
	</div>

	<input class="form-control input-lg" id="contributeSubmit" type="submit" name="submit" value="Submit news article" />

</form>