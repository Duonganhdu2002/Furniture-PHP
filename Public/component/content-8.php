<form action="../PUBLIC-PAGE/send.php" method="post">
    <div class="content-8">
        <div class="container8">
            <div style="display: flex; margin-bottom: 50px" class="adress-info">
                <div style="width: 33%; display: flex; justify-content: center; align-items: center;">
                    <div style="min-width: 50px; height:50px; border-radius: 10px; display: flex; justify-content: center; align-items: center; background-color: #3b5d50">
                        <img style="width: 20px; height: 20px" src="../PUBLIC-PAGE/images/marker.svg" alt="">
                    </div>
                    <div style="width: fit-content;">
                        <p style="padding-left: 20px; padding-right: 20px;">18E Cong Hoa Street, Ward 13, Tan Binh District, Ho Chi Minh City</p>
                    </div>
                </div>
                <div style="width: 34%; display: flex; justify-content: center; align-items: center;">
                    <div style="min-width: 50px; height:50px; border-radius: 10px; display: flex; justify-content: center; align-items: center; background-color: #3b5d50">
                        <img style="width: 20px; height: 20px" src="../PUBLIC-PAGE/images/envelope.svg" alt="">
                    </div>
                    <div style="width: fit-content;">
                        <p style="padding-left: 20px; padding-right: 20px;">Nova@gmail.com</p>
                    </div>
                </div>
                <div style="width: 33%; display: flex; justify-content: center; align-items: center;">
                    <div style="min-width: 50px; height:50px; border-radius: 10px; display: flex; justify-content: center; align-items: center; background-color: #3b5d50">
                        <img style="width: 20px; height: 20px" src="../PUBLIC-PAGE/images/phone-flip.svg" alt="">
                    </div>
                    <div style="width: fit-content;">
                        <p style="padding-left: 20px; padding-right: 20px;">0898999999</p>
                    </div>
                </div>
            </div>
            <div class="form-email-user">
                <div style="display: flex; justify-content:space-between">
                    <div style="width: 46%">
                        <label for="frame">First name</label>
                        <br>
                        <input type="text" id="frame" name="first-name" required>
                    </div>
                    <div style="width: 46%">
                        <label for="lrame">Last name</label>
                        <br>
                        <input type="text" id="lrame" name="last-name" required>
                    </div>
                </div>
                <div>
                    <label for="email">Email address</label>
                    <br>
                    <input type="text" id="email" name="email" required>
                </div>
                <div>
                    <label for="message">Message</label>
                    <br>
                    <textarea name="message" id="message" cols="30" rows="10"></textarea>
                </div>
            </div>
            <button type="submit" name="send">Send Message</button>
        </div>
    </div>
</form>

<style>
    .content-8 {
        height: fit-content;
        display: flex;
        justify-content: center;
        margin-bottom: 100px;
        margin-top: 50px;
    }

    .container8 {
        max-width: 50%;
    }

    .container8 p,
    label {
        font-size: 14px;
        opacity: 0.7;
        line-height: 1.5;
    }

    .container8 input,
    textarea {
        height: 50px;
        width: calc(100% - 0px);
        border-radius: 10px;
        border: solid 1px rgba(128, 128, 128, 0.7);
        margin: 10px 0;
        padding: 5px 5px 5px 25px;
        box-sizing: border-box;
    }

    .container8 button {
        font-weight: 600;
        padding: 16px 34px;
        border-radius: 30px;
        border: none;
        color: #eff2f1;
        background: #2f2f2f;
        border-color: #2f2f2f;
        text-decoration: none;
        margin-top: 30px;
    }

    #message {
        height: 300px;
        width: 100%;
        box-sizing: border-box;
        resize: none;
        padding: 25px;
    }
</style>