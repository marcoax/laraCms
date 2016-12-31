<!DOCTYPE html>
<html lang="it-IT">
<head>
    <meta charset="utf-8">
    <style>
        ul {
            list-style: outside none none;
            margin-bottom: 0;
            padding-left: 0;
        }
    </style>
</head>
<body>
<table class="table table-mail" style="width:650px;margin-top:0px;" align="center">
    <tr>
        <td  style="padding:0px;width:650px" bgcolor="#ffffff" align="left">
            <table class="table_inner" align="left">
                <tr>
                    <td align="left" class="logo" style="padding:0px;border-bottom:1px solid #6F6F6F;">
                        <img src="{!! asset('/website/images/email/email_header.jpg')!!}"   border="0"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="margin:40px 0px">@yield('content')</div>
                    </td>
                </tr>
                <tr bgcolor="#ffffff" >
                    <td class="footer" style="border-top:1px solid #6F6F6F;padding:7px 0px 0px 0px;font-size:14px;" bgcolor="#ffffff" bgcolor="#ffffff">
                        {{ config('laraCms.website.option.email.footer') }}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>