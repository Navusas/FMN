<form id="addCustomerForm" method="POST">
    <div class="newCustomerForm">
        <div>
            <h3>Booking Time</h3>
            <input type="radio" id="time_now" name="time" value="" checked="checked"/> ASAP

            </br>

            <input type="radio" id="time_booking" name="time" value="bookTime""/> Choose different time:
            <span id="time"></span>
            <span id="bookingTime"></span>
        </div>
        <!--                    CUSTOMER TYPE       -->
        <div class="row">
            <div class="col-50">
                <h3>Customer Type</h3>
                <input type="radio" id="desired_place_button" name="pickup" value="desiredPlace" checked="checked"/>
                Desired Place

                </br>

                <input type="radio" id="pick_branch" name="pickup" value="branch"/> Branch
            </div>
            <div class="col-50">
                <h3>Preferences</h3>
                <input id="priority" type="checkbox" name="priority" value="True"/> Priority
                <input id="priorityHidden" type="hidden" name="priority" value="False"/>
                </br>
            </div>
        </div>

        <!--                    FROM ADDRESS        -->
        <div id="addressFrom">
            <h3>From:</h3>
            <div class="row">
                <div class="col-50">
                    <input type="text" id="houseNumber" name="houseNumber" placeholder="House Number / Name" required/>
                </div>
                <div class="col-50">
                    <input type="text" id="postcode" name="postcode" placeholder="Post Code" required/>
                </div>
            </div>
            <input type="text" id="street" name="street" placeholder="Street Name" required/>
            <div class="row">
                <div class="col-75">
                    <input type="text" id="city" name="city" placeholder="City/Town" required/>
                </div>
                <div class="col-25">
                    <button id="confirm" value="Confirm" class="confirm" disabled>Confirm</button>
                </div>
            </div>
        </div>

        <!--                    TO ADDRESS        -->
        <div id="addressDestination">
            <h3>Destination:</h3>
            <div class="row">
                <div class="col-50">
                    <input type="text" id="destinationHouseNo" name="toHouseNumber" placeholder="House Number / Name" required/>
                </div>
                <div class="col-50">
                    <input type="text" id="destinationPostcode" name="toPostcode" placeholder="Post Code" required/>
                </div>
            </div>
            <input type="text" id="destinationStreet" name="toStreet" placeholder="Street Name" required/>
            <div class="row">
                <div class="col-75">
                    <input type="text" id="destinationCity" name="toCity" placeholder="City/Town" required/>
                </div>
                <div class="col-25">
                    <button id="destinationConfirm" value="Confirm" class="confirm" disabled>Confirm</button>
                </div>
            </div>
        </div>
        <input id="addCustomerSubmitButton" type="button" value="Submit" class="btn">
        <script>

        </script>
    </div>
</form>