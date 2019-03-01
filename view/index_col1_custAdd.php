<div class="newCustomerForm">
    <div>
        <h3>Booking Time</h3>
        <input type="radio" id="time_now" name="time" value="now" checked="checked"/> Now

        </br>

        <input type="radio" id="time_booking" name="time" value="bookTime" onchange="showBookingTime(this);"/> Choose different time:
        <input type="time" id="bookintTime">
    </div>
    <!--                    CUSTOMER TYPE       -->
    <div class="row">
        <div class="col-50">
            <h3>Customer Type</h3>
            <input type="radio" id="desired_place_button" name="pickup" value="desiredPlace" checked="checked"/> Desired Place

            </br>

            <input type="radio" id="pick_branch" name="pickup" value="branch"/> Branch
        </div>
        <div class="col-50">
            <h3>Preferences</h3>
            <input type="checkbox" name="priority" value="desiredPlace"/> Priority
            </br>
        </div>
    </div>

    <!--                    FROM ADDRESS        -->
    <div id="addressFrom">
        <h3>From:</h3>
        <div class="row">
            <div class="col-50">
                <input type="text" id="houseNumber" name="houseNumber" placeholder="House Number / Name">
            </div>
            <div class="col-50">
                <input type="text" id="postcode" name="postcode" placeholder="Post Code">
            </div>
        </div>
        <input type="text" id="street" name="street" placeholder="Street Name"/>
        <div class="row">
            <div class="col-75">
                <input type="text" id="city" name="city" placeholder="City/Town"/>
            </div>
            <div class="col-25">
                <button value="Confirm" class="confirm">Confirm</button>
            </div>
        </div>
    </div>

    <!--                    TO ADDRESS        -->
    <div id="addressDestination">
        <h3>Destination:</h3>
        <div class="row">
            <div class="col-50">
                <input type="text" id="destinationHouseNo" name="houseNumber" placeholder="House Number / Name">
            </div>
            <div class="col-50">
                <input type="text" id="destinationPostcode" name="postcode" placeholder="Post Code">
            </div>
        </div>
        <input type="text" id="destinationStreet" name="destinationStreet" placeholder="Street Name"/>
        <div class="row">
            <div class="col-75">
                <input type="text" id="destinationCity" name="city" placeholder="City/Town"/>
            </div>
            <div class="col-25">
                <button id="destinationConfirm" value="Confirm" class="confirm">Confirm</button>
            </div>
        </div>
    </div>
    <input type="submit" value="Submit" class="btn">
    <script>

    </script>
</div>