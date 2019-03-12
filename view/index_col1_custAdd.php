<!--        The absolute positioned container in the middle to show success messages
            upon completing Add Customer request -->
<div class="success-outer-div">
    <div class="success-inner-div">
        <p id="success-message-displayed"></p>
    </div>
</div>

<form id="addCustomerForm" method="POST">
    <div class="newCustomerForm">

        <div class="row">
            <div class="col-50">
                <h3>Name</h3>
                <input type="text"  name="name" id="name" placeholder="Booking name"/>
            </div>
            <div class="col-50">
                <h3>Preferences</h3>
                <input id="priority" type="checkbox" name="priority" value="1"/> Priority
                <br/>
            </div>
        </div>
        <!--                    CUSTOMER TYPE       -->
        <div class="row">
            <div class="col-25">
                <h3>Booking Time</h3>
                <input type="radio" id="time_now" name="time" value="" checked="checked"/> ASAP

                <br/>

                <input type="radio" id="time_booking" name="time" value="bookTime""/> Choose time:
                <span id="time"></span>
                <span id="bookingTime"></span>
            </div>
            <div class="col-25">
                <h3>Customer Type</h3>
                <input type="radio" id="desired_place_button" name="pickup" value="desiredPlace" checked="checked"/>
                Desired Place
                <br/>
                <input type="radio" id="pick_branch" name="pickup" value="branch"/> Branch
            </div>
            <div class="col-25">
                <h3>Payment Type</h3>
                <input type="radio" name="payment" id="paymentCash" checked="checked" value="Cash"/> Cash
                <br/>
                <input type="radio" name="payment" id="paymentCard" value="Card"/> Card
            </div>
        </div>
        <div id="cardPayment" style="display:none">
            <h3>Payment Details</h3>
            <input type="text" id="cardNumber" name="cardNumber" placeholder="1111 2222 3333 4444"/>
            <div class="row">
                <div class="col-50">
                <input type="text" id="cardType" name="cardType" placeholder="Visa Mastercard"/>
                </div>
                <div class="col-50">
                    <input type="text" id="cardExpiry" name="cardExpiry" placeholder="01/17"/>
                </div>
            </div>
        </div>
        <!--                    FROM ADDRESS        -->
        <div id="addressFrom">
            <h3>From:</h3>
            <div class="row">
                <div class="col-50">
                    <input type="text" id="houseNumber" name="houseNumber" placeholder="House Number / Name"/>
                </div>
                <div class="col-50">
                    <input type="text" id="postcode" name="postcode" placeholder="Post Code"/>
                </div>
            </div>
            <input type="text" id="street" name="street" placeholder="Street Name"/>
            <div class="row">
                <div class="col-75">
                    <input type="text" id="city" name="city" placeholder="City/Town"/>
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
                    <input type="text" id="destinationHouseNo" name="toHouseNumber" placeholder="House Number / Name"/>
                </div>
                <div class="col-50">
                    <input type="text" id="destinationPostcode" name="toPostcode" placeholder="Post Code"/>
                </div>
            </div>
            <input type="text" id="destinationStreet" name="toStreet" placeholder="Street Name"/>
            <div class="row">
                <div class="col-75">
                    <input type="text" id="destinationCity" name="toCity" placeholder="City/Town"/>
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