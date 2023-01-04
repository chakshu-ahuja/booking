<html>
<head>
	<title>Movie Ticket Booking System</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<div>
		<h3>Movie Ticket Booking System</h3>
		<label>Select Movie: </label>
		<select name="movie" id="mov_name" >
			<option value="">Select Movie</option>
		</select>
        
		<!-- <div id="movie_time" style="display: none;"> -->






























        
			<label>Select Time: </label>
			<select name="time" id="time" >
				<option value="">Select Time</option>
			</select>
		</div>
		<div>
			<label>Date: </label>
			<input type="date" name="date" id="date" >
		</div>
		<div>
			<label>Name: </label>
			<input type="text" name="name" id="name" >
		</div>
		<div>
			<label>Email: </label>
			<input type="email" name="email" id="email" >
		</div>
		<div>
			<button type="submit" name="submit" id="submit">Book Ticket</button>
		</div>
	</div>

<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
			url: "get_movie.php",
			success: function(data){
				var movie = JSON.parse(data);
				$.each(movie, function(k,v){
					$("#mov_name").append("<option value='"+v.Mov_cod+"'>"+v.Mov_name+"</option>");
				});
			}
		});

        $(document).on('change', '#mov_name', function(){  
			var mov_id = $(this).val();
            console.log(mov_id)
			$.ajax({
				url: "get_time.php",
				data: {'mov_id': mov_id},
				type: 'post',
				success: function(data){
					var time = JSON.parse(data);
					$("#time").html("<option value=''>Select Time</option>");
					$.each(time, function(k,v){
						$("#time").append("<option value='"+v.Time_cod+"'>"+v.Time+"</option>");
					});
					$("#movie_time").show();
				}
			});
		});

		$("#submit").click(function(){
			var mov_name = $("#mov_name option:selected").text();
			var tkt_date = $("#date").val();
			var tkt_time = $("#time option:selected").text();
			var name = $("#name").val();
			var email = $("#email").val();

			$.ajax({
				url: "save_ticket.php",
				data: {'mov_name': mov_name, 'tkt_date': tkt_date, 'tkt_time': tkt_time, 'name': name, 'email': email},
				type: 'post',
				success: function(data){
					alert(data);
				}
			});
		});
	});
</script>

</body>
</html>
