$Content
<% if PaginatedPages %>
	<% loop PaginatedPages %>
		<p><b>Name:</b> $Title</p>
		<% if SafariImages %>
			<% loop SafariImages %>
			    <div style="display:inline;">
		            $CroppedImage(250,250)
			    </div>
		    <% end_loop %>
		<% end_if %>
		<p><b>No of Rooms:</b> $NoOfRooms</p>
		<p><b>Intro Text:</b> $Content</p>
		<p><b>Rating:</b> $Rating</p>
		<p><b>Category:</b> $Category.Name</p>
		<p><b>Tags:</b> $Tags.Name</p>
		<p><a href="$Link">Go</a></p>
		-----
	<% end_loop %>

<% end_if %>