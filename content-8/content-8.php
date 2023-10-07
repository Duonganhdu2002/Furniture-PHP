<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="content-8.css">
    <title>content-8</title>
</head>

<body>
    <div class="untree_co-section">
        <div class="container">
            <div class="block">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-8 pb-4 ">
                        <div class="row mb-5">
                            <div class="col-lg-4 ">
                                <div class="service no-shadow align-items-center link horizontal d-flex active ">
                                    <div class="service-icon color-1 mb-4">
                                        <img src="../images/location-pin.svg" alt="location">
                                    </div>
                                    <div class=sevice-contents>
                                        <p>43 Raymouth Rd. Baltemoer, London 3910</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 ">
                                <div class="service no-shadow align-items-center link horizontal d-flex active ">
                                    <div class="service-icon color-1 mb-4">
                                        <img src="../images/email.svg" alt="email">
                                    </div>
                                    <div class=sevice-contents>
                                            <p>info@yourdomain.com</p>
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg-4 ">
                                <div class="service no-shadow align-items-center link horizontal d-flex active ">
                                    <div class="service-icon color-1 mb-4">
                                        <img src="../images/mobile.svg" alt="phone">
                                    </div>
                                    <div class=sevice-contents>
                                            <p>+1 294 3925 3939</p>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <form>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="frame">First name</label>
                                        <input type="text" class="form-control" name="" id="frame">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="lrame">Last name</label>
                                        <input type="text" class="form-control" name="" id="lrame">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="form-group mb-5">
                                <label for="message">Message</label>
                                <textarea name="" class="form-control" id="message" cols="30" rows="5"></textarea>
                            </div>
                            <button type="submit" class="btn">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <style>
        body {
    font-family: "Inter", sans-serif;
    font-weight: 400;
    line-height: 28px;
    color: #6a6a6a;
    font-size: 14px;
    background-color: #eff2f1;
}
.untree_co-section {
    padding: 7rem 0;
}
.row {
    display: flex;
    flex-wrap: wrap;
}
.justify-content-center {
    justify-content: center!important;
}
.col-md-8 {
    flex: 0 0 auto;
    width: 66.66666667%;
}
.col-lg-8 {
    flex: 0 0 auto;
    width: 66.66666667%;
}
.pb-4 {
    padding-bottom: 1.5rem!important;
}
.mb-5 {
    margin-bottom: 3rem!important;
}
.col-lg-4 {
    flex: 0 0 auto;
    width: 33.33333333%;
}
.service {
    line-height: 1.5;
}
.align-items-center {
    align-items: center!important;
}
.d-flex {
    display: flex!important;
}
.service .service-icon {
    border-radius: 10px;
    -webkit-box-flex: 0;
    -ms-flex: 0 0 50px;
    flex: 0 0 50px;
    height: 50px;
    line-height: 50px;
    text-align: center;
    background: #3b5d50;
    margin-right: 20px;
}
.mb-4 {
    margin-bottom: 1.5rem!important;
}
p {
    margin-top: 0;
    margin-bottom: 1rem;
}
#frame, #lrame{
    width: 315px;
    height: 40px;
}
#email{
    width: 765px;
    height: 40px;
}
#message{
    width: 765px;
    height: 100px;
}
.service {
    line-height: 1.5;
}
.col-6 {
    flex: 0 0 auto;
    width: 50%;
}
label {
    display: inline-block;
}
.form-control {
    height: 50px;
    border-radius: 10px;
    font-family: "Inter", sans-serif;
}
.form-control {
    display: block;
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}
textarea.form-control {
    min-height: calc(1.5em + .75rem + 2px);
}
.btn {
    height: 50px;
    width: 170px;
    font-weight: 600px;
    padding: 12px 30px;
    border-radius: 30px;
    color: #ffffff;
    background: #2f2f2f;
    border-color: #2f2f2f;
    text-align: center;
    vertical-align: middle;
}

    </style>
</body>

</html>
