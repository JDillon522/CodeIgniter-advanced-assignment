		<!-- Comment Form -->
		<form method="post" action="../Post/add_comment">
		  <fieldset>
		    <legend>Comment</legend>
		    <input type="hidden" name="action" value="comment">
		    <input type="hidden" name="message_id" value="<?php $id ?>">
		    <textarea rows="2" placeholder="Respond..." name="comment_text" id="comment_text"></textarea>
		    <br />
		    <button type="submit" id="comment_btn" class="button">Submit</button>
		  </fieldset>
		</form>
	</div>
</div>