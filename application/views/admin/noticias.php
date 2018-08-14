<style>



p { margin: 10px 0; }

/* ==========================================================================
   WYSIWYG
   ========================================================================== */
#editor {
	resize: vertical;
	overflow: auto;
	line-height: 1.5;
	background-color: #fafafa;
  background-image: none;
	border: 0;
  border-bottom: 1px solid #3b8dbd;
	min-height: 150px;
	box-shadow: none;
	padding: 8px 16px;
	margin: 0 auto;
	font-size: 14px;
	transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
}
	#editor:focus {
		background-color: #f0f0f0;
		border-color: #9c27b0;
		box-shadow: none;
		outline: 0 none;
	}

/* ==========================================================================
   Buttons
   ========================================================================== */
.btn {
  font-family:"Raleway", sans-serif;
  font-weight: 300;
  font-size: 1em;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  border: none;
  border-bottom: .15em solid black;
  padding: 0.65em 1.3em;
  
}
.btn-xs {
	font-size: .80em;
	padding: .25em .75em;
}

.btn-default {
  border-color: #d9d9d9;
  background-image: linear-gradient(#ffffff, #f2f2f2);
}
	.btn-default:hover { background: linear-gradient(#f2f2f2, #e6e6e6); }
</style>
<div class="container">
<form action="<?php echo base_url('Menu/Noticias/RegistrarNoticias');?>"method="post" enctype="multipart/form-data">
	<div class="title">
		<h3>Titulo</h3>
        <input type="text" name="titulo" class="form-control">
	</div>

	<div id="editparent">
		<div id="editControls">
			<div class="btn-group">
				<a style="color:#9c27b0;" class="btn btn-xs btn-default" data-role="undo" href="#" title="Undo"><i class="fa fa-undo"></i></a>
				<a  style="color:#9c27b0;" class="btn btn-xs btn-default" data-role="redo" href="#" title="Redo"><i class="fa fa-repeat"></i></a>
			</div>
			<div class="btn-group">
				<a  style="color:#9c27b0;" class="btn btn-xs btn-default" data-role="bold" href="#" title="Bold"><i class="fa fa-bold"></i></a>
				<a  style="color:#9c27b0;" class="btn btn-xs btn-default" data-role="italic" href="#" title="Italic"><i class="fa fa-italic"></i></a>
				<a  style="color:#9c27b0;" class="btn btn-xs btn-default" data-role="underline" href="#" title="Underline"><i class="fa fa-underline"></i></a>
				<a  style="color:#9c27b0;" class="btn btn-xs btn-default" data-role="strikeThrough" href="#" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
			</div>
			<div class="btn-group">
				<a  style="color:#9c27b0;" class="btn btn-xs btn-default" data-role="indent" href="#" title="Blockquote"><i class="fa fa-indent"></i></a>
				<a  style="color:#9c27b0;" class="btn btn-xs btn-default" data-role="insertUnorderedList" href="#" title="Unordered List"><i class="fa fa-list-ul"></i></a>
				<a  style="color:#9c27b0;" class="btn btn-xs btn-default" data-role="insertOrderedList" href="#" title="Ordered List"><i class="fa fa-list-ol"></i></a>
			</div>
			<div class="btn-group">
				<a style="color:#9c27b0;"  class="btn btn-xs btn-default" data-role="h1" href="#" title="Heading 1"><i class="fa fa-header"></i><sup>1</sup></a>
				<a style="color:#9c27b0;"  class="btn btn-xs btn-default" data-role="h2" href="#" title="Heading 2"><i class="fa fa-header"></i><sup>2</sup></a>
				<a style="color:#9c27b0;"  class="btn btn-xs btn-default" data-role="h3" href="#" title="Heading 3"><i class="fa fa-header"></i><sup>3</sup></a>
				<a  style="color:#9c27b0;" class="btn btn-xs btn-default" data-role="p" href="#" title="Paragraph"><i class="fa fa-paragraph"></i></a>
			</div>
		</div>
		<div id="editor" contenteditable></div>
		<textarea name="descripcion" id="editorCopy" required="required" style="display:none;"></textarea>
	</div>
    <br>
    <div class="row">
    <div class="col">
    <input type="file" name="imagen"  accept="image/*" >
    </div>
    <div class="col">
    <button type="submit" class="btn btn-primary btn-sm">Crear noticias</button>
    </div>
    </div>
    </form>
</div>
<script
  src="https://code.jquery.com/jquery-2.2.0.js"
  integrity="sha256-oYqpLeqZe9cetUDV+TFiBZHp3uJ+X4F5eLs4W6uSTSE="
  crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
	/** ******************************
		* Simple WYSIWYG
		****************************** **/
	$('#editControls a').click(function(e) {
		e.preventDefault();
		switch($(this).data('role')) {
			case 'h1':
			case 'h2':
			case 'h3':
			case 'p':
				document.execCommand('formatBlock', false, $(this).data('role'));
				break;
			default:
				document.execCommand($(this).data('role'), false, null);
				break;
		}

		var textval = $("#editor").html();
		$("#editorCopy").val(textval);
	});

	$("#editor").keyup(function() {
		var value = $(this).html();
		$("#editorCopy").val(value);
	}).keyup();
	
	$('#checkIt').click(function(e) {
		e.preventDefault();
		alert($("#editorCopy").val());
	});
});
</script>