
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
                                                        <b>Dear {{$data['name']}},</b>
                                                    </p>
                                                    <p>
                                                        <b>Welcome to Amit Computers Graphics!
                                                            </b
                                                        >
                                                    </p>

                                                      <p>
                                                        <b>Username</b
                                                        >:
                                                        {{$data['username']}}
                                                    </p>
                                                    
                                                    <p>
                                                        <b>Password</b
                                                        >:
                                                        {{$data['password']}}
                                                    </p>
                                                    
                                                   
                                                </td>
                                            </tr>
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
