<!--        The absolute positioned container in the middle to show success messages
            upon completing Add Customer request -->
<div class="success-outer-div">
    <div class="success-inner-div">
        <p id="success-message-displayed"></p>
    </div>
</div>

<form id="addDriverForm" method="POST">
    <div class="newDriverForm">
        <div class="row">
            <div class="col-50">
                <h3>Name</h3>
                <input type="text" name="name" id="name" placeholder="First Name"/>
            </div>
            <div class="col-50">
                <h3>Surname</h3>
                <input type="text" name="surname" id="surname" placeholder="Last Name"/>
            </div>
        </div>
        <div class="row">
            <div class="col-50">
                <h3>Date Of Birth</h3>
                <input type="text" name="DOB" id="dob" placeholder="31/12/1998"/>
            </div>
            <div class="col-50">
                <h3>NIN</h3>
                <input type="text" name="nin" id="nin" placeholder="NIN"/>
            </div>
        </div>
        <!--           ADDRESS        -->
        <div id="address">
            <h3>Address:</h3>
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

        <!--             VEHICLE  -->
        <div id="vehicle">
            <h3>Vehicle Information:</h3>
            <div class="row">
                <div class="col-50">
                    <input type="text" id="registration" name="registration" placeholder="AA000 BBB"/>
                </div>
                <div class="col-50">
                    <input type="text" id="capacity" name="capacity" placeholder="4"/>
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                    <input type="text" id="make" name="make" placeholder="Make"/>
                </div>
                <div class="col-50">
                    <input type="text" id="model" name="model" placeholder="Model"/>
                </div>
            </div>
        </div>
        <input id="addDriverButton" type="button" value="Submit" class="btn">
        <script>

        </script>
    </div>
</form>