<div class="content-10">
    <div class="container10">
        <div class="first-child">
            <span> Returning customer? <a style="color: black; opacity: 1.0;" href="">Click here</a> to login</span>
        </div>
        <div class="second-child">
            <div class="left-side">
                <p style="font-size: 32px; font-weight: 300;">Billing Deatils</p>
                <div style="background-color: white; height: auto; display: flex; justify-content: center; border:rgba(128, 128, 128, 0.3) solid 1px;">
                    <form style="width: 90%; margin: 40px 0 40px 0;" id="billingForm">
                        <div>
                            <label for="country">Country <span>*</span> </label>
                            <br>
                            <select style="width: 100%; height: 50px; padding: 10px; color: rgba(128, 128, 128, 0.9); font-size: 14px; border-radius: 10px" id="country" required>
                                <option value="" disabled selected>Select your country</option>
                                <!-- Asia -->
                                <option value="cn">China</option>
                                <option value="in">India</option>
                                <option value="jp">Japan</option>
                                <option value="kr">South Korea</option>

                                <!-- Europe -->
                                <option value="fr">France</option>
                                <option value="de">Germany</option>
                                <option value="it">Italy</option>
                                <option value="es">Spain</option>

                                <!-- North America -->
                                <option value="us">United States</option>
                                <option value="ca">Canada</option>
                                <option value="mx">Mexico</option>

                                <!-- South America -->
                                <option value="br">Brazil</option>
                                <option value="ar">Argentina</option>
                                <option value="cl">Chile</option>
                            </select>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <div style="width: 48%;">
                                <label for="first_name">First Name <span>*</span></label>
                                <input type="text" id="first_name" aria-describedby="first_name_help" required>
                            </div>
                            <div style="width: 48%;">
                                <label for="last_name">Last Name <span>*</span></label>
                                <input type="text" id="last_name" required>
                            </div>
                        </div>
                        <div>
                            <label for="company_name">Company Name</label>
                            <input type="text" id="company_name">
                        </div>
                        <div>
                            <label for="address">Address <span>*</span></label>
                            <input style="margin-bottom: 20px;" placeholder="Street address" type="text" id="address" required>
                            <input placeholder="Apartment, suite, unit, etc. (optional)" type="text" id="address" required>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <div style="width: 48%;">
                                <label for="state">State / Country <span>*</span></label>
                                <input type="text" id="state" required>
                            </div>
                            <div style="width: 48%;">
                                <label for="posta">Posta / Zip <span>*</span></label>
                                <input type="text" id="posta" required>
                            </div>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <div style="width: 48%;">
                                <label for="email">Email Address <span>*</span></label>
                                <input type="email" id="email" required>
                            </div>
                            <div style="width: 48%;">
                                <label for="phone">Phone <span>*</span></label>
                                <input type="text" id="phone" required>
                            </div>
                        </div>

                        <div style="margin: 0; padding: 0; display: flex; align-items: center;">
                            <input style="width: 20px;" type="checkbox" id="create_account">
                            <label for="create_account">Create an account?</label>
                        </div>
                        <div style="margin: 0; padding: 0; display: flex; align-items: center;">
                            <input style="width: 20px;" type="checkbox" id="ship_to_different_address">
                            <label for="ship_to_different_address">Ship To A Different Address?</label>
                        </div>
                        <div>
                            <label for="order_notes">Order Notes</label>
                            <textarea id="order_notes"></textarea>
                        </div>
                        <div>
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="right-side"></div>
        </div>
    </div>
</div>
<style>
    .content-10 {
        display: flex;
        justify-content: center;
        margin-bottom: 200px;
        margin-top: 100px;
    }

    .content-10 .container10 {
        width: 68%;
    }

    .content-10 .container10 .first-child {
        border: solid 1px rgba(128, 128, 128, 0.7);
        padding: 28px;
        font-size: 14px;
        opacity: 0.7;
    }

    .content-10 .container10 .second-child {
        display: flex;
    }

    .content-10 .container10 .second-child .left-side {
        width: 50%;
    }

    .content-10 .container10 .second-child .right-side {
        width: 50%;
    }

    .container10 .second-child span {
        color: red;
    }

    #billingForm label {
        font-size: 15px;
        opacity: 0.9;
        font-weight: 500;
        line-height: 1.5;
    }

    #billingForm input {
        width: 100%;
        height: 50px;
        border-radius: 10px;
        border: solid 1px rgba(128, 128, 128, 0.5);
        padding: 5px 5px 5px 20px;
        box-sizing: border-box;
        margin-top: 10px;
    }

    #billingForm div {
        margin-bottom: 10px;
    }
</style>