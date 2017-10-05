
<!-- BEGIN Modal -->

<!-- Modal -->
<div class="modal fade" id="modal_info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	<span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- END Modal -->


<footer class="footer">
	<div class="master">
		<div class="texto">
			Descarga nuestros términos y condiciones <a href="#">aquí</a>.<br>
			<img src="img/phone.png" class="phone">01 800 056 4667<br>
			<img src="img/logo-footer.png" class="logo-footer">
		</div>
		<div class="redes">
			<a href="https://www.instagram.com/kmimosmx/?hl=es" target="_blank"><img src="img/r1.png"></a>
			<a href="https://twitter.com/KmimosMx" target="_blank"><img src="img/r2.png"></a>
			<a href="https://www.facebook.com/KmimosMx" target="_blank"><img src="img/r3.png"></a>
			<a href="https://www.youtube.com/channel/UCIOJJlTD1184V_uk2nGUxZw" target="_blank"><img src="img/r4.png"></a>
		</div>
	</div>
</footer>
<script src="./js/jquery.js"></script>
<script src="./js/scripts.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript">
	setTimeout(mostrar_modal,3600);
	function mostrar_modal(){
		$('#modal_info').modal('show');
	}
</script>

</body>
</html>