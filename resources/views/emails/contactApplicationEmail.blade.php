<html>
    <head>
        <style>
            td{
                width: 200px;
            }
        </style>
    </head>
    <body>
        <div class="journal-content-article"> 
            <div style="font-family:Arial, Helvetica, sans-serif; font-style: normal; font-weight: normal; font-size: 13px; vertical-align: top; text-align: left; background-color:#FFFFFF; width: 700px; "> 
                <table id="tblMain" width="700" style="" border="0" cellspacing="0"> 
                    <tr>
                        <td>Name</td>
                        <td colspan="3">{{ $data['name'] }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td colspan="3">{{ $data['userEmail'] }}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td colspan="3">{{ $data['phone'] }}</td>
                    </tr>
                    <tr>
                        <td>Website</td>
                        <td colspan="3">{{ $data['website'] }}</td>
                    </tr>
                    <tr>
                        <td>Message</td>
                        <td colspan="3">{{ $data['message'] }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 20px;" width="479" valign="top">
                            <p>Respectfully,</p>
                            <p> </p>
                            <p>Youth Media</p>
                            <p><a href="https://youthmedia.com/">Youth Media</a></p>
                        </td> 
                    </tr>
                </table> 
            </div> 
        </div>
    </body>
</html>