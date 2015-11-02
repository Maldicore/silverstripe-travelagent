$Content
<% if PaginatedPages %>
	<% loop PaginatedPages %>
		<p><b>Name:</b> $Title</p>
		<% if ResortImages %>
			<% loop ResortImages %>
			    <div style="display:inline;">
		            $CroppedImage(250,250)
			    </div>
		    <% end_loop %>
		<% end_if %>
		<p><b>No of Rooms:</b> $NoOfRooms</p>
		<p><b>Distance from Airport:</b> $AirportDistance</p>
		<p><b>Intro Text:</b> $Content</p>
		<p><b>Rating:</b> $Rating</p>
		<p><b>Tags:</b> $Tags.Name</p>
		<p><b>Geo Cordinates:</b> $Cordinates</p>
		<p><b>Atoll:</b> $Atoll.Name</p>
		<p><b>Categpry:</b> $Category.Name</p>
		<p><b>TransferType:</b> $TransferType.Name</p>
		<p><a href="$Link">Go</a></p>
		-----
	<% end_loop %>

<% end_if %>