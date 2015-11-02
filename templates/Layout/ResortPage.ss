<h3><b>Name:</b> $Title</h3>
<div>
$Content
</div>
<div>
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
<p><b>Tags:</b> 
	<% if Tags %>
		<% loop Tags %>
			{$Name} |
		<% end_loop %>
	<% end_if %>
</p>
<p><b>Holiday Types:</b> 
	<% if HolidayTypes %>
		<% loop HolidayTypes %>
			{$Name} |
		<% end_loop %>
	<% end_if %>
</p>
<p><b>Geo Cordinates:</b> $Cordinates</p>
<p><b>Atoll:</b> $Atoll.Name</p>
<p><b>Island:</b> $Island.Name</p>
<p><b>Categpry:</b> $Category.Name</p>
<p><b>TransferType:</b> $TransferType.Name</p>
</div>
<div>
<% if Rooms %>
<h3>Rooms</h3>
	<% loop Rooms %>
		<p>$Name</p>
		<p>$Introduction</p>
		<% if RoomImages %>
			<% loop RoomImages %>
			<div style="display:inline">
				$CroppedImage(250,250)
			</div>
			<% end_loop %>
		<% end_if %>
	<% end_loop %>
<% end_if %>
</div>	
<div>
<% if Dining %>
<h3>Dining</h3>
	<% loop Dining %>
		<p>$Name</p>
		<p>$Introduction</p>
		<% if DiningImages %>
			<% loop DiningImages %>
			<div style="display:inline">
				$CroppedImage(250,250)
			</div>
			<% end_loop %>
		<% end_if %>
	<% end_loop %>
<% end_if %>
</div>
<div>
<% if Facilities %>
<h3>Facilities</h3>
	<% loop Facilities %>
		<p>$Name</p>
		<p>$Introduction</p>
		<% if FacilityImages %>
			<% loop FacilityImages %>
			<div style="display:inline">
				$CroppedImage(250,250)
			</div>
			<% end_loop %>
		<% end_if %>
	<% end_loop %>
<% end_if %>
</div>
<div>
<% if Activities %>
<h3>Activities</h3>
	<% loop Activities %>
		<p>$Name</p>
		<p>$Introduction</p>
		<% if ActivityImages %>
			<% loop ActivityImages %>
			<div style="display:inline">
				$CroppedImage(250,250)
			</div>
			<% end_loop %>
		<% end_if %>
	<% end_loop %>
<% end_if %>
</div>