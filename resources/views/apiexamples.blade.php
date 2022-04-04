<html>

<body>
	<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
	<style>
		.input {
			width: 100%;
			padding: 4px;
		}

		#result {
			padding: 4px;
		}

	</style>

	<script>
	 $(() => {
	  $("a").click(function(event) {
	   var url = $(this).attr("href")
	   var method = $(this).data("method") || "GET"
	   var body = $(this).data("body") || ""
	   sendThis(method, url, body)
	   return false
	  })
	 })

	 async function sendThis(method, url, body) {
	  console.log(url, method, body)
	  $("#method").val(method)
	  $("#url").val(url)
	  console.log("Body is " + body)
	  console.log(body)
	  console.log(JSON.stringify(body))
	  $("#body").val(JSON.stringify(body))

      send()
	 }


	 async function send() {
	  var startTime = new Date()

	  $("#result").text("Waiting...")
	  var headers = {
	   'Accept': 'application/json',
	   'Content-Type': 'application/json'
	  }

	  if ($("#method").val() == "GET") {
	   var data = await fetch($("#url").val(), {
	    method: $("#method").val(),
	    headers: headers,
	   })
	  }

	  var text = await data.text()

	  var endTime = new Date()

	  var milliseconds = endTime.getTime() - startTime.getTime()

	  $("#result").text(text)
	  $("#result").prepend("<div>Time: " + (milliseconds) + "</div><br>")


	 }
	</script>


	<div style="display:flex; justify-content: space-between;">

		<div style="flex:1">

			<p><a href="/api/v1/simpleArray">/api/v1/simpleArray</a></p>

			<p><a href="/api/v1/responseObject">/api/v1/responseObject</a></p>

		</div>

		<div style="flex:1">
			<p>
				URL<br>
				<input type="text" class="input" id="url">
			</p>
			<p>
				Method<br>
				<input type="text" class="input" id="method">
			</p>
			<p>
				Body<br>
				<textarea class="input" id="body"></textarea>
			</p>
			<p><button onclick="send()">Send</button></p>

			<p>
				Result<br>
			<div id="result" style="max-width:60vw; border:1px solid lightgray">&nbsp;</div>
			</p>

		</div>

	</div>


</body>

</html>
