
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <style type="text/css">
            @media screen and (max-width: 600px) {
            }
            @media screen and (max-width: 400px) {
            }
        </style>
    </head>
    <body style="margin: 0; padding: 0; background-color: #f6f9fc;">
        <center
            class="wrapper"
            style="width: 100%; table-layout: fixed; background-color: #f6f9fc;"
        >
            <div
                class="webkit"
                style="max-width: 600px; background-color: #fff;"
            >
                <table
                    class="outer"
                    align="center"
                    style="
                        margin: 0 auto;
                        width: 100%;
                        max-width: 600px;
                        border-spacing: 0;
                        font-family: Helvetica, sans-serif;
                    "
                >
                    
                                <tr>
                                    <td
                                        style="
                                            padding: 0;
                                            background-color: #45a9db;
                                            padding: 3px;
                                        "
                                    ></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td
                            class="text-body"
                            style="
                                padding: 0;
                                padding: 50px 30px 40px 30px;
                                width: 100%;
                                font-size: 16px;
                                line-height: 28px;
                            "
                        >
                            <table width="100%" style="border-spacing: 0;">
                                <tr>
                                    <td style="padding: 0;">
                                        <table
                                            width="100%"
                                            style="border-spacing: 0;"
                                        >
                                            <tr>
                                                <td
                                                    style="
                                                        padding: 0;
                                                        padding-right: 0;
                                                    "
                                                >
                                                    <p
                                                        class="greetings"
                                                        style="font-size: 18px;"
                                                    >
                                                        <b>Dear {{$username}},</b>
                                                    </p>
                                                    <p>
                                                        <b>Welcome to Amit Computers Graphics!
                                                            </b
                                                        >
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0;">
                                        Please click on the 
                                        <a href="{{url('/verifyemail/'.$email_token)}}">link</a>
                                        below to verify your account.

                                        <br />
                                        <br />
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0;">
                                        <table align="center" style="border-spacing:0">
                                            <td style="padding:25px">
                                                <a href="{{url('/verifyemail/'.$email_token)}}" style="padding:15px 40px;background-color:#27197a;color:#fff;border:none;border-radius:4px;text-decoration:none" target="_blank">
                                                    Verify Your Email
                                                </a>
                                            </td>
                                        </table>
                                    </td>
                                </tr>
                                
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- footer -->
                    
                </table>
            </div>
        </center>
    </body>
</html>
